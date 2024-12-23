<?php

namespace App\Livewire;

use App\Models\House;
use Livewire\Component;
use App\Models\Fellowship;
use App\Models\Subconvention;
use Livewire\WithFileUploads;
use App\Models\FourthConvention;
use App\Models\FourthSubConvention;
use Illuminate\Support\Facades\Session;

class SubconventionForm extends Component
{
    use WithFileUploads;

    public $schools = [];

    public $levels = [];

    public $payment_proof;
    public $profile_image;
    public $firstname;
    public $lastname;
    public $email;
    public $phone;
    public $gender;
    public $fellowship_id;
    public $academic_status;
    public $fellowship_status;
    public $unit_id;
    public $fellowshipPosts = [];
    public $units = [];

    public function mount()
    {
        $this->schools = Fellowship::orderby('name', 'asc')->get();
        $this->levels = [
            'Pre-ND',
            'Pre-Degree',
            'HND1',
            'HND2',
            'ND1',
            'ND2',
            '100 Level',
            '200 Level',
            '300 Level',
            '400 Level',
            '500 Level',
            '600 Level',
            'Graduate',
            'Post Graduate'
        ];
        $this->fellowshipPosts = [
            'CEC',
            'CENTRAL ADMIN',
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
            'OTHERS'
        ];
        $this->units = [
            'Drama Unit',
            'Choir Unit',
            'Decorating Unit',
            'Usering Unit',
            'Levites Unit',
            'Prayer Unit',
            'Bible Unit',
            'Evangelism Unit',
            'Academic Unit',
            'Media/Publicity Unit',
            'OTHERS'
        ];
    }

    public function submit()
    {
        $validatedData = $this->validate([
            'payment_proof' => 'required|image|max:2054',
            'firstname' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'email' => 'required|valid_email_domain|unique:fourth_sub_conventions,email|max:255',
            'phone' => 'required|unique:fourth_sub_conventions,phone|digits:11',
            'gender' => 'required|string',
            'fellowship_id' => 'required|string',
            'academic_status' => 'required|string',
            'fellowship_status' => 'required|string',
            'unit_id' => 'required|string',
            'profile_image' => 'required|image|max:2054',
        ]);

        $validatedData['payment_proof'] = 'storage/' . $this->payment_proof->store('subconventionImages', 'public');
        $validatedData['profile_image'] = 'storage/' . $this->profile_image->store('subconventionImages', 'public');
        $houses = House::inRandomOrder()->first();
        $validatedData['house'] = $houses->name;

        FourthSubConvention::create($validatedData);
        Session::put('email', $this->email);
        $this->js("alert('Your registration was received successful and payment will be verified!. Download your ID in the next page')");
        return redirect()->to('/subconventionIdCard');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.subconvention-form');
    }
}
