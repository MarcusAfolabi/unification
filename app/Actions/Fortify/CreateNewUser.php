<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Rules\Recaptcha;
use App\Mail\WelcomeMail;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Notifications\NewMemberNotification;
use Illuminate\Support\Facades\Notification;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Notifications\WelcomeEmailNotification;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;
 
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            // 'recaptcha_token' => ['required', new Recaptcha($input['recaptcha_token'])],

        ])->validate();

        // return User::create([
             $user = User::create([
                    'name' => $input['name'],
                    'lastname' => $input['lastname'],
                    'email' => $input['email'],
                    'gender' => $input['gender'],
                    'phoneNumber' => $input['phoneNumber'],
                    'date_of_birth' => $input['date_of_birth'],
                    'contact_address' => $input['contact_address'],
                    'academicStatus' => $input['academicStatus'],
                    'unificationCurrentPost' => $input['unificationCurrentPost'],
                    'levelInSchool' => $input['levelInSchool'],
                    'positionHeld' => $input['positionHeld'],
                    'yourFellowship' => $input['yourFellowship'],
                    'unit_in_fellowship' => $input['unit_in_fellowship'],
                    'qualification_one' => $input['qualification_one'],
                    'degree_one' => $input['degree_one'],
                    'course_one' => $input['course_one'], 
                    'password' => Hash::make($input['password']),
             ]);
            // $user->notify(new WelcomeEmailNotification());
            return $user;
    }
}
