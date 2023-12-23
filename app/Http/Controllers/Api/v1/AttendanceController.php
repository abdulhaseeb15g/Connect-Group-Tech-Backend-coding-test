<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Employee;
use App\Services\AttendanceService;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    private $attendance_service;
    public function __construct()
    {
        $this->attendance_service = new AttendanceService();
    }

    public function upload(Request $request)
    {

        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');

        if($this->attendance_service->import($file)){

            return response()->json(['success'=>true,'message' => 'Import successful']);
        }else{
            return response()->json(['success'=>false,'message' => 'Something went wrong, Check logs for detailed issue']);
        }

    }

    public function getAttendanceInfo(Request $request, Employee $employee)
    {
        $perPage = $request->input('per_page', 10); // Default items per page is 10
        $page = $request->input('page', 1); // Default page is 1

        $emp_attendance = $this->attendance_service->getAttendance($employee, $perPage, $page);
        return response()->json($emp_attendance);

    }

}
