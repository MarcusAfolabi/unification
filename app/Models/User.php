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
 
    protected $fillable = [
        'name', 'username', 'lastname', 'email', 'gender',
        'phoneNumber', 'date_of_birth', 'contact_address', 'academicStatus', 'unificationCurrentPost',
        'levelInSchool', 'positionHeld', 'yourFellowship', 'unit_in_fellowship', 'qualification_one', 'degree_one',
        'course_one', 'qualification_two', 'degree_two', 'course_two', 'qualification_three',
        'degree_three', 'course_three', 'graduationYear', 'relationship_status', 'occupation',
        'professional_skill', 'office_address', 'country_of_residence', 'password',
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

    public function institutions()
    {
        return $this->hasMany(Institution::class);
    }
  
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function audio()
    {
        return $this->hasMany(Audio::class);
    }
    public function jobs()
    {
        return $this->hasMany(Job::class);
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
