<?php

namespace App\Http\Controllers\Admin;

use App\Models\SmsGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GroupMember;
use Exception;
use Illuminate\Support\Facades\Auth;

class SmsGroupController extends Controller
{
    public function index(){
        $data['groups']=SmsGroup::where('branch_id',Auth::user()->branch_id)->latest()->get();
        return view('admin.message.group.index',$data);
    }
    public function store(Request $request){
        $request->validate([
          'name'=>'required|max:70|unique:sms_groups',
          'description' =>'required|max:400'
        ]);

        try {
            $group=new SmsGroup();
            $group->name=$request->name;
            $group->description=$request->description;
            $group->branch_id=Auth::user()->branch_id;
            $group->save();
            return back()->with('success', 'Group Create Successfully');
        } catch (Exception $e) {
            return back()->with('error', 'Something went to Wrong');
        }

    }
    public function update(Request $request ,$id){
        $request->validate([
          'name'=>'required|max:70|unique:sms_groups,name,'.$id,
          'description' =>'required|max:400'
        ]);
        try {
            $group=SmsGroup::find($id);
            $group->name=$request->name;
            $group->description=$request->description;
            $group->branch_id=$group->branch_id;
            $group->save();
            return back()->with('success', 'Group Update Successfully');
        } catch (Exception $e) {
            return back()->with('error', 'Something went to Wrong');
        }

    }

    public function delete($id){
        try{
            $group=SmsGroup::find($id);
            GroupMember::where('group_id', $group->id)->delete();
            $group->delete();
            return back()->with('success', 'Group Delete Successfully');
        }catch(Exception $e){
            return back()->with('error', 'Something went to Wrong');
        }
    }
    public function show($id){
        try{
            $data=[];
            $data['group']=SmsGroup::find($id);
            $data['members']=GroupMember::where('group_id',$data['group']->id)->get();
            return view('admin.message.group.show',$data);
        }catch(Exception $e){
            return back()->with('error', 'Something went to Wrong');
        }
    }
    public function member_store(Request $request){
        $request->validate([
            'name'=>'required|max:70|unique:group_members',
            'phone' =>'required|unique:group_members|digits:11'
          ]);
          try {
              $member=new GroupMember();
              $member->name=$request->name;
              $member->phone=$request->phone;
              $member->group_id=$request->group_id;
              $member->branch_id=Auth::user()->branch_id;
              $member->save();
              $group=SmsGroup::find($request->group_id);
              $group->total_member +=1;
              $group->save();
              return back()->with('success', 'Member Added Successfully');
          } catch (Exception $e) {
              return back()->with('error', 'Something went to Wrong');
          }
    }

    public function member_delete($id){
        try{
            $member=GroupMember::find($id);
            $group=SmsGroup::find($member->group_id);
            $group->total_member -=1;
            $group->save();
            $member->delete();
            return back()->with('success', 'Member Delete Successfully');
        }catch(Exception $e){
            return back()->with('error', 'Something went to Wrong');
        }
    }
}
