<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\models\section;

class SectionController extends Controller
{
    public function addSection(Request $request){
    $section = new Section;
    $Section_ID=$request->input('Section_ID');
    $section->section_=$section;
    $section -> save();
    return response()->json([
        'message' => 'Section created successfully',
    ]);}

     public function getSection(Request $request,$id){
        $section = Section::find($id)-> get();
        
        return response()->json([
            'message' => $section,
        ]);
    }
}
