<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Audio;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
// use App\Notifications\NewPostNotification;
// use Illuminate\Support\Facades\Notification;

class AudioController extends Controller
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
        DB::table('audio')->increment('views');

        if ($request->audios) {
            $audios = Audio::where('title', 'like', '%' . $request->audios . '%')
            ->orWhere('content', 'like', '%' . $request->audios . '%')->latest()->paginate(20);
        } else {
            $audios = Audio::latest()->paginate(20);
        }
            $auds = Audio::latest()->take(10)->get();
         return view('audios.index', compact('audios','auds'));
        //  return view('audios.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('audios.create');
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
            "title" => 'required|unique:audio|max:255',
            "author" => 'required|max:255',
            "image" => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1048',
            "file" => 'nullable|mimes:mp3,WebM,Ogg,avi,3gp,mp4|max:15512',
            "url" => 'nullable|unique:audio',
            "content" => 'nullable',
        ]);
        $title = $request->input('title');
        $author = $request->input('author');
        $slug = Str::slug($title, '-');
        $user_id = Auth::user()->id;
        $content = $request->input('content');
        $url = $request->input('url');

        // save single image
        $image = 'storage/' . $request->file('image')->store('audioImages', 'public');
        $file = 'storage/' . $request->file('file')->store('audioFiles', 'public');

        $audio = new Audio();
        $audio->title = $title;
        $audio->author = $author;
        $audio->slug = $slug;
        $audio->user_id = $user_id;
        $audio->file = $file;
        $audio->content = $content;
        $audio->image = $image;
        $audio->url = $url;

        $audio->save();
        // Notification::send($user, new NewPostNotification($audio));
        return redirect(route('audios.index'))->with('status', 'Audio Created Successfully. We ensure it edify the body of Christ before we publish');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function show(Audio $audio)
    {
        DB::table('audio')->increment('views');
        return view('audios.audio', compact('audio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function edit(Audio $audio)
    {
        return view('audios.edit', compact('audio'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Audio  $audio
     * @return \Illuminate\Http\Response
     */

    public function status($id)
    {
        $audio = Audio::select('status')->where('id','=',$id)->first();

        if($audio->status == '1')
        {
            $status = '0';
        }else{
            $status = '1';
        }
        $values = array('status' => $status);
        Audio::where('id', $id)->update($values);

        return redirect()->back()->with('status', 'Status Updated');
    }
    public function update(Request $request, Audio $audio)
    {
        $request->validate([
            "title" => 'required|max:255',
            "author" => 'required|max:255',
            "image" => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1048',
            // "file" => 'required|mimes:mp3,WebM,Ogg,avi,3gp|max:15512',
            "content" => 'required',
         ]);
        $title = $request->input('title');
        $author = $request->input('author');
        $slug = Str::slug($title, '-');
        $content = $request->input('content');
        $url = $request->input('url');

        // save single image
        $image = 'storage/' . $request->file('image')->store('audioImages', 'public');
        // $file = 'storage/' . $request->file('file')->store('audioFiles', 'public');

        $audio->title = $title;
        $audio->author = $author;
        $audio->slug = $slug;
        // $audio->file = $file;
        $audio->content = $content;
        $audio->image = $image;
        $audio->url = $url;

        $audio->save();

        return redirect(route('audios.index'))->with('status', 'Audio Updated Successfully. We ensure it edify the body of Christ before we publish');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Audio $audio)
    {
        $audio->delete();
        return redirect()->back()->with('status', 'Audio Deleted Successfully.');


    }
}
