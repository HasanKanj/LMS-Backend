<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userlms extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'password',
        'phoneNumber',
        'role',
    ];

    public function attendance(){
        return $this->hasOne(attendance::class);
    }

    public function course(){
        return $this->belongsToMany(course::class);
    }
}
