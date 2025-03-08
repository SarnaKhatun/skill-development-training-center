<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Course;
use App\Models\McqExam;
use App\Models\McqExamOption;
use App\Models\Student;
use App\Models\StudentSubmitAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class MCQQuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $mcqExamQuery = McqExam::query();
        $date_range = $request['date_range'];

        if (!empty($request['searchData'])) {
            $searchTerms = $request['searchData'];


            $batchIds = Batch::where('name', 'LIKE', "%{$searchTerms}%")->pluck('id')->toArray();

            $mcqExamQuery->where(function ($q) use ($searchTerms) {
                $q->where('exam_name', 'LIKE', "%{$searchTerms}%")
                    ->orWhere('exam_title', 'LIKE', "%{$searchTerms}%");
            })->orWhereHas('course', function ($query) use ($searchTerms) {
                $query->where('name', 'LIKE', "%{$searchTerms}%");
            })->orWhereHas('added_by', function ($query) use ($searchTerms) {
                $query->where('name', 'LIKE', "%{$searchTerms}%");
            });

            if (!empty($batchIds)) {
                foreach ($batchIds as $batchId) {
                    $mcqExamQuery->orWhereRaw("JSON_CONTAINS(batch_id, '\"{$batchId}\"')");
                }
            }
        }

        if (!empty($request['date_range'])) {

            try {
                $dateRange = explode(' - ', $request['date_range']);
                $startDate = Carbon::createFromFormat('d-m-Y', trim($dateRange[0]))->startOfDay();

                $endDate = Carbon::createFromFormat('d-m-Y', trim($dateRange[1]))->endOfDay();

                $mcqExamQuery->where(function ($query) use ($startDate, $endDate) {
                    $query->whereDate('date', '>=', $startDate)
                        ->whereDate('date', '<=', $endDate);
                });
            } catch (\Exception $e) {
                return back()->withErrors(['date_range' => 'Invalid date range format. Please use DD-MM-YYYY - DD-MM-YYYY.']);
            }
        }


        $perPage = isset($request['perPage']) ? intval($request['perPage']) : 100;
        $currentPage = max(1, $request->input('page', 1));
        $startIndex = ($currentPage - 1) * $perPage;
        $mcq_exams =  $mcqExamQuery->with('questions')->latest()->paginate($perPage);

        if ($request->ajax()) {
            return view('admin.exam.mcq.index_table', compact('mcq_exams', 'startIndex', 'date_range'))->render();
        } else {
            return view('admin.exam.mcq.index', compact('mcq_exams', 'startIndex', 'date_range'));
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [];
        $data['batches'] = Batch::where('status', 1)->latest()->get();
        $data['courses'] = Course::latest()->get();
        return view('admin.exam.mcq.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'exam_name' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'batch_id' => 'required|exists:batches,id',
            'exam_title' => 'required|string|max:255',
            'total_mark' => 'required',
            'time' => 'required',
            'date' => 'required',
        ]);

        $mcq_exam = new McqExam();
        $mcq_exam->exam_name = $request->exam_name;
        $mcq_exam->batch_id = json_encode($request->batch_id);
        $mcq_exam->course_id = $request->course_id;
        $mcq_exam->exam_title = $request->exam_title;
        $mcq_exam->total_mark = $request->total_mark;
        $mcq_exam->time = $request->time;
        $mcq_exam->date = $request->date;
        $mcq_exam->created_by = Auth::guard('admin')->user()->id;
        $mcq_exam->save();

        foreach ($request->question as $index => $question) {
            McqExamOption::create([
                'mcq_exam_id' => $mcq_exam->id,
                'question' => $question,
                'options' => json_encode($request->options[$index]),
                'answer' => $request->answer[$index],
            ]);
        }

        return redirect()->route('admin.mcq-exams.index')->with('success', 'MCQ Exam Created Successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detail = McqExam::with('questions')->find($id);

        if (!$detail) {
            return redirect()->back()->with('error', 'Exam not found');
        }
        return view('admin.exam.mcq.show-details', compact('detail'));
    }
    /**
     * Show the form for editing the specified resource.
     */

    public function edit(string $id)
    {
        $data = [];
        $data['exam'] = McqExam::with('questions')->findOrFail($id);
        $data['batches'] = Batch::where('status', 1)->latest()->get();
        $data['courses'] = Course::latest()->get();


        foreach ($data['exam']->questions as $question) {

            if (is_string($question->options)) {

                $question->options = json_decode($question->options, true) ?? [];
            }

        }

        return view('admin.exam.mcq.edit', $data);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mcq_exam = McqExam::findOrFail($id);

        $request->validate([
            'exam_name' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'batch_id' => 'required|exists:batches,id',
            'exam_title' => 'required|string|max:255',
            'total_mark' => 'required',
            'time' => 'required',
            'date' => 'required',
            'question' => 'required|array',
            'question.*' => 'required|string|max:180',
            'options' => 'required|array',
            'options.*' => 'required|array|min:4|max:4',
            'answer' => 'required|array',
            'answer.*' => 'required|string|max:80',
        ]);


        $mcq_exam->update([
            'exam_name' => $request->exam_name,
            'batch_id' => json_encode($request->batch_id),
            'course_id' => $request->course_id,
            'exam_title' => $request->exam_title,
            'total_mark' => $request->total_mark,
            'time' => $request->time,
            'date' => $request->date,
            'created_by' => Auth::guard('admin')->user()->id,
        ]);


        McqExamOption::where('mcq_exam_id', $mcq_exam->id)->delete();

        foreach ($request->question as $index => $questionText) {
            $question = new McqExamOption();
            $question->mcq_exam_id = $mcq_exam->id;
            $question->question = $questionText;
            $question->options = json_encode($request->options[$index]);
            $question->answer = $request->answer[$index];
            $question->save();
        }

        return redirect()->route('admin.mcq-exams.index')->with('success', 'MCQ Exam updated Successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $exam_delete = McqExam::find($id);
        $exam_delete->delete();
        return redirect()->route('admin.mcq-exams.index')->with('success', 'MCQ Data Deleted Successfully');
    }


    public function changeStatus($examId)
    {
        $exam = McqExam::findOrFail($examId);
        $exam->status = !$exam->status;
        $exam->save();
        return back()->with('status', 'Status updated successfully!');
    }

    public function allStudentResults(Request $request)
    {
        $date_range = $request['date_range'];
        $query = StudentSubmitAnswer::select(
            'students.id as student_id',
            'students.name_en as student_name',
            'students.student_roll as student_roll',
            'mcq_exams.id as mcq_exam_id',
            'courses.name as course_name',
            'mcq_exams.exam_name',
            'mcq_exams.total_mark',
            DB::raw('COUNT(student_submit_answers.question_id) as total_questions'),
            DB::raw('SUM(student_submit_answers.is_correct) as correct_answers'),
            DB::raw('student_submit_answers.created_at as created_at'),
            DB::raw('(mcq_exams.total_mark / COUNT(student_submit_answers.question_id)) * SUM(student_submit_answers.is_correct) as obtained_marks')
        )
            ->join('students', 'students.id', '=', 'student_submit_answers.student_id')
            ->join('mcq_exams', 'mcq_exams.id', '=', 'student_submit_answers.mcq_exam_id')
            ->join('courses', 'courses.id', '=', 'mcq_exams.course_id')
            ->groupBy('students.id', 'students.name_en',  'student_submit_answers.created_at', 'students.student_roll', 'courses.name', 'mcq_exams.id', 'mcq_exams.exam_name', 'mcq_exams.total_mark');


        if ($request->has('searchData') && !empty($request->searchData)) {
            $search = $request->searchData;
            $query->where(function ($q) use ($search) {
                $q->where('students.name_en', 'LIKE', "%{$search}%")
                    ->orWhere('students.student_roll', 'LIKE', "%{$search}%")
                    ->orWhere('mcq_exams.exam_name', 'LIKE', "%{$search}%")
                    ->orWhere('courses.name', 'LIKE', "%{$search}%");
            });
        }


        if (!empty($request['date_range'])) {

            try {
                $dateRange = explode(' - ', $request['date_range']);
                $startDate = Carbon::createFromFormat('d-m-Y', trim($dateRange[0]))->startOfDay();

                $endDate = Carbon::createFromFormat('d-m-Y', trim($dateRange[1]))->endOfDay();

                $query->where(function ($q) use ($startDate, $endDate) {
                    $q->whereDate('student_submit_answers.created_at', '>=', $startDate)
                        ->whereDate('student_submit_answers.created_at', '<=', $endDate);
                });
            } catch (\Exception $e) {
                return back()->withErrors(['date_range' => 'Invalid date range format. Please use DD-MM-YYYY - DD-MM-YYYY.']);
            }
        }



        $results = $query->paginate(100);

        if ($request->ajax()) {
            return view('admin.exam.mcq.result_list_table', compact('results', 'date_range'))->render();
        }

        return view('admin.exam.mcq.result_list', compact('results', 'date_range'));
    }


    public function studentResultDetails($encryptedExamId, $studentId)
    {
        $mcq_exam_id = Crypt::decryptString($encryptedExamId);

        $submittedAnswers = StudentSubmitAnswer::where('student_id', $studentId)
            ->where('mcq_exam_id', $mcq_exam_id)
            ->get();

        $questionIds = $submittedAnswers->pluck('question_id');
        $questions = McqExamOption::whereIn('id', $questionIds)->get()->keyBy('id');

        $exam = McqExam::find($mcq_exam_id);
        $student = Student::find($studentId);

        $totalMark = $exam->total_mark ?? 0;
        $correctCount = $submittedAnswers->where('is_correct', true)->count();
        $totalQuestions = $submittedAnswers->count();
        $obtainedMarks = $totalQuestions > 0 ? ($totalMark / $totalQuestions) * $correctCount : 0;

        return view('admin.exam.mcq.result-details', compact('submittedAnswers', 'questions', 'obtainedMarks', 'exam', 'student'));
    }


}
