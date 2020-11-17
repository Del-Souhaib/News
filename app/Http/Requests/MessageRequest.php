<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            'name' => ['required', 'min:3', 'max:30'],
            'email' => ['required', 'email', 'max:60'],
            'message' => ['required', 'min:5', 'max:300'],

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'اكتب اسم المستخدم',
            'name.min' => 'يجب ان يكون اسم المستخدم يحتوي على 3 حروف على الاقل',
            'name.max' => 'يجب ان يكون اسم المستخدم يحتوي على 30 حروف على الاكتر',
            'email.required' => 'اكتب بريدك الالكتروني من اجل التواصل معك',
            'email.email' => 'اكتب بريدك الالكتروني الصحيح',
            'email.max' => 'يجب ان يكون اسم المستخدم يحتوي على 60 حروف على الاكتر',
            'message.required' => 'اكتب رسالتك',
            'message.min' => 'يجب ان تكون الرسالة تحتوي على 5 حروف على الاقل',
            'message.max' => 'يجب ان تكون الرسالة تحتوي على300 حرف على الاكتر',

        ];
    }
}
