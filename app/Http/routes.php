<?php
/**
 * User Page
 */

Route::get('/','HomeController@index');

/**
 * Department Controller
 */
Route::get('/departments', 'DepartmentController@index');
Route::get('/departments/create', 'DepartmentController@create');
Route::post('/departments/create','DepartmentController@store'); //store
Route::get('/departments/{department}/edit', 'DepartmentController@edit'); //edit
Route::put('/departments/{department}', 'DepartmentController@update'); //update
Route::patch('/departments/{department}', 'DepartmentController@update'); //update
Route::delete('/departments/{department}', 'DepartmentController@destroy'); //delete

/**
 * Employee Controller
 */
Route::get('/employees', 'EmployeeController@index');
Route::get('/employees/create', 'EmployeeController@create');
Route::post('/employees/create','EmployeeController@store'); //store
Route::get('/employees/{employee}/edit', 'EmployeeController@edit'); //edit
Route::put('/employees/{employee}', 'EmployeeController@update'); //update
Route::patch('/employees/{employee}', 'EmployeeController@update'); //update
Route::delete('/employees/{employee}', 'EmployeeController@destroy'); //delete


Route::get('/agent/tasks', 'AgentTaskController@index');
Route::get('/agent/tasks/create', 'AgentTaskController@create');
Route::post('/agent/tasks/create','AgentTaskController@store'); //store
Route::get('/agent/tasks/{task}/edit', 'AgentTaskController@edit'); //edit
Route::put('/agent/tasks/{task}', 'AgentTaskController@update'); //update
Route::patch('/agent/tasks/{task}', 'AgentTaskController@update'); //update


/**
 * Admin Controller
 */

Route::get('/roles', 'RoleController@index');
Route::get('/roles/create', 'RoleController@create');
Route::post('/roles/create','RoleController@store'); //store
Route::get('/roles/{role}/edit', 'RoleController@edit'); //edit
Route::put('/roles/{role}', 'RoleController@update'); //update
Route::patch('/roles/{role}', 'RoleController@update'); //update
Route::delete('/roles/{role}', 'RoleController@destroy'); //delete


Route::get('/tasks', 'TaskController@index');
Route::get('/tasks/create', 'TaskController@create');
Route::post('/tasks/create','TaskController@store'); //store
Route::get('/tasks/{task}/edit', 'TaskController@edit'); //edit
Route::put('/tasks/{task}', 'TaskController@update'); //update
Route::patch('/tasks/{task}', 'TaskController@update'); //update
Route::delete('/tasks/{task}', 'TaskController@destroy'); //delete


Route::get('/users', 'UserController@index');
Route::get('/users/create', 'UserController@create');
Route::post('/users/create','UserController@store'); //store
Route::get('/users/{user}/edit', 'UserController@edit'); //edit
Route::put('/users/{user}', 'UserController@update'); //update
Route::patch('/users/{user}', 'UserController@update'); //update
Route::delete('/users/{user}', 'UserController@destroy'); //delete


Route::get('/admins', 'AdminController@index');
Route::get('/admins/create', 'AdminController@create');
Route::post('/admins/create','AdminController@store'); //store
Route::get('/admins/{admin}/edit', 'AdminController@edit'); //edit
Route::put('/admins/{admin}', 'AdminController@update'); //update
Route::patch('/admins/{admin}', 'AdminController@update'); //update
Route::delete('/admins/{admin}', 'AdminController@destroy'); //delete


Route::get('/menus', 'MenuController@index');
Route::get('/menus/create', 'MenuController@create');
Route::post('/menus/create','MenuController@store'); //store
Route::get('/menus/{menu}/edit', 'MenuController@edit'); //edit
Route::put('/menus/{menu}', 'MenuController@update'); //update
Route::patch('/menus/{menu}', 'MenuController@update'); //update
Route::delete('/menus/{menu}', 'MenuController@destroy'); //delete


/**
 * Permission Controller
 */
Route::get('/permissions', 'PermissionController@index');
Route::get('/permissions/create', 'PermissionController@create');
Route::post('/permissions/create','PermissionController@store'); //store
Route::get('/permissions/{permission}/edit', 'PermissionController@edit'); //edit
Route::put('/permissions/{permission}', 'PermissionController@update'); //update
Route::patch('/permissions/{permission}', 'PermissionController@update'); //update
Route::delete('/permissions/{permission}', 'PermissionController@destroy'); //delete

/**
 * Password Controller
 */
Route::get('/passwords', 'PasswordController@index');
Route::get('/passwords/create', 'PasswordController@create');
Route::post('/passwords/create','PasswordController@store'); //store
Route::get('/passwords/{password}/edit', 'PasswordController@edit'); //edit
Route::put('/passwords/{password}', 'PasswordController@update'); //update
Route::patch('/passwords/{password}', 'PasswordController@update'); //update
Route::delete('/passwords/{password}', 'PasswordController@destroy'); //delete

/**
 * Assets Controller
 */
Route::get('/assets', 'AssetController@index');
Route::get('/assets/create', 'AssetController@create');
Route::get('/assets/{asset}', 'AssetController@show'); //show
Route::post('/assets/create','AssetController@store'); //store
Route::get('/assets/{asset}/edit', 'AssetController@edit'); //edit
Route::put('/assets/{asset}', 'AssetController@update'); //update
Route::patch('/assets/{asset}', 'AssetController@update'); //update
Route::delete('/assets/{asset}', 'AssetController@destroy'); //delete

/**
 * Backups Controler
 */
Route::get('/backups', 'BackupController@index');
Route::get('/backups/create', 'BackupController@create');
Route::post('/backups/create','BackupController@store'); //store
Route::get('/backups/{backup}/edit', 'BackupController@edit'); //edit
Route::put('/backups/{backup}', 'BackupController@update'); //update
Route::patch('/backups/{backup}', 'BackupController@update'); //update
Route::delete('/backups/{backup}', 'BackupController@destroy'); //delete

/**
 * Auth Controller
 */
Route::auth();



//Admin Auth Controller
    Route::get('/admin/login', 'AdminAuth\AuthController@showLoginForm');
    Route::post('/admin/login', 'AdminAuth\AuthController@login');
    Route::get('/admin/logout', 'AdminAuth\AuthController@logout');


//Registration routes
    Route::get('/admin/register', 'AdminAuth\AuthController@showRegistrationForm');
    Route::post('/admin/register', 'AdminAuth\AuthController@register');

    Route::get('/admin', 'DashboardController@index');

    Route::post('admin/password/email', 'AdminAuth\PasswordController@sendResetLinkEmail');
    Route::post('admin/password/reset', 'AdminAuth\PasswordController@reset');
    Route::get('admin/password/reset/{token?}', 'AdminAuth\PasswordController@showResetForm');




