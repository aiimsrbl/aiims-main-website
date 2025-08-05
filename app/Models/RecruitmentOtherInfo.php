<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;


class RecruitmentOtherInfo extends Model
{
    use HasFactory,SoftDeletes;

    public $table = 'recruitment_other_info';

    function createdBy(){
        return $this->belongsTo(User::class,'created_by');
    }

    function updatedBy(){
        return $this->belongsTo(User::class,'updated_by');
    }

    function recruitment(){
        return $this->belongsTo(Recruitment::class,'recruitment_id');
    }
}
