<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index(){
        return Employee::pluck('name','id')->toArray();
    }
}
