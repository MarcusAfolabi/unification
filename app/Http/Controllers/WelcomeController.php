<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Audio;
use App\Models\Video;
use App\Models\Prayer;
use App\Models\Product;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    { 
        $posts = Post::with(['images'])->select('id', 'title', 'slug', 'user_id', 'created_at')->inRandomOrder()->limit(10)->get();
        $anniversary_posts = Post::with(['images'])->select('id', 'title', 'slug')->where('category', 'Anniversary')->inRandomOrder()->limit(10)->get();
        $fellowship_posts = Post::with(['images'])->select('id', 'title', 'slug')->where('category', 'Fellowship')->inRandomOrder()->limit(10)->get();
        $cec_posts = Post::with(['images'])->select('id', 'title', 'slug')->where('category', 'CEC')->inRandomOrder()->limit(10)->get();
        $videos = Video::select('id', 'title', 'slug', 'user_id', 'created_at')->inRandomOrder()->limit(10)->get();
        $sideproducts = Product::select('name', 'currency', 'price', 'image', 'slug')->inRandomOrder()->limit(10)->get();
        $poststories = Post::with(['images'])->select('id', 'title', 'slug', 'user_id')->inRandomOrder()->limit(5)->get();
        $sideprayers = Prayer::select('id', 'title', 'slug')->inRandomOrder()->limit(10)->get();
        $sideaudios = Audio::select('id', 'title', 'slug', 'image', 'file')->inRandomOrder()->limit(10)->get();
        $sidejobs = Vacancy::select('id', 'position', 'slug')->inRandomOrder()->limit(10)->get();
        return view('welcome', compact('posts', 'anniversary_posts', 'fellowship_posts', 'cec_posts', 'videos', 'poststories', 'sideaudios', 'sidejobs', 'sideproducts', 'sideprayers'));
    }
}
