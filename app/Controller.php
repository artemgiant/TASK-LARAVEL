<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Controller extends Model
{
    //
    protected $table = 'controllers';

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }


}