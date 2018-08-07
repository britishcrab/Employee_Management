<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportPost extends FormRequest
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
            'created_at' => 'required|date',
            'title' => 'required',
            'content' => 'required',
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
            'created_at.required' => '日付は必須です',
            'created_at.date' => '日付を入力してください',
            'title.required'  => 'タイトルは必須です',
            'content.required'  => '本文は必須です',
        ];
    }
}
