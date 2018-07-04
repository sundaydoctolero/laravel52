<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = 'Admin';
        $role->display_name = 'Administrator';
        $role->description = 'Account with all access';
        $role->save();

        $role = new Role();
        $role->name = 'User';
        $role->display_name = 'User';
        $role->description = 'Normal user only';
        $role->save();

        $role = new Role();
        $role->name = 'Manager';
        $role->display_name = 'Manager';
        $role->description = 'Limited Admin Access';
        $role->save();

        $role = new Role();
        $role->name = 'Developer';
        $role->display_name = 'System Developer';
        $role->description = 'Full Access';
        $role->save();

        $role = new Role();
        $role->name = 'Guest';
        $role->display_name = 'Guest';
        $role->description = 'Guest Only';
        $role->save();

    }
}
