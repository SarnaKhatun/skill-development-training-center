<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BranchRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:65',
            'email' => 'required|unique:admins,email',
            'phone' => 'required|digits:11|unique:admins,phone',
            //'password' => 'required|min:8|max:15',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
            'fathers_name' => 'required|string|max:65',
            'mothers_name' => 'required|string|max:65',
            'nationality' => 'required|string|max:65',
            'gender' => 'required|string|max:65',
            'religion' => 'required|string|max:65',
            'division_id' => 'required',
            'institute_email' => 'required',
            'district_id' => 'required',
            'upazilla_id' => 'required',
            'post_office' => 'required|string|max:65',
            'address' => 'required|string|max:65',
            'institute_name_en' => 'required|string|max:65',
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
        ];
    }
}