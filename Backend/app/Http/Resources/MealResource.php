<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MealResource extends JsonResource
{
    protected $is_favorite;

    public function isFavorite($value){
        $this->is_favorite = $value;
        return $this;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'price' => $this->price,
            'name' => $this->name,
            'img' => $this->img,
            'description' => $this->description,
            'favorites_count' => $this->users->count(),
            'reviews_count' => round($this->reviews()->sum('stars') / $this->reviews()->count(), 0),
            'is_favorite' => $this->is_favorite,
            'reviews_counter' => $this->reviews()->count(),
            'stars' => round($this->reviews()->sum('stars') / $this->reviews()->count(), 0),
            'reviews' => $this->reviews()->orderBy('created_at', 'DESC')->with('user')->get()->filter(function ($value, $key) { return $key <= 2;}),
        ];
    }
}
