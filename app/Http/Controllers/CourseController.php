<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //Get all course
     public function getAll(){
        return  Course::all();
     }


//Create a course
     public function createCourse(Request $request)
     {
         $request->validate(['subject'=>'required']);
         return Course::create($request->all());
     }     


//delete a course by id 

     public function deleteById($id)
     {
     return Course::destroy($id);
     }


//search by name
}


