<?php
/**
 * User Page
 */

Route::get('/','HomeController@index');


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



Route::get('/articles', 'ArticleController@index');  //index
Route::get('/articles/create','ArticleController@create'); //create
Route::get('/articles/{article}', 'ArticleController@show'); //show
Route::post('/articles/create','ArticleController@store'); //store
Route::get('/articles/{article}/edit', 'ArticleController@edit'); //edit
Route::put('/articles/{article}', 'ArticleController@update'); //update
Route::patch('/articles/{article}', 'ArticleController@update'); //update
Route::delete('/articles/{article}', 'ArticleController@destroy'); //delete

//Route::resource('/articles','ArticleController');

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




