<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Post;
use App\Models\User;
use App\Models\Audio;
use App\Models\Video;
use App\Models\Prayer;
use App\Models\Product;
use App\Models\Vacancy;
use App\Models\Convention;
use App\Models\Fellowship; 

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin']);
    }

    public function index()
    {
        $president =  User::where('fellowship_status', 'PRESIDENT')->count();
        $secretary =  User::where('fellowship_status', 'SECRETARY')->count();
        $total_cec = User::where('fellowship_status', 'CEC')->count();
        $fellowship = Fellowship::all()->count();
        $total_users = User::all()->count();
        $posts = Post::all()->count();
        $prayers = Prayer::all()->count();
        $jobs = Vacancy::all()->count();
        $audios = Audio::all()->count();
        $videos = Video::all()->count();
        $products = Product::all()->count();
        $books = Book::all()->count();
        $convention = Convention::all()->count();

        $auth = Auth::user();
        $users = User::latest()->paginate(50);
        $timelineposts = Post::latest()->paginate(10);
        $timelineproducts = Product::latest()->paginate(10);

        if(auth()->user()->role === 'admin')
        {
            return view ('dashboard.index', compact('president', 'secretary', 'total_cec', 'fellowship', 'total_users', 'posts', 'prayers', 'jobs', 'audios', 'videos', 'products', 'books', 'convention'));
        }
        else{
        return redirect(route('welcome'));
        }
    }
 }


