<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

class MyProfileApiController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return bool|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        // Authenticate user
        if (!$user = auth()->setRequest($request)->user()) return $this->responseUnauthorized();

        // Get favorite meals
        $favorite_meals = $user->favoriteMeals;

        // Get number of reviews left
        $number_of_reviews = $user->ratings->count();

        return response()->json([
            'data' => [
                'favorite_meals' => $favorite_meals,
                'number_of_reviews' => $number_of_reviews
        ]], 200);
    }
}