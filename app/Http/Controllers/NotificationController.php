<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function sendnotification(Request $request)
    {
        $user= User::all();

        $details=[
            'greeting'=>$request->greeting,
            'body'=>$request->body,
            'subject'=>$request->subject,
            'actiontext'=>$request->actiontext,
            'actionurl'=>$request->url,
            'footer'=>$request->footer,

        ];
        Notification::send($user, new SendEmailNotification($details));
        return redirect()->back()->with('status', 'Email Notification Successfully Sent');
    }

}
