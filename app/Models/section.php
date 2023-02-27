<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class section extends Model
{

    protected $fillable = [
        'letter',
    ];

    use HasFactory;

    public function grade(){
        return $this->belongsToMany(grade::class, 'grade_sections');
    }
}
