<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Role;
use App\Menu;
use App\Task;
use App\User;
use App\Department;
use App\State;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Permission;
use App\Publication;

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

        view()->composer('admin.roles.form',function($view){
            $view->with('permission_lists',Permission::lists('display_name','id'));
        });

        view()->composer('layouts.admin.partials.main-sidebar',function($view){
            $view->with('menus',Menu::orderBy('title','asc')->get());
            $view->with('tasks_open',Task::where('status','Open')->get()->count());
            $view->with('tasks_pending',Task::where('status','Pending')->get()->count());
        });

        view()->composer('admin.tasks.create',function($view){
           $view->with('user_lists',User::lists('name','id'));
        });

        view()->composer('admin.tsheets.create',function($view){
            $view->with('user_lists',User::lists('name','id'));
        });


        view()->composer('agent.myprofile.form',function($view){
            $view->with('department_lists',Department::lists('dept_name','id'));
        });

        Validator::extend('old_password', function ($attribute, $value, $parameters, $validator) {
            return Hash::check($value, current($parameters));
        });

        view()->composer('admin.publications.form',function($view){
            $issues = ['Daily'=>'Daily',
                        'Weekly'=>'Weekly',
                        'Monthly'=>'Monthly',
                        'Bi-Weekly'=>'Bi-Weekly',
                        'Fornightly'=>'Fornightly',
                        'Quarterly'=>'Quarterly',
                        'Annualy'=>'Annualy'
                        ];
            $view->with('pub_issues',$issues);
            $types = ['Tier1'=>'Tier1',
                        'Tier2'=>'Tier2',
                        'Tier3'=>'Tier3',
                        'Regular'=>'Regular',
                        'Email'=>'Email',
                        'Hard Copy'=>'Hard Copy'
                    ];
            $view->with('pub_types',$types);
            $view->with('state_lists',State::lists('state_code','id'));
        });

        view()->composer('admin.downloads.form',function($view){
            $status = ['For Download'=>'For Download',
                'Pending'=>'Pending',
                'Not Updated'=>'Not Updated',
                'For Query'=>'For Query',
                'For Entry'=>'For Entry',
                'For Output' => 'For Output'
            ];

            $view->with('publication_lists',Publication::lists('publication_name','id'));
            $view->with('status_lists',$status);
        });

        view()->composer('agent.downloads.form',function($view){
            $status = ['For Download'=>'For Download',
                'Pending'=>'Pending',
                'Not Updated'=>'Not Updated',
                'For Query'=>'For Query',
                'For Entry'=>'For Entry',
                'For Output' => 'For Output'
            ];

            $view->with('publication_lists',Publication::lists('publication_name','id'));
            $view->with('status_lists',$status);
        });

        view()->composer('agent.outputs.edit',function($view){
            $status = ['Closed'=>'Closed'];
            $view->with('status_lists',$status);
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
