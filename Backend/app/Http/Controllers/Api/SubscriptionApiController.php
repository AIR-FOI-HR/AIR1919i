<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

class SubscriptionApiController extends ApiController
{
    /**
     * Subscribes the User to Notifications
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        // Authenticate the User
        if (!$user = auth()->setRequest($request)->user()) return $this->responseUnauthorized();

        // Toggle the subscription depending on the request sent
        $user->subscribed_to_notifications = $request->input('subscribed') == 'yes' ? false : true;
        $user->save();

        // Return the new value
        return response()->json(['value' => $user->subscribed_to_notifications], 200);
    }
}