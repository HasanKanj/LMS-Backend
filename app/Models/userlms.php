<?php

namespace App\Models;

use AjCastro\EagerLoadPivotRelations\EagerLoadPivotTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class userlms extends Model
{
    use HasApiTokens, HasFactory, Notifiable, EagerLoadPivotTrait;

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
    
    public function courses(){
        return $this->belongsToMany(course::class, 'user_grade_sections', 'userlms_id', 'course_id');
    }

    public function sections(){
        return $this->belongsToMany(section::class, 'user_grade_sections', 'userlms_id', 'grade_section_id');
    }

    public function grades(){
        return $this->belongsToMany(grade::class, 'user_grade_sections' , 'userlms_id', 'grade_section_id');
    }
}
