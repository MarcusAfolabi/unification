<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use App\Events\ItemStored;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth; 

class VacancyController extends Controller
{ 
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    public function index(Request $request)
    {
        if ($request->vacancies) {
            $vacancies = Vacancy::where('position', 'like', '%' . $request->vacancies . '%')
                ->orWhere('company', 'like', '%' . $request->vacancies . '%')->latest()->paginate(30);
        } else {
            $vacancies = Vacancy::latest()->paginate(30);
        }
        $othervacancies = Vacancy::latest()->take(10)->get();
        $vacancytags = Vacancy::distinct()->get();
        $vacancytags = Vacancy::latest()->take(5)->get();
         return view('vacancies.index', compact('vacancies', 'othervacancies', 'vacancytags'));
    }
 
    public function create()
    {
       //
    } 
    public function store(Request $request)
    {
        // $user = User::all();
        $request->validate([
            "position" => 'required|max:255',
            "company" => 'required',
            "location" => 'required',
            "website" => 'required',
            "description" => 'required|',
            "image" => 'required | image|mimes:jpeg,png,jpg,gif,svg,mp3,mp4|max:20048',
        ]);
        $position = $request->input('position');
        $slug = Str::slug($position, '-');
        $user_id = Auth::user()->id;
        $company = $request->input('company');
        $location = $request->input('location');
        $type = $request->input('type');
        $website = $request->input('website');
        $salary = $request->input('salary');
        $currency = $request->input('currency');
        $scheme = $request->input('scheme');
        $description = $request->input('description');
        $deadline = $request->input('deadline');
        $image = 'storage/' . $request->file('image')->store('jobImages', 'public');

        $vacancy = new Vacancy();
        $vacancy->position = $position;
        $vacancy->slug = $slug;
        $vacancy->user_id = $user_id;
        $vacancy->company = $company;
        $vacancy->location = $location;
        $vacancy->type = $type;
        $vacancy->website = $website;
        $vacancy->salary = $salary;
        $vacancy->currency = $currency;
        $vacancy->scheme = $scheme;
        $vacancy->description = $description;
        $vacancy->deadline = $deadline;
        $vacancy->image = $image;

        $vacancy->save();
        event(new ItemStored()); 
        return redirect()->back()->with('status', 'Job Opportunity Created Successfully. We ensure it is valid before we publish');

    }
 
    public function show(Vacancy $vacancy)
    {
        DB::table('vacancies')->increment('views');
        $othervacancies = Vacancy::all();
        $vacancytags = Vacancy::latest()->get();
        return view('vacancies.show', compact('vacancy', 'othervacancies', 'vacancytags'));
    }
 
    public function edit(Vacancy $vacancy)
    {
        return view('vacancies.edit', compact('vacancy'));
    }
 
    public function update(Request $request, Vacancy $vacancy)
    {
        $request->validate([
            "position" => 'required|max:255',
            "company" => 'required',
            "location" => 'required',
            "website" => 'required',
            "description" => 'required',
            "image" => 'required | image|mimes:jpeg,png,jpg,gif,svg,mp3,mp4|max:20048',
        ]);
        $position = $request->input('position');
        $slug = Str::slug($position, '-');
        $company = $request->input('company');
        $location = $request->input('location');
        $type = $request->input('type');
        $website = $request->input('website');
        $salary = $request->input('salary');
        $currency = $request->input('currency');
        $scheme = $request->input('scheme');
        $description = $request->input('description');
        $deadline = $request->input('deadline');
        $image = 'storage/' . $request->file('image')->store('jobImages', 'public');

        $vacancy->position = $position;
        $vacancy->slug = $slug;
        $vacancy->company = $company;
        $vacancy->location = $location;
        $vacancy->type = $type;
        $vacancy->website = $website;
        $vacancy->salary = $salary;
        $vacancy->currency = $currency;
        $vacancy->scheme = $scheme;
        $vacancy->description = $description;
        $vacancy->deadline = $deadline;
        $vacancy->image = $image;

        $vacancy->save();

        return redirect(route('vacancies.index'))->with('status', 'Job Opportunity Updated Successfully. We ensure it is valid before we publish');

    } 
    public function destroy($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        $image = '/'.$vacancy->image;
        $path = str_replace('\\','/',public_path());

        if (file_exists($path.$image)) {
            unlink($path.$image);
            $vacancy->delete();
            return redirect()->back()->with('status', 'Deleted Successfully');
        } else {
            $vacancy->delete();
            return redirect()->back()->with('status', 'Deleted Successfully');
        }
    }
}
