<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Course;
use App\Models\Student;
use App\Models\StudentSubmitAnswer;
use App\Models\WrittenExam;
use App\Models\WrittenExamMark;
use App\Models\WrittenQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WrittenExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $examQuery = WrittenExam::query();
        $date_range = $request['date_range'];

        if (!empty($request['searchData'])) {
            $searchTerms = $request['searchData'];


            $batchIds = Batch::where('name', 'LIKE', "%{$searchTerms}%")->pluck('id')->toArray();

            $examQuery->where(function ($q) use ($searchTerms) {
                $q->where('exam_name', 'LIKE', "%{$searchTerms}%")
                    ->orWhere('exam_title', 'LIKE', "%{$searchTerms}%");
            })->orWhereHas('course', function ($query) use ($searchTerms) {
                $query->where('name', 'LIKE', "%{$searchTerms}%");
            })->orWhereHas('added_by', function ($query) use ($searchTerms) {
                $query->where('name', 'LIKE', "%{$searchTerms}%");
            });

            if (!empty($batchIds)) {
                foreach ($batchIds as $batchId) {
                    $examQuery->orWhereRaw("JSON_CONTAINS(batch_id, '\"{$batchId}\"')");
                }
            }
        }


        if (!empty($request['date_range'])) {

            try {
                $dateRange = explode(' - ', $request['date_range']);
                $startDate = Carbon::createFromFormat('d-m-Y', trim($dateRange[0]))->startOfDay();

                $endDate = Carbon::createFromFormat('d-m-Y', trim($dateRange[1]))->endOfDay();

                $examQuery->where(function ($query) use ($startDate, $endDate) {
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
        if (Auth::user()->role == 1)
        {
            $written_exams =  $examQuery->with('questions')->latest()->paginate($perPage);
        }
        else {
           if (Auth::user()->question_make_permission == 1) {
               $written_exams =  $examQuery->with('questions')->where('created_by', Auth::user()->id)->latest()->paginate($perPage);
           }
           else{
               return back()->with('error', 'You dont have permission');
           }
        }

        if ($request->ajax()) {
            return view('admin.exam.written.index_table', compact('written_exams', 'startIndex', 'date_range'))->render();
        } else {
            return view('admin.exam.written.index', compact('written_exams', 'startIndex', 'date_range'));
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->question_make_permission != 1) {
            return back()->with('error', 'You do not have permission');
        }
        $data = [];
        $data['batches'] = Batch::where('status', 1)->latest()->get();
        $data['courses'] = Course::latest()->get();
        return view('admin.exam.written.create', $data);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'exam_name' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'batch_id'=> 'required|exists:batches,id',
            'exam_title' => 'required|string|max:255',
            'total_mark' => 'required',
            'time'=>'required',
            'date'=>'required',
        ]);

        $written_exam = new WrittenExam();
        $written_exam->exam_name   = $request->exam_name;
        $written_exam->batch_id   = json_encode($request->batch_id);
        $written_exam->course_id   = $request->course_id;
        $written_exam->exam_title   = $request->exam_title;
        $written_exam->question_choose   = $request->question_choose;
        $written_exam->total_mark   = $request->total_mark;
        $written_exam->time   = $request->time;
        $written_exam->date   = $request->date;
        $written_exam->created_by   = Auth::guard('admin')->user()->id;
        $written_exam->save();


        $questions = new WrittenQuestion();
        $questions->written_exam_id = $written_exam->id;
        $questions->question = json_encode($request->question);
        $questions->save();
        return redirect()->route('admin.written-exams.index')->with('success', 'Written Exam Data Created Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (Auth::user()->question_make_permission != 1) {
            return back()->with('error', 'You do not have permission');
        }
        $data = [];
        $data['detail'] = WrittenExam::with('questions')->find($id);
        return view('admin.exam.written.show-details', $data);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (Auth::user()->question_make_permission != 1) {
            return back()->with('error', 'You do not have permission');
        }
        $data = [];
        $data['exam'] = WrittenExam::with('questions')->find($id);
        $data['batches'] = Batch::where('status', 1)->latest()->get();
        $data['courses'] = Course::latest()->get();
        return view('admin.exam.written.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $written_exam = WrittenExam::find($id);

        $request->validate([
            'exam_name' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'batch_id'=> 'required|exists:batches,id',
            'exam_title' => 'required|string|max:255',
            'total_mark' => 'required',
            'time'=>'required',
            'date'=>'required',
        ]);



        $written_exam->exam_name   = $request->exam_name;
        $written_exam->batch_id   = json_encode($request->batch_id);
        $written_exam->course_id   = $request->course_id;
        $written_exam->exam_title   = $request->exam_title;
        $written_exam->question_choose   = $request->question_choose;
        $written_exam->total_mark   = $request->total_mark;
        $written_exam->time   = $request->time;
        $written_exam->date   = $request->date;
        $written_exam->created_by   = Auth::guard('admin')->user()->id;
        $written_exam->save();



        $questions = WrittenQuestion::where('written_exam_id', $written_exam->id)->first();
        $questions->written_exam_id = $written_exam->id;
        $questions->question = json_encode($request->question);
        $questions->save();


        return redirect()->route('admin.written-exams.index')->with('success', 'Written Exam Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */


    public function destroy($id)
    {
        if (Auth::user()->question_make_permission != 1) {
            return back()->with('error', 'You do not have permission');
        }

        $exam = WrittenExam::find($id);

        if (!$exam) {
            return back()->with('error', 'Exam not found');
        }

        $questions = WrittenQuestion::where('written_exam_id', $exam->id)->get();

        if ($questions->isNotEmpty()) {
            foreach ($questions as $question) {
                $question->delete();
            }
        }


        $results = WrittenExamMark::where('exam_id', $exam->id)->get();

        if ($results->isNotEmpty()) {
            foreach ($results as $result) {
                $result->delete();
            }
        }

        $exam->delete();

        return redirect()->route('admin.written-exams.index')->with('success', 'Written Exam and its related data deleted successfully');
    }



    public function changeStatus($examId)
    {
        if (Auth::user()->question_make_permission != 1) {
            return back()->with('error', 'You do not have permission');
        }
        $exam = WrittenExam::findOrFail($examId);
        $exam->status = !$exam->status;
        $exam->save();

        return back()->with('status', 'Exam status updated successfully!');

    }



    public function givenMarks($examId)
    {
        if (Auth::user()->question_make_permission != 1) {
            return back()->with('error', 'You do not have permission');
        }
        $exam = WrittenExam::find($examId);


        $batchIds = json_decode($exam->batch_id, true) ?? [];

        $students = Student::whereIn('batch_id', $batchIds)->get();

        return view('admin.exam.written.given_marks', compact('exam', 'students'));

    }



    public function getMarks($examId)
    {
        if (Auth::user()->question_make_permission != 1) {
            return back()->with('error', 'You do not have permission');
        }
        $exam = WrittenExam::find($examId);

        $batchIds = json_decode($exam->batch_id, true) ?? [];

        $students = Student::whereIn('batch_id', $batchIds)->get();

        return view('admin.exam.get-marks', compact('exam', 'students'));

    }


    public function saveMarks(Request $request, $examId)
    {
        if (Auth::user()->question_make_permission != 1) {
            return back()->with('error', 'You do not have permission');
        }
        $exam = WrittenExam::find($examId);

        foreach ($request->marks as $studentId => $marks) {

            if ($marks > $exam->total_mark) {
                return back()->withErrors(['marks' => 'Marks cannot be greater than total marks']);
            }

            WrittenExamMark::updateOrCreate(
                ['exam_id' => $examId, 'student_id' => $studentId],
                ['marks' => $marks]
            );
        }

        return redirect()->route('admin.written-exams.index')->with('success', 'Marks have been saved successfully!');

    }



    public function allResult(Request $request)
    {
        if (Auth::user()->question_make_permission != 1) {
            return back()->with('error', 'You do not have permission');
        }
        $student_id = $request->student_id;

        $results1 = StudentSubmitAnswer::select(
            'students.id as student_id',
            'students.name_en as student_name',
            'students.student_roll as student_roll',
            'courses.name as course_name',
            'mcq_exams.id as mcq_exam_id',
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
            ->where('students.id', $student_id)
            ->groupBy('students.id', 'students.name_en', 'student_submit_answers.created_at', 'students.student_roll', 'courses.name', 'mcq_exams.id', 'mcq_exams.exam_name', 'mcq_exams.total_mark')
            ->paginate(100);

        $results2 = WrittenExamMark::select(
            'students.id as student_id',
            'students.name_en as student_name',
            'students.student_roll as student_roll',
            'courses.name as course_name',
            'written_exams.id as written_exam_id',
            'written_exams.exam_name',
            'written_exams.total_mark as total_mark',
            'written_exam_marks.marks as obtained_marks',
            DB::raw('written_exam_marks.created_at as created_at')
        )
            ->join('students', 'students.id', '=', 'written_exam_marks.student_id')
            ->join('written_exams', 'written_exams.id', '=', 'written_exam_marks.exam_id')
            ->join('courses', 'courses.id', '=', 'written_exams.course_id')
            ->where('students.id', $student_id)
            ->groupBy('students.id', 'students.name_en', 'written_exam_marks.created_at', 'students.student_roll', 'courses.name', 'written_exams.id', 'written_exams.exam_name', 'written_exams.total_mark', 'written_exam_marks.marks')
            ->paginate(100);

        $students = Student::latest()->get();

        if ($request->ajax()) {
            return response()->json([
                'results2' => view('admin.exam.partials.written_results', compact('results2', 'students'))->render(),
                'results1' => view('admin.exam.partials.mcq_results', compact('results1', 'students'))->render(),
                'pagination1' => (string) $results1->links(),
                'pagination2' => (string) $results2->links(),
            ]);
        }

        return view('admin.exam.result_list', compact('results2', 'results1', 'students'));

    }


}
