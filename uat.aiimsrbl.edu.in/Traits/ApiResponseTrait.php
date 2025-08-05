<?php
    namespace App\Traits;
    Trait ApiResponseTrait
    {
        public function successResponse($msg = 'Success',$code = SUCCESS,$data = [])
        {
            return response()->json(['success'=>true,'msg'=>$msg,'data'=>$data],$code);
        }

        public function failedResponse($error = 'Failed',$code = BAD_REQUEST,$data = [])
        {
            return response()->json(['success'=>false, 'error'=>$error, 'data'=>$data], $code);
        }

        public function iterateValidationError($errors)
        {
            $errs = [];

            foreach ($errors->toArray() as $key => $arr)
            {
                $errs[$key] = $arr[0];
            }
            return $errs;
        }
    }
?>