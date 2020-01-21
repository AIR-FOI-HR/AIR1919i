<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QRCode extends Model
{
    /**
     * QRCode HAS MANY Users
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'qr_code_user');
    }
}