<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\District;
use App\Models\Division;
use App\Models\Upazilla;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DivisionRequest;
use App\Repositories\Interface\DivisionInterface;

class DivisionController extends Controller
{
    protected $division;
    public function __construct(DivisionInterface $division){
        $this->division=$division;
    }
    public function index(){
        if (Auth::guard('admin')->user()->role == '1') {
            $data=[];
            $data['divisions']=$this->division->all();
            return view('admin.division.index',$data);
        }else{
            abort(404);
        }

    }

    public function create()
    {


    }

    public function store(DivisionRequest $request){

        try{
            //dd($request);
            $this->division->store($request->all());
            return redirect()->route('admin.division.index')->with('success','Division Created Successfully');
        }catch(Exception $e){
            return back()->with('error','Something went to Wrong');
        }
    }

    public function edit($id){
        if (Auth::guard('admin')->user()->role == '2') {
            abort(404);
        }
        try{
            $data=[];
            $data['divisions']=$this->division->get($id);
            return view('admin.division.create',$data);
        }catch(Exception $e){
            return back()->with('error','Sorry Something went to Wrong');
        }
    }

    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required|string|max:65',
           // 'priority' => 'required|unique:divisions,priority,'.$id,
        ]);
        try{
            $this->division->update($request->all(),$id);
            return redirect()->back()->with('success','Division  Update Successfully');
        }catch(Exception $e){
            return back()->with('error','Sorry Something Went to Wrong');
        }
    }

    public function delete($id)
    {
        try {
            $district=District::where('division_id', $id)->delete();
            $upazilla=Upazilla::where('division_id', $id)->delete();
            $this->division->delete($id);
            return redirect()->back()->with('success','Division Deleted Successfully');
        }catch (Exception $e){
            return redirect()->back()->with('error','Sorry Something Went to Wrong');
        }

    }
      public function statusChange($id)
    {
        try{
            $division = Division::find($id);
            if ($division) {
                $division->status = $division->status ? 0 : 1;
                $division->save();
            }
            return redirect()->back()->with('success','Status Update Successfully');
        }catch(Extension $e){
            return response()->with('error','Sorry Something Went to Wrong');
        }
    }
}