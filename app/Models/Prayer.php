<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prayer extends Model
{
    use HasFactory;
    protected $table = 'prayers';

    protected $fillable = [
        'title',
        'slug',
        'user_id',
        'publication',
        'category',
        'author',
        'content'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
