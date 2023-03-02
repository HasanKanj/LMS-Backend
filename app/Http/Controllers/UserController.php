<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Models\userlms;
use Illuminate\Support\Facades\Hash;


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

        $request->validate([
            'firstName'=>'required',
            'lastName'=>'required',
            'email'=>'required',
            'password'=>'required',
            'phoneNumber'=>'required',
            'role'=>'required',
        ]);
        $firstName=$request->input('firstName');
        $lastName=$request->input('lastName');
        $email=$request->input('email');
        // $password=$request->input('password');
       $password= Hash::make($request->password);
        $phoneNumber=$request->input('phoneNumber');
        $role=$request->input('role');

        $user->firstName=$firstName;
        $user->lastName=$lastName;
        $user->email=$email;
        $user->password=$password;
        $user->role=$role;
        $user->phoneNumber=$phoneNumber;
        $user->save();

        $token=$user->createToken('tokenss')->plainTextToken;

        return response()->json([
            'message'=>'DONE!',
             'token'=>$token,
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

    //update user
    public function updateUser(Request $request, $id){
        $user= userlms::find($id);
        $user->fill($request->only([
            'firstName',
            'lastName',
            'email',
            // 'password',
            'phoneNumber',
            'role',
        ]));

        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
    
        return response()->json([
            'message'=>'DONE! User updated'
        ]);

    }
    

    //get user by name
    public function getUserByName($firstName){
        return userlms:: where('firstName', 'like', '%' .$firstName.'%')->get();
    }


    //register
    // public function register(Request $request){
    //  $fields= new userlms;
    //     $fields = $request->validate([
    //         'firstName' => 'required|string',
    //         'lastName' => 'required|string',
    //         'email' => 'required|string|unique:users,email',
    //         'password' => 'required|string|confirmed',
    //         'role' => 'required|string',
    //         'phoneNumber' => 'required|string',
    //     ]);
    //     $user = userlms::create([
    //         'firstName' =>$fields['firstName'],
    //         'lastName' =>$fields['lastName'],
    //         'email' =>$fields['email'],
    //         'role' =>$fields['role'],
    //         'phoneNumber' =>$fields['phoneNumber'],
    //         'password' => bcrypt($fields['password'])

    //     ]);
    //     $token=$user->createToken('token')->plainTextToken;

    //       $response=[
    //         'user'=>$user,
    //         'token'=>$token
    //     ];

    //     return response()->json([
    //         'message'=>'user registered done',
    //         'token'=>$token
           
    //     ]);
    // }

    //login
    public function login(Request $request){
        $fields=$request->validate([
                'email'=>'required',
                'password'=>'required'
            ]);
          
            //check
            $user=userlms::where('email',$fields['email'])->first();
    
            if(! $user|| ! Hash::check($fields['password'],$user->password)){
                return response()->json([
                    'message'=>'Bad creds'
                ],401);
            }
            $token=$user->createToken('token')->plainTextToken;
    
            return response()->json([
                'message'=>'Loggedin Successfully',
                'token'=>$token,
            ]);
    }


//logout
public function logout(Request $request){
    auth()->user()->tokens()->delete();

    return response()->json([ 'message'=> 'Logged out Successfully!!']);
}
}
