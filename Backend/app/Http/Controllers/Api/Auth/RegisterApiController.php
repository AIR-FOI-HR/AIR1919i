<?php

namespace App\Http\Controllers\Api\Auth;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\ApiController;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterApiController extends APIController
{
    use RegistersUsers;

    public function register(Request $request)
    {
        // Validate the incoming request params
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Return appropriate message if validator fails
        if ($validator->fails()) return $this->responseUnprocessable($validator->errors());

        // Try to create the user
        try {
            $this->create($request->all());
            return $this->responseSuccess('Registered successfully.');
        } catch (\Exception $e) {
            return $this->responseServerError('Registration error.');
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}