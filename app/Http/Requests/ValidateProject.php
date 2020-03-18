<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateProject extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' =>'bail|require|alpha|unique:projects.name|max:25',
            'parent' =>'require|alpha|exists:pages.name|max:25',
            'title' =>'require|max:100',
            'image' =>'require|image'
        ];
    }
}
