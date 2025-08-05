<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentActivityImage extends Model
{
    use HasFactory;
    protected $fillable = ['image','title','department_activity_id'];
    public $timestamps  = false;
}
