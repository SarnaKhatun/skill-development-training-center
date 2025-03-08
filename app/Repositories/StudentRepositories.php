<?php
namespace App\Repositories;
use App\Models\Batch;
use App\Models\Branch;
use App\Models\Course;
use App\Models\Message;
use App\Models\Register;
use App\Models\Result;
use App\Models\Student;
use App\Traits\Uploadable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\SMSController;
use App\Repositories\Interface\StudentInterface;

class StudentRepositories implements StudentInterface
{
    use Uploadable;

    protected $smsController;
    public function __construct(SMSController $smsController)
    {
        $this->smsController = $smsController;
    }



    public function all(){
        $branch_id=Auth::guard('admin')->user()->branch_id;
        if(Auth::guard('admin')->user()->role == '1'){

            return Student::orderBy('id','desc')->paginate(100);
        }else{
            return Student::where('created_by',$branch_id)->orderBy('id','desc')->paginate(100);
        }
    }

    public function store(array $data){
        $batch=Batch::where('id',$data['batch_id'])->first();
        $student= new Student();
        $filename = "";
        $document_image = "";
        if (array_key_exists('image', $data)){
            $filename = $this->uploadOne($data['image'], 400, 300, 'backend/images/student/', true);
        }
        $lastStudent = Student::orderBy('id','desc')->first();
        $lastRollNumber = $lastStudent ? $lastStudent->student_roll : '240000';
        $nextRollNumber = intval($lastRollNumber) + 1;
        $stu_roll = str_pad($nextRollNumber, 6, '0', STR_PAD_LEFT);


        $created_by=Auth::guard('admin')->user()->branch_id ?? 0;
        $student->name_en=$data['name_en'];
        $student->name_bn=$data['name_bn'];
        $student->fathers_name=$data['fathers_name'];
        $student->mothers_name=$data['mothers_name'];
        $student->phone=$data['phone'];
        $student->email=$data['email'];
        $student->stu_nid=$data['stu_nid'];
        $student->image=$filename;
        $student->student_roll=$stu_roll;
        $student->created_by=$created_by;
        $student->document_image=$document_image;
        $student->gurdian_phone=$data['gurdian_phone'];
        $student->present_address=$data['present_address'];
        $student->premanent_address=$data['premanent_address'];
        $student->dob=$data['dob'];
        $student->blood_group=$data['blood_group'];
        $student->nationality=$data['nationality'];
        $student->gender=$data['gender'];
        $student->religion=$data['religion'];
        $student->board_id=$data['board_id'];
        $student->roll=$data['roll'];
        $student->registration=$data['registration'];
        $student->exam_year=$data['exam_year'];
        $student->admission_date=$data['admission_date'];
        $student->course_id=$data['course_id'];
        $student->session_id=$data['session_id'];
        $student->session_year=$data['session_year'];
        $student->session_start=$data['session_start'];
        $student->session_end=$data['session_end'];
        $student->exam_id=$data['exam_id'];
        $student->admission_fee=$data['admission_fee'];
        $student->discount=$data['discount'];
        $student->payable_amount=$data['payable_amount'];
        $student->due=$data['payable_amount'];
        $student->batch_id=$data['batch_id'];
        $student->password=Hash::make('12345678');
        $student->save();
        if ($created_by != 1) {
            $branch = Branch::find($created_by);
            $branch->registration_balance -=100;
            $branch->save();
            $admin=Branch::where('id',1)->first();
            $admin->registration_balance +=100;
            $admin->save();
        }
        $phoneWithPrefix = '88' . $student->phone;
        $message = 'Your Admission Successfully Done. ' . $student->name_en . '. Roll - ' . $student->student_roll;
        $messageText = 'Your Admission Successfully Done. ' . $student->name_en . '. Roll - ' . $student->student_roll;
        $this->smsController->sendSMS($phoneWithPrefix, $message);
        $message = new Message();
        $message->phone = $student->phone;
        $message->message = $messageText;
        $message->branch_id = Auth::user()->branch_id;
        $message->type = 5;
        $message->save();
    }

    public function get($id){
        $branch_id=Auth::guard('admin')->user()->branch_id;
        if(Auth::guard('admin')->user()->role == '1' || Auth::guard('admin')->user()->branch_id==0){
            return Student::find($id);
        }else{
            $student= Student::find($id);
            if($student->created_by==$branch_id){
                return Student::find($id);
            }else{
               return abort(404);
            }
        }
    }

    public function update(array $data, $id){
        $student =Student::find($id);
        $filename = "";
        $document_image = "";
        if (array_key_exists('image', $data)){
            $this->deleteOne($student->image);
            $filename = $this->uploadOne($data['image'], 400, 300, 'backend/images/student/', true);
        }else{
            $filename=$student->image;
        }
        $student->name_en=$data['name_en'];
        $student->name_bn=$data['name_bn'];
        $student->fathers_name=$data['fathers_name'];
        $student->mothers_name=$data['mothers_name'];
        $student->phone=$data['phone'];
        $student->email=$data['email'];
         $student->stu_nid=$data['stu_nid'];
        $student->image=$filename;
        $student->document_image=$document_image;
        $student->gurdian_phone=$data['gurdian_phone'];
        $student->present_address=$data['present_address'];
        $student->premanent_address=$data['premanent_address'];
        $student->dob=$data['dob'];
        $student->blood_group=$data['blood_group'];
        $student->nationality=$data['nationality'];
        $student->gender=$data['gender'];
        $student->religion=$data['religion'];
        $student->board_id=$data['board_id'];
        $student->roll=$data['roll'];
        $student->registration=$data['registration'];
        $student->exam_year=$data['exam_year'];
        $student->admission_date=$data['admission_date'];
        $student->course_id=$data['course_id'];
        $student->session_id=$data['session_id'];
        $student->session_year=$data['session_year'];
        $student->session_start=$data['session_start'];
        $student->session_end=$data['session_end'];
        $student->exam_id=$data['exam_id'];
        $student->admission_fee=$data['admission_fee'];
        $student->discount=$data['discount'];
        $student->payable_amount=$data['payable_amount'];
        $student->due=$data['payable_amount']- $student->paid;
        $student->save();
    }

    public function delete($id){
        $student =  Student::find($id);
        if(!empty($student)){
            $registrationDel = Register::where('student_id', $student->id)->first();
            if ($registrationDel)
            {
                $registrationDel->delete();
            }

            $resultDel = Result::where('student_id', $student->id)->first();
            if ($resultDel) {
                $resultDel->delete();
            }

            $this->deleteOne($student->image);
            $student->delete();
        }
    }

    public function statusChange(array $data){
        $student = Student::find($data['id']);
        if ($student) {
            $student->status = $student->status ? 0 : 1;
            $student->save();
        }
    }
}
