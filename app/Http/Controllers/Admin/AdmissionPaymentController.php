<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\AdmissionPayment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AdmissionPaymentRequest;
use App\Repositories\Interface\AdmissionPaymentInterface;

class AdmissionPaymentController extends Controller
{
    protected $admissionpayment;
    public function __construct(AdmissionPaymentInterface $admissionpayment){
        $this->admissionpayment=$admissionpayment;
    }
   public function store(AdmissionPaymentRequest $request){
       try{
           $student = Student::find($request->student_id);
            if ($student->due == 0) {
                return back()->with('error', 'No Due');
            }
           $this->admissionpayment->store($request->all());
           return redirect()->back();
       }catch(Exception){
          return back()->with('error','Something went to Worng');
       }
    }
    public function find($id){
        $data=[];
        $data['student']=Student::find($id);
        $data['admissionPayment']=$this->admissionpayment->find($id);
        return view('admin.admissionpayment.index',$data);
    }
    public function admissionpayment_search(Request $request){
        try{
            $data=[];
            $admin_id=Auth::guard('admin')->user()->id;
            if (Auth::guard('admin')->user()->role == '2') {
                $student = Student::where('created_by',$admin_id)->where('student_roll', 'like', '%'.$request->search.'%')->latest()->first();
            }else{
                $student = Student::where('student_roll', 'like', '%'.$request->search.'%')->latest()->first();
            }
            if( $student){
                $data['admissionPayment']=$this->admissionpayment->find($student->id);
            }else{
                return back()->with('error','Not found');
            }
            return view('admin.admissionpayment.index',$data,compact('student'));
        }catch(Exception){
            return back()->with('error','Something went to Worng');
        }
    }
    public function admissionpayment_student(Request $request){
        return view('admin.admissionpayment.searchpage');
    }
}