<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeeklyMenu extends Model
{
    // Day 1 is Monday
    // ...
    // Day 6 is Saturday
    // Day 0 is Sunday

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'day', 'meal_id'
    ];

    protected $table = 'weekly_menu';


    /**
     * WeeklyMenu BELONGS TO Meal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }
}
