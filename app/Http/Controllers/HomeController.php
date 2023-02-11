<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Post;
use App\Models\User;
use App\Models\Audio;
use App\Models\Video;
use App\Models\Prayer;
use App\Models\Counter;
use App\Models\Product;
use App\Models\Vacancy;
use App\Models\Convention;
use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin']);
    }

    public function index()
    {
        // $visitors = User::sum('views')->count();
        DB::table('counters')->increment('views');
        $counters = Counter::all();
        Counter::increment('views');

        $president =  User::where('positionHeld', 'PRESIDENT')->count();
        $secretary =  User::where('positionHeld', 'SECRETARY')->count();
        $total_cec = User::where('unificationCurrentPost', 'CEC')->count();
        $institutions = Institution::all()->count();
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
            return view ('dashboard.index', compact('counters', 'president', 'secretary', 'total_cec', 'institutions', 'total_users', 'posts', 'prayers', 'jobs', 'audios', 'videos', 'products', 'books', 'convention'));
        }
        else{
        return redirect(route('welcome'));
        // return view('welcome', compact('auth', 'users', 'timelineposts', 'timelineproducts'));
        }
    }
 }


