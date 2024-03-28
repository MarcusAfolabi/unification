<?php

namespace App\Http\Livewire;

use App\Models\Unit;
use Livewire\Component;
use App\Models\Fellowship;
use Livewire\WithFileUploads;
use App\Models\FourthConvention;

class Convention extends Component
{
    use WithFileUploads;
    public $firstname;
    public $lastname;
    public $email;
    public $gender;
    public $phone;
    public $academic_status;
    public $fellowship;
    public $fellowship_status;
    public $unit;
    public $payment_proof;

    public $fellowships;
    public $units;
    public $fellowshipStatusOptions = [
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


    protected $rules = [
        'firstname' => 'required|string',
        'lastname' => 'required|string',
        'email' => 'required|email|valid_email_domain|unique:fourth_conventions',
        'gender' => 'required|string',
        'phone' => 'required|string|max:11|min:11|unique:fourth_conventions',
        'academic_status' => 'required|string',
        'fellowship' => 'required',
        'fellowship_status' => 'required|string',
        'unit' => 'required',
        'payment_proof' => 'required|file|mimes:jpeg,png,pdf|max:5120',
    ];

    public function mount()
    {
        $this->units = Unit::latest()->get();
        $this->fellowships = Fellowship::select('id', 'name')
            ->orderBy('name', 'asc')
            ->get();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function register()
    {
        $this->validate();
        FourthConvention::create([
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'gender' => $this->gender,
            'phone' => $this->phone,
            'academic_status' => $this->academic_status,
            'fellowship' => $this->fellowship,
            'fellowship_status' => $this->fellowship_status,
            'unit' => $this->unit,
            'payment_proof' => $this->payment_proof->store(path: 'paymentProof'),
        ]);
        session()->flash('status', '2024 Convention registration successful');
        $this->reset(['firstname', 'lastname', 'email', 'gender', 'phone', 'academic_status', 'fellowship', 'fellowship_status', 'unit', 'payment_proof']);
        $this->reset('payment_proof');
    }

    public function render()
    {
        return view('livewire.convention');
    }
}
