<?php

namespace App\Http\Controllers;

use App\Models\Book;
// use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Notifications\NewPostNotification;
// use Illuminate\Support\Facades\Notification;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    public function index(Request $request)
    {
        if ($request->books) {
            $books = Book::where('title', 'like', '%' . $request->books . '%')
            ->orWhere('author', 'like', '%' . $request->books . '%')->latest()->paginate(30);
        } else {
            $books = Book::latest()->paginate(30);
        }
            $sidebooks = Book::latest()->take(10)->get();
         return view('books.index', compact('books','sidebooks'));
        // return view('books.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $user= User::all();
        $request->validate([
            "title" => 'required|unique:books|max:255',
            "image" => 'required|image|mimes:png,jpg,jpeg,gif,svg|max:2254',
            "file" => 'required|mimes:pdf,mp3,docx,',
            "author" => 'required|max:255'


        ]);
        $title = $request->input('title');
        $author = $request->input('author');
        $slug = Str::slug($title, '-');
        $user_id = Auth::user()->id;

        $image = 'storage/' . $request->file('image')->store('bookImages', 'public');
        $file = 'storage/' . $request->file('file')->store('bookImages', 'public');

        $book = new Book();
        $book->title = $title;
        $book->author = $author;
        $book->slug = $slug;
        $book->user_id  = $user_id;
        $book->image = $image;
        $book->file = $file;

        $book->save();
        // Notification::send($user, new NewPostNotification($book));
        return redirect()->back()->with('status', 'Book Created Successfully. We ensure it edify the body of Christ before we publish');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.book');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            "title" => 'required|max:255',
            "image" => 'required|image|mimes:png,jpg,jpeg,gif,svg|max:2254',
            "file" => 'required|mimes:pdf,mp3,docx,',
            "author" => 'required|max:255'
        ]);
        $title = $request->input('title');
        $author = $request->input('author');
        $slug = Str::slug($title, '-');

        $image = 'storage/' . $request->file('image')->store('bookImages', 'public');
        $file = 'storage/' . $request->file('file')->store('bookImages', 'public');

        $book->title = $title;
        $book->slug = $slug;
        $book->author = $author;
        $book->image = $image;
        $book->file = $file;

        $book->save();
        return redirect()->back()->with('status', 'Book Updated Successfully. We ensure it edify the body of Christ before we publish');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
