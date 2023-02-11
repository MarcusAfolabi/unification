<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
// use App\Notifications\NewPostNotification;
// use Illuminate\Support\Facades\Notification;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']);
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
        // $vacancytags = Vacancy::distinct()->get();
        // $vacancytags = Vacancy::table('users')->distinct()->get();
        $vacancytags = Vacancy::latest()->take(5)->get();
         return view('vacancies.index', compact('vacancies', 'othervacancies', 'vacancytags'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vacancies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        // Notification::send($user, new NewPostNotification($vacancy));
        return redirect()->back()->with('status', 'Job Opportunity Created Successfully. We ensure it is valid before we publish');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function show(Vacancy $vacancy)
    {
        DB::table('vancancies')->increment('views');
        $othervacancy = Vacancy::all();
        $vacancytags = Vacancy::latest()->get();
        return view('vacancies.show', compact('vacancy', 'othervacancy', 'vacancytags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacancy $vacancy)
    {
        return view('vacancies.edit', compact('vacancy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
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

    public function status($id)
    {
        $vacancy = Vacancy::select('status')->where('id','=',$id)->first();

        if($vacancy->status == '1')
        {
            $status = '0';
        }else{
            $status = '1';
        }

        $values = array('status' => $status);
        Vacancy::where('id', $id)->update($values);

        return redirect()->back()->with('status', 'Status Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacancy $vacancy)
    {
        $vacancy->delete();
        return redirect()->back()->with('status', 'Vacancy Delete Successfully.');
    }
}
