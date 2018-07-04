<?php

use Illuminate\Database\Seeder;
use App\Admin;

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
    }
}
