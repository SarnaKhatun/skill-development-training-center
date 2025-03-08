<?php
namespace App\Repositories;
use App\Models\register;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interface\RegisterInterface;

class RegisterRepositories implements RegisterInterface
{
    public function all(){
        return Register::Orderby('id','desc')->get();
    }
    public function store(array $data){
        $register= new Register();
        $register->name=$data['name'];
        $register->priority =$data['priority'];
        $register->save();
    }

}