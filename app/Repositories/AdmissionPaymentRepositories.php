<?php
namespace App\Repositories;
use App\Models\AdmissionPayment;
use App\Models\Student;
use App\Repositories\Interface\AdmissionPaymentInterface;

class AdmissionPaymentRepositories implements AdmissionPaymentInterface
{
    public function all(){
        return AdmissionPayment::Orderby('id','desc')->get();
    }
    public function store(array $data){
        $admissionpayment= new AdmissionPayment();
        $admissionpayment->student_id=$data['student_id'];
        $admissionpayment->date=$data['date'];
        $admissionpayment->amount=$data['amount'];
        $admissionpayment->save();
        $student= Student::find($admissionpayment->student_id);
        $student->paid=($student->paid+$admissionpayment->amount);
        $student->save();
        $student->due=($student->payable_amount-$student->paid);
        $student->save();
    }
    public function get($id){
        return AdmissionPayment::find($id);
    }
    public function find($id){
        return AdmissionPayment::where('student_id',$id)->get();
    }
}
