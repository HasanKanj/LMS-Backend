<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Models\grade;
use App\Models\section;
use App\Models\grade_section;

class GradeSectionController extends Controller
{

    //get all grade_sections
    public function getGradeSections(Request $request, $id)
    {
        //
    }
    //get grade_section by id
    public function getGradeSectionById(Request $request, $id)
    {
        $grade_section = grade_section::find($id);
        if (!$grade_section) {
            return response()->json(['message' => 'grade_section not found.'], 404);
        }
        return response()->json([
            'message' => $grade_section,
        ]);
    }



    //add new grade_section
    public function addGradeSection(Request $request)
    {
        $grade_section = new grade_section;
        $capacity = $request->input('capacity');
        $grade_id = $request->input('grade_id');
        //  $section_id = $request->input('section_id');

        $grade_id = grade::find($grade_id);

        $grade_section->capacity = $capacity;
        $grade_section->grade()->associate($grade_id);
        // $grade_section->section()->associate($section_id);  

        $grade_section->save();

        return response()->json([
            'message' => $grade_section
        ]);
    }



    //delete grade_section
    public function deleteGradeSection(Request $request, $id)
    {
        $grade_section = grade_section::find($id);
        if (!$grade_section) {
            return response()->json(['message' => 'grade_section not found.'], 404);
        }
        $grade_section->delete();

        return response()->json([
            'message' => 'DONE! grade_section deleted'
        ]);

    }

    // update grade
    public function updateGradeSection(Request $request, $id)
    {
        $grade_section = grade_section::find($id);
        $grade_section->update();

        return response()->json([
            'message' => 'DONE! grade_section updated'
        ]);


    }
}