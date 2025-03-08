<?php
namespace App\Repositories;
use App\Models\Examination;
use App\Repositories\Interface\ExaminationInterface;

class ExaminationRepositories implements ExaminationInterface
{
    public function all(){
        return Examination::Orderby('id','desc')->get();
    }
    public function store(array $data){
        $exam= new Examination();
        $exam->name=$data['name'];
        $exam->save();
    }
    public function get($id){
        return Examination::find($id);
    }
    public function update(array $data,$id){
        $exam=Examination::find($id);
        $exam->name=$data['name'];
        $exam->save();
    }
    public function delete($id){
        $exam=Examination::find($id);
        if(!empty($exam)){
            $exam->delete();
        }
    }
}
