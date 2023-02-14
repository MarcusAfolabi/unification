<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Audio extends Model
{
    use HasFactory;

    protected $table = 'audios';

    protected $fillable = ['title', 'author', 'image', 'file', 'url', 'content', 'slug', 'user_id', 'views'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
