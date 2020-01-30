<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

class QRCodeController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return bool|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        if (!$user = auth()->setRequest($request)->user()) return $this->responseUnauthorized();
        return true;
    }
}