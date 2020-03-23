<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ValidatePage extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' =>'bail|required|alpha|unique:pages,name,'.$this->route('page')->id.'|max:25',
            'title' =>'required|max:100',
            'content' =>'required|max:100',
            'cover' =>'image',
        ];
    }
}
