<?php

namespace App\Livewire\Post;

use App\Models\Post;
use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public $myposts;
    public $all_posts;
    public $sideproducts;

    public function mount()
    {
        $this->myposts = Post::with(['images'])->select('id', 'category', 'title',  'created_at', 'slug', 'views')->where('user_id', auth()->user()->id)->latest()->limit(40)->get();
        $this->all_posts = Post::with(['images'])->select('id', 'title', 'created_at', 'category', 'user_id', 'slug', 'views')->latest()->limit(40)->get();
        $this->sideproducts = Product::select('name', 'currency', 'price', 'slug', 'id')->where('user_id', '!=', auth()->user()->id)->inRandomOrder()->limit(5)->get();
    }

    public function render()
    {
        return view('livewire.post.index');
    }
}
