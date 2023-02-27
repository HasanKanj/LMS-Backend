<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeSection extends Model
{
     use HasFactory;

     
    protected $fillable=[
      'capacity',
    ];
 
    public function section(){

        return $this->belongsTo(Section::class);
    }

    public function grade(){

        return $this->belongsTo(Grade::class);
    }

    public function user_class_section(){

        return $this->hasMany(UserClassSection::class);
    }

    public function attendance(){

        return $this->hasMany(Attendance::class);
    }
}
