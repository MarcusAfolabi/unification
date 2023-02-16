<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fellowship extends Model
{
    use HasFactory;
     protected $table = 'fellowships';

    protected $fillable = ['name', 'slug', 'acronyms', 'logo', 'phone', 'address'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    
    public function units()
    {
        return $this->hasMany(Unit::class);
    }
}
