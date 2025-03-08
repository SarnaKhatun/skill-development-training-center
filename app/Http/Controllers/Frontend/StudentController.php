<?php

namespace App\Http\Controllers\Frontend;

use App\Models\McqExam;
use App\Models\McqExamOption;
use App\Models\StudentSubmitAnswer;
use App\Models\WrittenExam;
use App\Models\WrittenExamMark;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Branch;
use App\Models\Result;
use App\Models\Student;
use App\Models\Register;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\CourseDetails;
use App\Models\AdmissionPayment;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class StudentController extends Controller
{

   public function dashboard(){
    $stu_id=Auth::user()->id;
    $branch_id=Auth::user()->created_by;
    $data['branch']=Branch::where('id',$branch_id)->first();
    $data['student']=Student::where('id',$stu_id)->first();
    //dd(  $data['coursedetalis']);
    return view('student.dashboard',$data);
   }
   public function profile(){
    $stu_id=Auth::user()->id;
    $data['student']=Student::where('id',$stu_id)->first();
    return view('student.stu-info.profile', $data);
   }
   public function course($header_title){
    $data['coursedetalis']=$this->coursedetails;
    $formattedTitle = str_replace('_', ' ', $header_title);

    $coursedetails=CourseDetails::where('course_id', Auth::user()->course_id)->get();
    if ($coursedetails->isEmpty()) {
        abort(404);
    }
    $data['detail'] = $coursedetails->where('header_title', $formattedTitle)->first();
    return view('student.course.view', $data);
   }

   public function logout(Request $request): RedirectResponse
    {
        Auth::guard('student')->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function admitcard()
    {
        $register = Register::where('student_id',Auth::user()->id)->first();
        if (!$register) {
            return back()->with('error', 'Not Registered Yet !');
        }
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('chroot', realpath(''));
        $dompdf = new Dompdf($options);
        $html = view('admin.register.admitcard', compact('register'))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        return $dompdf->stream('admitcard.pdf');
    }

    public function resultCard(){
        $result = Result::where('student_id', Auth::user()->id)->first();
        if(!$result){
            return redirect()->back()->with('error',' Result not Published Yet !');
        }
       // return view('admin.result.resultShow', compact('result'));
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('chroot', realpath(''));
        $dompdf = new Dompdf($options);
        $html = view('admin.result.resultShow', compact('result'))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        return $dompdf->stream('result.pdf');
    }


     public function Password_page()
    {
        $data['user']=Student::where('id',Auth::user()->id)->first();
        return view('student.stu-info.password',$data);
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|min:8|max:12',
        ]);
        $user = Student::find($id);
        if (Hash::check($request->old_password, $user->password)) {
            if ($request->old_password === $request->password) {
                return back()->with('error', 'Sorry, the new password cannot be the same as the old password.');
            } else {
                $user->password = Hash::make($request->password);
                $user->save();
                return back()->with('success', 'Password updated successfully.');
            }
        } else {
            return back()->with('error', 'Sorry, the old password is incorrect.');
        }
    }

     public function student_payment(){

       return abort(404);
        $data=[];
        $data['student']=Student::where('id',Auth::user()->id)->first();
        $data['admissionPayment']=AdmissionPayment::where('student_id',Auth::user()->id)->get();
        return view('student.stu-info.payment',$data);
    }
    public function all_message(){
        $data=[];
        $data['messages']=Message::where('phone',Auth::user()->phone)->get();
        return view('student.stu-info.all_message',$data);
    }

    public function examList()
    {
        $data = [];
        $data['written_exams'] = WrittenExam::with('questions')
            ->where('status', 1)
            ->whereJsonContains('batch_id', (string)Auth::user()->batch_id)
            ->latest()
            ->get();

        $data['mcq_exams'] = McqExam::with('questions')
            ->where('status', 1)
            ->whereJsonContains('batch_id', (string)Auth::user()->batch_id)
            ->latest()
            ->get();

        return view('student.exam_index', $data);
    }




    public function resultList(Request $request)
    {
        $student_id = Auth::id();

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
            ->where('student_submit_answers.student_id', $student_id)
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
            ->where('written_exam_marks.student_id', $student_id)
            ->paginate(100);

        return view('student.result_list', compact('results1', 'results2'));
    }



    public function examShow(string $id)
    {
        $data = [];
        $data['detail'] = WrittenExam::with('questions')->find($id);
        return view('student.exam-details', $data);
    }

    public function examMcqShow(string $id)
    {
        $detail = McqExam::with('questions')->find($id);
        if (!$detail) {
            return redirect()->back()->with('error', 'Exam not found');
        }
        return view('student.mcq-show-details', compact('detail'));
    }


    public function submit(Request $request)
    {
        $studentId = Auth::id();
        $answers = $request->input('answers', []);

        $correctCount = 0;
        $skippedQuestions = [];

        foreach ($answers as $questionId => $selectedOption) {
            $alreadyAnswered = StudentSubmitAnswer::where('student_id', $studentId)
                ->where('question_id', $questionId)
                ->exists();

            if ($alreadyAnswered) {
                $skippedQuestions[] = $questionId;
                continue;
            }

            $question = McqExamOption::find($questionId);
            $mcqExamId = $question->mcq_exam_id ?? null;

            if ($question) {
                $correctAnswer = $question->answer;

                StudentSubmitAnswer::create([
                    'student_id' => $studentId,
                    'mcq_exam_id' => $mcqExamId,
                    'question_id' => $questionId,
                    'selected_option' => $selectedOption,
                    'is_correct' => ($selectedOption == $correctAnswer),
                ]);

                if ($selectedOption == $correctAnswer) {
                    $correctCount++;
                }
            }
        }

        if (!empty($skippedQuestions)) {
            return redirect()->back()->with('error', 'Already submitted and were not submitted again.');
        }

        return redirect()->route('mcq.result', ['mcq_exam_id' => Crypt::encryptString($mcqExamId)])->with('success', 'Your answers have been submitted successfully.');
    }



    public function result(Request $request, $mcq_exam_id)
    {
        $studentId = Auth::id();

        try {
            $mcqExamId = Crypt::decryptString($mcq_exam_id);
        } catch (\Exception $e) {
            return abort(404, 'Invalid MCQ Exam ID.');
        }

        $submittedAnswers = StudentSubmitAnswer::where('student_id', $studentId)
            ->where('mcq_exam_id', $mcqExamId)
            ->get();

        $questionIds = $submittedAnswers->pluck('question_id');
        $questions = McqExamOption::whereIn('id', $questionIds)->get()->keyBy('id');

        $totalMark = McqExam::where('id', $mcqExamId)->value('total_mark') ?? 0;
        $correctCount = $submittedAnswers->where('is_correct', true)->count();
        $totalQuestions = $submittedAnswers->count();
        $totalMarks = $totalQuestions > 0 ? ($totalMark / $totalQuestions) * $correctCount : 0;

        return view('student.mcq_result', compact('submittedAnswers', 'questions', 'totalMarks', 'mcqExamId'));
    }


}
