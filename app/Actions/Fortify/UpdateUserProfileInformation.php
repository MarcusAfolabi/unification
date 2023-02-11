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
                'phoneNumber' => $input['phoneNumber'],
                'date_of_birth' => $input['date_of_birth'],
                'contact_address' => $input['contact_address'],
                'academicStatus' => $input['academicStatus'],
                'levelInSchool' => $input['levelInSchool'],
                'positionHeld' => $input['positionHeld'],
                'yourFellowship' => $input['yourFellowship'],
                'unit_in_fellowship' => $input['unit_in_fellowship'],
                'qualification_one' => $input['qualification_one'],
                'degree_one' => $input['degree_one'],
                'course_one' => $input['course_one'],
                'qualification_two' => $input['qualification_two'],
                'degree_two' => $input['degree_two'],
                'course_two' => $input['course_two'],
                'qualification_three' => $input['qualification_three'],
                'graduationYear' => $input['graduationYear'],
                'unificationCurrentPost' => $input['unificationCurrentPost'],
                'relationship_status' => $input['relationship_status'],
                'occupation' => $input['occupation'],
                'professional_skill' => $input['professional_skill'],
                'office_address' => $input['office_address'],
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
    public function index()
    {
        return view('users.index');
    }
}
