<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'meal_id', 'user_id', 'stars', 'comment'
    ];

    /**
     * Rating HAS ONE User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function users()
    {
        return $this->hasOne(User::class);
    }

    /**
     * Rating HAS ONE Meal
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function meal()
    {
        return $this->hasOne(Meal::class);
    }
}