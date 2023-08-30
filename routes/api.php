<?php

use App\Http\Controllers\CompanyBranchController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DistrictController;
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


    Route::get('/company', [CompanyController::class, 'index']);
    Route::get('/districts', [DistrictController::class, 'Index']);
    Route::get('/company-branches', [CompanyBranchController::class, 'index']);

    Route::get('/company/{id}', [CompanyController::class, 'show']);
    Route::get('/districts/{id}', [DistrictController::class, 'show']);
    Route::get('/company-branches/{id}', [CompanyBranchController::class, 'show']);


     Route::get('/companies', [CompanyController::class, 'all']);
     Route::get('/CompanyBranches', [CompanyBranchController::class, 'All']);
     Route::get('/Districts', [DistrictController::class, 'All']);
