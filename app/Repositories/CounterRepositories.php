<?php
namespace App\Repositories;
use App\Models\Counter;
use App\Repositories\Interface\CounterInterface;

class CounterRepositories implements CounterInterface
{
    public function all(){
        return Counter::Orderby('id','desc')->get();
    }
    public function store(array $data){
        $counter= new Counter();
        $counter->count_o1=$data['count_o1'];
        $counter->count_o2=$data['count_o2'];
        $counter->count_o3=$data['count_o3'];
        $counter->count_o4=$data['count_o4'];
        $counter->save();
    }
    public function get($id){
        return Counter::find($id);
    }
    public function first(){
        return Counter::latest()->first();
    }
    public function update(array $data,$id){
        $counter=Counter::find($id);
        $counter->count_o1=$data['count_o1'];
        $counter->count_o2=$data['count_o2'];
        $counter->count_o3=$data['count_o3'];
        $counter->count_o4=$data['count_o4'];
        $counter->save();
    }
    public function delete($id){
    }
    public function statusChange(array $data)
    {

    }
}
