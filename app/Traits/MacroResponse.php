<?php

namespace App\Traits;


trait MacroResponse
{

    public function success($data, $httpCode = 200)
    {
        return response()->json([
            'status' => true,
            'data' => $data
        ], $httpCode);
    }

    public function error($message, $httpCode)
    {
        return response()->json([
            'status' => false,
            'message' => $message
        ], $httpCode);
    }
}
