<?php

namespace App\Http\Controllers;

use Exception;
// use App\Models\User;
use App\Models\Post;
use App\Models\User;
use App\Models\Image;
use App\Models\Product;
use App\Models\PostImage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewPostNotification;
use Illuminate\Support\Facades\Notification;
// use App\Notifications\NewPostNotification;
// use Illuminate\Support\Facades\Notification;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }
    public function index(Request $request)
    {
        $myposts = Post::with(['images'])->select('id', 'category', 'title', 'intro', 'created_at', 'slug')->where('user_id', auth()->user()->id)->latest()->paginate(40);
        $sideposts = Post::select('id', 'title', 'views', 'slug', 'created_at')->where('user_id', '!=', auth()->user()->id)->inRandomOrder()->limit(5)->get();
        $all_posts = Post::with(['images'])->select('id', 'title', 'intro', 'created_at', 'category', 'user_id')->latest()->paginate(40);
        $sideproducts = Product::select('name', 'currency', 'price', 'slug', 'id')->where('user_id', '!=', auth()->user()->id)->inRandomOrder()->limit(5)->get();
        return view('posts.index', compact('myposts', 'all_posts', 'sideposts', 'sideproducts'));
    }

    public function create()
    {
        return view('posts.create');
    }
    public function store(Request $request)
    {
        $user = User::latest()->get();

        $request->validate([
            "title" => 'required|string|unique:posts|max:255',
            "intro" => 'required',
            "image*" => 'required|image|array|max:5',
            "image*" => 'required|image|mimes:jpeg,png,jpg|max:250|dimensions:min_width=300,min_height=300,max_width=900,max_height=450',
            "category" => 'required',
            "content" => 'required'
        ]);
        
            $title = $request->input('title');
            $intro = $request->input('intro');
            $category = $request->input('category');
            $slug = Str::slug($title, '-');
            $user_id = Auth::user()->id;
            $content = $request->input('content');

            $post = new Post();
            $post->title = $title;
            $post->intro = $intro;
            $post->slug = $slug;
            $post->user_id = $user_id;
            $post->category = $category;
            $post->content = $content;
            $post->save();

            if ($request->hasFile("post_images")) {
                $files = $request->file("post_images");
                foreach ($files as $file) {
                    $imageName = time() . '_' . $file->getClientOriginalName();
                    $request['post_id'] = $post->id;
                    $request['post_image'] = $imageName;
                    $file->move(\public_path("/postImages"), $imageName);
                    Image::create($request->all());
                }
            }  
        
        // Notification::send($user, new NewPostNotification($post));
        return redirect()->back()->with('status', 'Post Created Successfully. We ensure it edify the body of Christ before we publish');
    }

    public function show(Post $post)
    {
        DB::table('posts')->increment('views');
        $timelineposts = Post::all();
        $tagposts = Post::latest()->take(5)->get();
        $sideposts = Post::all();
        $relatedposts = Post::where('id', '!=', $post->id)->latest()->take(5)->get();
        return view('posts.post', compact('post', 'relatedposts', 'sideposts', 'tagposts', 'timelineposts'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }
    public function update(Request $request, Post $post)
    {
        $request->validate([
            "title" => 'required|max:255',
            "image" => 'required | image|mimes:jpeg,png,jpg,gif,svg,mp3,mp4|max:10048',
            "category" => 'required',
            "content" => 'required'
        ]);
        $title = $request->input('title');
        $category = $request->input('category');
        $slug = Str::slug($title, '-');
        $content = $request->input('content');

        $image = 'storage/' . $request->file('image')->store('postImages', 'public');
        $image1 = 'storage/' . $request->file('image1')->store('postImages', 'public');
        $image2 = 'storage/' . $request->file('image2')->store('postImages', 'public');

        $post->title = $title;
        $post->slug = $slug;
        $post->category = $category;
        $post->content = $content;
        $post->image = $image;
        $post->image1 = $image1;
        $post->image2 = $image2;

        $post->save();


        return redirect(route('posts.index'))->with('status', 'Post Updated Successfully. We ensure it edify the body of Christ before we publish');
    }

    public function status($id)
    {
        $post = Post::select('status')->where('id', '=', $id)->first();

        if ($post->status == '1') {
            $status = '0';
        } else {
            $status = '1';
        }

        $values = array('status' => $status);
        Post::where('id', $id)->update($values);

        return redirect()->back()->with('status', 'Status Updated');
    }

    public function destroy(Post $post)
    {

        $post->delete();
        return redirect()->back()->with('status', 'Post Delete Successfully.');
    }
}
