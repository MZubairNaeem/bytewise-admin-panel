<?php

use Illuminate\Http\Request;
use App\Http\Controllers\FellowManagement\FellowController;
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

//get api to shortlist fellow
Route::get('/fellows/shortlist/{id}', [FellowController::class, 'fellowShortlisted']);
// get api to not shortlist fellow
Route::get('/fellows/not-shortlist/{id}', [FellowController::class, 'fellowNotShortlisted']);
// get api to select fellow
Route::get('/fellows/selected/{id}', [FellowController::class, 'fellowSelected']);
// get api to not select fellow
Route::get('/fellows/not-selected/{id}', [FellowController::class, 'fellowNotSelected']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
