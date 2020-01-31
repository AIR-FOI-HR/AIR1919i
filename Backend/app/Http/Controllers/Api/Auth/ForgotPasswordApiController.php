<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordApiController extends APIController
{
    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function email(Request $request)
    {
        $validator = Validator::make(
            $request->only('email'),
            ['email' => 'required|string|email|max:255|exists:users,email'],
            ['exists' => "We couldn't find an account with that email."]
        );

        if ($validator->fails()) return $this->responseUnprocessable($validator->errors());

        $response = $this->sendResetLinkEmail($request);

        return $response ? $this->responseSuccess('Email reset link sent.') : $this->responseServerError();
    }
}
