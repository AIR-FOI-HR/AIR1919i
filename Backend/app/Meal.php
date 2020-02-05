<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'price', 'img'
    ];

    /**
     * Meal BELONGS TO MANY users favorites
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_favorite_meals');
    }

    /**
     * Meal HAS MANY reviews
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Meal HAS MANY weekly menus
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function weeklyMenu()
    {
        return $this->hasMany(WeeklyMenu::class);
    }
}