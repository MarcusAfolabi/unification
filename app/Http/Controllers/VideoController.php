<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth; 
class VideoController extends Controller
{ 
     public function __construct()
     {
         $this->middleware('auth')->except(['index', 'show']);
     }

    public function index(Request $request)
    {
        if ($request->videos) {
            $videos = Video::where('title', 'like', '%' . $request->videos . '%')
            ->orWhere('content', 'like', '%' . $request->videos . '%')->latest()->paginate(30);
        } else {
            $videos = Video::where('user_id', auth()->user()->id)->latest()->paginate(30);
        }
        return view('videos.index', compact('videos'));
    }

    
    public function create()
    {
        return view('videos.create');
    }
 
    public function store(Request $request)
    {               
            $request->validate([
                "title" => 'required|unique:videos|max:255',
                "image" => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1025',
                "content" => 'required',
                "url" => 'required|url|unique:videos',
            ]);
            $title = $request->input('title');
            $slug = Str::slug($title, '-');
            $user_id = Auth::user()->id;
            $url = $request->input('url');
            $content = $request->input('content');
            $image = 'storage/' . $request->file('image')->store('videoImages', 'public');
            $video = new Video();
            $video->title = $title;
            $video->slug = $slug;
            $video->user_id = $user_id;
            $video->content = $content;
            $video->image = $image;
            $video->url = $url;

            $video->save();
            return redirect()->back()->with('status', 'Video Created Successfully. We ensure it edify the body of Christ before we publish');
    }
 
    public function show(Video $video)
    {
        DB::table('videos')->increment('views');
        $sidevideos = Video::select('id', 'slug', 'created_at', 'image')->where('user_id', '!=', $video->user->id)->inRandomOrder()->take(5)->get();
        return view('videos.show', compact('video', 'sidevideos'));
    }
 
    public function edit(Video $video)
    {

        return view('videos.edit', compact('video'));
    }
 
    public function update(Request $request, Video $video)
    {
        $request->validate([
            "title" => 'required|max:255',
            "image" => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1025',
            "url" => 'required',
            "content" => 'required',
         ]);
        $title = $request->input('title');
        $slug = Str::slug($title, '-');
        $url = $request->input('url');
        $content = $request->input('content');
        $image = 'storage/' . $request->file('image')->store('videoImages', 'public');

        $video->title = $title;
        $video->slug = $slug;
        $video->content = $content;
        $video->image = $image;
        $video->url = $url;

        $video->save();

        return redirect(route('videos.index'))->with('status', 'Video Updated Successfully. We ensure it edify the body of Christ before we publish');
    }
 
    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()->back()->with('status', 'Video Deleted Successfully.');

    }
}
