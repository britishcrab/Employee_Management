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
            'mail' => 'required|email',
            'password' => 'required|max:16',
            //
        ];
    }

    /**
     * 定義済みバリデーションルールのエラーメッセージ取得
     *
     * @return array
     */
    public function messages()
    {
        return [
            'mail.required' => 'メールアドレスが入力されていません',
            'mail.email' => '有効なメールアドレスを入力してください',
            'password.required'  => 'パスワードが入力されていません',
            'password.max'  => 'パスワードは16文字以内で入力してください',
        ];
    }
}
