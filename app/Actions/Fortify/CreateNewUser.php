<?php

namespace App\Actions\Fortify;

use App\Models\Page_visit;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param array $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string','min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ], $messages = [
            'name.required' => 'يجب كتابة اسم المستخدم',
            'name.string' => 'اسم المستخدم يجب ان يحتوي فقط على الحروف',
            'name.min' => 'اسم المستخدم يجب ان يحتوي على الاقل  3 حرف',
            'name.max' => 'اسم المستخدم يجب ان يحتوي على الاكتر  255 حرف',
            'email.required' => 'يجب كتابة البريد الالكتروني',
            'email.email' => 'يجب كتابة البريد الالكتروني الصحيح',
            'email.max' => 'البريد الالكتروني يجب ان يحتوي على الاكتر  255 حرف',
            'photo.image' => 'يجب تحميل صورة',
            'photo.max' => 'حجم الصورة يجب ان تكون على الاكتر 1024',
        ])->validate();
        Page_visit::insert([
            'page' => 'create new user',
            'created_at' => date('Y-m-d h:i:s')
        ]);
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
