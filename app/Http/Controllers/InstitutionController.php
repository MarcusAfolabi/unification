<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->institution) {
            $institutions = Institution::where('position', 'like', '%' . $request->institution . '%')
                ->orWhere('company', 'like', '%' . $request->institution . '%')->latest()->paginate(30);
        } else {
            $institutions = Institution::latest()->paginate(30);
        }
        $role = Auth::user()->role;

        if($role == 'admin')
        {
        return view('institution.index', compact('institutions'));
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
        $role = Auth::user()->role;

        if($role == 'admin')
        {
        return view('institution.create');
        }
        else{
            abort(406);
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
            "name" => 'required',
            "acronyms" => 'nullable',
            "phone" => 'nullable',
            "address" => 'nullable',
            "state" => 'nullable',
            "country" => 'nullable',
            "year_of_establishment" => 'nullable',
        ]);
        $name = $request->input('name');
        $acronyms = $request->input('acronyms');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $state = $request->input('state');
        $country = $request->input('country');
        $year_of_establishment = $request->input('year_of_establishment');
        $user_id = Auth::user()->id;

        $institution = new Institution();
        $institution->name = $name; 
        $institution->user_id = $user_id; 
        $institution->acronyms = $acronyms; 
        $institution->phone = $phone; 
        $institution->address = $address; 
        $institution->state = $state; 
        $institution->country = $country; 
        $institution->year_of_establishment = $year_of_establishment; 
        $institution->save();
        return redirect()->back()->with('status', 'Added Successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function show(Institution $institution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function edit(Institution $institution)
    {
        return view('institution.edit', compact('institution'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Institution $institution)
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
        
        $institution->name = $name; 
        $institution->acronyms = $acronyms; 
        $institution->phone = $phone; 
        $institution->address = $address; 
        $institution->state = $state; 
        $institution->country = $country; 
        $institution->year_of_establishment = $year_of_establishment; 
        $institution->save();
        return redirect(route('institution.index'))->back()->with('status', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Institution $institution)
    {
        $institution->delete();
        return redirect()->back()->with('status', 'Deleted Successfully');
    }
}
