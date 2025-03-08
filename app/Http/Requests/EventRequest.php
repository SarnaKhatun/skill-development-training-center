<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'title'=>'required|max:100',
            'image'=>'required|image|mimes:png,jpg',
            'date'=>'required',
            'time'=>'required',
            'location'=>'required|max:140',
            'short_description'=>'required|max:140',
            'description'=>'required|max:30000',
        ];
    }
}
