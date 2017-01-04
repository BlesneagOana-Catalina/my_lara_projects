<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
        'name' => 'required|unique:users|min:3|max:255',
        'email' => 'required|unique:users|min:3|max:255|email',
		'adress' => 'required|min:10|max:500',
		'photo' =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		'age' => 'required|integer',
		
    ];
    }
}
