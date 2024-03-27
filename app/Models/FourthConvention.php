<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FourthConvention extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'gender',
        'phone',
        'academic_status',
        'fellowship',
        'fellowship_status',
        'unit',
        'payment_proof',
    ];
    protected $table = 'fourth_conventions';
}
