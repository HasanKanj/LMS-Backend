<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\attendance;
use App\Models\UserClassSection;
use Illuminate\Support\Facades\Log;

class AttendanceController extends Controller
{

    /*********Create attendance */
    public function createAttendance(Request $request,$id){
        
        $student=UserClassSection::where('student_id',$id)->first();
            log::info($student);
        $grade_section_id=$student->grade_section_id;
       

        $attendance=new Attendance;
        $attendance->grade_section_id=$grade_section_id;
        $attendance->student_id=$id;
        $attendance->status=$request->status;
        $attendance->date=Carbon::now;

        $attendance->save();
        return response()->json([
            'message'=>'attendance is created succesfully',
            'data'=>$attendance,
        ]);

    }




    /********* Get All Attendance */
    public function getAll(Request $request) {
        $attendance  = attendance::all();
        return response()->json([
            'message'=> "All the attendences",
            'data'=>$attendance, 200
        ]);
    }

    /*****Get student's attendance by id  */
    public function getByStudent($id){
        $studentAttendance= attendance::where('studentId','=',$id)->get();
        return response()->json([
            'message'=>'All the Attendance for students',
            'data'=>$studentAttendance,200
        ]);
    }
 
      /*****Get student's attendance by id  */
    public function getByGradeSectionId($id){
        $gradeSectioId= attendance::where('gradeSectionId','=',$id)->get();
        return response()->json([
            'message'=>'All the Attendance for students',
            'data'=>$gradeSectioId,200
        ]);
    }

}
