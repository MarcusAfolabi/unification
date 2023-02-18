<?php

namespace App\Http\Controllers;

// use App\Models\User;
use App\Models\Prayer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
// use App\Notifications\NewPostNotification;
// use Illuminate\Support\Facades\Notification;

class PrayerController extends Controller
{ 
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    public function index(Request $request)
    {
        if ($request->prayers) {
            $prayers = Prayer::where('title', 'like', '%' . $request->prayers . '%')
                ->orWhere('author', 'like', '%' . $request->prayers . '%')->latest()->paginate(30);
        } else {
            $prayers = Prayer::latest()->paginate(20);
        }
        $recentprayers = Prayer::latest()->take(10)->get();

        return view('prayers.index', compact('prayers', 'recentprayers'));
    }
  
 
    public function store(Request $request)
    {
        // $user= User::all();

        $request->validate([
            "title"=>'required|unique:prayers|max:255',
            "publication"=>'required',
            "author"=>'required',
            "content"=>'required',
        ]);
        $title = $request->input('title');
        $slug = Str::slug($title, '-');
        $user_id = Auth::user()->id;
        $publication = $request->input('publication');
        $category = $request->input('category');
        $author = $request->input('author');
        $content = $request->input('content');


        $prayer = new Prayer();
        $prayer->title= $title;
        $prayer->slug= $slug;
        $prayer->user_id = $user_id;
        $prayer->publication=$publication;
        $prayer->category=$category;
        $prayer->author=$author;
        $prayer->content=$content;

        $prayer->save();

        // Notification::send($user, new NewPostNotification($prayer));

        return redirect(route('prayers.index'))->with('status', 'Prayer Created Successfully. We Ensure it edify the body of Christ before we publish');
    }
 
    public function show(Prayer $prayer)
    {
        DB::table('prayers')->increment('views');
        $sideprayers = Prayer::latest()->take(5)->get();
        return view('prayers.prayer', compact('prayer', 'sideprayers'));
    }
 
    public function edit(Prayer $prayer)
    {
        return view('prayers.edit', compact('prayer'));
    }

    public function status($id)
    {
        $prayer = Prayer::select('status')->where('id','=',$id)->first();

        if($prayer->status == '1')
        {
            $status = '0';
        }else{
            $status = '1';
        }

        $values = array('status' => $status);
        Prayer::where('id', $id)->update($values);

        return redirect()->back()->with('status', 'Status Updated');
    } 
    public function update(Request $request, Prayer $prayer)
    {
        $request->validate([
            "title"=>'required|max:255',
            "publication"=>'required',
            "author"=>'required', 
            "content"=>'required',
        ]);
        $title = $request->input('title');
        $slug = Str::slug($title, '-');
        $publication = $request->input('publication');
        $author = $request->input('author');
        $category = $request->input('category');
        $content = $request->input('content');

        $prayer->title= $title;
        $prayer->slug= $slug;
        $prayer->publication=$publication;
        $prayer->author=$author; 
        $prayer->category=$category;
        $prayer->content=$content;

        $prayer->save();
        return redirect(route('prayers.index'))->with('status', 'Prayer Updated Successfully. We Ensure it edify the body of Christ before we publish');

    }
 
    public function destroy(Prayer $prayer)
    {
        $prayer->delete();
        return redirect()->back()->with('status', 'Prayer Deleted Successfully');
    }
}
