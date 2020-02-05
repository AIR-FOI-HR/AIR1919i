<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

class MyProfileApiController extends ApiController
{
    /**
     * Returns all of the data for the MyProfile section
     *
     * @param Request $request
     * @return bool|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        // Authenticate user
        if (!$user = auth()->setRequest($request)->user()) return $this->responseUnauthorized();

        // Get favorite meals
        $favorite_meals = $user->favoriteMeals()
            ->with('reviews')
            ->select('id', 'name', 'img')
            ->get()
            ->transform(function ($el) {
                $el->stars = round($el->reviews()->sum('stars') / $el->reviews()->count(), 0);
                $el->is_favorite = true;
                return $el;
            });

        // Get number of reviews left
        $number_of_reviews = $user->reviews->count();

        // Return the data
        return response()->json([
            'id' => $user->id,
            'favorite_meals' => $favorite_meals,
            'number_of_reviews' => (string)$number_of_reviews,
            'number_of_favorite_meals' => $favorite_meals->count(),
            'signatures_count' => $user->signatures_count,
            'subscribed_to_notifications' => $user->subscribed_to_notifications ? 'yes' : 'no'
        ], 200);
    }
}