<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
    ];

    public function userlms(){
        return $this->belongsToMany(userlms::class);
    }
}
