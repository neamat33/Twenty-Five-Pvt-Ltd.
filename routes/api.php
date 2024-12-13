<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\JobController;
use App\Http\Controllers\Api\TutorController;
use App\Http\Controllers\Api\HouseRentController;
use App\Http\Controllers\Api\SalesController;
use App\Http\Controllers\Api\ApiController;

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
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});
Route::group(['middleware' => 'api','prefix' => 'user'], function ($router) {
    // Jobs
    Route::get('/jobs', [JobController::class, 'index']);
    Route::post('/jobs/save', [JobController::class, 'store']);
    Route::get('/jobs/edit/{id}', [JobController::class, 'edit']);
    Route::post('/jobs/update', [JobController::class, 'update']);
    Route::post('/jobs/delete', [JobController::class, 'destroy']);
    // Tutors
    Route::get('/tutors', [TutorController::class, 'index']);
    Route::post('/tutors/save', [TutorController::class, 'store']);
    Route::get('/tutors/edit/{id}', [TutorController::class, 'edit']);
    Route::post('/tutors/update', [TutorController::class, 'update']);
    Route::post('/tutors/delete', [TutorController::class, 'destroy']);
    // House Rent
    Route::get('/houserents', [HouseRentController::class, 'index']);
    Route::post('/houserents/save', [HouseRentController::class, 'store']);
    Route::get('/houserents/edit/{id}', [HouseRentController::class, 'edit']);
    Route::post('/houserents/update', [HouseRentController::class, 'update']);
    Route::post('/houserents/delete', [HouseRentController::class, 'destroy']);
    // Sales
    Route::get('/sales', [SalesController::class, 'index']);
    Route::post('/sales/save', [SalesController::class, 'store']);
    Route::get('/sales/edit/{id}', [SalesController::class, 'edit']);
    Route::post('/sales/update', [SalesController::class, 'update']);
    Route::post('/sales/delete', [SalesController::class, 'destroy']);

});
    Route::get('/trending-post', [ApiController::class, 'trendingPost']);
