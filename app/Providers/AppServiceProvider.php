<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Role;
use App\Menu;
use App\Task;
use App\User;
use App\Department;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('admin.admins.form',function($view){
            $view->with('role_lists',Role::lists('name','id'));
        });

        view()->composer('layouts.admin.partials.main-sidebar',function($view){
            $view->with('menus',Menu::orderBy('title','asc')->get());
            $view->with('tasks_open',Task::where('status','Open')->get()->count());
            $view->with('tasks_pending',Task::where('status','Pending')->get()->count());
        });

        view()->composer('admin.tasks.create',function($view){
           $view->with('user_lists',User::lists('name','id'));
        });

        view()->composer('agent.myprofile.form',function($view){
            $view->with('department_lists',Department::lists('dept_name','id'));
        });

        Validator::extend('old_password', function ($attribute, $value, $parameters, $validator) {
            return Hash::check($value, current($parameters));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
