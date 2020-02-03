<?php

namespace App\Http\Controllers\Api;

use App\Rating;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\MealCollection;
use App\Http\Resources\MealResource;
use App\Meal;

class MealApiController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return MealCollection|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$user = auth()->setRequest($request)->user()) return $this->responseUnauthorized();

        $validator = Validator::make($request->all(), ['daily' => 'required|integer|in:0,1']);

        if ($validator->fails()) return $this->responseUnprocessable($validator->errors());

        if ($request->daily) return new MealCollection(
            Meal::whereHas('weeklyMenu', function ($query) {
                $query->where('day', Carbon::today()->dayOfWeek);
            })->get()
            ->transform(function ($el) {
                $el->user_favorites = (string)$el->users->count();
                return $el;
            })
        );

        return Meal::join('weekly_menu', 'meals.id', 'weekly_menu.meal_id')->get()->groupBy('day')->sort();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param  int $id
     * @return MealResource|\Illuminate\Http\JsonResponse
     */
    public function show(Request $request, $id)
    {
        if (!$user = auth()->setRequest($request)->user()) return $this->responseUnauthorized();
        $meal = Meal::findOrFail($id);
        return new MealResource($meal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        if (!$user = auth()->setRequest($request)->user()) return $this->responseUnauthorized();
        try {
            $meal = Meal::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'toggle_favorite' => 'integer|in:0,1',
                'review' => 'integer|:in:0,1',
            ]);

            if ($validator->fails()) return $this->responseUnprocessable($validator->errors());

            if ($request->toggle_favorite) {
                $user->favoriteMeals()->toggle($meal->id);
                return $this->responseResourceUpdated();
            }
            else if ($request->review) {

                $validator = Validator::make($request->all(), [
                    'stars' => 'required|integer|between:1,5',
                    'comment' => 'required|string',
                ]);

                if ($validator->fails()) return $this->responseUnprocessable($validator->errors());

                Rating::create([
                    'meal_id' => $meal->id,
                    'user_id' => $user->id,
                    'stars' => $request->stars,
                    'comment' => $request->comment,
                ]);

                return $this->responseResourceUpdated();
            } else return $this->responseUnauthorized();
        } catch (\Exception $e) {
            return $this->responseServerError('Error updating resource.');
        }
    }
}