<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*----- Authenticate all routes. Make sure they are inaccessible except visitor is logged in. -----*/
    Auth::routes();

/*----- Here, we define some generic routes that require only authentication to be accessed. --------*/
    Route::group(['middleware' => 'auth'], function(){

        /*--- Return login page to new visitors. ---*/
        Route::get('/', function () {
            return view('auth.login');
        });

        /** Some Generic routes are defined here.
         *  The /home route is commented cos we don't need it.
         *  The routes we'll be needing are /staff, /crew, /hr, /md and /admin.
         *  These routes are automatically determined by the logged in user's role (assigned at account creation) upon login.
         **/  
            
        //Route::get('/home', 'HomeController@index')->name('welcome');
        //Route::get('/home', 'HomeController@index')->name('home');

        /*--- Employee management routes for both MD and HR user roles. ---*/
        Route::get('/employee/fetch/{id}','HrController@fetch');
        Route::get('/employee/fetchpos/{id}','HrController@fetchpos');
        Route::post('/employee/store', 'HrController@employee_store')->name('employee.store');
        Route::post('/employee/update/{id}', 'HrController@employee_update')->name('employee.update');

        /*--- Weekly and Daily Reports routes for both Crew and HR user roles. ---*/
        Route::post('/report/store', 'ReportController@store')->name('report.store');

        
        /*--- User profile update routes for all user roles. ---*/
        Route::post('/profile/update', 'StaffController@update_profile')->name('myprofile.update');
        
        /*----- HR routes -- Checks if user is has HR priviledges and allows or rejects access to the following routes -----*/
        Route::group(['middleware' => 'CheckHr', 'prefix'=>'hr'], function(){

            /** Employees Routes start here */
            Route::get('/', 'HrController@index')->name('hr.home');
            Route::get('/employees', 'HrController@employees')->name('hr.employees');
            Route::get('/employees-list', 'HrController@employees_list')->name('hr.employees.list');
            Route::get('/employee/create', 'HrController@employee_create')->name('hr.employee.create');
            
            Route::get('/employee/delete/{id}', 'HrController@employee_delete')->name('hr.employee.delete');
            Route::get('/employee/profile/{slug}', 'HrController@employee_profile')->name('hr.employee.profile');
            Route::get('/employees/trashed', 'HrController@employee_trashed')->name('hr.employees.trashed');
            Route::get('/employee/kill/{id}', 'HrController@employee_kill')->name('hr.employee.kill');
            Route::get('/employee/restore/{id}', 'HrController@employee_restore')->name('hr.employee.restore');

            /** Payroll Routes start here */
            Route::get('/employee/payroll/{cat}', 'PayrollController@payroll')->name('hr.payroll');
            Route::get('/employee/payroll/{cat}/{month}', 'PayrollController@payroll_details')->name('hr.payroll.details');
            Route::get('/payroll/fetch/{id}','PayrollController@payslip')->name('hr.payslip');

            Route::post('/employee/payroll/store', 'PayrollController@store')->name('hr.employee.payroll.store');
            Route::get('/employee/payroll/destroy/{payroll}', 'HrController@payslip_destroy')->name('hr.employee.payroll.destroy');
            Route::post('/employee/payroll/update/{id}', 'HrController@payslip_update')->name('hr.employee.payroll.update');
            Route::get('/employee/results', 'HrController@employee_search_results')->name('hr.employee.search_results');
            
            /** Profile Routes start here */
            Route::get('/profile', 'HrController@my_profile')->name('hr.profile');
            
            /** Salary Routes start here */
            Route::get('/salary', 'HrController@mysalary')->name('hr.salary');
            Route::get('/salary/fetch/{id}','HrController@mypayslip')->name('hr.mypayslip');
            
            /** Weekly Report Routes start here */
            Route::get('/weekly-reports', 'ReportController@weekly_reports')->name('hr.reports');
            Route::get('/weekly-report/{cat}/{month}', 'ReportController@reports_details')->name('hr.reports.details');
            Route::post('/weekly-report/update/{id}', 'ReportController@update')->name('hr.report.update');
            Route::get('/weekly-report/delete/{id}', 'ReportController@delete')->name('hr.report.delete');

        });
        //HR routes ends here

        /*-- MD routes -- Checks if user is has MD priviledges and allows or rejects access to the following routes --*/
        Route::group(['middleware' => 'CheckMd', 'prefix'=>'md'], function(){
            
            Route::get('/', 'MdController@index')->name('md.home');
            Route::get('/employees', 'MdController@employees')->name('md.employees');
            Route::get('/employees-list', 'MdController@employees_list')->name('md.employees.list');
            Route::get('/employee/create', 'MdController@employee_create')->name('md.employee.create');

            Route::get('/employee/delete/{id}', 'MdController@employee_delete')->name('md.employee.delete');
            Route::get('/employee/profile/{slug}', 'MdController@employee_profile')->name('md.employee.profile');
            Route::get('/employees/trashed', 'MdController@employee_trashed')->name('md.employees.trashed');
            Route::get('/employee/kill/{id}', 'MdController@employee_kill')->name('md.employee.kill');
            Route::get('/employee/restore/{id}', 'MdController@employee_restore')->name('md.employee.restore');

            /** Payroll Routes start here */
            Route::get('/employee/payroll/{cat}', 'PayrollController@payroll')->name('md.payroll');
            Route::get('/employee/payroll/{cat}/{month}', 'PayrollController@payroll_details')->name('md.payroll.details');
            Route::get('/payroll/fetch/{id}','PayrollController@payslip')->name('md.payslip');

            Route::post('/employee/payroll/store', 'PayrollController@store')->name('md.employee.payroll.store');
            Route::get('/employee/payroll/destroy/{payroll}', 'MdController@payslip_destroy')->name('md.employee.payroll.destroy');
            Route::post('/employee/payroll/update/{id}', 'MdController@payslip_update')->name('md.employee.payroll.update');
            Route::get('/employee/results', 'MdController@employee_search_results')->name('md.employee.search_results');

            /** Reports Routes start here */
            Route::get('/reports/{cat}', 'MdController@reports')->name('reports');
            Route::get('/reports/{cat}/{month}', 'MdController@reports_details')->name('reports.details');
            
            /** Profile Routes start here */
            Route::get('/profile', 'MdController@my_profile')->name('md.profile');

        });
        //MD routes ends here

        /*-- Staff routes -- Checks if user is has Staff priviledges and allows or rejects access to the following routes --*/
        Route::group(['middleware' => 'CheckStaff', 'prefix'=>'staff'], function(){
            
            Route::get('/', 'StaffController@index')->name('staff.home');
            Route::get('/profile', 'StaffController@profile')->name('staff.profile');
            Route::post('/profile/update', 'StaffController@update_profile')->name('staff.profile.update');
            Route::get('/salary', 'StaffController@salary')->name('staff.salary');
            Route::get('/salary/fetch/{id}','StaffController@mypayslip')->name('staff.mypayslip');

        });
        //Staff routes ends here

        /*-- Crew routes -- Checks if user is has Crew priviledges and allows or rejects access to the following routes --*/
        Route::group(['middleware' => 'CheckCrew', 'prefix'=>'crew'], function(){
            
            Route::get('/', 'CrewController@index')->name('crew.home');
            Route::get('/profile', 'CrewController@profile')->name('crew.profile');
            Route::get('/salary', 'CrewController@salary')->name('crew.salary');
            Route::get('/salary/fetch/{id}','CrewController@mypayslip')->name('crew.mypayslip');
            /** Daily Report Routes start here */
            Route::get('/daily-reports', 'ReportController@daily_reports')->name('crew.reports');
            Route::get('/daily-report/{cat}/{month}', 'ReportController@daily_reports_details')->name('crew.reports.details');
            Route::post('/daily-report/update/{id}', 'ReportController@daily_reports_update')->name('crew.report.update');
            Route::get('/daily-report/delete/{id}', 'ReportController@daily_reports_delete')->name('crew.report.delete');

        });
        //Crew routes ends here

        /*-- Admin routes -- Checks if user is has Admin priviledges and allows or rejects access to the following routes ---*/
        Route::group(['middleware' => 'CheckAdmin', 'prefix'=>'admin'], function(){
            
            Route::get('/', 'AdminController@index')->name('admin.home');
            
        });
        //Admin routes ends here

    });


