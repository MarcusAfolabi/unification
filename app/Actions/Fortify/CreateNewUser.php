<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Rules\Recaptcha;
use App\Mail\WelcomeMail;
use Illuminate\Support\Str;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Notifications\SignupNotification;
use Illuminate\Support\Facades\Validator; 
use Illuminate\Support\Facades\Notification;
use Laravel\Fortify\Contracts\CreatesNewUsers;


class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;
 
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'max:255'],
            'gender' => ['required', 'max:255'],
            'phone' => ['required', 'max:255', 'unique:users'],
            'address' => ['required', 'max:255'],
            'academic_status' => ['required', 'max:255'],
            'fellowship_status' => ['required', 'max:255'],
            'fellowship_id' => ['required', 'max:255'],
            'unit_id' => ['required', 'max:255'],
            'qualification_one' => ['required', 'max:255'],
            'degree_one' => ['required', 'max:255'],
            'course_one' => ['required', 'max:255'],
            'email' => ['required', 'string', 'allowed_email_domain', 'max:255', 'unique:users'], [
                'allowed_email_domain' => 'The :attribute must be a valid email with one of the following domains: :domains.',
            ],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            // 'recaptcha_token' => ['required', new Recaptcha($input['recaptcha_token'])],
            // 'g-recaptcha-response' => ['required', NoCaptchaRule::class],


        ])->validate();

        // return User::create([
             $user = User::create([
                'name' => strip_tags($input['name']),
                'lastname' => strip_tags($input['lastname']),
                'email' => strip_tags($input['email']),
                'gender' => strip_tags($input['gender']),
                'phone' => strip_tags($input['phone']),
                'address' => strip_tags($input['address']),
                'academic_status' => strip_tags($input['academic_status']),
                'fellowship_status' => strip_tags($input['fellowship_status']),
                'fellowship_id' => strip_tags($input['fellowship_id']),
                'unit_id' => strip_tags($input['unit_id']),
                'qualification_one' => strip_tags($input['qualification_one']),
                'degree_one' => strip_tags($input['degree_one']),
                'course_one' => strip_tags($input['course_one']), 
                'password' => Hash::make(strip_tags($input['password'])),
             ]);
            //  Notification::route('mail', [
            //     'ajayi.femi@cnsunification.org' => 'CENTRAL EXECUTIVE COUNCIL PRO',
            // ])->notify(new SignupNotification($user));            
            // Mail::to($user->email)->send(new WelcomeMail($user));
            return $user;
    }
}
