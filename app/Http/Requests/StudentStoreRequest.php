<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => "required",
            "email" => "required|unique:users,email",
            "password" => "required|min:8",
            "graduation_year" => "required",
            "program" => "required",
            "image" => "image|nullable|max:1999",
            "about" => "nullable"
        ];
    }
}
