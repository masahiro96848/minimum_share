<?php

namespace App\Http\Requests;

use App\Comment;
use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'title' => 'required|max:30',
            'star' => 'required',
            'body' => 'required|max:300',
            
        ];
        
    }

    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'star' => '星評価',
            'body' => 'コメント',
        ];
    }


    // public function withValidator($validator) {
    //     $validator->after(function ($validator) {

    //     })
    // }
}
