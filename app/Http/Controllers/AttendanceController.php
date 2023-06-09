<?php

namespace App\Http\Controllers;

use App\Models\attendance;
use App\Models\UserGradeSection;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AttendanceController extends Controller
{

    /*********Create attendance */
    public function createAttendance(Request $request, $id)
    {

        $student = UserGradeSection::where('student_id', $id)->first();
        $attendance = null;

        if (!$student) {
            return response()->json([
                'message' => 'No such student_id',
                'data' => $attendance,
            ]);

        } else {
            $grade_section_id = $student->grade_section_id;

            $attendance = attendance::where(['studentId' => $id])->latest()->first();
            if ($attendance && Carbon::now()->format('Y-m-d') == $attendance->date) {
                return response()->json([
                    'message' => 'Attendance already taken',
                    'data' => $attendance,

                ]);

            } else {
                $attendance = new attendance;
                $attendance->gradeSectionId = $grade_section_id;
                $attendance->studentId = $id;
                $attendance->status = $request->status;
                $attendance->date = Carbon::now();

                $attendance->save();
            }

            return response()->json([
                'message' => 'attendance is created succesfully',
                'data' => $attendance,
            ]);
        }
    }

    /********* Get All Attendance */
    public function getAll(Request $request)
    {
        $attendance = attendance::with('Student', 'gradeSection')->get();
        return response()->json([
            'message' => "All the attendences",
            'data' => $attendance, 200,
        ]);
    }

    public function getAttendanceCountBystatus($grade_section_id)
    {
        try {
            $present_attendance = Attendance::where('status', 'Present')
                ->whereDate('date', Carbon::now()->toDateString())
                ->where('gradeSectionId', $grade_section_id)
                ->get();
            $present_count = $present_attendance->count();
            Log::info($present_attendance);

            $absent_attendance = Attendance::where('status', 'Abscent')
                ->whereDate('date', Carbon::now()->toDateString())
                ->where('gradeSectionId', $grade_section_id)
                ->get();
            $absent_count = $absent_attendance->count();
            Log::info($absent_attendance);

            $late_attendance = Attendance::where('status', 'Late')
                ->whereDate('date', Carbon::now()->toDateString())
                ->where('gradeSectionId', $grade_section_id)
                ->get();
            $late_count = $late_attendance->count();
            Log::info($late_attendance);

        } catch (Exception $e) {
            Log::error($e->getMessage());
            return null;
        }

        // Return an array with the count for each status
        return [
            'present' => $present_count,
            'absent' => $absent_count,
            'late' => $late_count,
        ];
    }

    /*****Get student's attendance by id  */
    public function getByStudent($id)
    {
        $studentAttendance = attendance::where('studentId', '=', $id)->with('Student')->get();
        return response()->json([
            'message' => 'All the Attendance for one student',
            'data' => $studentAttendance, 200,
        ]);
    }

    /*****Get gradeSection's attendance by id  */
    public function getByGradeSectionId($id)
    {
        $gradeSectioId = attendance::where('gradeSectionId', '=', $id)->with('gradeSection')->get();
        return response()->json([
            'message' => 'All the Attendance for GradeSection',
            'data' => $gradeSectioId, 200,
        ]);
    }

    public function getAttendeesByGradeidSectionid($gradeid, $sectionid)
    {
        $attendees = DB::table('attendances')
            ->join('grade_sections', 'grade_sections.id', '=', 'attendances.gradeSectionId')
            ->where('grade_sections.section_id', '=', $sectionid)
            ->where('grade_sections.grade_id', '=', $gradeid)
            ->whereDate('attendances.created_at', '=', date('Y-m-d'))
            ->select('attendances.*')
            ->get();

        return response()->json($attendees);
    }
}
