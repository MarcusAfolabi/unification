<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Unit;
use App\Models\User;
use App\Models\Fellowship;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FellowshipController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin'])->except(['show', 'index']);
    }
    public function index(Request $request)
    {
        if ($request->fellowship) {
            $fellowships = Fellowship::where('name', 'like', '%' . $request->fellowship . '%')
                ->orWhere('address', 'like', '%' . $request->fellowship . '%')->latest()->paginate(30);
        } else {
            $fellowships = Fellowship::latest()->paginate(30);
        }
        if (auth()->user()->role === 'member') {
            $chapters = Fellowship::latest()->paginate(30);
            return view('fellowship.list', compact('chapters'));
        } elseif (auth()->user()->role === 'admin')
            return view('fellowship.index', compact('fellowships'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate([
            "name" => 'required',
            "acronyms" => 'required',
            "phone" => 'required',
            "address" => 'required',
            "logo" => 'required',
        ]);
        $fellowship = new Fellowship();
        $fellowship->name = $request->input('name');
        $fellowship->slug = Str::slug($request->input('name'), '-');
        $fellowship->acronyms = $request->input('acronyms');
        $fellowship->phone = $request->input('phone');
        $fellowship->address = $request->input('address');
        $fellowship->logo = 'storage/' . $request->file('logo')->store('fellowshipLogo', 'public');
        $fellowship->save();
        return redirect()->back()->with('status', 'Added Successfully');
    }

    public function show(Fellowship $fellowship, Unit $unit, User $user)
    {

        $unit_members = User::where('fellowship_id', $fellowship->id)->select('unit_id')->distinct()->get();
        $unit_count = User::where('unit_id', auth()->user()->unit_id)->pluck('unit_id')->unique()->count();
        $unit_counts = User::where('fellowship_id', $fellowship->id)
            ->pluck('unit_id')
            ->unique()
            ->count();
        $fellowship_posts = Post::where('fellowship_id', $fellowship->id)->inRandomOrder()->limit(10)->get();
        $fellowship_member = User::select('id')->where('fellowship_id', $fellowship->id)->count();
        $fellowship_users = User::select('id', 'name', 'lastname', 'profile_photo_path')->where('fellowship_id', $fellowship->id)->inRandomOrder()->limit(6)->get();
        return view('fellowship.show', compact(
            'fellowship',
            'fellowship_member',
            'fellowship_users',
            'fellowship_posts',
            'unit_counts',
            'unit_members'
        ));
    }


    public function edit(Fellowship $fellowship)
    {
        return view('fellowship.edit', compact('fellowship'));
    }

    public function update(Request $request, Fellowship $fellowship)
    {
        $request->validate([
            "name" => 'required',
            "acronyms" => 'required',
            "phone" => 'required',
            "address" => 'required',
            "logo" => 'sometimes',
        ]);
        $fellowship->name = $request->input('name');
        $fellowship->slug = Str::slug($request->input('name'), '-');
        $fellowship->acronyms = $request->input('acronyms');
        $fellowship->phone = $request->input('phone');
        $fellowship->address = $request->input('address');
        $fellowship->logo = 'storage/' . $request->file('logo')->store('fellowshipLogo', 'public');
        $fellowship->save();
        return redirect(route('fellowship.index'))->back()->with('status', 'Updated Successfully');
    }

    public function destroy(Fellowship $fellowship)
    {
        $fellowship->delete();
        return redirect()->back()->with('status', 'Deleted Successfully');
    }
}
