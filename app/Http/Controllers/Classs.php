<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\models\Class;

class ClasssController extends Controller
{
    public function addClass(Request $request){
        $class = new Classs;
        $Class_ID=$request->input('Class_ID');
        $Name=$request->input('Name');
        $class -> save();
        return response()->json([
            'message' => 'Course created successfully',
        ]);
    }

    public function getClasss(Request $request,$id){
        $class = Classs::find() -> get();
        
        return response()->json([
            'message' => $class,
        ]);
    }

}
