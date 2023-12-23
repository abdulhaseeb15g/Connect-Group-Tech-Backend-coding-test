<?php

namespace App\Imports;

use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class AttendanceImport implements ToModel,WithStartRow
{
    /*
    * Start row for the import (excluding headers).
    *
    * @return int
    */
    public function startRow(): int
    {
        return 2; // Skip the first row (headers)
    }

    /**
     * @param array $row
     *
     * @return Model|null
     */
    public function model(array $row)
    {
        if (empty($row[0]) || empty($row[1])) {
            return null;
        }

        if (empty($row[2]) || empty($row[3])) {
            return null;
        }

        $timestampCheckIn = strtotime($row[2]);
        $timestampCheckOut = strtotime($row[3]);

        // Check if timestamps are valid
        if ($timestampCheckIn === false || $timestampCheckOut === false) {
            return null; // Skip the row if timestamps are not valid
        }

        $checkIn = Carbon::createFromTimestamp($timestampCheckIn);
        $checkOut = Carbon::createFromTimestamp($timestampCheckOut);

        $timeDifference = $checkIn->diff($checkOut);

// Convert the time difference to decimal hours
        $decimalHours = $timeDifference->h + ($timeDifference->i / 60);
        return new Attendance([
            'emp_id' => intval($row[0]),
            'sch_id' => intval($row[1]),
            'check_in' => $checkIn->format('H:i'), // Format the time to 'H:i'
            'check_out' => $checkOut->format('H:i'), // Format the time to 'H:i'
            'worked_hour' => round($decimalHours,2), // Calculate the time difference
        ]);
    }

}
