<?php

namespace App\Http\Controllers\Api;

class LogoutApiController extends APIController
{

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();
        return $this->responseSuccess('Successfully logged out.');
    }
}