<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public function detail(){
        return $this->hasOne(Department_detail::class);
    }

    public function activity(){
        return $this->hasOne(DepartmentActivity::class);
    }

    public function faculties(){
        return $this->hasMany(DepartmentFaculty::class)->where(['type'=>'faculty','status'=>'active']);
    }

    public function staff(){
        return $this->hasMany(DepartmentFaculty::class)->where('status','active')->whereIn('type',['staff','residents']);
    }
}
