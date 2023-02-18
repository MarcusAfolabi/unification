<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Product;
use App\Models\Resource;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Notifications\ResourceNotification;
use Illuminate\Support\Facades\Notification; 

class ResourceController extends Controller
{ 
    public function __construct()
    {
        $this->middleware(['auth', 'admin'])->except('list');
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
         $user= User::all();
        
        $request->validate([
            "name" => 'required',
            "file" => 'required|file|mimes:jpeg,png,jpg,pdf|max:2000',

        ]);
        $name = $request->input('name');
        $slug = Str::slug($name, '-');
        $file = 'storage/' . $request->file('file')->store('resourcesFile', 'public');

        $resource = new Resource();
        $resource->name = $name;
        $resource->slug = $slug;
        $resource->file = $file;
        $resource->save();
        Notification::send($user, new ResourceNotification($resource)); 
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
        $request->validate([
            "name" => 'required',
            "file" => 'required',
        ]);
        $name = $request->input('name');
        $slug = Str::slug($name, '-');
        $file = 'storage/' . $request->file('file')->store('resourcesFile', 'public');

        $resource->name = $name;
        $resource->slug = $slug; 
        $resource->file = $file;
        $resource->save();
        return redirect(route('resource.index'))->with('status', 'File Updated Successfully');
    }
 
    public function destroy(Resource $resource)
    {
        Storage::disk('public')->delete($resource->file); // Remove the image from storage
        $resource->delete();
        return redirect()->back()->with('status', 'File Deleted Successfully');
    }
}
