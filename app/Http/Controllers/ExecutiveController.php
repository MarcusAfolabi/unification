<?php

namespace App\Http\Controllers;

use App\Models\Executive;
use Illuminate\Http\Request;

class ExecutiveController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin'])->except(['show']);
    }

    public function index(Request $request)
    {
        $executives = Executive::latest()->paginate(5);
        return view('executives.index', compact('executives'));
    }

    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'position' => 'required',
            'hobby' => 'required',
            'email' => 'required|unique:executives',
            'profile' => 'required',
            "image" => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validatedData['image']) {
            $uploadResult = cloudinary()->upload($validatedData['image']->getRealPath());
            $iconUrl = $uploadResult->getSecurePath();
        }

        $executive = Executive::create([
            'name' => $request->input('name'),
            'position' => $request->input('position'),
            'hobby' => $request->input('hobby'),
            'email' => $request->input('email'),
            'profile' => $request->input('profile'),
            'image' => $iconUrl,
        ]);

        return redirect()->back()->with('status', 'Executive added successfully.');
    }

    public function list(Executive $executive)
    {
        $executives = Executive::all();
        return view('executives.list', compact('executives'));
    }

    public function edit(Executive $executive)
    {
        return view('executives.edit', compact('executive'));
    }

    public function update(Request $request, Executive $executive)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'position' => 'required',
            'hobby' => 'required',
            'email' => 'required',
            'profile' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $name = $request->input('name');
        $position = $request->input('position');
        $hobby = $request->input('hobby');
        $email = $request->input('email');
        $profile = $request->input('profile');

        // if ($request->hasFile('image')) {
        //     $image = 'storage/' . $request->file('image')->store('aboutImages', 'public');
        //     $executive->image = $image;
        // }

        if ($validatedData['image']) {
            $uploadResult = cloudinary()->upload($validatedData['image']->getRealPath());
            $iconUrl = $uploadResult->getSecurePath();
        }
        $executive->name = $name;
        $executive->position = $position;
        $executive->hobby = $hobby;
        $executive->email = $email;
        $executive->profile = $profile;
        $executive->image = $iconUrl;

        $executive->save();

        return redirect(route('executives.index'))->with('status', 'Executive Updated Successfully');
    }
    public function destroy($id)
    {
        $executive = Executive::findOrFail($id);
        if ($executive->image) {
            $publicId = basename($executive->image, '.' . pathinfo($executive->image, PATHINFO_EXTENSION));
            cloudinary()->destroy($publicId);
        }
        $executive->delete();
        return redirect()->back()->with('status', 'Deleted Successfully');
    }
}
