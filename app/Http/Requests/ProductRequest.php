<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'review' => 'required|max:200',
            'price' => 'required',
            'url' => 'url',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'review' => 'レビュー',
            'price' => '金額',
            'url' => 'url'
        ];
    }
}
