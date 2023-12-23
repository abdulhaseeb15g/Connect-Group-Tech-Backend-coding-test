<?php

namespace App\Services;


use App\Http\Resources\AttendanceResource;
use App\Http\Resources\EmployeeResource;
use App\Imports\AttendanceImport;
use App\Models\Attendance;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class AttendanceService{

    public function import(UploadedFile $uploadedFile){
        try {
            Excel::import(new AttendanceImport, $uploadedFile);
            return true;
        }catch (\Exception $exception){
            Log::error('Error in excel import <br>'.$exception->getMessage().'<br>'.$exception->getTraceAsString());
            return false;
        }

    }

    public function getAttendance(Employee $employee, $perPage = 10, $page = 1)
    {

        $attendance = Attendance::with('employee', 'schedule', 'schedule.shift')
            ->where('emp_id', $employee->id)
            ->paginate($perPage, ['*'], 'page', $page);

        $totalHoursWorked = 0;

        $attendancesWithTotalHours = $attendance->map(function ($attendance) use (&$totalHoursWorked) {
            $totalHoursWorked += $this->calculateTotalHoursWorked(
                Carbon::parse($attendance->check_in),
                Carbon::parse($attendance->check_out)
            );

            return $attendance;
        });

        $employee->total_hours_worked = $totalHoursWorked;

        return [
            'employee'=>new EmployeeResource($employee),
            'attendance'=>AttendanceResource::collection($attendancesWithTotalHours),
          ];

    }

    public function calculateTotalHoursWorked(Carbon $checkIn, Carbon $checkOut): float
    {
        return $checkIn->diffInHours($checkOut);
    }

}
