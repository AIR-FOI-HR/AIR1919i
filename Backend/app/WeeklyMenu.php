<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeeklyMenu extends Model
{
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
