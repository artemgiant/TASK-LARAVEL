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
        $admin->name = 'Employee Name';
        $admin->email = 'employee@example.com';
        $admin->password = bcrypt('secret');
        $admin->save();
        $admin->roles()->attach($role_ADMIN);
         $superAdmin = new User();
        $superAdmin->name = 'Manager Name';
        $superAdmin->email = 'manager@example.com';
        $superAdmin->password = bcrypt('secret');
        $superAdmin->save();
        $superAdmin->roles()->attach($role_SUPRER_ADMIN);
  }
}
