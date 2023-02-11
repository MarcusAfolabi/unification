<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\Convention;
use Illuminate\Http\Request;
use App\Models\Subconvention;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Notifications\NewMemberNotification;
use Illuminate\Support\Facades\Notification;

class SubconventionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

     */
    public function __construct()
    {
        $this->middleware('auth')->except(['create']);
    }
    public function index(Request $request)
    {
        if ($request->subconvention) {
            $subconventions = Subconvention::where('firstname', 'like', '%' . $request->subconventions . '%')
                ->orWhere('email', 'like', '%' . $request->subconventions . '%')->latest()->paginate(30);
        } else {
            $subconventions = Subconvention::latest()->paginate(30);
        }
        $role = Auth::user()->role;

        if ($role == 'admin') {
        $subconventions = Subconvention::latest()->paginate(30);
        return view('subconvention.index', compact('subconventions'));
        }else{
            abort(419);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
            return view('subconvention.create');

    }

    public function subcard(){
        if($myidcards = Convention::where('email', auth()->user()->email)->latest()->take(1)->get()){
            dd($myidcards);
        return view('subconvention.idcard', compact('myidcards'));
        }else{
        // return redirect('subconvention.index');
        return redirect(route('subconvention.index'))->with('status', 'Register to get your ID CARD');

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "firstname" => 'required|max:255',
            "middlename" => 'required|max:255',
            "lastname" => 'required',
            "email" => 'required|unique:conventions',
            "phoneNumber" => 'required',
            "gender" => 'required',
            "contactAddress" => 'required',
            "academicStatus" => 'required',
            "unificationStatus" => 'required',
            "unificationCurrentPost" => 'required',
            "yourFellowship" => 'required',
            "fellowshipsStatecountry" => 'required',
            "levelInSchool" => 'required',
            "qualification" => 'required',
            "positionHeld" => 'required',
            "graduationYear" => 'required',
            "profile_image" => 'required',
        ]);
        $firstname = $request->input('firstname');
        $middlename = $request->input('middlename');
        $lastname = $request->input('lastname');
        $email = $request->input('email');
        $gender = $request->input('gender');
        $phoneNumber = $request->input('phoneNumber');
        $contactAddress = $request->input('contactAddress');
        $academicStatus = $request->input('academicStatus');
        $unificationStatus = $request->input('unificationStatus');
        $unificationCurrentPost = $request->input('unificationCurrentPost');
        $yourFellowship = $request->input('yourFellowship');
        $fellowshipsStatecountry = $request->input('fellowshipsStatecountry');
        $levelInSchool = $request->input('levelInSchool');
        $qualification = $request->input('qualification');
        $positionHeld = $request->input('positionHeld');
        $graduationYear = $request->input('graduationYear');
        $profile_image = 'storage/' . $request->file('profile_image')->store('convention', 'public');

        $subconvention = new Subconvention();
        $subconvention->firstname = $firstname;
        $subconvention->middlename = $middlename;
        $subconvention->gender = $gender;
        $subconvention->lastname = $lastname;
        $subconvention->email = $email;
        $subconvention->phoneNumber = $phoneNumber;
        $subconvention->contactAddress = $contactAddress;
        $subconvention->academicStatus = $academicStatus;
        $subconvention->unificationStatus = $unificationStatus;
        $subconvention->unificationCurrentPost = $unificationCurrentPost;
        $subconvention->yourFellowship = $yourFellowship;
        $subconvention->fellowshipsStatecountry = $fellowshipsStatecountry;
        $subconvention->levelInSchool = $levelInSchool;
        $subconvention->qualification = $qualification;
        $subconvention->positionHeld = $positionHeld;
        $subconvention->graduationYear = $graduationYear;
        $subconvention->profile_image = $profile_image;

        $subconvention->save();

        Notification::route('mail', [
            'info@cnsunification.org' => 'A Member Just Pick Up Convention Form',
        ])->notify(new NewMemberNotification($subconvention));

        Mail::to($subconvention->email)->send(new WelcomeMail($subconvention));

        return redirect(route('convention.payment'))->with('status', 'Your Sub Convention Registration is Received Successfully. Proceed to make payment if you have not');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function subpayment()
    {
        return view('subconvention.payment');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subconvention $subconvention)
    {
        $subconvention->delete();
        return redirect()->back()->with('status', 'Deleted Successfully');;
    }
}
