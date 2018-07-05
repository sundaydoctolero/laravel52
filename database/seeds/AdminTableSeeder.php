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
        $admin->email = 'sysadmin@cccdms.com';
        $admin->password = 'admin';
        $admin->save();

        $admin = new Admin();
        $admin->name = 'System Admin';
        $admin->username = "support";
        $admin->email = 'support@cccdms.com';
        $admin->password = 'marlonf1';
        $admin->save();

        $admin = new Admin();
        $admin->name = 'System Admin';
        $admin->username = "techmanos";
        $admin->email = 'techmanos@cccdms.com';
        $admin->password = 'PlacidoD2014';
        $admin->save();

        $admin = new Admin();
        $admin->name = 'System Admin';
        $admin->username = "tech_support";
        $admin->email = 'techsupport@cccdms.com';
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
