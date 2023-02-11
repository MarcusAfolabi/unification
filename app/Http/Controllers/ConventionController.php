<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\Convention;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Notifications\NewMemberNotification;
use Illuminate\Support\Facades\Notification;

class ConventionController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('convention.create');
    }

    public function card(){
        if($myidcards = Convention::where('email', auth()->user()->email)->latest()->take(1)->get()){
            // dd($myidcards);
        return view('convention.idcard', compact('myidcards'));
        }else{
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

        $convention = new convention();
        $convention->firstname = $firstname;
        $convention->middlename = $middlename;
        $convention->gender = $gender;
        $convention->lastname = $lastname;
        $convention->email = $email;
        $convention->phoneNumber = $phoneNumber;
        $convention->contactAddress = $contactAddress;
        $convention->academicStatus = $academicStatus;
        $convention->unificationStatus = $unificationStatus;
        $convention->unificationCurrentPost = $unificationCurrentPost;
        $convention->yourFellowship = $yourFellowship;
        $convention->fellowshipsStatecountry = $fellowshipsStatecountry;
        $convention->levelInSchool = $levelInSchool;
        $convention->qualification = $qualification;
        $convention->positionHeld = $positionHeld;
        $convention->graduationYear = $graduationYear;
        $convention->profile_image = $profile_image;

        $convention->save();

        Notification::route('mail', [
            'info@cnsunification.org' => 'A Member Just Pick Up Convention Form',
        ])->notify(new NewMemberNotification($convention));

        Mail::to($convention->email)->send(new WelcomeMail($convention));

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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function payment()
    {
        return view('convention.payment');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Convention $convention)
    {
        $convention->delete();
        return redirect()->back()->with('status', 'Deleted Successfully');;
    }
}
