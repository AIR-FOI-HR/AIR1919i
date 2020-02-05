<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QrCode extends Model
{
    /**
     * QrCode BELONGS TO MANY Users
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}