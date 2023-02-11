<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';

    protected $fillable = [
        'post_id', 'post_images'
    ];

    public function posts()
    {
        return $this->belongsTo(Post::class);
    }
}
