<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class TeacherController extends Controller
{
    //

    public function AddTeacher (Request $request ){
        $teacher=new User;
        $firstname=$request->input('first_name');
        $lastname=$request->input('last_name');
        $phone_nb=$request->input('phone_nb');
        $email=$request->input('email');
        $password=$request->input('password');
        $role=$request->input('role');
        $teacher->first_name=$firstname;
        $teacher->last_name=$lastname;
        $teacher->phone_nb=$phone_nb;
        $teacher->email=$email;
        $teacher->password=$password;
        $teacher->role=$role;
        $teacher->save();
        return response()->json(['message'=>$request->all()
    ]);
    // $request->validate([
    //     'first_name'=>'required',
    //     'last_name'=>'required',
    //     'phone_nb'=>'required',
    //     'email'=>'required',
    //     'password'=>'required',
    //     'role'=>'required'
    // ]);
    // return User::create($request->all());
    }

    public function getTeacher(Request $request,$id){
        return User::find($id);

        // return response()->json([
        //     'message'=>$teacher,
        // ]);
    }


    public function deleteTeacher(Request $request,$id){
        $teacher=User::find($id);
         $teacher->delete();
        return response()->json([
            'message'=>'Teacher is deleted',
        ]);
    }


    public function search($first_name){
        return User::where('first_name','like','%'.first_name.'%')->get();
    }
}
