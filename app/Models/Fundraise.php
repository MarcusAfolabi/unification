<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fundraise extends Model
{
    use HasFactory;

    protected $table = 'fundraises';

    protected $fillable = [
        'title',
        'slug',
        'image',
        'description',
        'target'
    ];
}
