<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;


class Tender extends Model
{
    use HasFactory,SoftDeletes;

    function createdBy(){
        return $this->belongsTo(User::class,'created_by');
    }

    function updatedBy(){
        return $this->belongsTo(User::class,'updated_by');
    }

    function corrigendum(){
        return $this->hasMany(Corrigendum::class)->where('status','active');
    }

    static function  procurementLeftMenuData(){

        $data  = [];

        $tenderExpiryDate = Carbon::now()->sub(TENDER_EXPIRY_DAYS,'day')->toDateString();

        $totalTender = Tender::where('status','active')->where('end_date','>=',$tenderExpiryDate)->count();
        $data['current_tender'] = $totalTender;

        $archivedTenders = Tender::where('status','active')->where('end_date','<',$tenderExpiryDate)->count();
        $data['archived_tenders'] = $archivedTenders;

        $totalQuotation = Quotation::where('status','active')->where('end_date','>=',$tenderExpiryDate)->count();
        $data['current_quotation'] = $totalQuotation;

        $archivedQuotation = Quotation::where('status','active')->where('end_date','<',$tenderExpiryDate)->count();
        $data['archived_quotation'] = $archivedQuotation;

        $totalPac = Pac::where('status','active')->count();
        $data['pac'] = $totalPac;
        return $data;
    }
}
