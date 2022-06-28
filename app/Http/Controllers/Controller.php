<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\JsonResponse;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function error($code, $message, $action = null)
    {
        return response()->json($action ? ['code' => $action, 'message' => $message] : $message, $code);
    }

    public function success($data = null, $status = 200, $message = null)
    {
        return response()->json(['data' => $data, 'message' => $message], $status);
    }

    public function successMessage($message = null, $status = 200)
    {
        return response()->json(['message' => $message], $status);
    }
}
