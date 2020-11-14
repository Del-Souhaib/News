<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string','min:3', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'image', 'max:1024'],
        ],$messages = [
            'name.required' => 'يجب كتابة اسم المستخدم',
            'name.string' => 'اسم المستخدم يجب ان يحتوي فقط على الحروف',
            'name.max' => 'اسم المستخدم يجب ان يحتوي على الاكتر  255 حرف',
            'name.min' => 'اسم المستخدم يجب ان يحتوي على الاقل  3 حرف',
            'email.required' => 'يجب كتابة البريد الالكتروني',
            'email.email' => 'يجب كتابة البريد الالكتروني الصحيح',
            'email.max' => 'البريد الالكتروني يجب ان يحتوي على الاكتر  255 حرف',
            'photo.image' => 'يجب تحميل صورة',
            'photo.max' => 'حجم الصورة يجب ان تكون على الاكتر 1024',
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
