<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Repositories\Interface\ServiceInterface;

class ServiceController extends Controller
{
    protected $service;
    public function __construct(ServiceInterface $service){
        $this->service=$service;
    }
    public function index(){
        $data=[];
        $data['services']=$this->service->all();
        return view('admin.service.index',$data);
    }

    public function create()
    {
        return view('admin.service.create');
    }

    public function store(ServiceRequest $request){
        try{
            //dd($request);
            $this->service->store($request->all());
            return redirect()->route('admin.service.index')->with('success','service Created Successfully');
        }catch(Exception $e){
            return back()->with('error','Something went to Wrong');
        }
    }

    public function edit($id){
        try{
            $data=[];
            $data['service']=$this->service->get($id);
            return view('admin.service.create',$data);
        }catch(Exception $e){
            return back()->with('error','Sorry Something went to Wrong');
        }
    }

    public function update(Request  $request,$id){
        $service = Service::find($id);
        $request->validate([
            'title' => 'required|max:100',
            'priority' => 'required|unique:services,priority,' . $service->id,
            'description' => 'required|max:160',
        ]);
        try{
            $this->service->update($request->all(),$id);
            return redirect()->route('admin.service.index')->with('success','service  Update Successfully');
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
            $this->service->delete($id);
            return redirect()->back()->with('success','service Deleted Successfully');
        }catch (Exception $e){
            return redirect()->back()->with('error','Sorry Something Went to Wrong');
        }

    }
}

