<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseDetails;
use App\Models\CourseSubject;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interface\CourseInterface;

class CourseController extends Controller
{
    protected $course;
    public function __construct(CourseInterface $course){
        $this->course=$course;
    }
    public function index(){
        $data=[];
        $data['courses']=$this->course->all();
        return view('admin.course.index',$data);
    }

    public function create()
    {
        return view('admin.course.create');
    }

    public function store(CourseRequest $request){
        try{
            //dd($request);
            $this->course->store($request->all());
            return redirect()->route('admin.course.index')->with('success','course Created Successfully');
        }catch(Exception $e){
            return back()->with('error','Something went to Wrong');
        }
    }

    public function edit($id){
        try{
            $data=[];
            $data['course']=$this->course->get($id);
            return view('admin.course.create',$data);
        }catch(Exception $e){
            return back()->with('error','Sorry Something went to Wrong');
        }
    }

    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required|string|max:65|unique:courses,name,'.$id,
            'course_fee' => 'required',
            'priority' => 'required|unique:courses,priority,'.$id,
            'description' => ' nullable',
        ]);
        try{
            $this->course->update($request->all(),$id);
            return redirect()->route('admin.course.index')->with('success','course  Update Successfully');
        }catch(Exception $e){
            return back()->with('error','Sorry Something Went to Wrong');
        }
    }

    public function show($id)
    {
        try {
            $data=[];
            $data['course']=$this->course->get($id);
            $data['coursedetails']=CourseDetails::where('course_id',$id)->Orderby('priority','asc')->get();
            return view('admin.course.show',$data);
        }catch (Exception $e){
            return redirect()->back()->with('error','Sorry Something Went to Wrong');
        }

    }
    public function delete($id)
    {
        try {
            $this->course->delete($id);
            return redirect()->back()->with('success','Course Deleted Successfully');
        }catch (Exception $e){
            return redirect()->back()->with('error','Sorry Something Went to Wrong');
        }

    }
    public function statusChange($id)
    {
        try{
            $course = Course::find($id);
            if ($course) {
                $course->status = $course->status ? 0 : 1;
                $course->save();
            }
            return redirect()->back()->with('success','Status Update Successfully');
        }catch(Extension $e){
            return response()->with('error','Sorry Something Went to Wrong');
        }
    }

    public function subject_show(){
        if(Auth::user()->role==1){
            $data=[];
            $data['courses']=$this->course->all();
            $data['course_subject']=CourseSubject::all();
            return view('admin.course.subject_show',$data);
        }else{
            abort(404);
        }

    }

    public function course_sub_store(Request $request){
      //  dd($request);
        $request->validate([
            'title' => 'required|max:30',
            'item' => 'required|max:35',
            'course_id' => 'required',
        ]);
           $subject=new  CourseSubject;
           $subject->course_id=$request->course_id;
           $subject->title=$request->title;
           $subject->item=json_encode($request->item);
           //$subject->item=implode(',', $request->input('item', []));
           $subject->save();
           return redirect()->back()->with('success','Course Subject Added Successfully');
    }
    public function course_subject_update(Request $request,$id){
        $request->validate([
            'title' => 'required|max:30',
            'item' => 'required|max:35',
            'course_id' => 'required',
        ]);
           $subject=CourseSubject::find($id);
           $subject->course_id=$request->course_id;
           $subject->title=$request->title;
           $subject->item=json_encode($request->item);
           $subject->save();
           return redirect()->back()->with('success','Course Subject Update Successfully');
    }
    public function course_subject_delete($id){
           $subject=CourseSubject::find($id);
           $subject->delete();
           return redirect()->back()->with('success','Course Subject Delete Successfully');
    }
}