/*-------------Requisition module starts here---------------*/
    Route::get('/requisition/all', 'RequisitionController@index')->name('req_all');
    Route::get('/requisition/view/{rid}', 'RequisitionController@view')->name('req_view');
    Route::get('/requisition/status/{rid}', 'RequisitionController@status')->name('req_status');
    Route::post('/requisition/accept', 'RequisitionController@accept')->name('req_accept');
    Route::post('/requisition/reject', 'RequisitionController@reject')->name('req_reject');
    Route::get('/requisition/new', 'RequisitionController@new')->name('req_new');
    Route::get('/requisition/myrequisitions', 'RequisitionController@myrequisitions')->name('req_myrequsitions');
    Route::get('/requisition/new_frame', 'RequisitionController@newFrame')->name('req_new_frame');
    Route::post('/requisition/insert', 'RequisitionController@insert')->name('req_new_insert');
    Route::post('/requisition/image/{id}', 'RequisitionController@storeImage')->name('req_addImage');
    Route::get('/requisition/accounts', 'RequisitionController@accounts')->name('req_accounts');
    Route::post('/requisition/accounts_insert', 'RequisitionController@insert_accounts')->name('req_insert_acc');
    Route::post('/requisition/account_detail', 'RequisitionController@getAccDetails')->name('req_account_details');
    Route::post('/requisition/hod_detail', 'RequisitionController@getHodDetails')->name('req_hod_details');
    Route::get('/requisition/edit_account/{id}', 'RequisitionController@edit_account')->name('req_edit_account');

/*--------------Requisition module ends here--------------------*/

/*-------------Error pages starts here---------------------------*/
    Route::get('/error/requisition/module', 'ErrorControoler@index')->name('err_req_module');
    Route::get('/error/access_denied', 'ErrorControoler@access')->name('err_access_denied');
/*--------------Error pages ends here--------------------*/