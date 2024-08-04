<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Image;
use App\Mail\LikeMail;
use App\Mail\PostMail;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Postlike;
use App\Events\ItemStored;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Notifications\NotificationPost;
use App\Notifications\PostNotification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except(['show']);
    }
    public function index(Request $request)
    {
        $myposts = Post::with(['images'])->select('id', 'category', 'title', 'created_at', 'slug', 'views')->where('user_id', auth()->user()->id)->latest()->paginate(40);
        $all_posts = Post::with(['images'])->select('id', 'title', 'created_at', 'category', 'user_id', 'slug', 'views')->latest()->paginate(40);
        $sideproducts = Product::select('name', 'currency', 'price', 'slug', 'id')->where('user_id', '!=', auth()->user()->id)->inRandomOrder()->limit(5)->get();
        return view('posts.index', compact('myposts', 'all_posts', 'sideproducts'));
    }

    public function create(){
        return view('posts.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            "title" => 'required|string|unique:posts|max:255',
            "image" => 'required|array|max:5',
            "image.*" => 'required|image|mimes:jpeg,png,jpg|max:500',
            "category" => 'required',
            'content' => ['required', 'string', 'max:255', 'not_regex:/^.*(kill|death|blood|fool|stupid|sex|hate|kiss|fuck).*$/i'],
        ]);
        dd($request->validate());

        $post = new Post();
        $postData = $request->only(['title', 'category', 'content', 'fellowship_id']);
        $postData = array_map('strip_tags', $postData);
        $post->fill($postData);
        $content = htmlentities($request->input('content'), ENT_QUOTES, 'UTF-8');
        $post->content = $content;
        $post->slug = Str::slug($request->input('title'), '-');
        $post->user_id = Auth::user()->id;
        $post->fellowship_id = Auth::user()->fellowship->id;
        $post->save();

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                // Upload image to Cloudinary with transformation to resize to 400x400
                $imageUploadResult = Cloudinary::upload($image->getRealPath(), [
                    'transformation' => [
                        ['width' => 400, 'height' => 400, 'crop' => 'fill']
                    ]
                ]);

                // Create new Image instance with Cloudinary URL
                $postImage = new Image();
                $postImage->path = $imageUploadResult->getSecurePath();
                $postImage->post_id = $post->id;
                $postImage->save();
            }
        }

        return redirect(route('posts.index'))->with('status', 'Post Created Successfully. We ensure it edify the body of Christ before we publish');
    }


    public function like(Post $post)
    {
        $user = Auth::user();

        // Check if the user has already liked the post
        $existingLike = Postlike::where('user_id', $user->id)
            ->where('post_id', $post->id)
            ->first();

        if ($existingLike) {
            // The user has already liked the post, so we can't like it again
            return redirect()->back()->with(['status' => 'You have already liked this post.'], 422);
        }

        // Create a new like for the post
        $like = new Postlike();
        $like->user_id = $user->id;
        $like->post_id = $post->id;
        $like->save();

        // Update the post's like count
        // $post->likes()->increment('count');

        Mail::to($like->post->user->email)->send(new LikeMail($like));

        return redirect()->back()->with(['status' => 'Post liked successfully.']);
    }

    public function unlike(Post $post)
    {
        $user = Auth::user();

        // Check if the user has liked the post
        $existingLike = Postlike::where('user_id', $user->id)
            ->where('post_id', $post->id)
            ->first();

        if (!$existingLike) {
            // The user hasn't liked the post, so we can't unlike it
            return response()->json(['message' => 'You have not liked this post.'], 422);
        }

        // Delete the user's like for the post
        $existingLike->delete();

        // Update the post's like count
        $post->likes()->decrement('count');

        return response()->json(['message' => 'Post unliked successfully.']);
    }

    public function comment(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'content' => ['required', 'string', 'max:255', 'not_regex:/^.*(kill|death|blood|fool|stupid|sex|hate).*$/i'],
            'post_id' => ['required', 'integer', 'max:255'],
        ]);

        $user = Auth::user();
        $content = htmlentities($validatedData['content'], ENT_QUOTES, 'UTF-8');
        $comment = new Comment();
        $comment->content = $content;
        $comment->post_id = $validatedData['post_id'];
        $comment->user_id = $user->id;
        $post->comments()->save($comment);

        return redirect()->back()->with(['status' => 'comment shared.']);
    }

    public function uncomment(Comment $comment, Post $post)
    {
        $user = Auth::user();

        // Retrieve the post by its ID
        $post = Post::findOrFail($post);

        // Retrieve the comment by its ID, ensuring that it belongs to the authenticated user
        $comment = Comment::where('id', $comment)->where('user_id', $user->id)->firstOrFail();

        // Delete the comment from the post
        $comment->delete();
    }

    public function show(Post $post)
    {

        DB::table('posts')->increment('views');
        $list_comments = Comment::where('post_id', $post->id)->select('user_id')->distinct()->get();
        $comments = Comment::where('post_id', $post->id)->select('content', 'user_id')->latest()->get();
        $sideposts = Post::with(['images'])->select('id', 'title', 'created_at', 'views', 'slug')->where('category', '!=', $post->category)->latest()->take(5)->get();
        $relatedposts = Post::with(['images'])->select('id', 'title', 'created_at', 'views', 'slug')->where('id', '!=', $post->id)->latest()->take(5)->get();
        return view('posts.show', compact('post', 'relatedposts', 'sideposts', 'comments', 'list_comments'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            "title" => 'required|string|max:255',
            "image" => 'nullable|array|max:5',
            "image.*" => 'nullable|image|mimes:jpeg,png,jpg|max:500',
            "category" => 'required',
            'content' => ['required', 'string', 'max:255', 'not_regex:/^.*(kill|death|blood|fool|stupid|sex|hate|kiss|fuck).*$/i'],
            'fellowship_id' => 'required',
        ]);

        $postData = $request->only(['title', 'category', 'content', 'fellowship_id']);
        $postData = array_map('strip_tags', $postData);
        $content = htmlentities($request->input('content'), ENT_QUOTES, 'UTF-8');
        $postData['content'] = $content;
        $postData['slug'] = Str::slug($request->input('title'), '-');
        $postData['user_id'] = Auth::user()->id;

        // If new images are provided, delete existing images
        if ($request->hasFile('image')) {
            // Delete existing images from Cloudinary
            foreach ($post->images as $image) {
                Cloudinary::destroy($image->public_id); // Assuming you have a method to get the public ID of the image
                $image->delete();
            }
        }

        // Update post data
        $post->update($postData);

        // Upload and associate new images if provided
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                // Upload image to Cloudinary with transformation to resize to 400x400
                $imageUploadResult = Cloudinary::upload($image->getRealPath(), [
                    'transformation' => [
                        ['width' => 400, 'height' => 400, 'crop' => 'fill']
                    ]
                ]);

                // Create new Image instance with Cloudinary URL
                $postImage = new Image();
                $postImage->path = $imageUploadResult->getSecurePath();
                $postImage->post_id = $post->id;
                $postImage->public_id = $imageUploadResult->getPublicId(); // Assuming you have a method to retrieve the public ID
                $postImage->save();
            }
        }

        return redirect(route('posts.index'))->with('status', 'Post Updated Successfully');
    }



    public function destroy(Post $post)
    {
        foreach ($post->images as $image) {
            Cloudinary::destroy($image->public_id); // Assuming you have a method to get the public ID of the image
            $image->delete();
        }

        // Delete the post
        $post->delete();

        return redirect()->route('posts.index')->with('status', 'Post and associated images deleted successfully.');
    }
}
