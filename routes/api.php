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

use App\Http\Controllers\API\Skill\IndexController as SkillIndexController;
use App\Http\Controllers\API\Skill\StoreController as SkillStoreController;
use App\Http\Controllers\API\Skill\ShowController as SkillShowController;
use App\Http\Controllers\API\Skill\UpdateController as SkillUpdateController;
use App\Http\Controllers\API\Skill\DeleteController as SkillDeleteController;

use App\Http\Controllers\API\Education\IndexController as EducationIndexController;
use App\Http\Controllers\API\Education\StoreController as EducationStoreController;
use App\Http\Controllers\API\Education\ShowController as EducationShowController;
use App\Http\Controllers\API\Education\UpdateController as EducationUpdateController;
use App\Http\Controllers\API\Education\DeleteController as EducationDeleteController;

use App\Http\Controllers\API\Experience\IndexController as ExperienceIndexController;
use App\Http\Controllers\API\Experience\StoreController as ExperienceStoreController;
use App\Http\Controllers\API\Experience\ShowController as ExperienceShowController;
use App\Http\Controllers\API\Experience\UpdateController as ExperienceUpdateController;
use App\Http\Controllers\API\Experience\DeleteController as ExperienceDeleteController;
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

    Route::prefix('skill')->group( function() {
        Route::post('/', SkillStoreController::class);
        Route::get('/', SkillIndexController::class);
        Route::get('/{skill}', SkillShowController::class);
        Route::patch('/{skill}', SkillUpdateController::class);
        Route::delete('/{skill}', SkillDeleteController::class);
        
    });

    Route::prefix('education')->group( function() {
        Route::post('/', EducationStoreController::class);
        Route::get('/', EducationIndexController::class);
        Route::get('/{education}', EducationShowController::class);
        Route::patch('/{education}', EducationUpdateController::class);
        Route::delete('/{education}', EducationDeleteController::class);
    });

    Route::prefix('experience')->group( function() {
        Route::post('/', ExperienceStoreController::class);
        Route::get('/', ExperienceIndexController::class);
        Route::get('/{experience}', ExperienceShowController::class);
        Route::patch('/{experience}', ExperienceUpdateController::class);
        Route::delete('/{experience}', ExperienceDeleteController::class);
    });

});


/* Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']); */
