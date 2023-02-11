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
        if ($request->search) {
            $posts = Post::where('postTitle', 'like', '%' . $request->search . '%')
                ->orWhere('fullDescription', 'like', '%' . $request->search . '%')->latest()->paginate(40);
        } else {
            $posts = Post::all()->random('0');
        }

        $videos = Video::all();
        $sideproducts = Product::inRandomOrder()->limit(10)->get();
        $poststories = Post::inRandomOrder()->limit(5)->get();
        $sideprayers = Prayer::inRandomOrder()->limit(10)->get();
        $sideaudios = Audio::inRandomOrder()->limit(10)->get();
        $sidejobs = Vacancy::inRandomOrder()->limit(10)->get();
        return view('welcome', compact('posts', 'videos', 'poststories', 'sideaudios', 'sidejobs', 'sideproducts', 'sideprayers'));
    }
}
