<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;
    protected $table = 'vacancies';
    protected $fillable = [
        'position',
        'slug',
        'user_id',
        'company',
        'location',
        'type',
        'website',
        'salary',
        'currency',
        'scheme',
        'description',
        'deadline',
        'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
