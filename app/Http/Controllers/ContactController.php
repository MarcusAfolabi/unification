<?php

namespace App\Http\Controllers;

use Mail;
use App\Models\ContactUs;
// use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Notifications\NewMemberNotification;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
//    public function index(){
//        return view ('contact');
//    }
   public function index(Request $request) {
    return view('contact');
    }

   public function store(Request $request){
    $request->validate([
        'name'=>'required',
        'email'=>'required|email',
        'phone'=>'required',
        'subject'=>'required',
        'message'=>'required',
    ]);

    $name = $request->input('name');
    $email = $request->input('email');
    $phone = $request->input('phone');
    $subject = $request->input('subject');
    $message = $request->input('message');

    $contact = new ContactUs();
    $contact->name = $name;
    $contact->email = $email;
    $contact->phone = $phone;
    $contact->subject = $subject;
    $contact->message = $message;

    $contact->save(); 
    Notification::route('mail', [
        'info@cnsunification.org' => 'Contact Form Received',
    ])->notify(new NewMemberNotification($contact));
    
    return redirect()->back()->with(['success', 'Thanks for contacting us. One of our official we get back to you']);
    
   }
}
