<?php

namespace App\Http\Controllers\API;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->primary_model = new Order();
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'receipt_id' => 'required',
            'products' => 'required'
        ]);
        if ($validation->fails()) {
            return sendErrorToClient($validation->errors()->first());
        }
        try {
            // assign data to api
            return $this->primary_model->storeOrder($request);

        } catch (\Exception $e) {
            return sendExpToClient($e);
        }

    }
}
