<?php
namespace App\Repositories;
use App\Models\Service;
use App\Repositories\Interface\ServiceInterface;

class ServiceRepositories implements ServiceInterface
{
    public function all(){
        return Service::Orderby('priority','asc')->get();
    }
    public function store(array $data){
        $service= new Service();
        $service->title=$data['title'];
        $service->priority=$data['priority'];
        $service->description=$data['description'];
        $service->save();
    }
    public function get($id){
        return Service::find($id);
    }
    public function update(array $data,$id){
        $service=Service::find($id);
        $service->title=$data['title'];
        $service->priority=$data['priority'];
        $service->description=$data['description'];
        $service->save();
    }
    public function delete($id){
        $service=Service::find($id);
        if(!empty($service)){
            $service->delete();
        }
    }
}
