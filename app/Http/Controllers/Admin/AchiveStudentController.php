<?php

namespace App\Http\Controllers\Admin;


use Exception;
use App\Models\Student;
use App\Models\AchiveStudent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\AchiveStudentRequest;
use App\Repositories\Interface\AchiveStudentInterface;

class AchiveStudentController extends Controller
{
    protected $achiveStudent;
    public function __construct(AchiveStudentInterface $achiveStudent){
        $this->achiveStudent=$achiveStudent;
    }
    public function index(){
        $data=[];
        $data['students']=Student::all();
        $data['achiveStudents']=$this->achiveStudent->all();
        return view('admin.achiveStudent.index',$data);
    }

    public function create()
    {

    }

    public function store(AchiveStudentRequest $request){
        try{
            //dd($request);
            $this->achiveStudent->store($request->all());
            return redirect()->route('admin.achiveStudent.index')->with('success','AchiveStudent Created Successfully');
        }catch(Exception $e){
            return back()->with('error','Something went to Wrong');
        }
    }

    public function edit($id){

    }

    public function update(Request $request,$id){
        $achiveStudent = AchiveStudent::find($id);
        $request->validate([
            'student_id'=>'required|unique:achive_students,student_id,' . $achiveStudent->id,
            'description'=>'required|max:140',
        ]);


        try{
            $this->achiveStudent->update($request->all(),$id);
            return redirect()->route('admin.achiveStudent.index')->with('success','AchiveStudent  Update Successfully');
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
            $this->achiveStudent->delete($id);
            return redirect()->back()->with('success','AchiveStudent Deleted Successfully');
        }catch (Exception $e){
            return redirect()->back()->with('error','Sorry Something Went to Wrong');
        }

    }
}

