<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin']);
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

    public function create()
    {
        //
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
}
