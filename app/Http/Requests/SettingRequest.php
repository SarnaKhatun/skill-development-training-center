<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'email'=>'nullable|email',
            'phone'=>'nullable|digits:11|numeric',
            'whats_up'=>'nullable|digits:11|numeric',
        ];
    }
}