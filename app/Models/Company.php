<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function location()
    {
        return $this->belongsTo(Location::class);
    }


    public function managers()
    {
        return $this->hasMany(Manager::class);
    }


    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function assets()
    {
        return $this->hasMany(Asset::class);
    }

    public function companyGroups()
    {
        return $this->hasMany(CompanyGroup::class);
    }


}
