<?php

namespace App\Http\Controllers;
 
use App\Models\Fundraise;
use Illuminate\Support\Str; 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonationController extends Controller
{
    public function index(Fundraise $fundraise)
    {
        DB::table('fundraises')->increment('views');
        $fundlists = Fundraise::inRandomOrder()->limit(10)->get();
        $funds = Fundraise::select('id', 'title')->inRandomOrder()->get();
        return view('donation.index', compact('fundlists', 'funds'));
    }

    public function list()
    {
        
        $fundraises = Fundraise::paginate(10);
        return view('donation.list', compact('fundraises'));
    }

    public function show(Fundraise $fundraise)
    {
        DB::table('fundraises')->increment('views');
        $fundlists = Fundraise::where('id', '!=', $fundraise->id)->select('id', 'title', 'image')->inRandomOrder()->limit(3)->get();
        $funds = Fundraise::where('id', '=', $fundraise->id)->select('id', 'title')->inRandomOrder()->get();
        return view('donation.show', compact('fundraise', 'fundlists', 'funds'));
    }

    public function success(){
        return view('donation.success');
    }



    public function fund(Request $request, Fundraise $fundraise)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'target' => 'required|string|max:255',
            "image" => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1048',

        ]);
        $data = $request->only(['title', 'description', 'target']);
        $data['slug'] = Str::slug($data['title'], '-');
        if ($request->hasFile('image')) {
            $data['image'] = '/' . $request->file('image')->store('fundImage', 'public');
        }
        $fundraise = Fundraise::create($data);
        return redirect()->back()->with('status', 'Added');

    }
     
     
    public function editFund(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'target' => 'required|string|max:255',
            "image" => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1048',

        ]);
        $data = $request->only(['title', 'description', 'target']);
        $data['slug'] = Str::slug($data['title'], '-');
        if ($request->hasFile('image')) {
            $data['image'] = '/' . $request->file('image')->store('fundImage', 'public');
        }

        return redirect()->back()->with('status', 'Added');
    }

    
    
     
    public function destroy(Fundraise $fundraise)
    {
        $fundraise->delete();
        return redirect()->back()->with('status', 'Deleted');
    }
}
