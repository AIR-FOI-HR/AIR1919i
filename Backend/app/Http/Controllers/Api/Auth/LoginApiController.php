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
        // Get credentials sent
        $credentials = request(['email', 'password']);

        // Validate the token with the credentials
        if (!$token = auth()->attempt($credentials)) return $this->responseUnauthorized();

        // If user sent the firebase token store it to the database
        $user = auth()->user();
        $user->firebase_token = request('firebase_token') ?? null;
        $user->save();

        // Return response with necessary & arbitrary data
        return response()->json([
            'status' => 200,
            'message' => 'Authorized.',
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => [
                'id' => (string)$user->id,
                'name' => $user->name,
                'img' => $user->img ? url('/') . '/' . $user->img : 'NO_IMAGE_SET'
            ]
        ], 200);
    }
}