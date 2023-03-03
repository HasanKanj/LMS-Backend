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

    public function UserGradeSection(){
        return $this->hasMany(UserGradeSection::class);
    }

    // public function users(){
    //     return $this->hasMany(userlms::class, 'user_grade_sections', 'courses', 'userlms_id', 'courses_id');
    // }
}
