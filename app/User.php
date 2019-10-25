<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use phpDocumentor\Reflection\Types\Boolean;

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
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * @param string|array $roles
     */
    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) ||
                abort(401, 'This action is unauthorized.');
        }
        return $this->hasRole($roles) ||
            abort(401, 'This action is unauthorized.');
    }
    /**
     * Check multiple roles
     * @param array $roles
     */
    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }
    /**
     * Check one role
     * @param string $role
     */
    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }
    public function getRole($field = null){
        if(!Auth::check())return false;
        $user = Auth::user();
        foreach ($user->roles as $role){
            ($field)?$roles[]=$role->$field:$roles[]=$role;
        }
        return $roles;
    }

    public function isSuperAdmin(): bool
    {
       $roles = $this->getRole('name');
       return in_array ( "SUPER ADMIN", $roles ) || in_array ( "ADMIN", $roles );

    }
    public function accessToController(){
       $roles = $this->getRole('id');
        $currentController = Route::getCurrentRoute()->getActionName();
        $access = null;
        if(count($roles)) {
            foreach ($roles as $role) {
                $data = $this->reletedRoles($role, $currentController);
                dump($data);
                if(count($data)>=1){ $access = true;break;}

            }
            return $access;
        }

    }

    private function reletedRoles($role_id,$currentController)
        {
        return DB::table('controller_role')
            ->join('roles', 'controller_role.role_id', '=', 'roles.id')
            ->join('controllers', 'controller_role.controller_id', '=', 'controllers.id')
            ->where('roles.id','=',$role_id)
            ->where('controllers.name',$currentController)
            ->select('controllers.name AS ControllerName','controller_role.*','roles.name AS RoleUser')
            ->get();

    }


}
