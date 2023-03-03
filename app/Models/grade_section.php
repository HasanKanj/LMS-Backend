<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use AjCastro\EagerLoadPivotRelations\EagerLoadPivotTrait;
use Illuminate\Database\Eloquent\Relations\Pivot;

class grade_section extends Pivot
{

    use EagerLoadPivotTrait;
    protected $table= 'grade_sections';

    protected $fillable = [
        'capacity',
        ];
 
        public function attendance(){
            return $this->hasMany(attendance::class, 'grade_sections_id');
           }
           public function userGradeSection(){
         $this->hasMany(UserGradeSection::class ,'grade_sections_id');
        }

        public function section(){
            return $this-> belongsToMany(section::class);
        }

}

