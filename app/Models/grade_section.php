<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use AjCastro\EagerLoadPivotRelations\EagerLoadPivotTrait;
use Illuminate\Database\Eloquent\Relations\Pivot;

class grade_section extends Pivot
{

    use EagerLoadPivotTrait;

    protected $fillable = [
        'capacity',
        ];
 
        public function attendence(){
            return $this->hasMany(Attendence::class,'grade_section_id');
        }

}

