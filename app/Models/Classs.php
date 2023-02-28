<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classs extends Model
{
    use HasFactory;

    protected $fillable=[
    'Class_ID',
    'Name'
      ] ;

    public function user_class_section_section(){
        return $this->belongsToMany(user_class_section_section::class);
      }
}
