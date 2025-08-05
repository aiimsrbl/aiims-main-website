<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\ContactUsRequest;
use App\Traits\ApiResponseTrait;
use App\Models\Contactus_inquiry;


class ContactUsController extends Controller
{
    use ApiResponseTrait;

    public function storeInquiry(ContactUsRequest $request){
        try{

            $data = $request->getData();
    
            $obj            = new Contactus_inquiry;
            $obj->name      = $data['name'];
            $obj->email     = $data['email'];
            $obj->phone     = $data['phone'];
            $obj->message   = $data['message'];
            $obj->save();

            if($obj->id > 0)
            {
                return $this->successResponse('Inquiry Sent Successfully');
            }
            else
            {
                return $this->failedResponse(SERVER_ERROR_MSG);
            }
        }
        catch(\Exception $e){
            return $this->failedResponse($e->getMessage());
        }
    }
}
