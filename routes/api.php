<?php

use App\Http\Controllers\Api\v1\AttendanceController;
use App\Http\Controllers\api\v1\EmployeesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/attendance/upload', [AttendanceController::class, 'upload']);
Route::get('/attendance/{employee}', [AttendanceController::class, 'getAttendanceInfo']);
Route::get('/attendance', [AttendanceController::class, 'getAttendance']);
Route::get('employees',[EmployeesController::class,'index']);

