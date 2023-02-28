<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Models\userlms;
use App\Models\course;
use App\Models\grade;
use App\Models\grade_section;

class UserController extends Controller
{
    //get all users
    public function getUser(Request $request, $id){
        $user= userlms::find($id)->get();

        return response()->json([
            'message'=> $user,
        ]);
    }
   
    //add new user(teacher)
    public function addUser(Request $request){
        $user= new userlms;
        $firstName=$request->input('firstName');
        $lastName=$request->input('lastName');
        $email=$request->input('email');
        $password=$request->input('password');
        $phoneNumber=$request->input('phoneNumber');
        $role=$request->input('role'); 

        $user->firstName=$firstName;
        $user->lastName=$lastName;
        $user->email=$email;
        $user->password=$password;
        $user->role=$role;
        $user->phoneNumber=$phoneNumber;
        $user->save();

        return response()->json([
            'message'=>'DONE!'
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
    public function deleteUser(Request $request, $id){
        $user= userlms::find($id);
        $user->delete();

        return response()->json([
            'message'=>'DONE! User deleted'
        ]);

    }

    // update user
    public function updateUser(Request $request, $id){
        $user= userlms::find($id);
        $user-> update();

        return response()->json([
            'message'=>'DONE! User updated'
        ]);

    }

}
