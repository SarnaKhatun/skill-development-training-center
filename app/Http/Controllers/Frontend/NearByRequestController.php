<?php

namespace App\Http\Controllers\Frontend;

use Exception;
use Illuminate\Http\Request;
use App\Models\NearByRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NearByRequestController extends Controller
{
    public function nearby_store(Request $request){
        $request->validate([
            'name'=>'required|max:70',
            'phone' =>'required|digits:11',
            'district_id' =>'required',
            'upazilla_id' =>'required',
            'branch_id' =>'required',
            'address' =>'required|max:200',
            'message' =>'required',
          ]);
          try {
              $nearby=new NearByRequest();
              $nearby->name=$request->name;
              $nearby->phone=$request->phone;
              $nearby->district_id=$request->district_id;
              $nearby->upazilla_id=$request->upazilla_id;
              $nearby->branch_id=$request->branch_id;
              $nearby->address=$request->address;
              $nearby->message=$request->message;
              $nearby->save();
              return back()->with('success', 'your Request Submit Successfully');
          } catch (Exception $e) {
              return back()->with('error', 'Something went to Wrong');
          }
    }

    public function index(){
        $nearby=NearByRequest::where('branch_id',Auth::user()->branch_id)->latest()->get();
        return view('admin.nearBy.index',compact('nearby'));
    }

    public function delete($id)
    {
        $nearby = NearByRequest::find($id);
        $nearby->delete();
        return redirect()->route('admin.nearbyRequest.index')->with('success', 'NearByRequest Deleted Successfully');
    }
}
