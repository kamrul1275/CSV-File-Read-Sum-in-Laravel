<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CSVImportController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;

// authentication


Route::get('registration', [AuthController::class, 'registration'])->name('register');

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');

//Route::middleware('auth')->group(function () {

Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');



Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');
//});








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






// Role part...


Route::get('/role', [RoleController::class, 'Index'])->name('role.index');


Route::get('/role/delete/{id}', [RoleController::class, 'Delete'])->name('role.delete');

// permission....

Route::get('/permission', [PermissionController::class, 'Index'])->name('permission.index');



Route::group(['middleware' => 'Superadmin'], function () {


    // Role part...
    Route::get('/role/create', [RoleController::class, 'Create'])->name('role.create');
    Route::post('/role/store', [RoleController::class, 'Store'])->name('role.store');




    // permission part

    Route::get('/permission/create', [PermissionController::class, 'Create'])->name('permission.create');
    Route::post('/permission/store', [PermissionController::class, 'Store'])->name('permission.store');
    Route::get('/permission/delete/{id}', [PermissionController::class, 'Delete'])->name('permission.delete');



    Route::get('/access/permission', [PermissionController::class, 'AccessPermission'])->name('permission.access');
    Route::post('/access/permission/store', [PermissionController::class, 'AccessPermissionStore'])->name('permission.access.store');
});
