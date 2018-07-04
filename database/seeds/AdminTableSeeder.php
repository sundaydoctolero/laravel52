<?php

use Illuminate\Database\Seeder;
use App\Admin;
use App\User;
use App\Employee;
use App\Department;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin();
        $admin->name = 'System Admin';
        $admin->username = "sysadmin";
        $admin->email = 'admin@example.com';
        $admin->password = 'admin';
        $admin->save();


        $admin = new User();
        $admin->name = 'user';
        $admin->username = "user";
        $admin->email = 'user@example.com';
        $admin->password = 'user';
        $admin->save();

        $admin->employee()->save(new Employee(['department_id' => 1]));


    }
}
