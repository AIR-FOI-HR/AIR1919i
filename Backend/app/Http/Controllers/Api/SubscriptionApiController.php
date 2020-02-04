<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;

class SubscriptionApiController extends ApiController
{
    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        // TODO => Authenticate user based on token or request
//        if (!$user = auth()->setRequest($request)->user()) return $this->responseUnauthorized();
        $user = User::findOrFail(1);
        $user->subscribed_to_notifications = $request->input('subscribed') == 'yes' ? false : true;
        $user->save();

        return response()->json(['value' => $user->subscribed_to_notifications], 200);
    }
}