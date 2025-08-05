<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentActivity extends Model
{
    use HasFactory;

    public function images(){
        return $this->hasMany(DepartmentActivityImage::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    function createdBy(){
        return $this->belongsTo(User::class,'created_by');
    }

    function updatedBy(){
        return $this->belongsTo(User::class,'updated_by');
    }
}
