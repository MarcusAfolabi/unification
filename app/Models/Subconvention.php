<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subconvention extends Model
{
    use HasFactory;

    protected $table = 'fourth_subconventions';

    protected $fillable =[
        'payment_proof',
        'firstname',
        'lastname',
        'email',
        'phone',
        'gender',
        'fellowship_id', 
        'academic_status',
        'fellowship_status',
        'unit_id',
        'profile_image',
    ];
}
