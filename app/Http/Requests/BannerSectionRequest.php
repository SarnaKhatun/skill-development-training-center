<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerSectionRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'title'=>'required|max:15',
            'sub_title'=>'required|max:42',
            'description'=>'required|max:490',
            'image'=>'required|image|mimes:png,jpg',
        ];
    }
}
