<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\controllers\UserController;
use App\Http\controllers\LanguageController;
use App\Http\controllers\WorkController;
use App\Http\controllers\ProfileController;
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


Route::apiResource("/v1/user",UserController::class);

Route::apiResource("/v1/language",LanguageController::class);

Route::apiResource("/v1/work",WorkController::class);

Route::apiResource("/v1/profile",ProfileController::class);
