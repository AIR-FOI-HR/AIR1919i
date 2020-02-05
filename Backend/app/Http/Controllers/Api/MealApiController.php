<?php

namespace App\Http\Controllers\Api;

use App\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\MealCollection;
use App\Http\Resources\MealResource;
use App\Meal;

class MealApiController extends ApiController
{
    /**
     * Returns the meals depending on the day given
     *
     * @param Request $request
     * @return MealCollection|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Authenticate the user
        if (!$user = auth()->setRequest($request)->user()) return $this->responseUnauthorized();

        // Validate the request (day is required)
        $validator = Validator::make($request->all(), ['day' => 'required|integer|between:0,7']);

        // Return appropriate message if validator fails
        if ($validator->fails()) return $this->responseUnprocessable($validator->errors());

        // Get the day sent
        $day = $request->input('day');

        // Return new MealCollection where the day is today, add reviews, count of user favorites and calculate average star rating
        return new MealCollection(
            Meal::with('reviews')
                ->whereHas('weeklyMenu', function ($query) use ($day) {
                 $query->where('day', $day ?? (Carbon::today()->dayOfWeek ?? 7));
                })
                ->get()
                ->transform(function ($el) {
                    $el->user_favorites = (string)$el->users->count();
                    $el->stars = $el->reviews()->count() != 0 ? round($el->reviews()->sum('stars') / $el->reviews()->count(), 0) : 0;
                    return $el;
                })
        );

    }

    /**
     * Returns the specified Meal data
     *
     * @param Request $request
     * @param  int $id
     * @return MealResource|\Illuminate\Http\JsonResponse
     */
    public function show(Request $request, $id)
    {
        // Authenticate the user
        if (!$user = auth()->setRequest($request)->user()) return $this->responseUnauthorized();

        // Find the requested Meal if it exists
        $meal = Meal::findOrFail($id);

        // Remove 'data' wrapper for the response
        MealResource::withoutWrapping();

        // Return the MealResource and check if it's User's favorite
        return (new MealResource($meal))->isFavorite($user->favoriteMeals->contains($meal->id));
    }

    /**
     * Either toggles the Meal to User's favorites or leaves a Review for a Meal
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        // Authenticate the User
        if (!$user = auth()->setRequest($request)->user()) return $this->responseUnauthorized();
        try {
            // Find the requested Meal if it exists
            $meal = Meal::findOrFail($id);

            // Validate the request
            $validator = Validator::make($request->all(), [
                'toggle_favorite' => 'integer|in:0,1',
                'review' => 'integer|:in:0,1',
            ]);

            // Return the appropriate message if validator fails
            if ($validator->fails()) return $this->responseUnprocessable($validator->errors());

            // If user toggled a Meal, either assign it to his favorites or remove it from his favorites and return the resposne
            if ($request->toggle_favorite) {
                $user->favoriteMeals()->toggle($meal->id);
                return $this->responseResourceUpdated();
            }
            else if ($request->review) {
                // If User left a Review, validate the request
                $validator = Validator::make($request->all(), [
                    'stars' => 'required|numeric|between:1,5',
                    'comment' => 'required|string',
                ]);

                // Return the appropriate response if the validator failed
                if ($validator->fails()) return $this->responseUnprocessable($validator->errors());

                // Create new Review
                Review::create([
                    'meal_id' => $meal->id,
                    'user_id' => $user->id,
                    'stars' => $request->stars,
                    'comment' => $request->comment,
                ]);

                // Return the appropriate response
                return $this->responseResourceUpdated();
            } else return $this->responseUnauthorized();
        } catch (\Exception $e) {
            return $this->responseServerError('Error updating resource.');
        }
    }
}