<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Database\Eloquent\Relations\Pivot;
use AjCastro\EagerLoadPivotRelations\EagerLoadPivotTrait;

class UserGradeSection extends Pivot
{
    use HasFactory;
    use EagerLoadPivotTrait;

    protected $table = 'user_grade_sections';

    // public function student(){

    //     return $this->belongsTo(User::class)->where(['role' => 'student']);
    // }

    // public function teacher(){

    //     return $this->belongsTo(User::class)->where(['role' => 'teacher']);
    // }

    public function users(){
        return $this->belongsTo(userlms::class, 'user_grade_sections_id');
    }

    public function grade_section(){

        return $this->belongsTo(grade_section::class);
    }

    public function course(){

        return $this->belongsTo(course::class);
    }
}
