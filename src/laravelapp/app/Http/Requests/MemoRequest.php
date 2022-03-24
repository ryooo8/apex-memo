<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemoRequest extends FormRequest
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
            'memo' => 'required',
            'tags' => 'regex: /#([a-zA-z0-9０-９ぁ-んァ-ヶ亜-熙]+)/u',
        ];
    }

    public function messages()
    {
        return [
            'memo.required' => 'メモは必ず入力して下さい。',
            'tags.regex' => 'タグは#〇〇のように入力して下さい。',
        ];
    }
}