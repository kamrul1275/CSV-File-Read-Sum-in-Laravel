<?php

use App\Http\Controllers\Auth\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CSVImportController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;

// authentication

Route::get('registration', [AuthController::class, 'registration'])->name('register');

Route::get('login', [AuthController::class, 'index'])->name('login')->middleware('guest');


Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');

Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');




Route::group(['middleware' => 'frontend'], function() {


        Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');


        // user create 
        Route::get('user/create', [AuthController::class, 'user'])->name('user');
        Route::post('user/create', [AuthController::class, 'userStore'])->name('user.post');
        // empolye create
        Route::post('employe/create', [EmployeeController::class, 'EmployeStore'])->name('employe.store');

        // employe csv import 
        Route::get('/', [CSVImportController::class, 'index'])->name('create.employe');
        

        // datatable
        Route::get('/get-employees', [CSVImportController::class, 'getEmployees']);
        Route::post('/import', [CSVImportController::class, 'import']);
        Route::get('/user/profile/{id}', [CSVImportController::class, 'userProfile'])->name('user.profile');
        Route::post('/user/profile/store/{id}', [CSVImportController::class, 'userProfileStore'])->name('user.storeprofile');


        // salary csv import 
        Route::get('/salary', [SalaryController::class, 'index'])->name('create.salary');
        Route::post('/salary/import', [SalaryController::class, 'SalaryImport']);


});






Route::group(['middleware' => 'backend'], function () {

            Route::post('/admin/login',[AdminController::class,'AdminLogin']);
            Route::get('/admin/logout', [AuthController::class, 'Adminlogout'])->name('admin.logout');

            Route::get('/admin/dashboard',[AdminController::class,'AdminDashboard'])->name('admin.dashboard');
            Route::get('/role/pendding',[AdminController::class,'AdminPendding'])->name('role.pendding');
            Route::get('/role/approval/{id}',[AdminController::class,'AdminApproval'])->name('role.approval');
            Route::get('/role/approve',[AdminController::class,'AdminApprove'])->name('role.approve');
            Route::get('/role/approval/pendding/{id}',[AdminController::class,'AdminApprPendding'])->name('role.approval.pendding');

            // Role part...
            Route::get('/role/create', [RoleController::class, 'Create'])->name('role.create');
            Route::post('/role/store', [RoleController::class, 'Store'])->name('role.store');





            //Role part...
            Route::get('/role', [RoleController::class, 'Index'])->name('role.index');
            Route::get('/role/delete/{id}', [RoleController::class, 'Delete'])->name('role.delete');
            //permission....
            Route::get('/permission', [PermissionController::class, 'Index'])->name('permission.index');


            // permission part

            Route::get('/permission/create', [PermissionController::class, 'Create'])->name('permission.create');
            Route::post('/permission/store', [PermissionController::class, 'Store'])->name('permission.store');
            Route::get('/permission/delete/{id}', [PermissionController::class, 'Delete'])->name('permission.delete');


            Route::get('/permission/view', [PermissionController::class, 'permissionView'])->name('permission.view');
            Route::get('/permission/create', [PermissionController::class, 'PermissionCreate'])->name('permission.create');
            Route::get('/permission/edit', [PermissionController::class, 'permissionEdit'])->name('permission.edit');
            Route::get('/permission/delete', [PermissionController::class, 'permissionDelete'])->name('permission.delete');
 });
