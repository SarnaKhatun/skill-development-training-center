<?php

namespace App\Http\Controllers\Admin;


use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ExaminationRequest;
use App\Repositories\Interface\ExaminationInterface;

class ExaminationController extends Controller
{
    protected $examination;
    public function __construct(ExaminationInterface $examination){
        $this->examination=$examination;
    }
    public function index(){
        if (Auth::guard('admin')->user()->role == '2') {
            abort(404);
        }
        $data=[];
        $data['examinations']=$this->examination->all();
        return view('admin.examination.index',$data);
    }

    public function create()
    {

    }

    public function store(ExaminationRequest $request){
        try{
            //dd($request);
            $this->examination->store($request->all());
            return redirect()->route('admin.examination.index')->with('success','examination Created Successfully');
        }catch(Exception $e){
            return back()->with('error','Something went to Wrong');
        }
    }

    public function edit($id){

    }

    public function update(ExaminationRequest $request,$id){
        try{
            $this->examination->update($request->all(),$id);
            return redirect()->route('admin.examination.index')->with('success','examination  Update Successfully');
        }catch(Exception $e){
            return back()->with('error','Sorry Something Went to Wrong');
        }
    }

    public function show($id)
    {


    }
    public function delete($id)
    {
        try {
            $this->examination->delete($id);
            return redirect()->back()->with('success','examination Deleted Successfully');
        }catch (Exception $e){
            return redirect()->back()->with('error','Sorry Something Went to Wrong');
        }

    }
}
