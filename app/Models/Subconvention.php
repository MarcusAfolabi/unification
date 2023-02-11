<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subconvention extends Model
{
    use HasFactory;

    protected $table = 'subconventions';

    public $fillable =[
        'name', 'email', 'phoneNumber', 'lastname', 'firstname',
        'middlename','contactAddress','academicStatus','unificationStatus',
        'unificationCurrentPost','yourFellowship','fellowshipsStatecountry',
        'levelInSchool','qualification','positionHeld','graduationYear'
    ];
}
