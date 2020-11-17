<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'image', 'max:1024'],
            'password'=>['required','min:6','max:70','same:password_confirmation'],
        ];
    }
    public function messages()
    {
        return[
            'password.required'=>'يجب كتابة الرمز السري',
            'password.min'=>'الرمز السري يجب ان يحتوي على الاقل على 6 رموز',
            'password.max'=>'الرمز السري يجب ان يحتوي على الاكتر  70 رموز',
            'password.same'=>'يجب أن تتطابق كلمة المرور مع تأكيد كلمة المرور.',

        ];
    }
}
