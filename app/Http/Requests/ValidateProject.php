<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ValidateProject extends FormRequest
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
        $rules = [
            'name' =>' bail|filled|alpha|max:25|unique:projects',
            'title' => 'filled|max:100',
            'parent' => 'alpha|max:25',
            'content' => 'filled|max:500',
            'cover' => 'image|mimes:jpeg,png,jpg,gif',
            'status' => 'alpha'
        ];

        if ( isset($this->route('project')->id) )
            $rules['name'] .= ',name,'.$this->route('project')->id;

        return $rules;
    }
}
