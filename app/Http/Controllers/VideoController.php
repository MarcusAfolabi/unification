<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
// use App\Notifications\NewPostNotification;
// use Illuminate\Support\Facades\Notification;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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
            $videos = Video::latest()->paginate(30);
        }
        // $videos = Video::all();
        return view('videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('videos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
        // $user= User::all();
        
            $request->validate([
                "title" => 'required|unique:videos|max:255',
                "image" => 'required | image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                "content" => 'required',
                "url" => 'required',
            ]);
            $title = $request->input('title');
            $slug = Str::slug($title, '-');
            $user_id = Auth::user()->id;
            $url = $request->input('url');
            $content = $request->input('content');

            // save single image
            $image = 'storage/' . $request->file('image')->store('videoImages', 'public');

            $video = new Video();
            $video->title = $title;
            $video->slug = $slug;
            $video->user_id = $user_id;
            $video->content = $content;
            $video->image = $image;
            $video->url = $url;

            $video->save();
            // Notification::send($user, new NewPostNotification($video));
            return redirect()->back()->with('status', 'Video Created Successfully. We ensure it edify the body of Christ before we publish');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        DB::table('videos')->increment('views');
        $sidevideos =   Video::latest()->take(5)->get();
        return view('videos.video', compact('video', 'sidevideos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {

        return view('videos.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $request->validate([
            "title" => 'required|max:255',
            "image" => 'required | image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            "url" => 'required',
            "content" => 'required',
         ]);
        $title = $request->input('title');
        $slug = Str::slug($title, '-');
        $url = $request->input('url');
        $content = $request->input('content');

        // save single image
        $image = 'storage/' . $request->file('image')->store('videoImages', 'public');

        $video->title = $title;
        $video->slug = $slug;
        $video->content = $content;
        $video->image = $image;
        $video->url = $url;

        $video->save();

        return redirect(route('videos.index'))->with('status', 'Video Updated Successfully. We ensure it edify the body of Christ before we publish');
    }

    public function status($id)
    {
        $post = Video::select('status')->where('id','=',$id)->first();

        if($post->status == '1')
        {
            $status = '0';
        }else{
            $status = '1';
        }

        $values = array('status' => $status);
        Video::where('id', $id)->update($values);

        return redirect()->back()->with('status', 'Status Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()->back()->with('status', 'Video Deleted Successfully.');

    }
}
