<?php

namespace App\Http\Controllers\Api;

use App\Review;
use App\User;
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
        // TODO => Authenticate user based on token or request
//        if (!$user = auth()->setRequest($request)->user()) return $this->responseUnauthorized();


        $validator = Validator::make($request->all(), ['day' => 'required|integer|between:0,7']);

        if ($validator->fails()) return $this->responseUnprocessable($validator->errors());

        $day = $request->input('day');

        return new MealCollection(
            Meal::with('reviews')
                ->whereHas('weeklyMenu', function ($query) use ($day) {
                $query->where('day', $day ?? (Carbon::today()->dayOfWeek ?? 7));
            })
            ->get()
            ->transform(function ($el) {
                $el->user_favorites = (string)$el->users->count();
                $el->stars = round($el->reviews()->sum('stars') / $el->reviews()->count(), 0);
                return $el;
            })
        );
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
//        if (!$user = auth()->setRequest($request)->user()) return $this->responseUnauthorized();
        $user = User::findOrFail(1);
        $meal = Meal::findOrFail($id);
        MealResource::withoutWrapping();
        return (new MealResource($meal))->isFavorite($user->favoriteMeals->contains($meal->id));
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
//        if (!$user = auth()->setRequest($request)->user()) return $this->responseUnauthorized();
        try {
            $user = User::find(1);
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
                    'stars' => 'required|numeric|between:1,5',
                    'comment' => 'required|string',
                ]);

                if ($validator->fails()) return $this->responseUnprocessable($validator->errors());

                Review::create([
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