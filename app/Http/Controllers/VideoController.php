<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Events\ItemStored;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin'])->except(['show']);
    }

    public function index(Request $request)
    {
        if ($request->videos) {
            $videos = Video::where('title', 'like', '%' . $request->videos . '%')
                ->orWhere('content', 'like', '%' . $request->videos . '%')->latest()->paginate(30);
        } else {
            $videos = Video::latest()->paginate(30);
        }
        $my_videos = Video::where('user_id', auth()->user()->id)->latest()->paginate(30);
        $sidevideos = Video::select('user_id', 'id', 'slug', 'created_at', 'image', 'views', 'title')->where('user_id', '!=', auth()->user()->id)->inRandomOrder()->take(5)->get();

        return view('videos.index', compact('videos', 'my_videos', 'sidevideos'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => 'required|unique:videos|max:255',
            "image" => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1025',
            "content" => 'required',
            "url" => 'required|url|unique:videos',
        ]);

        $video = new Video([
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title'), '-'),
            'user_id' => Auth::user()->id,
            'content' => $request->input('content'),
            'image' => 'storage/' . $request->file('image')->store('videoImages', 'public'),
            'url' => $request->input('url'),
        ]);

        $video->save();
        event(new ItemStored()); 

        return redirect()->back()->with('status', 'Video Created Successfully. We ensure it edify the body of Christ before we publish');
    }

    public function show(Video $video)
    {
        DB::table('videos')->increment('views');
        $sidevideos = Video::select('id', 'slug', 'created_at', 'image', 'views', 'title')->where('user_id', '!=', $video->user_id)->inRandomOrder()->take(5)->get();
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
        $video->title = $request->input('title');
        $video->slug = Str::slug($video->title, '-');
        $video->content = $request->input('content');
        if ($request->hasFile('image')) {
            $video->image = 'storage/' . $request->file('image')->store('videoImages', 'public');
        }
        $video->url = $request->input('url');
    
        $video->save();

        return redirect(route('videos.index'))->with('status', 'Video Updated Successfully. We ensure it edify the body of Christ before we publish');
    }

    public function destroy(Video $video)
    {
        Storage::disk('public')->delete([
            str_replace('storage/', '', $video->image),
        ]);
        $video->delete();
        return redirect()->back()->with('status', 'Video Deleted Successfully.');
    }
}
