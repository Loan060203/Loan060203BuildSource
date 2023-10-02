<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyBranchController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\SQLController;
use App\Http\Controllers\UserControllers;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Route::post('/execute_sql', [SQLController::class, 'executeSQL']);
//Route::middleware('query.log')->get('/companies', 'CompanyController.index');
Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
//Route::middleware('log.sql.queries')->get('/companies', 'CompanyController@index');
Route::get('/districts', [DistrictController::class, 'index']);
Route::get('/company_branches', [CompanyBranchController::class, 'index']);

Route::get('/company/{id}', [CompanyController::class, 'show']);
Route::get('/district/{id}', [DistrictController::class, 'show']);
Route::get('/company_branch/{id}', [CompanyBranchController::class, 'show']);

Route::get('/companies/all/list', [CompanyController::class, 'all']);
Route::get('/company_branches/all/list', [CompanyBranchController::class, 'all']);
Route::get('/districts/all/list', [DistrictController::class, 'all']);

Route::post('/companies/store', [CompanyController::class, 'store']);
Route::put('/companies/update/{id}', [CompanyController::class, 'update'])->name('companies.index');

Route::post('/company_branches/store', [CompanyBranchController::class, 'store'])->name('company_branches.index');
Route::put('/company_branches/update/{id}', [CompanyBranchController::class, 'update'])->name('company_branches.update');

Route::post('register', [UserControllers::class, 'register'])->name('register');
Route::post('login', [UserControllers::class, 'login'])->name('login');
