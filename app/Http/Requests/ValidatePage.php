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
        $rules = [
            'name' =>'bail|filled|alpha|max:25|unique:pages',
            'title' =>'filled|max:100',
            'content' =>'filled|max:500',
            'cover' =>'image',
            'status' => 'alpha'
        ];

        if ( isset($this->route('page')->id) )
            $rules['name'] .= ',name,'.$this->route('page')->id;

        return $rules;
    }
}
