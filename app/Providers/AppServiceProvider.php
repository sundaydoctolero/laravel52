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
use App\JobNumber;
use Carbon\Carbon;
use App\Day;
use App\Download;
use App\PublicationType;
use App\PublicationIssue;

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

        view()->composer('admin.newspaper_reports.not_updated_reports',function($view){
            $view->with('status_lists',Download::lists('status','status'));
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
            $view->with('pub_issues',PublicationIssue::lists('issue_name','issue_name'));
            $view->with('pub_types',PublicationType::lists('publication_type','publication_type'));
            $view->with('state_lists',State::lists('state_code','id'));
            $view->with('day_lists',Day::lists('day_name','id'));
        });

        view()->composer('admin.downloads.form',function($view){
            $status = ['For Download'=>'For Download',
                'Pending'=>'Pending',
                'Not Updated'=>'Not Updated',
                'For Query'=>'For Query',
                'For Entry'=>'For Entry',
                'For Output' => 'For Output'
            ];

            $view->with('publication_lists',Publication::orderBy('publication_name')->lists('publication_name','id'));
            $view->with('status_lists',$status);
            $view->with('operator_lists',User::lists('operator_no','id'));
        });

        view()->composer('admin.dataentries.form',function($view){
            $status = ['For Download'=>'For Download',
                'Pending'=>'Pending',
                'Not Updated'=>'Not Updated',
                'For Query'=>'For Query',
                'For Entry'=>'For Entry',
                'For Output' => 'For Output'
            ];

            $view->with('publication_lists',Publication::orderBy('publication_name')->lists('publication_name','id'));
            $view->with('status_lists',$status);
            $view->with('operator_lists',User::lists('operator_no','id'));
        });

        view()->composer('admin.outputs.edit',function($view){
            $status = ['Closed'=>'Closed',
                'For Download'=>'For Download',
                'Pending'=>'Pending',
                'Not Updated'=>'Not Updated',
                'For Query'=>'For Query',
                'For Entry'=>'For Entry',
                'For Output' => 'For Output'
            ];

            $view->with('publication_lists',Publication::lists('publication_name','id'));
            $view->with('status_lists',$status);
        });

        view()->composer('admin.newspaper_reports.edit',function($view){
            $status = ['Closed'=>'Closed',
                'For Download'=>'For Download',
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

        view()->composer('agent.tsheets.inline_form',function($view){
            $view->with('job_numbers',JobNumber::where('month_of',Carbon::now()->startOfMonth()->toDateString())->lists('job_number_description','id'));
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
