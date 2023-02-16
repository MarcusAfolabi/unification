<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AudioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }
    public function index(Request $request)
    {
        DB::table('audios')->increment('views');
        $audios = Audio::where('user_id', auth()->user()->id)->latest()->get();
        $all_audios = Audio::latest()->paginate(20);
        // $side_audios = Audio::select('id', 'slug', 'title', 'image', 'file')->latest()->get();
        $side_audios = Audio::select('id', 'slug', 'title', 'image', 'file', 'user_id')->where('user_id', '!=', auth()->user()->id)->inRandomOrder()->take(5)->get();
        return view('audios.index', compact('audios', 'all_audios', 'side_audios'));
    }

    public function create()
    {
        return view('audios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => 'required|unique:audios|max:255',
            "author" => 'required|max:255',
            "image" => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1048',
            "file" => "sometimes|file|mimetypes:audio/mpeg,video/webm,video/ogg,video/x-msvideo,video/3gpp,video/mp4|max:15512",
            "url" => 'nullable|unique:audios|regex:/^.+\.mp3$/i',
            "url.regex" => 'The URL must end with the .mp3 file extension.',
            "content" => 'nullable',
        ]);
        $data = $request->only(['title', 'author', 'content', 'url']);
        $data['slug'] = Str::slug($data['title'], '-');
        $data['user_id'] = Auth::id();
        $data['image'] = 'storage/' . $request->file('image')->store('audioImages', 'public');
        $data['file'] = 'storage/' . $request->file('file')->store('audioFiles', 'public');

        $audio = Audio::create($data);
        return redirect(route('audios.index'))->with('status', 'Audio Created Successfully. We ensure it edify the body of Christ before we publish');
    }

    public function show(Audio $audio)
    {
        DB::table('audio')->increment('views');
        return view('audios.audio', compact('audio'));
    }

    public function edit(Audio $audio)
    {
        return view('audios.edit', compact('audio'));
    }

    public function update(Request $request, Audio $audio)
    {
        $request->validate([
            "title" => 'required|max:255',
            "author" => 'required|max:255',
            "image" => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1048',
            "file" => "sometimes|file|mimetypes:audio/mpeg,video/webm,video/ogg,video/x-msvideo,video/3gpp,video/mp4|max:15512",
            "url" => 'nullable|regex:/^.+\.mp3$/i',
            "url.regex" => 'The URL must end with the .mp3 file extension.',
            "content" => 'required',
        ]);
        $data = $request->only(['title', 'author', 'content', 'url']);
        $data['slug'] = Str::slug($data['title'], '-');
        $data['user_id'] = Auth::id();

        if ($request->hasFile('image')) {
            Storage::delete($audio->image);
            $data['image'] = 'storage/' . $request->file('image')->store('audioImages', 'public');
        }

        if ($request->hasFile('file')) {
            Storage::delete($audio->file);
            $data['file'] = 'storage/' . $request->file('file')->store('audioFiles', 'public');
        }

        $audio->update($data);
        return redirect(route('audios.index'))->with('status', 'Audio Updated Successfully. We ensure it edify the body of Christ before we publish');
    }

    public function destroy(Audio $audio)
    {
        $audio->delete();
        return redirect()->back()->with('status', 'Audio Deleted Successfully.');
    }
}
