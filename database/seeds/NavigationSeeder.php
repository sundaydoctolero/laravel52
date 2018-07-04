<?php

use Illuminate\Database\Seeder;
use App\Menu;

class NavigationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = new Menu();
        $menu->title = 'Admin';
        $menu->url = '/admins';
        $menu->icon = 'fa fa-anchor';
        $menu->save();

        $menu = new Menu();
        $menu->title = 'User';
        $menu->url = '/users';
        $menu->icon = 'fa fa-anchor';
        $menu->save();

        $menu = new Menu();
        $menu->title = 'Department';
        $menu->url = '/departments';
        $menu->icon = 'fa fa-anchor';
        $menu->save();

        $menu = new Menu();
        $menu->title = 'Employee Information';
        $menu->url = '/employees';
        $menu->icon = 'fa fa-anchor';
        $menu->save();

        $menu = new Menu();
        $menu->title = 'Role';
        $menu->url = '/roles';
        $menu->icon = 'fa fa-anchor';
        $menu->save();

        $menu = new Menu();
        $menu->title = 'Navigation';
        $menu->url = '/menus';
        $menu->icon = 'fa fa-anchor';
        $menu->save();
    }
}
