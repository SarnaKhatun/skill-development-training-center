<?php

namespace App\Http\Controllers\Admin;


use Exception;
use App\Http\Requests\BoardRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interface\BoardInterface;

class BoardController extends Controller
{
    protected $board;
    public function __construct(BoardInterface $board){
        $this->board=$board;
    }
    public function index(){
        if (Auth::guard('admin')->user()->role == '2') {
            abort(404);
        }
        $data=[];
        $data['boards']=$this->board->all();
        return view('admin.board.index',$data);
    }

    public function create()
    {

    }

    public function store(BoardRequest $request){
        try{
            //dd($request);
            $this->board->store($request->all());
            return redirect()->route('admin.board.index')->with('success','board Created Successfully');
        }catch(Exception $e){
            return back()->with('error','Something went to Wrong');
        }
    }

    public function edit($id){

    }

    public function update(BoardRequest $request,$id){
        try{
            $this->board->update($request->all(),$id);
            return redirect()->route('admin.board.index')->with('success','board  Update Successfully');
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
            $this->board->delete($id);
            return redirect()->back()->with('success','board Deleted Successfully');
        }catch (Exception $e){
            return redirect()->back()->with('error','Sorry Something Went to Wrong');
        }

    }
}
