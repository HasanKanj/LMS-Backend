<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Schema;
use App\Models\userlms;


class UserController extends Controller
{

    //get all users
    public function getAllUsers(Request $request){
        $users = userlms::all();
        return response()->json([
            'message' => $users
        ]);
    }

    //get user by id
    public function getUserById(Request $request, $id){
        $user = userlms::find($id);
        return response()->json([
            'message' => $user
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


    //delete user
    public function deleteUser(Request $request, $id){
        $user= userlms::find($id);
        $user->delete();

        return response()->json([
            'message'=>'DONE! User deleted'
        ]);

    }

    public function updateUser(Request $request, $id){
        $user= userlms::find($id);
        $user->fill($request->only([
            'firstName',
            'lastName',
            'email',
            'password',
            'phoneNumber',
            'role',
        ]));
        $user->save();
    
        return response()->json([
            'message'=>'DONE! User updated',
            'user'=> $user,
        ]);
    }
    
    

    //get all teachers
    public function getTeacher(){
        $role = "teacher";
        $users = Userlms::where('role', $role)->get();
        return response()->json(['users' => $users]);
    }

    //get all students
    public function getStudents(){
        $role = "student";
        $users = Userlms::where('role', $role)->get();
        return response()->json(['users' => $users]);
    }
    

    //get user by name
    public function getUserByName($firstName){
        return userlms:: where('firstName', 'like', '%' .$firstName.'%')->get();
    }
}
