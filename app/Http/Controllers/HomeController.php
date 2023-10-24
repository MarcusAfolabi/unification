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
use App\Models\Subconvention;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin']);
    }

    public function index()
    {
        $president =  User::select('id', 'fellowship_status')->where('fellowship_status', 'PRESIDENT')->count();
        $secretary =  User::select('id', 'fellowship_status')->where('fellowship_status', 'SECRETARY')->count();
        $total_cec = User::select('id', 'fellowship_status')->where('fellowship_status', 'CEC')->count();
        $fellowship = Fellowship::select('id')->count();
        $total_users = User::select('id')->count();
        $posts = Post::select('id')->count();
        $prayers = Prayer::select('id')->count();
        $jobs = Vacancy::select('id')->count();
        $audios = Audio::select('id')->count();
        $videos = Video::select('id')->count();
        $products = Product::select('id')->count();
        $books = Book::select('id')->count();
        $convention = Convention::select('id')->count();
        $subconvention = Subconvention::select('id')->count();

        $auth = Auth::user();
        $users = User::latest()->paginate(50);
        $timelineposts = Post::latest()->paginate(10);
        $timelineproducts = Product::latest()->paginate(10);

        if(auth()->user()->role === 'admin')
        {
            return view ('dashboard.index', compact('subconvention', 'president', 'secretary', 'total_cec', 'fellowship', 'total_users', 'posts', 'prayers', 'jobs', 'audios', 'videos', 'products', 'books', 'convention'));
        }
        else{
        return redirect(route('welcome'));
        }
    }
 }


