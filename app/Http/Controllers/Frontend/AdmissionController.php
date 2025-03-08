<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Admin;
use App\Models\Branch;
use App\Traits\Uploadable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdmissionController extends Controller
{
    use Uploadable;
   public function create(){
    return view('frontend.pages.center');
   }
   public function center_submit(Request $request){

    $request->validate([
        'name' => 'required|string|max:65',
        'email' => 'required|unique:admins,email',
        'phone' => 'required|digits:11|unique:admins,phone',
        'image' => 'required|image|mimes:jpeg,png,jpg',
        'fathers_name' => 'required|string|max:65',
        'mothers_name' => 'required|string|max:65',
        'nationality' => 'required|string|max:65',
        'gender' => 'required|string|max:65',
        'religion' => 'required|string|max:65',
        'division_id' => 'required',
        'district_id' => 'required',
        'upazilla_id' => 'required',
        'post_office' => 'required|string|max:65',
        'address' => 'required|string|max:65',
        'institute_name_en' => 'required|string|max:32',
        'institute_name_bn' => 'required|string|max:65',
        'institute_age' => 'required|max:65',
        'facebook_link' => 'nullable|max:250',
        'youtube_link' => 'nullable|max:250',
        'institute_division' => 'required',
        'institute_district' => 'required',
        'institute_upazilla' => 'required',
        'institute_post_code' => 'required|string|max:65',
        'institute_address' => 'required|string|max:150',
        'nid_card_img' => 'required|image|mimes:jpeg,png,jpg',
        'trade_licence_img' => 'required|image|mimes:jpeg,png,jpg',
        'signature_img' => 'required|image|mimes:jpeg,png,jpg|dimensions:width=80,height=40',
    ]);
    if($request->registration_code != 'SDLT07'){
        return back()->with('error','You Submit Wrong Code');
    }
    $filename = "";
    $nidname = "";
    $tradename = "";
    $signaturename = "";
    if ($request->file('image')){
        $filename = $this->uploadOne($request['image'], 400, 300, 'backend/images/branch/', true);
    }
    if($request->file('nid_card_img')){
        $nidname = $this->uploadOne($request['nid_card_img'], 400, 300, 'backend/images/NIDimg/', true);
    }
    if($request->file('trade_licence_img')){
        $tradename = $this->uploadOne($request['trade_licence_img'], 400, 300, 'backend/images/TradeLicenceimg/', true);
    }
    if($request->file('signature_img')){
        $signaturename = $this->uploadOne($request['signature_img'], 80, 40, 'backend/images/Signatureimg/', true);
    }
    $lastbranch=Branch::orderBy('id', 'desc')->first();
    $center_Code = 'SDTL-' . str_pad($lastbranch->id + 1, 2, '0', STR_PAD_LEFT);

    $branch = new Branch();
    $branch->name = $request->name;
    $branch->email  = $request->email;
    $branch->phone   = $request->phone;
    $branch->status  = 0;
    $branch->image = $filename;
    $branch->fathers_name  = $request->fathers_name;
    $branch->mothers_name  = $request->mothers_name;
    $branch->nationality   = $request->nationality;
    $branch->gender        = $request->gender;
    $branch->religion      = $request->religion;
    $branch->division_id   = $request->division_id;
    $branch->district_id   = $request->district_id;
    $branch->upazilla_id   = $request->upazilla_id;
    $branch->post_office   = $request->post_office;
    $branch->address = $request->address;
    $branch->center_code = $center_Code;
    $branch->institute_name_en = $request->institute_name_en;
    $branch->institute_name_bn = $request->institute_name_bn;
    $branch->institute_age = $request->institute_age;
    $branch->facebook_link = $request->facebook_link;
    $branch->youtube_link = $request->youtube_link;
    $branch->institute_division = $request->institute_division;
    $branch->institute_district = $request->institute_district;
    $branch->institute_upazilla = $request->institute_upazilla;
    $branch->institute_post_code = $request->institute_post_code;
    $branch->institute_address = $request->institute_address;
    $branch->nid_card_img = $nidname;
    $branch->trade_licence_img = $tradename;
    $branch->signature_img = $signaturename;
    //dd('hi');
    $branch->save();

    $admin=new Admin();
    $admin->name=$request->name;
    $admin->username=$request->name;
    $admin->email=$request->email;
    $admin->address=$request->address;
    $admin->phone=$request->phone;
    $admin->status=0;
    $admin->role=2;
    $admin->branch_id=$branch->id;
    $admin->password=Hash::make('12345678');
    $admin->save();
    $branch->admin_id = $admin->id;
    $branch->branch_id = $branch->id;
    $branch->save();
    return back()->with('success','Your Registration SuccessFully Done.');
   }
}