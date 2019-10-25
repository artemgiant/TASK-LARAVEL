<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_ADMIN = Role::where('name', 'ADMIN')->first();
        $role_SUPRER_ADMIN  = Role::where('name', 'SUPER ADMIN')->first();
        $admin = new User();
        $admin->name = 'admin@example.com';
        $admin->email = 'admin@example.com';
        $admin->password = bcrypt('12345678');
        $admin->save();
        $admin->roles()->attach($role_ADMIN);
         $superAdmin = new User();
        $superAdmin->name = 'superadmin@example.com';
        $superAdmin->email = 'superadmin@example.com';
        $superAdmin->password = bcrypt('12345678');
        $superAdmin->save();
        $superAdmin->roles()->attach($role_SUPRER_ADMIN);
  }
}
