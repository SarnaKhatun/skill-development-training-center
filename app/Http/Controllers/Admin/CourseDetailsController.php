<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\CourseDetails;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseDetailsRequest;
use App\Repositories\Interface\CourseDetailsInterface;

class CourseDetailsController extends Controller
{
    protected $coursedetail;
    public function __construct(CourseDetailsInterface $coursedetail){
        $this->coursedetail=$coursedetail;
    }
    public function index(){
        $data=[];
        $data['coursedetails']=$this->coursedetail->all();
        return view('admin.course.show',$data);
    }

    public function create()
    {
        $data['courses']=Course::latest()->get();
        return view('admin.course.coursedetail.create',$data);
    }

    public function store(CourseDetailsRequest $request){
        try{
            //dd($request);
            $this->coursedetail->store($request->all());
            return redirect()->back()->with('success','coursedetail Created Successfully');
        }catch(Exception $e){
            return back()->with('error','Something went to Wrong');
        }
    }
    public function edit($id){
        try{
            $data=[];
            $data['coursedetail']=$this->coursedetail->get($id);
            $data['courses']=Course::latest()->get();
            return view('admin.course.coursedetail.create',$data);
        }catch(Exception $e){
            return back()->with('error','Sorry Something went to Wrong');
        }
    }
    public function update(Request $request,$id){
        $coursedetails=CourseDetails::find($id);
        $request->validate([
            'header_title'=>'required|max:50',
            'title'=>'required|max:250',
            'course_id'=>'required',
            'type'=>'required',
             'priority' => 'required|unique:course_details,priority,'.$id,
            'upload_video'=>'nullable',
            'description'=>'nullable',
            'pdf'=>'nullable|mimes:pdf|max:10000',
        ]);
        try{
            $this->coursedetail->update($request->all(),$id);
            return redirect()->route('admin.coursedetail.index')->with('success','coursedetail  Update Successfully');
      }catch(Exception $e){
            return back()->with('error','Sorry Something Went to Wrong');
        }
    }
    public function delete($id)
    {
        try {
            $this->coursedetail->delete($id);
            return redirect()->back()->with('success','coursedetail Deleted Successfully');
        }catch (Exception $e){
            return redirect()->back()->with('error','Sorry Something Went to Wrong');
        }

    }
      public function statusChange($id)
    {
        try{
            $courseDetail = CourseDetails::find($id);
            if ($courseDetail) {
                $courseDetail->status = $courseDetail->status ? 0 : 1;
                $courseDetail->save();
            }
            return redirect()->back()->with('success','Status Update Successfully');
        }catch(Extension $e){
            return response()->with('error','Sorry Something Went to Wrong');
        }
    }

    public function details($id)
    {
        try {
        $data['coursedetail']=$this->coursedetail->get($id);
        return view('admin.course.coursedetail.show_details',$data);
        }catch (Exception $e){
            return response()->json(['error' => true, 'message' => 'Sorry Something went to wrong']);
        }
    }
}