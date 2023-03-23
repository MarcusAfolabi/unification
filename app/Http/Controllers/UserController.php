<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Unit;
use App\Models\User;
use App\Models\Product;
use App\Models\Fellowship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;
 use PasswordValidationRules;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin'])->except(['editMember', 'updateMember', 'updatePassword']);
    }
    public function index(Request $request)
    {
        if ($request->members) {
            $users = User::where('name', 'like', '%' . $request->members . '%')
                ->orWhere('email', 'like', '%' . $request->members . '%')
                ->orWhere('fellowship_id', 'like', '%' . $request->members . '%')->latest()->paginate(50);
        } else {
            $users = User::latest()->paginate(50);
        }
        return view('user.index', compact('users'));
    }

    public function president()
    {
        $users = User::where('fellowship_status', 'PRESIDENT')->latest()->paginate('50');

        return view('user.president', compact('users'));
    }
    public function pro()
    {
        $users = User::where('fellowship_status', 'PUBLICITY SECRETARY')->latest()->paginate('50');

        return view('user.pro', compact('users'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => 'required',
            "email" => 'required',
            "password" => 'required',
            "fellowship_id" => 'required',
            "unit_id" => 'required',
        ]);
        $input = $request->all();
        $password = Hash::make($request['email']);
        $users = User::create($validatedData);
        return redirect()->back()->with('status', 'Added Successfully');
    }

    public function editMember(User $user)
    {
        $units = Unit::select('id', 'name')->orderBy('name')->get();
        $fellowships = Fellowship::select('id', 'name')->orderBy('name')->get();
        return view('user.edit', compact('user', 'units', 'fellowships'));
    }

    public function updateMember(User $user, Request $request)
    {
        $request->validate([
            "name" => 'sometimes',
            "lastname" => 'sometimes',
            "phone" => 'sometimes',
            "unit_id" => 'sometimes',
            "academic_status" => 'sometimes',
            "fellowship_status" => 'sometimes',
            "qualification_one" => 'sometimes',
            "degree_one" => 'sometimes',
            "course_one" => 'sometimes',
            "fellowship_id" => 'sometimes', 
            "professional_skill" => 'sometimes', 
            "occupation" => 'sometimes', 
            "gender" => 'sometimes',
            "profile_photo_path" => 'sometimes|image|mimes:jpg,png,jpeg|max:1024'
        ]);
        $user->name = $request->input('name');
        $user->lastname = $request->input('lastname');
        $user->phone = $request->input('phone');
        $user->unit_id = $request->input('unit_id');
        $user->academic_status = $request->input('academic_status');
        $user->fellowship_status = $request->input('fellowship_status');
        $user->qualification_one = $request->input('qualification_one');
        $user->degree_one = $request->input('degree_one');
        $user->course_one = $request->input('course_one');
        $user->fellowship_id = $request->input('fellowship_id');
        $user->professional_skill = $request->input('professional_skill');
        $user->occupation = $request->input('occupation');
        $user->gender = $request->input('gender'); 

        if ($request->hasFile("profile_photo_path")) {
            Storage::delete($user->profile_photo_path);
            $image = "/" . $request->file("profile_photo_path")->store("profile", "public");
            $user->profile_photo_path = $image;
        } 

        // dd($user->profile_photo_path);

        $user->save();
        return redirect()->back()->with('status', 'Updated');
    }

    public function updatePassword(User $user, Request $request)
    {
        $request->validate([
            // 'current_password' => ['required', 'string', 'min:8'], 
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            
        ]);

        $user->forceFill([
            'password' => Hash::make($request['password']),
        ])->save();

        return redirect()->back()->with('pass', 'Updated');

    }
    public function show(User $users)
    {
        $timelineproducts = Product::latest()->paginate(20);
        $timelineposts = Post::latest()->paginate(20);
        return view('user.show', compact('timelineposts', 'timelineproducts'));
    }
    public function destroy(User $user)
    {
        $user->deleteProfilePhoto();
        $user->tokens->each->delete();
        $user->delete();
        return redirect()->back()->with('status', 'User Deleted Successfully.');
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('login'))->with('status', 'Logout Successfully');
    }
}
