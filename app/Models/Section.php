<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable=[
        'letter',
    ];
 
    public function grade_section(){

        return $this->hasMany(GradeSection::class);
    }
}
