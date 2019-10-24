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

    public function reletedRoles(){
        return DB::table('controller_role')
            ->join('controllers', 'controller_role.controller_id', '=', 'controllers.id')
            ->join('roles', 'controller_role.role_id', '=', 'roles.id')
            ->select('controllers.*','controller_role.*','roles.name AS RoleAdmin')
            ->get();

    }
}