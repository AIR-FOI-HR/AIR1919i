<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        // TODO => Send authenticated request.
        // Authenticate user
//        if (!$user = auth()->setRequest($request)->user()) return $this->responseUnauthorized();
        $user = User::findOrFail(1);

        // Get favorite meals
        $favorite_meals = $user->favoriteMeals()->select('id', 'name', 'img')->get();

        // Get number of reviews left
        $number_of_reviews = $user->ratings->count();

        return response()->json([
            'favorite_meals' => $favorite_meals,
            'number_of_reviews' => (string)$number_of_reviews,
            'number_of_favorite_meals' => $favorite_meals->count(),
            'signatures_count' => $user->signatures_count
        ], 200);
    }
}