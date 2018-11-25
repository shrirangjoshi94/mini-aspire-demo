<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    protected function validateWithJson($data = [], $rules = []) {
        $validator = Validator::make($data, $rules);

        if ($validator->passes()) {
            return true;
        }

        return $validator->getMessageBag();
    }

    protected function respondWithSuccess($message = '', $data = [], $code = 200) {
        return response()->json([
                    'success' => true,
                    'message' => $message,
                    'data' => $data,
                        ], $code);
    }

    protected function respondWithError($message = '', $data = [], $code = 400) {
        return response()->json([
                    'error' => true,
                    'message' => $message,
                    'data' => $data,
                        ], $code);
    }

}
