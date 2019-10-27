<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_ADMIN = new Role();
        $role_ADMIN->name = 'ADMIN';
        $role_ADMIN->description = 'A Admin User';
        $role_ADMIN->save();
        $role_SUPRES_ADMIN = new Role();
        $role_SUPRES_ADMIN->name = 'SUPER ADMIN';
        $role_SUPRES_ADMIN->description = 'A Super Admin User';
        $role_SUPRES_ADMIN->save();
        $role_SUPRES_ADMIN = new Role();
        $role_SUPRES_ADMIN->name = 'EDIT ADMIN';
        $role_SUPRES_ADMIN->description = 'A EDIT Admin User';
        $role_SUPRES_ADMIN->save();
        $role_SUPRES_ADMIN = new Role();
        $role_SUPRES_ADMIN->name = 'USER';
        $role_SUPRES_ADMIN->description = 'A  User';
        $role_SUPRES_ADMIN->save();


  }
}
