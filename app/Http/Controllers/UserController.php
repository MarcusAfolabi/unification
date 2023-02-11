<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request->members) {
            $users = User::where('name', 'like', '%' . $request->members . '%')
            ->orWhere('email', 'like', '%' . $request->members . '%')
                ->orWhere('yourfellowship', 'like', '%' . $request->members . '%')->latest()->paginate(50);
        } else {
            $users = User::latest()->paginate(50);
        }
        $role = Auth::user()->role;
        if ($role == 'admin') {
            return view('user.index', compact('users'));
        }
        else{
        return redirect()->back()->with('status', 'Unauthorized Action');
        }
    }

    public function president(){
        $users = User::where('positionHeld', 'PRESIDENT')->latest()->paginate('50');

        $role = Auth::user()->role;
        if ($role == 'admin') {
            return view('user.president', compact('users'));
        }
        else{
        return redirect()->back()->with('status', 'Unauthorized Action');
        }    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([

            "name" => 'required', 
            "email" => 'required',
            "password" => 'required',
        ]);
        $input = $request->all();
        $password = Hash::make($request['email']);
        $users = User::create($validatedData);
        // $password = Hash::make($request['password']);

        return redirect()->back()->with('status', 'Added Successfully');
    }

    public function create()
    {
        return view('user.create');
    }
    public function changeStatus(Request $request)
    {
        $user = User::find($request->user_id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success'=>'Status change successfully.']);
    }
    public function show(User $users)
    { 
        $timelineproducts = Product::latest()->paginate(20);
        $timelineposts = Post::latest()->paginate(20);
        return view('user.show', compact('timelineposts', 'timelineproducts' ));
    }
    public function destroy(User $user)
    {
        $user->deleteProfilePhoto();
        $user->tokens->each->delete();
        $user->delete();
        return redirect()->back()->with('status', 'User Deleted Successfully.');
    }
}
