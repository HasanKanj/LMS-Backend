<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\models\Course;

class CoursesController extends Controller
{
        public function addCourse(Request $request){
        $course = new Course;
        $Course_ID=$request->input('Course_ID');
        $Subject=$request->input('Subject');
        $course -> save();
        return response()->json([
            'message' => 'Course created successfully',
        ]);
    
    }
    
        public function getCourse(Request $request,$id){
            $course = Course::find() -> get();
            
            return response()->json([
                'message' => $course,
            ]);
        }
}
