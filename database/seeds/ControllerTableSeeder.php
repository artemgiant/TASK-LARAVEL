<?php

use App\Controller;
use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;

class ControllerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $system_controllers = [
          'App\Http\Controllers\Auth\LoginController@showLoginForm',
          'App\Http\Controllers\Auth\LoginController@login',
          'App\Http\Controllers\Auth\LoginController@logout',
          'App\Http\Controllers\Auth\RegisterController@showRegistrationForm',
          'App\Http\Controllers\Auth\RegisterController@register',
          'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm',
          'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail',
          'App\Http\Controllers\Auth\ResetPasswordController@showResetForm',
          'App\Http\Controllers\Auth\ResetPasswordController@reset',
        ];


        $controllers = [];
        foreach (Route::getRoutes()->getRoutes() as $route)
        {
            $action = $route->getAction();
            if (array_key_exists('controller', $action) && !in_array($action['controller'],$system_controllers))
            {
                $SUPER_ADMIN = Role::where('name', 'SUPER ADMIN')->first();
                $ADMIN = Role::where('name', 'ADMIN')->first();
                $Controller_ADMIN = new Controller();
                $Controller_ADMIN->name = $action['controller'];
                $Controller_ADMIN->save();
                if( $action['controller'] == 'App\Http\Controllers\admin\AccountController@index'
                 ||  $action['controller'] == 'App\Http\Controllers\admin\AccountController@openPage'
                 ||  $action['controller'] == 'App\Http\Controllers\HomeController@index'
                )
                    $Controller_ADMIN->roles()->attach($ADMIN);
                $Controller_ADMIN->roles()->attach($SUPER_ADMIN);
                $controllers[] = $action['controller'];
            }
        }
    }
}
