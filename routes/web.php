<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CSVImportController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\EmployeeController;

// authentication

Route::get('login', [AuthController::class, 'index'])->name('login');

Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 

Route::get('registration', [AuthController::class, 'registration'])->name('register');

Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 

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