<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class DepartmentFaculty extends Model
{
    use HasFactory,SoftDeletes;

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function designation(){
        return $this->belongsTo(Designation::class);
    }

    function createdBy(){
        return $this->belongsTo(User::class,'created_by');
    }

    function updatedBy(){
        return $this->belongsTo(User::class,'updated_by');
    }
}
