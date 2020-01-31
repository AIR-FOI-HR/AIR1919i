<?php

namespace App\Http\Controllers\Api\Auth;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\ApiController;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordApiController extends APIController
{
    use ResetsPasswords;

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
     * Reset the given user's password.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reset(Request $request)
    {
        if ($request->id) {
            $user = User::where('id', $request->id)->first();
            if ($user) $request->request->add(['email' => $user->email]);
        }

        $validator = Validator::make(
                $request->all(),
            $this->rules(),
            $this->validationErrorMessages()
        );

        if ($validator->fails()) return $this->responseUnprocessable($validator->errors());

        $response = $this->broker()->reset(
            $this->credentials($request),
            function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        return $response == Password::PASSWORD_RESET ? $this->responseSuccess('Password reset successful.') : $this->responseServerError('Password reset failed.');
    }
}