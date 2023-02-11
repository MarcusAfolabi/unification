<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convention extends Model
{
    use HasFactory;

    
    public $fillable =[
        'name', 'email', 'phoneNumber', 'lastname', 'firstname',
        'middlename','contactAddress','academicStatus','unificationStatus',
        'unificationCurrentPost','yourFellowship','fellowshipsStatecountry',
        'levelInSchool','qualification','positionHeld','graduationYear'
    ];
}
