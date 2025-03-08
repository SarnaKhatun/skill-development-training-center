<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Setting;
use App\Models\District;
use App\Models\Upazilla;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SettingRequest;
use App\Repositories\Interface\SettingInterface;

class SettingController extends Controller
{
    protected $setting;
    public function __construct(SettingInterface $setting){
        $this->setting=$setting;
    }
    public function index(){
    }

    public function create()
    {
        if(Auth::guard('admin')->user()->role == '1'){
            $data=[];
            $data['setting']=$this->setting->first();
            return view('admin.setting.create',$data);
        }else{
            abort(404);
        }

    }

    public function store(SettingRequest $request){
       // dd($request);
        try{
            $this->setting->store($request->all());
            return redirect()->route('admin.setting.create')->with('success','setting Created Successfully');
        }catch(Exception $e){
            return back()->with('error','Something went to Wrong');
        }
    }

    public function edit($id){
        try{
            $data=[];
            $data['setting']=$this->setting->get($id);
            return view('admin.setting.create',$data);
        }catch(Exception $e){
            return back()->with('error','Sorry Something went to Wrong');
        }
    }

    public function update(SettingRequest $request,$id){
        try{
            $this->setting->update($request->all(),$id);
            return redirect()->back()->with('success','setting  Update Successfully');
        }catch(Exception $e){
            return back()->with('error','Sorry Something Went to Wrong');
        }
    }

    public function delete($id)
    {

    }
    public function statusChange(Request $request)
    {

    }
}