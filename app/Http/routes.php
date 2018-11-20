<?php
/**
 * User Page
 */

Route::get('/','HomeController@index');

/**
 * Agent Task Controller
 */
Route::get('/agent/tasks', 'AgentTaskController@index');
Route::get('/agent/tasks/create', 'AgentTaskController@create');
Route::post('/agent/tasks/create','AgentTaskController@store'); //store
Route::get('/agent/tasks/{task}/edit', 'AgentTaskController@edit'); //edit
Route::put('/agent/tasks/{task}', 'AgentTaskController@update'); //update
Route::patch('/agent/tasks/{task}', 'AgentTaskController@update'); //update

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

/**
 * Admin Task Controller
 */
Route::get('/tasks', 'TaskController@index');
Route::get('/tasks/create', 'TaskController@create');
Route::post('/tasks/create','TaskController@store'); //store
Route::get('/tasks/{task}/edit', 'TaskController@edit'); //edit
Route::put('/tasks/{task}', 'TaskController@update'); //update
Route::patch('/tasks/{task}', 'TaskController@update'); //update
Route::delete('/tasks/{task}', 'TaskController@destroy'); //delete

/**
 * Admin Page User Controller
 */
Route::get('/users', 'UserController@index');
Route::get('/users/create', 'UserController@create');
Route::post('/users/create','UserController@store'); //store
Route::get('/users/{user}/edit', 'UserController@edit'); //edit
Route::put('/users/{user}', 'UserController@update'); //update
Route::patch('/users/{user}', 'UserController@update'); //update
Route::patch('/users/{user}/reset_default_password', 'UserController@reset'); //update reset password
Route::delete('/users/{user}', 'UserController@destroy'); //delete

/**
 * Admin Controller
 */
Route::get('/admins', 'AdminController@index');
Route::get('/admins/create', 'AdminController@create');
Route::post('/admins/create','AdminController@store'); //store
Route::get('/admins/{admin}/edit', 'AdminController@edit'); //edit
Route::put('/admins/{admin}', 'AdminController@update'); //update
Route::patch('/admins/{admin}', 'AdminController@update'); //update
Route::delete('/admins/{admin}', 'AdminController@destroy'); //delete
Route::patch('/admins/{admin}/reset_default_password', 'AdminController@reset'); //update reset password

/**
 * Menu Controller
 */
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
 * Workstation Controler
 */
Route::get('/workstations', 'WorkstationController@index');
Route::get('/workstations/create', 'WorkstationController@create');
Route::post('/workstations/create','WorkstationController@store'); //store
Route::get('/workstations/{workstation}/edit', 'WorkstationController@edit'); //edit
Route::put('/workstations/{workstation}', 'WorkstationController@update'); //update
Route::patch('/workstations/{workstation}', 'WorkstationController@update'); //update
Route::delete('/workstations/{workstation}', 'WorkstationController@destroy'); //delete

/**
 * About Controller
 */
Route::get('abouts', 'AboutController@index');
route::get('/abouts/create', 'AboutController@create');
Route::get('/abouts/{about}','AboutController@show');
route::post('/abouts/create', 'AboutController@store');
route::get('/abouts/{about}/edit','AboutController@edit');
Route::put('/abouts/{about}/update','AboutController@update');
Route::patch('/abouts/{about}/update','AboutController@update');
Route::get('/abouts/{about}/delete','AboutController@destroy');

/**
 * Login Controller
 */
Route::get('/logins', 'LoginController@index');
Route::get('/logins/create', 'LoginController@create');
Route::post('/logins/create','LoginController@store'); //store
Route::get('/logins/{login}/edit', 'LoginController@edit'); //edit
Route::put('/logins/{login}', 'LoginController@update'); //update
Route::patch('/logins/{login}', 'LoginController@update'); //update
Route::delete('/logins/{login}', 'LoginController@destroy'); //delete

/**
 * Contact Controller
 */
Route::get('/contacts', 'ContactController@index');
Route::get('/contacts/create', 'ContactController@create');
Route::post('/contacts/create','ContactController@store'); //store
Route::get('/contacts/{contact}/edit', 'ContactController@edit'); //edit
Route::put('/contacts/{contact}', 'ContactController@update'); //update
Route::patch('/contacts/{contact}', 'ContactController@update'); //update
Route::delete('/contacts/{contact}', 'ContactController@destroy'); //delete

