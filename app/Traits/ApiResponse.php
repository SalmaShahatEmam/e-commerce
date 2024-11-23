<?php

namespace App\Traits;

trait ApiResponse
{
    protected function response($data = [], $message = '',  $status = 200)
    {
        $success = $this->isSuccessCode($status);
        return response([
            'data'    => $data,
            'message' => $message,
            'status' => $success,
        ], $status);
    }

    protected function isSuccessCode($status)
    {
        return in_array($status, $this->successCodes());
    }

    protected function successCodes()
    {
        return [
            200, 201, 202
        ];
    }
}
