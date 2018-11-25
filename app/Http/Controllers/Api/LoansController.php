<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoansController extends Controller {

    public function create() {

        $rules = [
            'approved_amount' => 'required|integer',
            'loan_tenor' => 'required|integer',
            'currency' => 'required|string',
            'origination_fee_percentage' => 'required|between:1,6',
            'interest_rate' => 'required|between:1,4',
        ];

        $response = $this->validateWithJson(request()->only([
                    'approved_amount', 'loan_tenor', 'currency', 'origination_fee_percentage', 'interest_rate',
                ]), $rules);

        if ($response === true) {
            
            
            
        } else {
            return $this->respondWithError('Data validation failed.', $response);
        }
    }

}
