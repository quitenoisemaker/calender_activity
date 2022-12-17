<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sendSuccessResponse($message = "Successful", $data = [], $httpcode = 200)
    {
        return response()->json([
            'message' => $message,
            'status' => $httpcode,
            'data' => $data
        ], $httpcode);
    }

    public function sendErrorResponse($message = "error", $data = [], $httpcode = 501)
    {
        return response()->json([
            'message' => $message,
            'status' => $httpcode,
            'data' => $data
        ], $httpcode);
    }
}
