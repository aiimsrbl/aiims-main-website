<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spotlight extends Model
{
    use HasFactory;

    function createdBy(){
        return $this->belongsTo(User::class,'created_by');
    }

    function updatedBy(){
        return $this->belongsTo(User::class,'updated_by');
    }
}
