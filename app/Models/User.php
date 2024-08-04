<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'lastname',
        'email',
        'gender',
        'phone',
        'address',
        'academic_status',
        'fellowship_status',
        'fellowship_id',
        'unit_id',
        'qualification_one',
        'degree_one',
        'course_one',
        'professional_skill',
        'occupation',
        'password',
        'profile_photo_path'
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function fellowship()
    {
        return $this->belongsTo(Fellowship::class);
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(PostLike::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function audios()
    {
        return $this->hasMany(Audio::class);
    }


    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function books()
    {
        return $this->hasMany(Book::class);
    }
    public function prayers()
    {
        return $this->hasMany(Prayer::class);
    }
    protected $appends = [
        'profile_photo_url',
    ];
}
