<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'title', 'intro', 'slug', 'category', 'content', 'image', 'user_id', 'status', 'views'
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    } 
}
