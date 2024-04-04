<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Login extends Component
{
    public $email;
    public $password;


    protected $rules = [
        'email' => 'required|email|valid_email_domain|exists:users,email',
        'password' => 'required',
    ];
 

    public function login()
    {
        $this->validate();

        $user = User::where('email', $this->email)->first();
        if ($user) {
            if (Hash::check($this->password, $user->password)) {
                Auth::login($user);
                return redirect()->to('/dashboard');
            } else {
                $this->addError('password', 'Invalid password.');
            }
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
