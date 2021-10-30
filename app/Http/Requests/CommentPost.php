<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentPost extends FormRequest
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
            'user_id' => 'required',
            'post_id' => 'required',
            'comment' => 'required|max:40'
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'user_idがありません',
            'post_id.required' => 'post_idがありません',
            'comment.required' => 'コメントを入力してください',
            'comment.max' => 'コメントは40文字以下で入力してください',
        ];
    }
}
