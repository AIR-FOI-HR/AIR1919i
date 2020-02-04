<?php

namespace App\Http\Controllers\Api;

use App\Review;
use Illuminate\Http\Request;
use App\Meal;

class ReviewApiController extends ApiController
{
    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, $id)
    {
        // TODO => Authenticate user based on token or request
//        if (!$user = auth()->setRequest($request)->user()) return $this->responseUnauthorized();
        $meal = Meal::findOrFail($id);
        $reviews = Review::with('user')->orderBy('created_at', 'DESC')->where('meal_id', $meal->id)->get();
        return response()->json([
            'reviews' => $reviews
        ], 200);
    }
}