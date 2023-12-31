<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    use HasFactory;
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function companies()
    {
        return $this->hasMany(Company::class);
    }

}
