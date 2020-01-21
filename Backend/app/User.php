<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * User HAS MANY favorite meals
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function favoriteMeals()
    {
        return $this->belongsToMany(Meal::class, 'user_favorite_meals');
    }

    /**
     * User HAS MANY ratings
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function ratings()
    {
        return $this->belongsToMany(Rating::class, 'ratings');
    }

    /**
     * User HAS MANY QRCodes
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function QRCodes()
    {
        return $this->belongsToMany(QRCode::class, 'qr_code_user');
    }
}