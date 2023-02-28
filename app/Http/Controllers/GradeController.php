<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Models\userlms;
use App\Models\course;
use App\Models\grade;
use App\Models\grade_section;

class GradeController extends Controller
{
    //get by id
    public function getGradeById(Request $request, $id){
        $grade = grade::find($id);
        if(!$grade){
            return response()->json(['message'=> 'Grade not found.'],404);
        }  
        return response()->json([
            'message'=> $grade ,
        ]) ;
    }
   
   
   
    //add new user(teacher)
    public function addGrade(Request $request){
        $grade= new grade;
        $name=$request->input('name');
      
        $grade->name=$name;
    
        $grade->save();

        return response()->json([
            'message'=>'DONE!',
            $grade
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
    public function deleteGrade(Request $request, $id){
        $grade= grade::find($id);
        if(!$grade){
            return response()->json(['message'=> 'Grade not found.'],404);
        } 
        $grade->delete();

        return response()->json([
            'message'=>'DONE! User deleted'
        ]);

    }

    // update user
    public function updateGrade(Request $request, $id){
        $grade= grade::find($id);

        if(! $grade){
            return response()->json(['message'=> 'Grade not found.'],404);
        } 
        $grade->update($request->all());

        return response()->json([
            'message'=>'DONE! User updated',

        ]);
    }
}
