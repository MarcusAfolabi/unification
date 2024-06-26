<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Image;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class CreatePost extends Component
{
    use WithFileUploads;
    use WithPagination;


    public $showForm = false;
    public $title;
    public $images = [];
    public $category;
    public $content;
    public $fellowship_id;
    public $slug;
    public $user_id;
    public $query;


    protected $rules = [
        'title' => 'required|string|unique:posts|max:255',
        'images.*' => 'required|image|mimes:jpeg,png,jpg|max:500',
        'category' => 'required',
        'content' => ['required', 'string', 'max:1000', 'not_regex:/^.*(kill|death|blood|fool|stupid|sex|hate|kiss|fuck).*$/i'],
    ];
 

    public function CreatePost()
    {
        dd('Hi');
        $this->validate();
        $post = new Post();
        $post->title = $this->title;
        $post->category = $this->category;
        $post->content = htmlentities($this->content, ENT_QUOTES, 'UTF-8');
        $post->slug = Str::slug($this->title, '-');
        $post->user_id = Auth::user()->id;
        $post->save();

        foreach ($this->images as $image) {
            $path = $image->store('postImages', 'public');
            $postImage = new Image();
            $postImage->path = $path;
            $postImage->post_id = $post->id;
            $postImage->save();
        }

        session()->flash('status', 'Post Created Successfully. We ensure it edify the body of Christ before we publish');
        return redirect()->route('posts.index');
    }


    public function render()
    {
        return view('livewire.post.create');
    }
}
