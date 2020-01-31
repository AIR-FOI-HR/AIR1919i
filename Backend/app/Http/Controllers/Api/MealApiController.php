<?php

namespace App\Http\Controllers\Api;

use App\Rating;
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
        // TODO => Check if param weekly or daily sent, if yes return different result
        if (!$user = auth()->setRequest($request)->user()) return $this->responseUnauthorized();
        return new MealCollection(Meal::paginate());
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
        // TODO => Find other reviews
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
            $meal = Meal::findOrFail($id)->firstOrFail();
            if ($request->add_to_favorites) $user->favoriteMeals()->toggle($meal->id);
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