/**
 * Profile Controller
 */
Route::get('/myprofile/{employee}/edit', 'ProfileController@edit'); //edit
Route::put('/myprofile/{employee}', 'ProfileController@update'); //update
Route::patch('/myprofile/{employee}', 'ProfileController@update'); //update

/**
 * Job Numbers Controller
 */
Route::get('jobnumbers', 'JobNumberController@index');
Route::get('jobnumbers/create', 'JobNumberController@create');
Route::post('jobnumbers/create','JobNumberController@store'); //store
Route::get('jobnumbers/{jobnumber}/edit', 'JobNumberController@edit'); //edit
Route::put('jobnumbers/{jobnumber}', 'JobNumberController@update'); //update
Route::patch('jobnumbers/{jobnumber}', 'JobNumberController@update'); //update
Route::delete('/jobnumbers/{jobnumber}', 'JobNumberController@destroy'); //delete

/**
 * Agent Tsheet Controller
 */
Route::get('/agent/tsheets', 'AgentTsheetController@index');
Route::get('/agent/tsheets/create', 'AgentTsheetController@create');
Route::post('/agent/tsheets/create','AgentTsheetController@store'); //store
Route::get('/agent/tsheets/{tsheet}/edit', 'AgentTsheetController@edit'); //edit
Route::put('/agent/tsheets/{tsheet}', 'AgentTsheetController@update'); //update
Route::patch('/agent/tsheets/{tsheet}', 'AgentTsheetController@update'); //update

/**
 * Admin Tsheet Controller
 */
Route::get('/tsheets', 'TsheetController@index');
Route::get('/tsheets/create', 'TsheetController@create');
Route::post('/tsheets/create','TsheetController@store'); //store
Route::get('/tsheets/{tsheet}/edit', 'TsheetController@edit'); //edit
Route::put('/tsheets/{tsheet}', 'TsheetController@update'); //update
Route::patch('/tsheets/{tsheet}', 'TsheetController@update'); //update

/**
 * State Controller
 */
Route::get('/states', 'StateController@index');
Route::get('/states/create', 'StateController@create');
Route::post('/states/create','StateController@store'); //store
Route::get('/states/{state}/edit', 'StateController@edit'); //edit
Route::put('/states/{state}', 'StateController@update'); //update
Route::patch('/states/{state}', 'StateController@update'); //update
Route::delete('/states/{state}', 'StateController@destroy'); //delete

/**
 * Publication Controller
 */
Route::get('/publications', 'PublicationController@index');
Route::get('/publications/create', 'PublicationController@create');
Route::post('/publications/create','PublicationController@store'); //store
Route::get('/publications/{publication}/edit', 'PublicationController@edit'); //edit
Route::put('/publications/{publication}', 'PublicationController@update'); //update
Route::patch('/publications/{publication}', 'PublicationController@update'); //update
Route::delete('/publications/{publication}', 'PublicationController@destroy'); //delete

/**
 * Download Controller
 */
Route::get('/downloads', 'DownloadController@index');
Route::get('/downloads/create', 'DownloadController@create');
Route::post('/downloads/create','DownloadController@store'); //store
Route::get('/downloads/{download}/edit', 'DownloadController@edit'); //edit
Route::put('/downloads/{download}', 'DownloadController@update'); //update
Route::patch('/downloads/{download}', 'DownloadController@update'); //update
Route::delete('/downloads/{download}', 'DownloadController@destroy'); //delete

Route::get('/downloads/imports', 'DownloadImportController@import_downloads');


/**
 * DataEntry Controller
 */
Route::get('/dataentries', 'DataEntryController@index');
Route::get('/dataentries/{download}/edit', 'DataEntryController@edit'); //edit
Route::put('/dataentries/{download}', 'DataEntryController@update'); //update
Route::patch('/dataentries/{download}', 'DataEntryController@update'); //update
Route::delete('/dataentries/{download}', 'DataEntryController@destroy'); //delete
Route::patch('/data_entries/{log_sheet}/edit_log_sheet', 'DataEntryController@edit_log_sheet'); //edit
/**
 * Output Controller
 */
Route::get('/outputs', 'OutputController@index');
Route::get('/outputs/{download}/edit', 'OutputController@edit'); //edit
Route::put('/outputs/{download}', 'OutputController@update'); //update
Route::patch('/outputs/{download}', 'OutputController@update'); //update
Route::delete('/outputs/{download}', 'OutputController@destroy'); //delete


