<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use App\Events\ItemStored;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class AudioController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except(['list']);
    }
    
    public function index(Request $request)
    {
        DB::table('audios')->increment('views');
        $audios = Audio::where('user_id', auth()->user()->id)->latest()->get();
        $all_audios = Audio::latest()->paginate(20);
        $side_audios = Audio::select('id', 'slug', 'title', 'image', 'file', 'user_id')->where('user_id', '!=', auth()->user()->id)->inRandomOrder()->take(5)->get();
        return view('audios.index', compact('audios', 'all_audios', 'side_audios'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "title" => 'required|unique:audios|max:255',
            "author" => 'required|max:255',
            "image" => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1048',
            "file" => "nullable|mimetypes:audio/mpeg,audio/mp3|max:20120",
            "url" => 'nullable|unique:audios|regex:/^.+\.mp3$/i',
            "content" => 'nullable',
        ]);

        $imageUrl = null;
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            // Check if the uploaded file is indeed an image
            if ($imageFile->isValid()) {
                $uploadResult = cloudinary()->upload($imageFile->getRealPath());
                $imageUrl = $uploadResult->getSecurePath();
            } else {
                return redirect()->back()->withErrors(['image' => 'Invalid image file.']);
            }
        }

        $iconUrl = null;
        if ($request->hasFile('file')) {
            $audioFile = $request->file('file');
            // Check if the uploaded file is indeed an audio file
            if ($audioFile->isValid()) {
                $uploadResult = cloudinary()->upload($audioFile->getRealPath());
                $iconUrl = $uploadResult->getSecurePath();
            } else {
                return redirect()->back()->withErrors(['file' => 'Invalid audio file.']);
            }
        }

        $audio = Audio::create([
            'title' => $validatedData['title'],
            'user_id' => Auth::user()->id,
            'author' => $validatedData['author'],
            'url' => $validatedData['url'] ?? null,
            'content' => $validatedData['content'],
            'slug' => Str::slug($validatedData['title'], '-'),
            'image' => $imageUrl,
            'file' => $iconUrl,
        ]);

        return redirect(route('audios.index'))->with('status', 'Audio Created Successfully. We ensure it edify the body of Christ before we publish');
    }


    public function list(Audio $audio)
    {

        DB::table('audios')->increment('views');
        $side_audios = Audio::latest()->paginate(10);
        $audios = Audio::latest()->paginate(10);
        return view('audios.list', compact('audios', 'side_audios'));
    }

    public function edit(Audio $audio)
    {
        return view('audios.edit', compact('audio'));
    }



    public function update(Request $request, Audio $audio)
    {
        $validatedData = $request->validate([
            "title" => 'required|max:255',
            "author" => 'required|max:255',
            "image" => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1048',
            "file" => "nullable|file|mimetypes:audio/mpeg,audio/mp3|max:5120",
            "url" => 'nullable|regex:/^.+\.mp3$/i',
            "url.regex" => 'The URL must end with the .mp3 file extension.',
            "content" => 'required',
        ]);

        $data = [
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'content' => $request->input('content'),
            'url' => $request->input('url'),
            'slug' => Str::slug($request->input('title'), '-'),
            'user_id' => Auth::id(),
        ];

        // Handle file update or removal
        if ($request->hasFile('file')) {
            $uploadResult = cloudinary()->upload($request->file('file')->getRealPath());
            $data['file'] = $uploadResult->getSecurePath();
        } elseif ($request->exists('remove_file')) {
            cloudinary()->destroy($audio->filePublicId()); // Assuming you have a method to get the public ID of the file
            $data['file'] = null;
        }

        // Handle image update or removal
        if ($request->hasFile('image')) {
            $uploadResult = cloudinary()->upload($request->file('image')->getRealPath());
            $data['image'] = $uploadResult->getSecurePath();
        } elseif ($request->exists('remove_image')) {
            cloudinary()->destroy($audio->imagePublicId()); // Assuming you have a method to get the public ID of the image
            $data['image'] = null;
        }

        $audio->update($data);

        return redirect(route('audios.index'))->with('status', 'Audio Updated Successfully. We ensure it edify the body of Christ before we publish');
    }


    public function destroy($id)
    {
        $audio = Audio::findOrFail($id);

        // Delete associated file from cloud storage if exists


        if ($audio->image) {
            Cloudinary::destroy($audio->imagePublicId());
        }

        // Delete associated file from Cloudinary if it exists
        if ($audio->file) {
            Cloudinary::destroy($audio->filePublicId());
        }

        // Delete audio record from the database
        $audio->delete();

        return redirect()->back()->with('status', 'Deleted Successfully');
    }
}
