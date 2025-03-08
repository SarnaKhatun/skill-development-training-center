<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Repositories\Interface\EventInterface;

class EventController extends Controller
{
    protected $event;
    public function __construct(EventInterface $event){
        $this->event=$event;
    }
    public function index(){
        $data=[];
        $data['events']=$this->event->all();
        return view('admin.event.index',$data);
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function store(EventRequest $request){
        try{
            //dd($request);
            $this->event->store($request->all());
            return redirect()->route('admin.event.index')->with('success','event Created Successfully');
        }catch(Exception $e){
            return back()->with('error','Something went to Wrong');
        }
    }

    public function edit($id){
        try{
            $data=[];
            $data['event']=$this->event->get($id);
            return view('admin.event.create',$data);
        }catch(Exception $e){
            return back()->with('error','Sorry Something went to Wrong');
        }
    }

    public function update(Request  $request,$id){
        $request->validate([
            'title'=>'required|max:100',
            'image'=>'nullable|image|mimes:png,jpg',
            'date'=>'required',
            'time'=>'required',
            'location'=>'required|max:140',
            'short_description'=>'required|max:140',
            'description'=>'required|max:30000',
        ]);
        try{
            $this->event->update($request->all(),$id);
            return redirect()->route('admin.event.index')->with('success','event  Update Successfully');
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
            $this->event->delete($id);
            return redirect()->back()->with('success','event Deleted Successfully');
        }catch (Exception $e){
            return redirect()->back()->with('error','Sorry Something Went to Wrong');
        }

    }
}

