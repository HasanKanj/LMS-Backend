<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Models\userlms;
use App\Models\course;
use App\Models\grade;
use App\Models\grade_section;

class GradeSectionController extends Controller
{
    //get by id
    public function getGradeSectionById(Request $request, $id){
        $grade_section = grade_section::find($id);
        if(!$grade_section){
            return response()->json(['message'=> 'Grade not found.'],404);
        }  
        return response()->json([
            'message'=> $grade_section ,
        ]) ;
    }
   
   
   
    //add new user(teacher)
    public function addGradeSection(Request $request){
        $grade_section= new grade_section;
        $capacity=$request->input('capacity');
        // $grade_id = grade::find('grade_id');
        // $section_id=section::find('section_id');


        $grade_section->capacity=$capacity;
        // $grade_section->grade_id=$grade_id;
        // $grade_section->section_id=$section_id;
        
        $grade_section->save();

        return response()->json([
            'message'=>'DONE!',
            $grade_section
        ]);
    }

     //add new course
    //  public function addCourse(Request $request){
    //     $course= new course;
    //     $subject=$request->input('subject');
      

    //     $course->subject=$subject;
    //     $course->save();

    //     return response()->json([
    //         'message'=>'Course created'
    //     ]);
    // }


    //delete user
    public function deleteGradeSection(Request $request, $id){
        $grade_section= grade_section::find($id);
        if(!$grade_section){
            return response()->json(['message'=> 'Grade not found.'],404);
        } 
        $grade_section->delete();

        return response()->json([
            'message'=>'DONE! User deleted'
        ]);

    }

    // update user
    public function updateGradeSection(Request $request, $id){
        $grade_section= grade_section::find($id);

        if(! $grade_section){
            return response()->json(['message'=> 'Grade not found.'],404);
        } 
        $grade_section->update($request->all());

        return response()->json([
            'message'=>'DONE! User updated',

        ]);
    }
}
