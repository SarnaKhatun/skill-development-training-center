<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name_en'=>'required|max:100',
            'name_bn'=>'required|max:100',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|dimensions:width=108,height=137',
            'stu_nid'=>'nullable|max:100',
            'fathers_name'=>'required|max:100',
            'mothers_name'=>'required|max:100',
            'email'=>'required|email',
            'phone'=>'required|digits:11|unique:students',
            'gurdian_phone'=>'required|digits:11|unique:students',
            'present_address'=>'required|max:100',
            'premanent_address'=>'required|max:100',
            'dob'=>'required',
            'blood_group'=>'required',
            'gender'=>'required',
            'religion'=>'required',
            'exam_id'=>'required',
            'board_id'=>'required',
            'roll'=>'required',
            'registration'=>'required',
            'exam_year'=>'required',
            'admission_date'=>'required',
            'session_id'=>'required',
            'session_year'=>'required',
            'session_start'=>'required',
            'session_end'=>'required',
            'course_id'=>'required',
            'batch_id'=>'required',
            'admission_fee'=>'required',
            'payable_amount'=>'required',
        ];
    }
}