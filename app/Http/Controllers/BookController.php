<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Events\ItemStored;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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

        // Upload image to Cloudinary
        $imageUploadResult = Cloudinary::upload($request->file('image')->getRealPath());

        // Upload file to Cloudinary
        $fileUploadResult = Cloudinary::upload($request->file('file')->getRealPath());

        // Create new Book instance with Cloudinary URLs
        $book = new Book([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'slug' => Str::slug($request->input('title'), '-'),
            'user_id' => Auth::user()->id,
            'image' => $imageUploadResult->getSecurePath(),
            'file' => $fileUploadResult->getSecurePath()
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
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif,svg|max:1015',
            'file' => 'nullable|mimes:pdf,mp3,docx|max:15052',
        ]);

        // Initialize an empty array to store updated book data
        $data = [];

        // Update book title and author
        $data['title'] = $request->input('title');
        $data['author'] = $request->input('author');

        // Generate slug from the updated title
        $data['slug'] = Str::slug($request->input('title'), '-');

        // Update user ID
        $data['user_id'] = Auth::user()->id;

        // Handle image upload
        if ($request->hasFile('image')) {
            // Upload new image to Cloudinary
            $imageUploadResult = Cloudinary::upload($request->file('image')->getRealPath());

            // Delete existing image if it exists
            if ($book->image) {
                Cloudinary::destroy($book->imagePublicId());
            }

            // Update image URL in the data array
            $data['image'] = $imageUploadResult->getSecurePath();
        }

        // Handle file upload
        if ($request->hasFile('file')) {
            // Upload new file to Cloudinary
            $fileUploadResult = Cloudinary::upload($request->file('file')->getRealPath());

            // Delete existing file if it exists
            if ($book->file) {
                Cloudinary::destroy($book->filePublicId());
            }

            // Update file URL in the data array
            $data['file'] = $fileUploadResult->getSecurePath();
        }

        // Update the book record with the new data
        $book->update($data);

        return redirect()->back()->with('status', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        // Delete associated image from Cloudinary if it exists
        if ($book->image) {
            Cloudinary::destroy($book->imagePublicId());
        }

        // Delete associated file from Cloudinary if it exists
        if ($book->file) {
            Cloudinary::destroy($book->filePublicId());
        }

        // Delete the book record from the database
        $book->delete();

            return redirect()->back()->with('status', 'Deleted Successfully');

    }
}
