<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subconvention extends Model
{
    use HasFactory;

    protected $table = 'subconventions';

    protected $fillable =[
        'email',
        'lastname',
        'firstname',
        'gender',
        'phone',
        'academic_status',
        'fellowship_status',
        'fellowship_id',
        'unit_id',
        'profile_image',
        'recaptcha_token'
    ];
}
