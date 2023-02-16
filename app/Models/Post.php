<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'title', 'intro', 'slug', 'category', 'content', 'user_id', 'status', 'views', 'fellowship_id'
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function fellowships()
    {
        return $this->hasMany(Fellowship::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    } 
}
