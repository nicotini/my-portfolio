<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetController;
use App\Http\Controllers\API\About\StoreController as AboutStoreController;
use App\Http\Controllers\API\About\IndexController as AboutIndexController;
use App\Http\Controllers\API\About\ShowController as AboutShowController;
use App\Http\Controllers\API\About\UpdateController as AboutUpdateController;
use App\Http\Controllers\API\About\DeleteController as AboutDeleteController;
use App\Http\Controllers\API\Service\IndexController as ServiceIndexController;
use App\Http\Controllers\API\Service\StoreController as ServiceStoreController;
use App\Http\Controllers\API\Service\ShowController as ServiceShowController;
use App\Http\Controllers\API\Service\UpdateController as ServiceUpdateController;
use App\Http\Controllers\API\Service\DeleteController as ServiceDeleteController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

    
});
Route::middleware('auth:sanctum')->group( function() {
    Route::prefix('about')->group( function() {
        Route::post('/', AboutStoreController::class);
        Route::get('/', AboutIndexController::class);
        Route::get('/{about}', AboutShowController::class);
        Route::patch('/{about}', AboutUpdateController::class);
        Route::delete('/{about}', AboutDeleteController::class);
    });

    Route::prefix('service')->group( function() {
        Route::post('/', ServiceStoreController::class);
        Route::get('/', ServiceIndexController::class);
        Route::get('/{service}', ServiceShowController::class);
        Route::patch('/{service}', ServiceUpdateController::class);
        Route::delete('/{service}', ServiceDeleteController::class); 
    });

});


/* Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']); */
