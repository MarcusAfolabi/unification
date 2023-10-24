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

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except(['show']);
    }
    public function index(Request $request)
    {
        $myposts = Post::with(['images'])->select('id', 'category', 'title', 'intro', 'created_at', 'slug', 'views')->where('user_id', auth()->user()->id)->latest()->paginate(40);
        $all_posts = Post::with(['images'])->select('id', 'title', 'created_at', 'category', 'user_id', 'slug', 'views')->latest()->paginate(40);
        $sideproducts = Product::select('name', 'currency', 'price', 'slug', 'id')->where('user_id', '!=', auth()->user()->id)->inRandomOrder()->limit(5)->get();
        return view('posts.index', compact('myposts', 'all_posts', 'sideproducts'));
    }
 
    public function store(Request $request)
    {
        // $users = User::latest()->get();

        $request->validate([
            "title" => 'required|string|unique:posts|max:255',
            "intro" => 'required|string|max:251',
            "image" => 'required|array|max:5',
            "image*" => 'required|image|mimes:jpeg,png,jpg|max:500',
            "category" => 'required',
            'content' => 'required', 'string', 'max:255', 'not_regex:/^.*(kill|death|blood|fool|stupid|sex|hate|kiss|fuck).*$/i',
            'fellowship_id' => 'required',
        ]);

        $post = new Post();
        $postData = $request->only(['title', 'intro', 'category', 'content', 'fellowship_id']);
        $postData = array_map('strip_tags', $postData);
        $post->fill($postData);
        $content = htmlentities($request->input('content'), ENT_QUOTES, 'UTF-8');
        $post->content = $content;
        $post->slug = Str::slug($request->input('title'), '-');
        $post->user_id = Auth::user()->id;
        $post->save();
        
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $path = $image->store('postImages', 'public');
                $postImage = new Image();
                $postImage->path = $path;
                $postImage->post_id = $post->id;
                $postImage->save();
            }
        }

        // Notification::route('mail', [
        //     'isokanmagazine@gmail.com' => 'Alert! New post has been published on the website',
        // ])->notify(new PostNotification($post));

        // $users = User::all();
        // Notification::send($users, new NotificationPost($post));

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

    public function uncomment(Comment $comment, Post $post ){
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
            "intro" => 'required',
            "image*" => 'required|image|array|max:5',
            "image*" => 'sometimes|image|mimes:jpeg,png,jpg|max:250|dimensions:min_width=300,min_height=300,max_width=900,max_height=450',
            "category" => 'required',
            'content' => ['required', 'string', 'max:255', 'not_regex:/^.*(kill|death|blood|fool|stupid|sex|hate).*$/i'],
         ]);
        $post->fill($request->only(['title', 'intro', 'category', 'content']));
        $post->slug = Str::slug($request->input('title'), '-');
        $post->user_id = Auth::user()->id;
        $post->save();
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $path = $image->store('postImages', 'public');

                $postImage = new Image();
                $postImage->path = $path;
                $postImage->post_id = $post->id;
                $postImage->save();
            }
        }
        return redirect(route('posts.index'))->with('status', 'Post Updated Successfully. We ensure it edify the body of Christ before we publish');
    }
    public function deleteimage(Image $id)
    {
        $image = Image::findOrFail($id);
        if (File::exists("posts/" . $image->path)) {
            File::delete("posts/" . $image->path);
        }
        Image::find($id)->delete();
        return redirect()->back()->with('status', 'Post Image Deleted');
    }

    public function destroy(Post $post)
    {
        $images = $post->images;

        foreach ($images as $image) {
            Storage::delete($image->path);
            $image->delete();
        }

        $post->delete();

        return redirect()->route('posts.index')->with('status', 'Post and associated images deleted successfully.');
    }
}
