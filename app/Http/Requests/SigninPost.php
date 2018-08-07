<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SigninPost extends FormRequest
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
            'mail' => 'required|unique|email',
            'password' => 'required|unique:posts|max:255',
            //
        ];
    }
}
