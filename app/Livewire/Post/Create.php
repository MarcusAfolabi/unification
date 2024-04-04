<?php

namespace App\Livewire\Post;

use App\Models\Post;
use App\Models\Image;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class Create extends Component
{
    use WithFileUploads;

    public $title;
    public $content;
    public $images = [];
    public $category;
    public $fellowship_id;
    public $slug;
    public $user_id;

    protected $rules = [
        'title' => 'required|string|unique:posts|max:255',
        'images.*' => 'required|image|mimes:jpeg,png,jpg',
        'category' => 'required',
        'content' => ['required', 'string', 'max:1000', 'not_regex:/^.*(kill|death|blood|fool|stupid|sex|hate|kiss|fuck).*$/i'],
    ];


    public function create()
    {
        $this->validate();
        $post = new Post();
        $post->title = $this->title;
        $post->category = $this->category;
        $post->content = htmlentities($this->content, ENT_QUOTES, 'UTF-8');
        $post->slug = Str::slug($this->title, '-');
        $post->user_id = Auth::user()->id;
        $post->fellowship_id = Auth::user()->fellowship->id;
        $post->save();

        foreach ($this->images as $image) {
            $path = $image->store('postImages', 'public');
            $postImage = new Image();
            $postImage->path = $path;
            $postImage->post_id = $post->id;
            $postImage->save();
        }
        $optimizer = OptimizerChainFactory::create();
        $optimizer
        ->optimize($postImage->path);

        session()->flash('status', 'Post Created Successfully. We ensure it edify the body of Christ before we publish');
        return redirect()->route('posts.index');
    }
    public function render()
    {
        return view('livewire.post.create');
    }
}
