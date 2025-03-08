<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\District;
use App\Models\Upazilla;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpazillaRequest;
use App\Repositories\Interface\UpazillaInterface;

class UpazillaController extends Controller
{
    protected $upazilla;
    public function __construct(UpazillaInterface $upazilla){
        $this->upazilla=$upazilla;
    }
    public function index(){
        if (Auth::guard('admin')->user()->role == '1') {
            $data=[];
            $data['upazillas']=$this->upazilla->all();
            return view('admin.upazilla.index',$data);
        }else{
            abort(404);
        }
    }

    public function create()
    {

    }

    public function store(UpazillaRequest $request){
        try{
            //dd($request);
            $this->upazilla->store($request->all());
            return redirect()->route('admin.upazilla.index')->with('success','upazilla Created Successfully');
        }catch(Exception $e){
            return back()->with('error','Something went to Wrong');
        }
    }

    public function edit($id){

    }

    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required|string|max:65',
            'division_id' => 'required',
            'district_id' => 'required',
           // 'priority' => 'required|unique:upazillas,priority,'.$id,
        ]);

        try{
            $this->upazilla->update($request->all(),$id);
            return redirect()->back()->with('success','Upazilla  Update Successfully');
        }catch(Exception $e){
            return back()->with('error','Sorry Something Went to Wrong');
        }
    }

    public function delete($id)
    {
        try {
            $this->upazilla->delete($id);
            return redirect()->back()->with('success','Upazilla Deleted Successfully');
        }catch (Exception $e){
            return redirect()->back()->with('error','Sorry Something Went to Wrong');
        }

    }
    public function getupazilla($id)
    {
        try {
             $upazilla = Upazilla::where('district_id', $id)->orderBy('name', 'ASC')->get();
             return json_encode($upazilla);
        }catch (Exception $e){
            return response()->with('error','Sorry Something Went to Wrong');
        }
    }

   public function statusChange( $id)
    {
        try{
            $upazilla = Upazilla::find($id);
            if ($upazilla) {
                $upazilla->status = $upazilla->status ? 0 : 1;
                $upazilla->save();
            }
            return redirect()->back()->with('success','Status Update Successfully');
        }catch(Extension $e){
            return response()->with('error','Sorry Something Went to Wrong');
        }
    }
}