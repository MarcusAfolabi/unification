<?php

namespace App\Http\Controllers;

use App\Models\Executive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExecutiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    public function index(Request $request)
    {
        $executives = Executive::latest()->paginate(5);
        $excos = Executive::all();

        $role = Auth::user()->role;
        if($role == 'admin')
        {
        return view('executives.index', compact('executives', 'excos'));
        }
        else{
            abort(406);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('executives.create');
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
            'name' => 'required|max:255',
            'position' => 'required',
            'hobby' => 'required',
            'email' => 'required|unique:executives',
            'profile' => 'required',
            "image" => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $name = $request->input('name');
        $user_id = Auth::user()->id;
        $position = $request->input('position');
        $hobby = $request->input('hobby');
        $email = $request->input('email');
        $profile = $request->input('profile');

        $image = 'storage/' . $request->file('image')->store('aboutImages', 'public');

        $executive = new Executive();
        $executive->name = $name;
        $executive->user_id = $user_id;
        $executive->position = $position;
        $executive->hobby = $hobby;
        $executive->email = $email;
        $executive->profile = $profile;
        $executive->image = $image;

        $executive->save();

        return redirect()->back()->with('status', 'Executive Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Executive  $executive
     * @return \Illuminate\Http\Response
     */
    public function show(Executive $executive)
    {
        // $executives = Executive::all();
        return view('executives.show', compact('executive'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Executive  $executive
     * @return \Illuminate\Http\Response
     */
    public function edit(Executive $executive)
    {
        return view('executives.edit', compact('executive'));
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Executive  $executive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Executive $executive)
    {
        $request->validate([
            'name' => 'required|max:255',
            'position' => 'required',
            'hobby' => 'required',
            'email' => 'required',
            'profile' => 'required',
            "image" => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $name = $request->input('name');
        $position = $request->input('position');
        $hobby = $request->input('hobby');
        $email = $request->input('email');
        $profile = $request->input('profile');

        $image = 'storage/' . $request->file('image')->store('aboutImages', 'public');

        $executive->name = $name;
        $executive->position = $position;
        $executive->hobby = $hobby;
        $executive->email = $email;
        $executive->profile = $profile;
        $executive->image = $image;

        $executive->save();

        return redirect(route('executives.index'))->with('status', 'Executive Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Executive  $executive
     * @return \Illuminate\Http\Response
     */
    public function destroy(Executive $executive)
    {
        $executive->delete();
        return redirect()->back()->with('status', 'Executive Deleted Successfully');
    }
}
