<?php

namespace App\Http\Controllers\Api;

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
        return new MealCollection(Meal::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$user = auth()->setRequest($request)->user()) return $this->responseUnauthorized();
        $validator = Validator::make($request->all(), ['value' => 'required']);

        if ($validator->fails()) return $this->responseUnprocessable([$validator->errors()]);

        try {
            $meal = Meal::create([
                'user_id' => $user->id,
                'value' => request('value'),
            ]);
            return response()->json([
                'status' => 201,
                'message' => 'Resource created.',
                'id' => $meal->id
            ], 201);
        } catch (\Exception $e) {
            return $this->responseServerError('Error creating resource.');
        }
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
        $meal = Meal::where('id', $id)->firstOrFail();
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
        $validator = Validator::make($request->all(), [
            'value' => 'string',
            'status' => 'in:closed,open',
        ]);

        if ($validator->fails()) return $this->responseUnprocessable($validator->errors());

        try {
            $meal = Meal::where('id', $id)->firstOrFail();
            if ($meal->user_id === $user->id) {
                if (request('value')) $meal->value = request('value');
                if (request('status')) $meal->status = request('status');
                $meal->save();
                return $this->responseResourceUpdated();
            } else {
                return $this->responseUnauthorized();
            }
        } catch (\Exception $e) {
            return $this->responseServerError('Error updating resource.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, $id)
    {
        if (!$user = auth()->setRequest($request)->user()) return $this->responseUnauthorized();
        $meal = Meal::where('id', $id)->firstOrFail();

        if ($meal->user_id !== $user->id) return $this->responseUnauthorized();
        try {
            $meal->delete();
            return $this->responseResourceDeleted();
        } catch (\Exception $e) {
            return $this->responseServerError('Error deleting resource.');
        }
    }
}