<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CovidDetailController;
use App\Http\Controllers\HelpAndGuideController;
use Illuminate\Http\Request;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'prefix' => 'auth'

], function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('user', [AuthController::class, 'getAuthUser']);
});

 Route::group([
     'middleware' => ['auth:api', 'auth']
 ], function () {
     Route::post('add-new-help-and-guid', [HelpAndGuideController::class, 'store']);
 });
Route::get('get-all-help-and-guides', [HelpAndGuideController::class, 'index']);
Route::get('get-live-local-covid-updates', [CovidDetailController::class, 'index']);
