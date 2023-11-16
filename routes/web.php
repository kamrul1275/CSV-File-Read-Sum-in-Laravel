<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CSVImportController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\Auth\AuthController;





// authentication

Route::get('login', [AuthController::class, 'index'])->name('login');

Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 

Route::get('registration', [AuthController::class, 'registration'])->name('register');

Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 

Route::get('dashboard', [AuthController::class, 'dashboard']); 

Route::get('logout', [AuthController::class, 'logout'])->name('logout');


// empolye create


Route::post('employe/create', [AuthController::class, 'EmployeStore'])->name('employe.store'); 




// employe csv import 

Route::get('/', [CSVImportController::class, 'index']);

Route::post('/import', [CSVImportController::class, 'import']);



// salary csv import 

Route::get('/salary', [SalaryController::class, 'index']);
Route::post('/salary/import', [SalaryController::class, 'SalaryImport']);