/**
 * Agent Download Controller
 */
Route::get('/agent/downloads', 'AgentDownloadController@index');
Route::get('/agent/downloads/create', 'AgentDownloadController@create');
Route::post('/agent/downloads/create','AgentDownloadController@store'); //store
Route::get('/agent/downloads/{download}/edit', 'AgentDownloadController@edit'); //edit
Route::put('/agent/downloads/{download}', 'AgentDownloadController@update'); //update
Route::patch('/agent/downloads/{download}', 'AgentDownloadController@update'); //update
Route::delete('/agent/downloads/{download}', 'AgentDownloadController@destroy'); //delete

/**
 * Agent Entry Controller
 */
Route::get('/agent/entries', 'AgentEntryController@index');
Route::get('/agent/entries/create', 'AgentEntryController@create');
Route::post('/agent/entries/create','AgentEntryController@store'); //store
Route::get('/agent/entries/{download}/edit', 'AgentEntryController@edit'); //edit
Route::put('/agent/entries/{download}', 'AgentEntryController@start_entry'); //update
Route::patch('/agent/entries/{logsheet}', 'AgentEntryController@end_entry'); //update
Route::delete('/agent/entries/{download}', 'AgentEntryController@destroy'); //delete
Route::patch('/agent/entries/{download}/closed_pub', 'AgentEntryController@closed'); //closed publication
Route::patch('/agent/entries/{download}/back', 'AgentEntryController@back_to_entry'); //back to entry

/**
 * Agent Output Controller
 */
Route::get('/agent/outputs', 'AgentOutputController@index');
Route::get('/agent/outputs/create', 'AgentOutputController@create');
Route::post('/agent/outputs/create','AgentOutputController@store'); //store
Route::get('/agent/outputs/{download}/edit', 'AgentOutputController@edit'); //edit
Route::put('/agent/outputs/{download}', 'AgentOutputController@update'); //update
Route::patch('/agent/outputs/{download}', 'AgentOutputController@update'); //update
Route::delete('/agent/outputs/{download}', 'AgentOutputController@destroy'); //delete


Route::post('/agent/output/{output}', 'AgentOutputController@update_output'); //update
Route::post('/agent/output/{download}/create','AgentOutputController@store_output'); //store output details
Route::get('/agent/output/{output}/edit_output', 'AgentOutputController@edit_output'); //edit
Route::get('/agent/output/{download}/log_sheet', 'AgentOutputController@log_sheet'); //get log sheet records
Route::patch('/agent/output/{log_sheet}/modify_log', 'AgentOutputController@modify_log'); //modify log sheet record


/**
 * Newspaper Report Controller
 */
Route::get('/newspaper_reports', 'NewspaperReportController@index');
Route::get('/newspaper_reports/create', 'NewspaperReportController@create');
Route::post('/newspaper_reports/create','NewspaperReportController@store'); //store
Route::get('/newspaper_reports/{download}/edit', 'NewspaperReportController@edit'); //edit
Route::put('/newspaper_reports/{download}', 'NewspaperReportController@update'); //update
Route::patch('/newspaper_reports/{download}', 'NewspaperReportController@update'); //update
Route::delete('/newspaper_reports/{download}', 'NewspaperReportController@destroy'); //delete

Route::patch('/newspaper_reports/{output}/edit_output_details', 'NewspaperReportController@edit_output_details'); //update


Route::get('/newspaper_reports/not_updated_reports', 'NewspaperReportController@not_updated_reports');
Route::get('/newspaper_reports/generate_pub_details', 'NewspaperReportController@generate_pub_details');
Route::get('/newspaper_reports/download', 'NewspaperReportController@download');
Route::get('/newspaper_reports/productivity', 'NewspaperReportController@productivity');
Route::get('/newspaper_reports/monitoring', 'NewspaperReportController@monitoring');
Route::get('/newspaper_reports/quality_control', 'NewspaperReportController@quality_control');
Route::get('/newspaper_reports/monthly_delivery', 'NewspaperReportController@monthly_delivery');
Route::get('/newspaper_reports/not_updated_reports/email', 'NewspaperReportController@send_email_notification');

/**
 * Publication Type Controller
 */
