<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
  
    protected $fillable=[
    'Course_ID',
    'Subject'
      ] ;

      public function user_class_section_section(){
        return $this->belongsToMany(user_class_section_section::class);
      }
}
