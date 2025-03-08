<?php
namespace App\Repositories;
use App\Models\Admin;
use App\Models\Branch;
use App\Traits\Uploadable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Interface\BranchInterface;

class BranchRepositories implements BranchInterface
{
   use Uploadable;
   public function all(){
        if(Auth::guard('admin')->user()->role == '1'){
            return Branch::orderBy('id','desc')->get();
        }else{
            return abort(404);
        }
    }

    public function store(array $data){
        $filename = "";
        $nidname = "";
        $tradename = "";
        $signaturename = "";
        if (array_key_exists('image', $data)){
            $filename = $this->uploadOne($data['image'], 400, 300, 'backend/images/branch/', true);
        }
        if (array_key_exists('nid_card_img', $data)){
            $nidname = $this->uploadOne($data['nid_card_img'], 400, 300, 'backend/images/NIDimg/', true);
        }
        if (array_key_exists('trade_licence_img', $data)){
            $tradename = $this->uploadOne($data['trade_licence_img'], 400, 300, 'backend/images/TradeLicenceimg/', true);
        }
        if (array_key_exists('signature_img', $data)){
            $signaturename = $this->uploadOne($data['signature_img'], 80, 40, 'backend/images/Signatureimg/', true);
        }
        $branch=Branch::orderBy('id', 'desc')->first();
        if ($branch) {
            $center_Code = 'SDTL-' . str_pad($branch->id + 1, 2, '0', STR_PAD_LEFT);
        } else {
            $center_Code = 'SDTL-' . '01';
        }
        $branch = new Branch();
        $branch->name = $data['name'];
        $branch->email  = $data['email'];
        $branch->phone   = $data['phone'];
        $branch->status  = 1;
        $branch->image = $filename;
        $branch->fathers_name   = $data['fathers_name'];
        $branch->mothers_name   = $data['mothers_name'];
        $branch->nationality   = $data['nationality'];
        $branch->gender        = $data['gender'];
        $branch->religion      = $data['religion'];
        $branch->division_id   = $data['division_id'];
        $branch->district_id   = $data['district_id'];
        $branch->upazilla_id   = $data['upazilla_id'];
        $branch->post_office   = $data['post_office'];
        $branch->address = $data['address'];
        $branch->center_code = $center_Code;
        $branch->institute_name_en = $data['institute_name_en'];
        $branch->institute_email = $data['institute_email'];
        $branch->institute_age = $data['institute_age'];
        $branch->institute_age = $data['institute_age'];
        $branch->facebook_link = $data['facebook_link'];
        $branch->youtube_link = $data['youtube_link'];
        $branch->institute_division = $data['institute_division'];
        $branch->institute_district = $data['institute_district'];
        $branch->institute_upazilla = $data['institute_upazilla'];
        $branch->institute_post_code = $data['institute_post_code'];
        $branch->institute_address = $data['institute_address'];
        $branch->nid_card_img = $nidname;
        $branch->trade_licence_img = $tradename;
        $branch->signature_img = $signaturename;
        $branch->save();

        $admin=new Admin();
        $admin->name=$data['name'];
        $admin->username=$data['name'];
        $admin->email=$data['email'];
        $admin->address=$data['address'];
        $admin->phone=$data['phone'];
        $admin->status=1;
        $admin->role=2;
        $admin->branch_id=$branch->id;
        $admin->password=Hash::make('12345678');
        $admin->save();
        $branch->admin_id = $admin->id;
        $branch->branch_id = $branch->id;
        $branch->save();
    }

    public function get($id){
        if(Auth::guard('admin')->user()->role == '1'){
            return Branch::find($id);
        }else{
            return Branch::where('branch_id',$id)->first();
        }
    }

    public function update(array $data,$id){

        $branch =  Branch::find($id);
        $filename = "";
        $nidname = "";
        $tradename = "";
        $signaturename = "";
        if (array_key_exists('image', $data)){
            $this->deleteOne($branch->image);
            $filename = $this->uploadOne($data['image'], 400, 300, 'backend/images/branch/', true);
        }else{
            $filename=$branch->image;
        }
        if (array_key_exists('nid_card_img', $data)){
            $this->deleteOne($branch->nid_card_img);
            $nidname = $this->uploadOne($data['nid_card_img'], 400, 300, 'backend/images/NIDimg/', true);
        }else{
            $nidname=$branch->nid_card_img;
        }
        if (array_key_exists('trade_licence_img', $data)){
            $this->deleteOne($branch->trade_licence_img);
            $tradename = $this->uploadOne($data['trade_licence_img'], 400, 300, 'backend/images/TradeLicenceimg/', true);
        }else{
            $tradename=$branch->trade_licence_img;
        }
        if (array_key_exists('signature_img', $data)){
            $this->deleteOne($branch->signature_img);
            $signaturename = $this->uploadOne($data['signature_img'], 80, 40, 'backend/images/Signatureimg/', true);
        }else{
            $signaturename=$branch->signature_img;
        }

        $branch->name = $data['name'];
        $branch->email  = $data['email'];
        $branch->phone   = $data['phone'];
        $branch->status  = $branch->status;
        $branch->image = $filename;
        $branch->fathers_name   = $data['fathers_name'];
        $branch->mothers_name   = $data['mothers_name'];
        $branch->nationality   = $data['nationality'];
        $branch->gender   = $data['gender'];
        $branch->religion   = $data['religion'];
        $branch->division_id   = $data['division_id'];
        $branch->district_id   = $data['district_id'];
        $branch->upazilla_id   = $data['upazilla_id'];
        $branch->post_office   = $data['post_office'];
        $branch->address = $data['address'];
        $branch->center_code = $branch->center_code;
        $branch->institute_name_en = $data['institute_name_en'];
        $branch->institute_name_bn = $data['institute_name_bn'];
        $branch->institute_email = $data['institute_email'];
        $branch->institute_age = $data['institute_age'];
        $branch->facebook_link = $data['facebook_link'];
        $branch->youtube_link = $data['youtube_link'];
        $branch->institute_division = $data['institute_division'];
        $branch->institute_district = $data['institute_district'];
        $branch->institute_upazilla = $data['institute_upazilla'];
        $branch->institute_post_code = $data['institute_post_code'];
        $branch->institute_address = $data['institute_address'];
        $branch->nid_card_img = $nidname;
        $branch->trade_licence_img = $tradename;
        $branch->signature_img = $signaturename;
        $branch->save();
        $admin=Admin::where('id',$branch->admin_id)->first();
        $admin->name=$branch->name;
        $admin->username=$branch->name;
        $admin->email=$branch->email;
        $admin->address=$branch->address;
        $admin->phone=$branch->phone;
        $admin->image=$branch->image;
        $admin->status=$branch->status;
        $admin->password=$admin->password;
        $admin->save();

    }

    public function delete($id){
        $branch =  Branch::find($id);
        //dd($branch);
        if(!empty($branch)){
            $this->deleteOne($branch->image);
            $this->deleteOne($branch->nid_card_img);
            $this->deleteOne($branch->trade_licence_img);
            $this->deleteOne($branch->signature_img);
            $branch->delete();
        }
    }

    public function statusChange(array $data)
    {
        $branch = Branch::find($data['id']);
        if ($branch) {
            $branch->status = $branch->status ? 0 : 1;
            $branch->save();
            $admin=Admin::where('id',$branch->admin_id)->first();
            $admin->status=$branch->status;
            $admin->save();
        }
    }
}