<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{ 
    public function __construct()
    {
        $this->middleware(['auth', 'admin'])->except(['show']);
    }
    public function index()
    {
        $houses = House::latest()->get();
        return view('house.index', compact('houses'));
    }
 
    public function create()
    {
        //
    }
 
    public function store(Request $request)
    {
        $request->validate([
            "name" => 'required',
        ]);
        $name = $request->input('name');

        $house = new House();
        $house->name = $name;
        $house->save();
        return redirect(route('house.index'))->with('status', 'House Added');
    }
 
    public function show(House $house)
    {
        //
    }
 
    public function edit(House $house)
    {
        return view('house.edit', compact('house'));
    }
 
    public function update(Request $request, House $house)
    {
        $request->validate([
            "name" => 'required',
        ]);
        $name = $request->input('name');

        $house->name = $name;
        $house->update();
        return redirect(route('house.index'))->with('status', 'House Updated');
    }
 
    public function destroy(House $house)
    {
        $house->delete();
        return redirect()->back()->with('status', 'House Deleted');

    }
}
