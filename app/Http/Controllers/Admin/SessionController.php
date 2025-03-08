<?php

namespace App\Http\Controllers\Admin;


use Exception;
use App\Models\Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SessionRequest;
use Illuminate\Http\Request;
use App\Repositories\Interface\SessionInterface;

class SessionController extends Controller
{
    protected $session;
    public function __construct(SessionInterface $session){
        $this->session=$session;
    }
    public function index(){
        if (Auth::guard('admin')->user()->role == '2') {
            abort(404);
        }
        $data=[];
        $data['sessions']=$this->session->all();
        return view('admin.session.index',$data);
    }

    public function create()
    {

    }

    public function store(SessionRequest $request){
        try{
            //dd($request);
            $this->session->store($request->all());
            return redirect()->route('admin.session.index')->with('success','session Created Successfully');
        }catch(Exception $e){
            return back()->with('error','Something went to Wrong');
        }
    }

    public function edit($id){

    }

    public function update(SessionRequest $request,$id){
        try{
            $this->session->update($request->all(),$id);
            return redirect()->route('admin.session.index')->with('success','session  Update Successfully');
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
            $this->session->delete($id);
            return redirect()->back()->with('success','session Deleted Successfully');
        }catch (Exception $e){
            return redirect()->back()->with('error','Sorry Something Went to Wrong');
        }

    }
    
    public function statusChange($id)
    {
        try {
            $session = Session::find($id);
            if ($session) {
                $session->status = $session->status ? 0 : 1;
                $session->save();
            }
            return redirect()->back()->with('success', 'Status Update Successfully');
        } catch (Extension $e) {
            return response()->with('error', 'Sorry Something Went to Wrong');
        }
    }
}