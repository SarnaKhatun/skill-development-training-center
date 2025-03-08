<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Branch;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\RechargeSMS;
use App\Models\BranchBallance;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BranchBallanceController extends Controller
{
    public function index()
    {
        if(Auth::user()->branch_id==1){
            $data['ballance'] =BranchBallance::latest()->get();
        }else{
            $data['ballance'] =BranchBallance::where('branch_id',Auth::user()->branch_id)->latest()->get();
        }

        return view('admin.branchbalance.index',$data);
    }
    public function create()
    {
        if (Auth::guard('admin')->user()->branch_id == 1){
            abort(404);
        }
        $paymentmethods=PaymentMethod::orderBy('id','asc')->get();
        return view('admin.branchbalance.create',compact('paymentmethods'));
    }
    public function store(Request $request){
        $request->validate([
            'amount' => 'required',
            'method_id' => 'required',
            'tax' => 'nullable',
            'date' => 'required',
        ]);

       try{
            $method=PaymentMethod::where('id',$request->method_id)->first();
            if($method){
                $charge=($request->amount * $method->percentage) / 100 ;
                $amount=($request->amount - $charge) ;
                $balance= new BranchBallance();
                $balance->amount=$request->amount;
                $balance->method_id=$method->id;
                $balance->payment_date=$request->date;
                $balance->trx=$request->trx;
                $balance->charge=$charge;
                $balance->received_amount=$amount;
                $balance->branch_id=Auth::user()->branch_id;
                $balance->save();
            }
            return back()->with('success','Recharge  Add Successfully');
        }catch(Exception $e){
            return back()->with('error','Sorry Something went wrong');
        }

    }
    public function status($id){
        $balance=BranchBallance::find($id);
        if($balance->status==0){
            $balance->status=1;
            $balance->save();
            $branch=Branch::where('id',$balance->branch_id)->first();
            $branch->registration_balance= $branch->registration_balance+$balance->received_amount;
            $branch->save();
            return back()->with('success','Approved Successfully');
        }else{
            return back()->with('error','Sorry Something went wrong');
        }

    }
    public function charge(){
        $paymentmethods=PaymentMethod::orderBy('id','asc')->get();
        return view('admin.branchbalance.paymentCharge',compact('paymentmethods'));
    }
    public function courses_fees(){
        $courses=Course::where('status',1)->orderBy('id','asc')->get();
        return view('admin.branchbalance.courses_fees',compact('courses'));
    }
    
     public function message_rechrge()
    {
        if (Auth::guard('admin')->user()->branch_id == 1) {
            abort(404);
        }
        $paymentmethods = PaymentMethod::orderBy('id', 'asc')->get();
        return view('admin.branchbalance.buy_message', compact('paymentmethods'));
    }
    public function message_rechrge_store(Request $request)
    {
        $request->validate([
            'total_sms' => 'required',
            'amount' => 'required',
            'method_id' => 'required',
            'tax' => 'nullable|digits:11',
            'date' => 'required',
        ]);
        try {
            $method = PaymentMethod::where('id', $request->method_id)->first();
            if ($method) {
                $charge = ($request->amount * $method->percentage) / 100;
                $amount = ($request->amount - $charge);
                $recharge_sms = new RechargeSMS();
                $recharge_sms->total_sms = $request->total_sms;
                $recharge_sms->amount = $request->amount;
                $recharge_sms->method_id = $method->id;
                $recharge_sms->payment_date = $request->date;
                $recharge_sms->trx = $request->trx;
                $recharge_sms->charge = $charge;
                $recharge_sms->status = 0;
                $recharge_sms->received_amount = $amount;
                $recharge_sms->branch_id = Auth::user()->branch_id;
                $recharge_sms->save();
            }
            return back()->with('success', 'Message Recharge  Add Successfully');
        } catch (Exception $e) {
            return back()->with('error', 'Sorry Something went wrong');
        }
    }
    public function message_re_history()
    {
        if (Auth::user()->branch_id == 1) {
            $data['mess_history'] = RechargeSMS::latest()->get();
        } else {
            $data['mess_history'] = RechargeSMS::where('branch_id', Auth::user()->branch_id)->latest()->get();
        }
        return view('admin.branchbalance.message_re_history', $data);
    }
    public function message_recharge_status($id)
    {
        $recharge_sms = RechargeSMS::find($id);
        $adminBranch = Branch::where('id', 1)->first();
        if ($adminBranch->sms < $recharge_sms->total_sms) {
            return back()->with('error', 'Add SMS First in Admin');
        }
        if ($recharge_sms->status == 0) {
            $recharge_sms->status = 1;
            $recharge_sms->save();
            $branch = Branch::where('id', $recharge_sms->branch_id)->first();
            $branch->sms += $recharge_sms->total_sms;
            $branch->save();
            $adminBranch->sms -= $recharge_sms->total_sms;
            $adminBranch->save();
            return back()->with('success', 'Approved Successfully');
        } else {
            return back()->with('error', 'Sorry Something went wrong');
        }
    }
    public function message_rechrge_admin(Request $request)
    {
        $adminBranch = Branch::where('id', 1)->first();
        if ($adminBranch) {
            $adminBranch->sms += $request->total_sms;
            $adminBranch->save();
            return back()->with('success', 'SMS Added Successfully');
        } else {
            return back()->with('error', 'Sorry Something went wrong');
        }
    }
}