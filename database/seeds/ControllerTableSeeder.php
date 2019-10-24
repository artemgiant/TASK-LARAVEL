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


        $controllers = [];
        foreach (Route::getRoutes()->getRoutes() as $route)
        {
            $action = $route->getAction();
            if (array_key_exists('controller', $action))
            {
                $SUPER_ADMIN = Role::where('name', 'SUPER ADMIN')->first();
                $role_ADMIN = new Controller();
                $role_ADMIN->name = $action['controller'];
                $role_ADMIN->save();
                $role_ADMIN->roles()->attach($SUPER_ADMIN);
                $controllers[] = $action['controller'];
            }
        }
    }
}
