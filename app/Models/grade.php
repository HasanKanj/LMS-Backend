<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use AjCastro\EagerLoadPivotRelations\EagerLoadPivotTrait;

class grade extends Model
{
    use HasFactory;
use EagerLoadPivotTrait;
    protected $fillable = [
        'name',
        
    ];
    

    public function sections(){
        return $this->belongsToMany(section::class, 'grade_sections', 'grade_id', 'section_id');
    }
}
