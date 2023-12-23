<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $guarded = [];

    public function employee()
    {
        return $this->belongsTo(Employee::class,'emp_id','id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
