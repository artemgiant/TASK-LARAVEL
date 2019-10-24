<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Controller extends Model
{
    //

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}