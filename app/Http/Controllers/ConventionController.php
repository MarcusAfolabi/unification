<?php

namespace App\Http\Controllers;

use App\Models\Convention;
use App\Models\Fellowship;
use App\Mail\ConventionMail;
use App\Models\FourthConvention;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ConventionNotification;

class ConventionController extends Controller
{ 
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except(['index', 'store', 'payment']);
    }
    public function index(Request $request)
    {
        $fellowships = Fellowship::select('id', 'name')->latest()->get();
        return view('convention.create', compact('fellowships'));
    }
 
    public function list(Request $request)
    {
        if ($request->conventions) {
            $conventions = FourthConvention::where('firstname', 'like', '%' . $request->conventions . '%')
                ->orWhere('email', 'like', '%' . $request->conventions . '%')->latest()->paginate(30);
        } else {
            $conventions = FourthConvention::latest()->paginate(30);
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
            "unit_id" => 'required|string|max:255', 
            "profile_image" => 'required|image|mimes:jpeg,png,jpg|max:300|dimensions:min_width=300,min_height=300,max_width=600,max_height=600',
            // 'recaptcha_token' => 'required', new Recaptcha('recaptcha_token'),
            // 'g-recaptcha-response' => 'required|recaptchav3:convention,0.5'

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
        $convention->unit_id = $request->input('unit_id');       
        $image = $request->file('profile_image');
        $image_path = $image->store('conventions', 'public');
        $convention->profile_image = $image_path;
        $convention->save();

        Notification::route('mail', [
            'info@cnsunification.org' => 'Alert! Convention registration is gaining more attendance',
        ])->notify(new ConventionNotification($convention));

        Mail::to($convention->email)->send(new ConventionMail($convention));

        return redirect(route('convention.payment'))->with('status', 'Your Sub Convention Registration is Received Successfully. Proceed to make payment if you have not');
    }
   
    public function payment()
    {
        return view('convention.payment');
    }
 
    public function destroy(FourthConvention $convention)
    {
        $convention->delete();
        return redirect()->back()->with('status', 'Deleted Successfully');;
    }
}
