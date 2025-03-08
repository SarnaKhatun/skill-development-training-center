<?php
namespace App\Repositories;
use App\Models\Session;
use App\Repositories\Interface\SessionInterface;

class SessionRepositories implements SessionInterface
{
    public function all(){
        return Session::Orderby('id','desc')->get();
    }
    public function store(array $data){
        $session= new Session();
        $session->name=$data['name'];
        $session->save();
    }
    public function get($id){
        return Session::find($id);
    }
    public function update(array $data,$id){
        $session=Session::find($id);
        $session->name=$data['name'];
        $session->save();
    }
    public function delete($id){
        $session=Session::find($id);
        if(!empty($session)){
            $session->delete();
        }
    }
    
    public function statusChange(array $data)
    {
        //dd($data);
        $session = Session::find($data['id']);
        if ($session) {
            $session->status = $session->status ? 0 : 1;
            $session->save();
        }
    }
}