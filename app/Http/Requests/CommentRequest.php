<?php

namespace App\Http\Requests;

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
            'Text'=>['Required','min:3','max:500']
        ];
    }
    public function messages()
    {
        return [
            'Text.required' => 'اكتب تعليقك ',
            'Text.min' => 'يجب ان يكون تعليقك يحتوي على 3 حروف على الاقل',
            'Text.max' => 'يجب ان يكون تعليقك يحتوي على 500 حروف على الاكتر',
        ];
    }
}
