<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGradeSection extends Model
{
    use HasFactory;

    public function student(){

        return $this->belongsTo(User::class)->where(['role' => 'student']);
    }

    public function teacher(){

        return $this->belongsTo(User::class)->where(['role' => 'teacher']);
    }

    public function grade_section(){

        return $this->belongsTo(GradeSection::class);
    }

    public function course(){

        return $this->belongsTo(Course::class);
    }
}
