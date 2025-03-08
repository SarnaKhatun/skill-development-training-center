<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\District;
use App\Models\Upazilla;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DistrictRequest;
use App\Repositories\Interface\DistrictInterface;

class DistrictController extends Controller
{
    protected $district;
    public function __construct(DistrictInterface $district){
        $this->district=$district;
    }
    public function index(){
        if (Auth::guard('admin')->user()->role == '1') {
            $data=[];
            $data['districts']=$this->district->all();
            return view('admin.district.index',$data);
        }else{
            abort(404);
        }

    }

    public function create()
    {

    }

    public function store(DistrictRequest $request){
       // dd($request->all());
       try{
            $this->district->store($request->all());
            return redirect()->route('admin.district.index')->with('success','district Created Successfully');
        }catch(Exception $e){
            return back()->with('error','Something went to Wrong');
        }
    }

    public function edit($id){

    }

    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required|string|max:65',
           // 'priority' => 'required|unique:districts,priority,'.$id,
            'division_id' => 'required',
        ]);
        try{
            $this->district->update($request->all(),$id);
            return redirect()->back()->with('success','district  Update Successfully');
        }catch(Exception $e){
            return back()->with('error','Sorry Something Went to Wrong');
        }
    }

    public function delete($id)
    {
        try {
            $upazilla=Upazilla::where('district_id', $id)->delete();
            $this->district->delete($id);
            return redirect()->back()->with('success','district Deleted Successfully');
        }catch (Exception $e){
            return redirect()->back()->with('error','Sorry Something Went to Wrong');
        }

    }
    public function getdistrict($id)
    {

        try {
             $district = District::where('division_id', $id)->orderBy('name', 'ASC')->get();
             return json_encode($district);
        }catch (Exception $e){
            return response()->with('error','Sorry Something Went to Wrong');
        }

    }
     public function statusChange($id)
    {
        try{
            $district = District::find($id);
            if ($district) {
                $district->status = $district->status ? 0 : 1;
                $district->save();
            }
            return redirect()->back()->with('success','Status Update Successfully');
        }catch(Extension $e){
            return response()->with('error','Sorry Something Went to Wrong');
        }
    }
}