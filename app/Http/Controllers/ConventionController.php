<?php

namespace App\Http\Controllers;

use App\Rules\Recaptcha;
use App\Mail\WelcomeMail;
use App\Models\Convention;
use App\Models\Fellowship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Notifications\NewMemberNotification;
use Illuminate\Support\Facades\Notification;

class ConventionController extends Controller
{ 
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }
    public function index(Request $request)
    {
        $fellowships = Fellowship::select('id', 'name')->latest()->get();
        return view('convention.create', compact('fellowships'));
    }
 
    public function list(Request $request)
    {
        if ($request->conventions) {
            $conventions = Convention::where('firstname', 'like', '%' . $request->conventions . '%')
                ->orWhere('email', 'like', '%' . $request->conventions . '%')->latest()->paginate(30);
        } else {
            $conventions = Convention::latest()->paginate(30);
        }
        $role = Auth::user()->role;

        if ($role == 'admin') {
            return view('convention.index', compact('conventions'));
        }else{
            abort(419);
        }
    }

    public function card(){
        if($myidcards = Convention::where('email', auth()->user()->email)->latest()->take(1)->get()){
        return view('convention.idcard', compact('myidcards'));
        }else{
            return redirect(route('convention.index'))->with('status', 'Register to get your ID CARD');
        } 
    } 
    public function store(Request $request)
    {
        $request->validate([
            "email" => 'required|email|unique:conventions|max:255',
            "lastname" => 'required|max:255',
            "firstname" => 'required|string|max:255',
            "gender" => 'required|string|max:255',
            "phone" => 'required|string|max:255',
            "academic_status" => 'required|string|max:255',
            "fellowship_status" => 'required|string|max:255',
            "fellowship_id" => 'required',
            "fellowship_unit" => 'required|string|max:255', 
            "profile_image" => 'required|image|max:300', 
            'recaptcha_token' => 'required', new Recaptcha('recaptcha_token'),
        ]);
        $convention = new Convention();        
        $convention->email = $request->input('email');
        $convention->lastname = $request->input('lastname');
        $convention->firstname = $request->input('firstname');
        $convention->gender = $request->input('gender');
        $convention->phone = $request->input('phone');
        $convention->academic_status = $request->input('academic_status');
        $convention->fellowship_status = $request->input('fellowship_status');
        $convention->fellowship_id = $request->input('fellowship_id');
        $convention->fellowship_unit = $request->input('fellowship_unit');       
        // $convention => 'storage/' . $request->file('profile_image')->store('convention', 'public');
        $image = $request->file('profile_image');
        $image_path = $image->store('conventions', 'public');
        $convention->profile_image = $image_path;
        $convention->save();

        // Notification::route('mail', [
        //     'info@cnsunification.org' => 'A Member Just Pick Up Convention Form',
        // ])->notify(new NewMemberNotification($convention));

        // Mail::to($convention->email)->send(new WelcomeMail($convention));

        return redirect(route('convention.payment'))->with('status', 'Your Sub Convention Registration is Received Successfully. Proceed to make payment if you have not');
    }
   
    public function payment()
    {
        return view('convention.payment');
    }
 
    public function destroy(Convention $convention)
    {
        $convention->delete();
        return redirect()->back()->with('status', 'Deleted Successfully');;
    }
}
