<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
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
     * Review BELONGS TO User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Review BELONGS TO Meal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }
}