<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\ApiController;

class LoginApiController extends APIController
{
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) return $this->responseUnauthorized();

        $user = auth()->user();

        return response()->json([
            'status' => 200,
            'message' => 'Authorized.',
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => [
                'id' => $user->hashid,
                'name' => $user->name
            ]
        ], 200);
    }
}