<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseDetailsRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'header_title'=>'required|max:50',
            'title'=>'required|max:250',
            'course_id'=>'required',
            'type'=>'required',
            'priority'=>'required|unique:course_details',
            'upload_video'=>'nullable',
            'description'=>'nullable',
            'pdf'=>'nullable|mimes:pdf|max:10000',
        ];
    }
}