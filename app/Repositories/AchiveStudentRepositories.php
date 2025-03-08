<?php
namespace App\Repositories;
use App\Models\AchiveStudent;
use App\Repositories\Interface\AchiveStudentInterface;

class AchiveStudentRepositories implements AchiveStudentInterface
{
    public function all(){
        return AchiveStudent::Orderby('id','desc')->get();
    }
    public function store(array $data){
        $achiveStudent= new AchiveStudent();
        $achiveStudent->student_id=$data['student_id'];
        $achiveStudent->description=$data['description'];
        $achiveStudent->save();
    }
    public function get($id){
        return AchiveStudent::find($id);
    }
    public function first(){
        return AchiveStudent::latest()->first();
    }
    public function update(array $data,$id){
        $achiveStudent=AchiveStudent::find($id);
        $achiveStudent->student_id=$data['student_id'];
        $achiveStudent->description=$data['description'];
        $achiveStudent->save();
    }
    public function delete($id){
        $achiveStudent=AchiveStudent::find($id);
        if(!empty($achiveStudent)){
            $achiveStudent->delete();
        }
    }
    public function statusChange(array $data)
    {

    }
}
