<?php
namespace App\Repositories;
use App\Models\Result;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interface\ResultInterface;

class ResultRepositories implements ResultInterface
{
    public function all(){
        $results = Result::all();
        $studentIds = $results->pluck('student_id')->unique()->toArray();
        $branch_id=Auth::guard('admin')->user()->branch_id;
        return Student::whereIn('id',$studentIds)->where('created_by',$branch_id)->Orderby('id','asc')->paginate(100);
    }
    public function store(array $data){
      foreach ($data['student_id'] as $index => $student_id) {
            if (!empty($data['cgpa'][$index])) {
                $result = new Result();
                $result->student_id = $student_id;
                $result->date = $data['result_date'];
                $result->cgpa = $data['cgpa'][$index];
                $result->branch_id = Auth::user()->branch_id;
                $result->save();
            }
        }
    }
    public function get($id){
        return Result::find($id);
    }
    public function update(array $data,$id){
        $result=Result::find($id);
        $result->student_id=$data['student_id'];
        $result->date=$data['result_date'];
        $result->cgpa=$data['cgpa'];
        $result->branch_id= $result->branch_id;
        $result->save();
    }
    public function delete($id){
        $result=Result::find($id);
        if(!empty($result)){
            $result->delete();
        }
    }
}