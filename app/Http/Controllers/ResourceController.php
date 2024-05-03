<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Product;
use App\Models\Resource;
use App\Events\ItemStored;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ResourceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin'])->except('list');
    }
    public function index()
    {
       $views = DB::table('resources')->increment('views');
        $sideposts = Post::all()->take(5);
        $sideproducts = Product::all()->take(5);
        $resources = Resource::latest()->paginate(5);
        return view('resource.index', compact('resources', 'sideproducts', 'sideposts'));
    }

    public function list()
    {
        $resources = Resource::latest()->paginate(5);
        return view('resource.list', compact('resources'));
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            "name" => 'required',
            "file" => 'required|file|mimes:jpeg,png,jpg,pdf|max:2000',

        ]);
        $slug = Str::slug($validatedData['name'], '-');
        $iconUrl = null;
        $name = $request->input('name');
        $slug = Str::slug($name, '-');

        // $resource = new Resource();
        // $resource->name = $name;
        // $resource->slug = $slug;
        // $resource->file = $iconUrl;
        // $resource->save();

        if ($validatedData['file']) {
            $uploadResult = cloudinary()->upload($validatedData['file']->getRealPath());
            $iconUrl = $uploadResult->getSecurePath();
        }

        Resource::create([
            'name' => $validatedData['name'],
            'slug' => $slug,
            'file' => $iconUrl,
        ]);

       return redirect(route('resource.index'))->with('status', 'File Added Successfully');
    }

    public function show()
    {
        // return view('resource.show', compact('resource'));
    }

    public function edit(Resource $resource)
    {
        return view('resource.edit', compact('resource'));
    }

    public function update(Request $request, Resource $resource)
    {
        $validatedData = $request->validate([
            "name" => 'required|string',
            "file" => 'required|file',
        ]);

        $name = $request->input('name');
        $slug = Str::slug($name, '-');
        $newFile = $request->file('file')->store('resourcesFile', 'public');

        // Delete existing file if a new one is present
        if ($resource->file && $newFile) {
            Storage::disk('public')->delete($resource->file);
        }

        // Upload new file to Cloudinary if a new one is present
        if ($newFile) {
            $uploadResult = cloudinary()->upload($request->file('file')->getRealPath());
            $iconUrl = $uploadResult->getSecurePath();
        }

        $resource->name = $name;
        $resource->slug = $slug;
        $resource->file = $newFile ? $iconUrl : $resource->file; // Use new file URL if present, otherwise keep existing one
        $resource->save();

        return redirect(route('resource.index'))->with('status', 'File Updated Successfully');
    }
    public function destroy(Resource $resource)
    {
        // Delete associated file from storage
        if ($resource->file) {
            Storage::disk('public')->delete($resource->file);
        }

        // Delete associated icon from Cloudinary (if exists)
        if ($resource->file) {
            $publicId = basename($resource->file, '.' . pathinfo($resource->file, PATHINFO_EXTENSION));
            cloudinary()->destroy($publicId);
        }
        $resource->delete();
        return redirect()->back()->with('status', 'File Deleted Successfully');
    }
}
