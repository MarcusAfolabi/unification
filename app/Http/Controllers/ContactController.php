<?php

namespace App\Http\Controllers;

use Mail;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Notifications\ContactNotification;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{ 
   public function index() {
    return view('contact');
    }

   public function store(Request $request){
    $request->validate([
        'name' => 'required|string|unique:contacts|max:50',
        'email' => 'required|string|unique:contacts|max:50|allowed_email_domain|max:255|unique:users', 
        'phone' => 'required|numeric|unique:contacts|min:11',
        'subject' => 'required|string|unique:contacts|max:100',
        'message' => 'required|unique:contacts|max:255',
    ]);
    
    $name = htmlentities($request->input('name'), ENT_QUOTES, 'UTF-8');
    $email = htmlentities($request->input('email'), ENT_QUOTES, 'UTF-8');
    $phone = htmlentities($request->input('phone'), ENT_QUOTES, 'UTF-8');
    $subject = htmlentities($request->input('subject'), ENT_QUOTES, 'UTF-8');
    $message = htmlentities($request->input('message'), ENT_QUOTES, 'UTF-8');
    
    $contact = new Contact();
    $contact->name = $name;
    $contact->email = $email;
    $contact->phone = $phone;
    $contact->subject = $subject;
    $contact->message = $message; 
    $contact->save();   

    Notification::route('mail', [
        'info@cnsunification.org' => 'Alert! You have received a new contact request on the website',
    ])->notify(new ContactNotification($contact));
    
    return redirect()->back()->with(['success', 'Thanks for contacting us. One of our official we get back to you']);
    
   }
}