Route::get('/publicationtypes', 'PublicationTypeController@index');
Route::get('/publicationtypes/create', 'PublicationTypeController@create');
Route::post('/publicationtypes/create','PublicationTypeController@store'); //store
Route::get('/publicationtypes/{publicationtype}/edit', 'PublicationTypeController@edit'); //edit
Route::put('/publicationtypes/{publicationtype}', 'PublicationTypeController@update'); //update
Route::patch('/publicationtypes/{publicationtype}', 'PublicationTypeController@update'); //update
Route::delete('/publicationtypes/{publicationtype}', 'PublicationTypeController@destroy'); //delete

/**
 * Publication Issue Controller
 */

Route::get('/publicationissues', 'PublicationIssueController@index');
Route::get('/publicationissues/create', 'PublicationIssueController@create');
Route::post('/publicationissues/create','PublicationIssueController@store'); //store
Route::get('/publicationissues/{publicationissue}/edit', 'PublicationIssueController@edit'); //edit
Route::put('/publicationissues/{publicationissue}', 'PublicationIssueController@update'); //update
Route::patch('/publicationissues/{publicationissue}', 'PublicationIssueController@update'); //update
Route::delete('/publicationissues/{publicationissue}', 'PublicationIssueController@destroy'); //delete


/**
 * Holidays
 */
Route::get('/holidays', 'HolidayController@index');
Route::get('/holidays/create', 'HolidayController@create');
Route::post('/holidays/create','HolidayController@store'); //store
Route::get('/holidays/{holiday}/edit', 'HolidayController@edit'); //edit
Route::put('/holidays/{holiday}', 'HolidayController@update'); //update
Route::patch('/holidays/{holiday}', 'HolidayController@update'); //update
Route::delete('/holidays/{holiday}', 'HolidayController@destroy'); //delete



/**
 *Days Controller
 */
Route::get('/days', 'DayController@index');
Route::get('/days/create', 'DayController@create');
Route::post('/days/create','DayController@store'); //store
Route::get('/days/{day}/edit', 'DayController@edit'); //edit
Route::put('/days/{day}', 'DayController@update'); //update
Route::patch('/days/{day}', 'DayController@update'); //update
Route::delete('/days/{day}', 'DayController@destroy'); //delete

Route::get('/site_images','ImagesController@index');
Route::get('/site_images/create', 'ImagesController@create');
Route::post('/site_images/create','ImagesController@store'); //store
Route::get('/site_images/{images}/edit', 'ImagesController@edit'); //edit
Route::put('/site_images/{images}', 'ImagesController@update'); //update
Route::patch('/site_images/{images}', 'ImagesController@update'); //update
Route::delete('/site_images/{images}', 'ImagesController@destroy'); //delete

Route::resource('/events','EventController');

Route::get('/daily_time_records','DailyTimeRecordController@index');
//Route::get('/site_images/create', 'ImagesController@create');
//Route::post('/site_images/create','ImagesController@store'); //store
//Route::get('/site_images/{images}/edit', 'ImagesController@edit'); //edit
//Route::put('/site_images/{images}', 'ImagesController@update'); //update
//Route::patch('/site_images/{images}', 'ImagesController@update'); //update
//Route::delete('/site_images/{images}', 'ImagesController@destroy'); //delete

/**
 * Exceptions
 */
Route::get('/exceptions', 'ExceptionController@index');
Route::get('/exceptions/create', 'ExceptionController@create');
Route::post('/exceptions/create','ExceptionController@store'); //store
Route::get('/exceptions/{exception}/edit', 'ExceptionController@edit'); //edit
Route::put('/exceptions/{exception}', 'ExceptionController@update'); //update
Route::patch('/exceptions/{exception}', 'ExceptionController@update'); //update
Route::delete('/exceptions/{exception}', 'ExceptionController@destroy'); //delete



Route::post('/daily_time_records','DailyTimeRecordController@upload');
Route::get('/daily_time_records/test','DailyTimeRecordController@test');


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



/**
 *
 * Test Controller Only
 */
Route::get('/agent/deliveries','AgentDeliveryController@index');


/**
 * API Example
 */



Route::get('/api/v1/tests','TestController@index');

Route::group(["prefix" => "api/v1"], function() {
    Route::resource("tests", "TestController");
});

Route::get('/export/not_updated','NewspaperExportController@export_not_updated');
Route::get('/export/generate_pub_details','NewspaperExportController@generate_pub_details');


Route::get('/tests/hello','TestController@test_not_updated');






