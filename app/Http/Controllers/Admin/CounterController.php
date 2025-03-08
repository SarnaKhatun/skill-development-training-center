<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\District;
use App\Models\Counter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\counterRequest;
use App\Models\Upazilla;
use App\Repositories\Interface\CounterInterface;

class counterController extends Controller
{
    protected $counter;
    public function __construct(CounterInterface $counter){
        $this->counter=$counter;
    }
    public function index(){
        $data=[];
        $data['counter']=$this->counter->first();
        return view('admin.counter.index',$data);
    }

    public function create()
    {

    }

    public function store(CounterRequest $request){
        try{
            $this->counter->store($request->all());
            return redirect()->route('admin.counter.index')->with('success','counter Created Successfully');
        }catch(Exception $e){
            return back()->with('error','Something went to Wrong');
        }
    }

    public function edit($id){
        try{
            $data=[];
            $data['counter']=$this->counter->get($id);
            return view('admin.counter.create',$data);
        }catch(Exception $e){
            return back()->with('error','Sorry Something went to Wrong');
        }
    }

    public function update(CounterRequest $request,$id){
        try{
            $this->counter->update($request->all(),$id);
            return redirect()->back()->with('success','Counter  Update Successfully');
        }catch(Exception $e){
            return back()->with('error','Sorry Something Went to Wrong');
        }
    }

    public function delete($id)
    {

    }
    public function statusChange(Request $request)
    {

    }
}
