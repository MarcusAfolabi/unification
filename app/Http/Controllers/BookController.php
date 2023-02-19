<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Events\ItemStored;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except(['show']);
    }
    public function index(Request $request)
    {
        if ($request->books) {
            $books = Book::where('title', 'like', '%' . $request->books . '%')
                ->orWhere('author', 'like', '%' . $request->books . '%')->latest()->paginate(30);
        } else {
            $books = Book::where('user_id', auth()->user()->id)->latest()->paginate(30);
        }
        DB::table('books')->increment('views');
        $sidebooks = Book::where('user_id', '!=', auth()->user()->id)->inRandomOrder()->take(10)->get();
        return view('books.index', compact('books', 'sidebooks'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:books|string|max:255',
            'image' => 'required|image|mimes:png,jpg,jpeg,gif,svg|max:1015',
            'file' => 'required|mimes:pdf,mp3,docx|max:15052',
            'author' => 'required|max:255'
        ]);

        $book = new Book([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'slug' => Str::slug($request->input('title'), '-'),
            'user_id' => Auth::user()->id,
            'image' => 'storage/' . $request->file('image')->store('bookImages', 'public'),
            'file' => 'storage/' . $request->file('file')->store('bookImages', 'public')
        ]);

        $book->save();
        event(new ItemStored()); 
        return redirect()->back()->with('status', 'Book Created Successfully. We ensure it edify the body of Christ before we publish');
    }


    public function show()
    {
        //
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            "title" => "required|string|max:255",
            "image" => "nullable|image|mimes:png,jpg,jpeg,gif,svg|max:2254",
            "file" => "nullable|mimes:pdf,mp3,docx|max:10052",
            "author" => "required|string|max:255"
        ]);

        $title = $request->input("title");
        $author = $request->input("author");
        $slug = Str::slug($title, "-");

        $book->title = $title;
        $book->author = $author;
        $book->slug = $slug;

        if ($request->hasFile("image")) {
            $image = "storage/" . $request->file("image")->store("bookImages", "public");
            $book->image = $image;
        }

        if ($request->hasFile("file")) {
            $file = "storage/" . $request->file("file")->store("bookFiles", "public");
            $book->file = $file;
        }

        $book->save();
        return redirect()->back()->with('status', 'Book Updated Successfully. We ensure it edify the body of Christ before we publish');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $image = '/'.$book->image;
        $file = '/'.$book->file;
        $path = str_replace('\\','/',public_path());

        if (file_exists($path.$image)) {
            unlink($path.$image);
            $book->delete();
            return redirect()->back()->with('status', 'Deleted Successfully');
        } else {
            $book->delete();
            return redirect()->back()->with('status', 'Deleted Successfully');
        }
        if (file_exists($path.$file)) {
            unlink($path.$file);
            $book->delete();
            return redirect()->back()->with('status', 'Deleted Successfully');
        } else {
            $book->delete();
            return redirect()->back()->with('status', 'Deleted Successfully');
        }
    }
}
