<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Fellowship;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FellowshipController extends Controller
{
    public function index(Request $request)
    {
        if ($request->fellowship) {
            $fellowships = Fellowship::where('name', 'like', '%' . $request->fellowship . '%')
                ->orWhere('address', 'like', '%' . $request->fellowship . '%')->latest()->paginate(30);
        } else {
            $fellowships = Fellowship::latest()->paginate(30);
        }
        // $role = Auth::user()->role;

        // if($role == 'admin')
        // {
        return view('fellowship.index', compact('fellowships'));
        // }
        // else{
        //     abort(406);
        // }
    }


    public function create()
    {
        // $role = Auth::user()->role;

        // if($role == 'admin')
        // {
        return view('fellowship.create');
        // }
        // else{
        //     abort(406);
        // }

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
        $name = $request->input('name');
        $slug = Str::slug($name, '-');
        $acronyms = $request->input('acronyms');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $logo = 'storage/' . $request->file('logo')->store('fellowshipLogo', 'public');

        $fellowship = new Fellowship();
        $fellowship->name = $name;
        $fellowship->slug = $slug;
        $fellowship->acronyms = $acronyms;
        $fellowship->phone = $phone;
        $fellowship->address = $address;
        $fellowship->logo = $logo;
        $fellowship->save();
        return redirect()->back()->with('status', 'Added Successfully');
    }

    public function show(Fellowship $fellowship)
    {
        $fellowship_posts = Post::where('category', 'Fellowship')->inRandomOrder()->limit(10)->get();
        $fellowship_member = User::select('id')->where('fellowship_id', $fellowship->id)->count();
        $fellowship_users = User::select('id', 'name', 'lastname', 'profile_photo_path')->where('fellowship_id', $fellowship->id)->inRandomOrder()->limit(6)->get();
        return view('fellowship.show', compact('fellowship', 'fellowship_member', 'fellowship_users', 'fellowship_posts'));
    }


    public function edit(Fellowship $fellowship)
    {
        return view('fellowship.edit', compact('fellowship'));
    }

    public function update(Request $request, Fellowship $fellowship)
    {
        $request->validate([
            "name" => 'required',
            "code" => 'nullable',
            "state" => 'nullable',
        ]);
        $name = $request->input('name');
        $acronyms = $request->input('acronyms');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $state = $request->input('state');
        $country = $request->input('country');
        $year_of_establishment = $request->input('year_of_establishment');

        $fellowship->name = $name;
        $fellowship->acronyms = $acronyms;
        $fellowship->phone = $phone;
        $fellowship->address = $address;
        $fellowship->state = $state;
        $fellowship->country = $country;
        $fellowship->year_of_establishment = $year_of_establishment;
        $fellowship->save();
        return redirect(route('fellowship.index'))->back()->with('status', 'Updated Successfully');
    }

    public function destroy(Fellowship $fellowship)
    {
        $fellowship->delete();
        return redirect()->back()->with('status', 'Deleted Successfully');
    }
}
