<?php

namespace App\Http\Controllers;

use App\Models\course;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CourseController extends Controller
{
   public function index()
   {
    $courses=Course::with('UserGradeSection.teacher')->get();
    $uniqueTeachersByCourse = Course::with('UserGradeSection.teacher')
    ->get()
    ->map(function ($course) {
        return [
            'subject' => $course->subject,
            'teachers' => $course->UserGradeSection->map(function($section){
                return $section;
            })->unique('teacher_id')->pluck('teacher')
         ];
    });
    return response(['data'=>$uniqueTeachersByCourse]);
   }



    
    //Create a course
    public function createCourse(Request $request)
    {
        $request->validate(['subject'=>'required']);
        return Course::create($request->all());
    }  


    //Get all course
     public function getAllCourses(){
        return  Course::all();
     }


 //Get course by id
 public function getCourse(request $request,$id){
    $course=course::find($id);
    return response()->json([
     'message' => $course
    ]);
    }

   


//delete a course by id 

     public function deleteById($id)
     {
    Course::destroy($id);
    return response()->json([
     'message'=>'course is deleted',
    ]);

     }


}


