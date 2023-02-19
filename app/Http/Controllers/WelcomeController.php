<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Audio;
use App\Models\Prayer;
use App\Models\Product;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    { 
        $user_fellowship_posts = Post::with(['images'])->select('id', 'fellowship_id', 'title', 'slug', 'user_id', 'created_at', 'intro')->orderBy('fellowship_id')->inRandomOrder()->limit(5)->get();
        $fellowship_posts = Post::with(['images'])->select('id', 'title', 'slug', 'user_id', 'created_at', 'intro')->where('category', 'Fellowship')->inRandomOrder()->limit(10)->get();
        $anniversary_posts = Post::with(['images'])->select('id', 'title', 'slug', 'user_id', 'created_at', 'intro')->where('category', 'Anniversary')->inRandomOrder()->limit(10)->get();
        $sideproducts = Product::select('name', 'currency', 'price', 'image', 'slug')->inRandomOrder()->limit(10)->get();
        $poststories = Post::with(['images'])->select('id', 'title', 'slug', 'user_id')->inRandomOrder()->limit(5)->get();
        $sideprayers = Prayer::select('id', 'title', 'slug')->inRandomOrder()->limit(10)->get();
        $sideaudios = Audio::select('id', 'title', 'slug', 'image', 'file', 'views')->inRandomOrder()->limit(10)->get();
        $sidejobs = Vacancy::select('id', 'position', 'slug')->inRandomOrder()->limit(10)->get();
        return view('welcome', compact
        (
        'user_fellowship_posts',
        'anniversary_posts', 
        'fellowship_posts', 
        'poststories', 
        'sideaudios', 
        'sidejobs', 
        'sideproducts', 
        'sideprayers'
        )
    );
    }
}
