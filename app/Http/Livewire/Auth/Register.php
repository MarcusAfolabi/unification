<?php

namespace App\Http\Livewire\Auth;

use App\Models\Unit;
use App\Models\User;
use Livewire\Component;
use App\Mail\WelcomeMail;
use App\Models\Fellowship;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class Register extends Component
{
    public $name;
    public $lastname;
    public $email;
    public $gender;
    public $phone;
    public $address;
    public $academic_status;
    public $fellowship_status;
    public $fellowship_id;
    public $unit_id;
    public $qualification_one;
    public $degree_one;
    public $course_one;
    public $password;
    public $password_confirmation;
    public $units;
    public $fellowships;

    public $user;

    public $posts = [
        '',
        'ASSISTANT SECRETARY',
        'CHOIR MASTER/MISTRESS',
        'EVANGELISM SECRETARY',
        'FEMALE CO-ORDINATOR',
        'FINANCIAL SECRETARY',
        'LEVITE CO-ORDINATOR',
        'PRAYER MINISTRY LEADER',
        'PRESIDENT',
        'PUBLICITY SECRETARY',
        'SECRETARY',
        'TREASURY SECRETARY',
        'VICE PRESIDENT',
        'WELFARE SECRETARY',
        'MEMBER',
        'OTHERS - CENTRAL EXECUTIVE MEMBER'
    ];

    public $qualifications = [
        '',
        'Diploma',
        'SSCE',
        'OND',
        'BSc',
        'HND',
        'MBBS',
        'BDS',
        'BchD',
        'MSc',
        'PhD',
        'PGD',
        'MBA',
    ];


    protected $rules = [
        'name' => 'required|string',
        'lastname' => 'required|string',
        'email' => 'required|email|valid_email_domain|unique:users,email',
        'phone' => 'required|string|max:11|min:11|unique:users,phone',
        'address' => 'required|string',
        'gender' => 'required|string',
        'academic_status' => 'required|string',
        'fellowship_status' => 'required|string',
        'fellowship_id' => 'sometimes',
        'unit_id' => 'sometimes',
        'qualification_one' => 'sometimes',
        'degree_one' => 'sometimes',
        'course_one' => 'sometimes',
        'password' => 'required',
        'password_confirmation' => 'required|same:password',
    ];

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }

    public function register()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'gender' => $this->gender,
            'academic_status' => $this->academic_status,
            'fellowship_status' => $this->fellowship_status,
            'password' => Hash::make($this->password),
        ]);

        if ($this->fellowship_id) {
            $user->fellowship_id = $this->fellowship_id;
        }

        if ($this->unit_id) {
            $user->unit_id = $this->unit_id;
        }

        if ($this->qualification_one) {
            $user->qualification_one = $this->qualification_one;
        }

        if ($this->degree_one) {
            $user->degree_one = $this->degree_one;
        }

        if ($this->course_one) {
            $user->course_one = $this->course_one;
        }
        $user->save();
        Mail::to($this->email)->send(new WelcomeMail($user));
        session()->flash('status', 'Registration successful!');
        return redirect()->to('/dashboard');
    }

    public function mount()
    {
        $this->units = Unit::latest()->get();
        $this->fellowships = Fellowship::select('id', 'name')
            ->orderBy('name', 'asc')
            ->get();
        $this->posts;
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
