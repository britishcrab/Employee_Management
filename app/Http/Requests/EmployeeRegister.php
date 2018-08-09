<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRegister extends FormRequest
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
            'last_name' => 'required',
            'first_name' => 'required',
            'birthday' => 'required|date',
            'mail' => 'required|email|unique:employees,mail',
            'password' => 'required|between:6,16',
            'password_confirmation' => 'required|',
            'role_id' => 'required',
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
            'last_name.required' => '名前を入力してください',
            'first_name.required' => '名前を入力してください',
            'birthday.date' => '有効な日付を入力してください',
            'birthday.required' => '誕生日を入力してください',
            'mail.required' => 'メールアドレスを入力してください',
            'mail.email' => '有効なメールアドレスを入力してください',
            'mail.unique' => '入力されたメールアドレスは使用されています',
            'password.required' => 'パスワードを入力してください',
            'password.between' => 'パスワードは６から１６文字で設定してください',
            'password_confirmation.required' => '確認用のパスワードを入力してください',
            'password_confirmation.confirmed' => 'パスワードが一致しません',
            'role_id.required' => '役職を選択してください',
        ];
    }
}

