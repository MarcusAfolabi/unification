<?php

namespace App\Http\Controllers;

use App\Mail\Subconvent;
use App\Mail\WelcomeMail;
use App\Models\Convention;
use Illuminate\Http\Request;
use App\Models\Subconvention;
use App\Models\FourthSubConvention;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SubconventionsExport;
use App\Models\House;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ConventionNotification;

class SubconventionController extends Controller
{
    // public function __construct()
    // {
    //     // $this->middleware(['auth', 'verified'])->except(['subcard','index', 'store', 'subpayment']);
    // }

    public function index(Request $request)
    {
        return view('subconvention.index');
    }
    public function list(Request $request)
    {
        if ($request->subconvention) {
            $subconventions = FourthSubConvention::where('firstname', 'like', '%' . $request->subconventions . '%')
                ->orWhere('email', 'like', '%' . $request->subconventions . '%')->latest()->paginate(30);
        } else {
            $subconventions = FourthSubConvention::latest()->paginate(30);
        }

        $role = Auth::user()->role ?? 'user';

        if ($role == 'admin') {
            $subconventions = FourthSubConvention::latest()->paginate(30);
            return view('subconvention.list', compact('subconventions'));
        } else {
            abort(419);
        }
    }

    public function subcard(Request $request)
    {
        $email = Session::get('email') ?? $request->query('email');
        if ($myidcard = FourthSubConvention::where('email', $email)->first()) {
            $houses = House::inRandomOrder()->first();
            return view('subconvention.idcard', compact('myidcard', 'houses'));
        } else {
            return redirect(route('subconvention'))->with('error', 'Register to get your ID CARD');
        }
    }
 

    public function store(Request $request)
    {
        $request->validate([
            "email" => 'required|unique:subconventions|allowed_email_domain|string',
            "lastname" => 'required|max:255|string',
            "firstname" => 'required|max:255|string',
            "phone" => 'required|unique:subconventions|string',
            "gender" => 'required|string',
            "academic_status" => 'required|string',
            "fellowship_status" => 'required|string',
            "unit_id" => 'required|string',
            "fellowship_id" => 'required|string',
        ]);
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $email = $request->input('email');
        $gender = $request->input('gender');
        $phone = $request->input('phone');
        $academic_status = $request->input('academic_status');
        $fellowship_status = $request->input('fellowship_status');
        $unit_id = $request->input('unit_id');
        $fellowship_id = $request->input('fellowship_id');


        $subconvention = new Subconvention();
        $subconvention->email = $email;
        $subconvention->lastname = $lastname;
        $subconvention->firstname = $firstname;
        $subconvention->gender = $gender;
        $subconvention->phone = $phone;
        $subconvention->academic_status = $academic_status;
        $subconvention->fellowship_status = $fellowship_status;
        $subconvention->unit_id = $unit_id;
        $subconvention->fellowship_id = $fellowship_id;
        $subconvention->save();

        // Notification::route('mail', [
        //     'info@cnsunification.org' => 'A Member Just Pick Up Convention Form',
        // ])->notify(new ConventionNotification($subconvention));

        Mail::to($subconvention->email)->send(new Subconvent($subconvention));

        return redirect(route('convention.payment'))->with('status', 'Your Sub Convention Registration is Received Successfully. Proceed to make payment if you have not');
    }

    public function show($id)
    {
        //
    }


    public function subpayment()
    {
        // return view('convention.payment');
        return redirect(route('convention.payment'));
    }

    public function destroy(Subconvention $subconvention)
    {
        $subconvention->delete();
        return redirect()->back()->with('status', 'Deleted Successfully');;
    }
}
