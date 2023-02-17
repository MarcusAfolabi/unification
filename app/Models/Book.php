<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable =['title', 'image', 'file', 'author', 'user_id', 'slug'];
    
    public function user(){
        return $this->belongsTo(User::class);
    } 
}
