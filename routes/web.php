<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CSVImportController;
use App\Http\Controllers\SalaryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');



// });
Route::get('/', [CSVImportController::class, 'index']);

Route::post('/import', [CSVImportController::class, 'import']);


// salary



Route::get('/salary', [SalaryController::class, 'index']);
Route::post('/salary/import', [SalaryController::class, 'SalaryImport']);