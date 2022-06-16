<?php

namespace App\Http\Controllers\API;

use App\Models\Recall;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ScrapController extends Controller
{
    public function __construct()
    {
        $this->primary_model = new Recall();
    }

    public function scrapAll(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'access_pass' => 'required'
        ]);
        if ($validation->fails()) {
            return sendErrorToClient($validation->errors()->first());
        }
        try {
            // assign data to api
            return $this->primary_model->scrapAll();

        } catch (\Exception $e) {
            return sendExpToClient($e);
        }

    }

    public function scrapApi(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'access_pass' => 'required'
        ]);
        if ($validation->fails()) {
            return sendErrorToClient($validation->errors()->first());
        }
        try {
            // assign data to api
            return $this->primary_model->scrapApi($request->access_pass);

        } catch (\Exception $e) {
            return sendExpToClient($e);
        }

    }
}
