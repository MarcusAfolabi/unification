<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{ 
    public function update($user, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
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
                'lastname' => $input['lastname'],
                'phone' => $input['phone'],
                'address' => $input['address'],
                'academic_status' => $input['academic_status'],
                'school_level' => $input['school_level'],
                'fellowship_status' => $input['fellowship_status'],
                'fellowship_id' => $input['fellowship_id'],
                'unit_id' => $input['unit_id'],
                'qualification_one' => $input['qualification_one'],
                'degree_one' => $input['degree_one'],
                'course_one' => $input['course_one'], 
                'year_graduated' => $input['year_graduated'],
                'relationship_status' => $input['relationship_status'],
                'occupation' => $input['occupation'],
                'professional_skill' => $input['professional_skill'],
            ])->save();
        }
    }
 
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
    public function index()
    {
        return view('users.index');
    }
}
