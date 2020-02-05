<?php

namespace App\Http\Controllers\Api;

use App\Review;
use Illuminate\Http\Request;
use App\Meal;

class ReviewApiController extends ApiController
{
    /**
     * Displays all of the Reviews for the given Meal
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, $id)
    {
        // Authenticate the User
        if (!$user = auth()->setRequest($request)->user()) return $this->responseUnauthorized();

        // Find the Meal if it exists
        $meal = Meal::findOrFail($id);

        // Get all of the Reviews for the requested Meal
        $reviews = Review::with('user')->orderBy('created_at', 'DESC')->where('meal_id', $meal->id)->get();

        // Return the data
        return response()->json(['reviews' => $reviews], 200);
    }
}