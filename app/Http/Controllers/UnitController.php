<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    
    public function index()
    {
        $units = Unit::latest()->get();
        return view('unit.index', compact('units'));
        
    } 
    
    public function create()
    {
        //
    }
 
    public function store(Request $request)
    {
        $request->validate([
            "name" => 'required|string|max:256|unique:units',
        ]);
        $name = $request->input('name');
        $slug = Str::slug($name, '-');
        $unit = new Unit();
        $unit->name = $name;
        $unit->slug = $slug;
        $unit->save();
        return redirect(route('unit.index'))->with('status', 'Unit Added');
    }

  
    public function show(Unit $unit)
    {
        return view('unit.show', compact('unit'));
    } 
    public function edit(Unit $unit)
    {
        return view('unit.edit', compact('unit'));
    }

     
    public function update(Request $request, Unit $unit)
    {
        $request->validate([
            "name" => 'required',
        ]);
        $name = $request->input('name');
        $slug = Str::slug($name, '-');
        $unit->name = $name;
        $unit->slug = $slug;
        $unit->save();
        return redirect(route('unit.index'))->with('status', 'Unit Update');
    }

   
    public function destroy(Unit $unit)
    {
        $unit->delete();
        return redirect()->back()->with('status', 'Unit Deleted');

    }
}
