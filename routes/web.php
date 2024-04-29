<?php

use App\Http\Controllers\FellowManagement\FellowController;
use App\Http\Controllers\FormsManagement\FormController;
use App\Http\Controllers\GroupLinkManagement\GroupLinkController;
use App\Http\Controllers\TrackManagement\TrackController;
use App\Http\Controllers\UserManagement\RoleController;
use App\Http\Controllers\UserManagement\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::controller(UserController::class)->group(function () {
    Route::prefix('/user')->group(function () {
        Route::get('/list', 'index')->name('view-users');
        Route::post('/store', 'store')->name('store-user');
        Route::get('/edit/{id}', 'edit')->name('edit-user');
        Route::post('/update/{id}', 'update')->name('update-user');
        Route::delete('/delete/{id}', 'destroy')->name('delete-user');
    });
});
// // role controller
Route::controller(RoleController::class)->group(function () {
    Route::prefix('/roles')->group(function () {
        Route::get('/list', 'index')->name('view-roles');
        Route::get('/add', 'create')->name('add-role');
        Route::post('/store', 'store')->name('store-role');
        Route::get('/edit/{id}', 'edit')->name('edit-role');
        Route::post('/update/{id}', 'update')->name('update-role');
        Route::delete('/delete/{id}', 'destroy')->name('delete-role');
    });
});

// // fellows controller
Route::controller(FellowController::class)->group(function () {
    Route::prefix('/fellows')->group(function () {
        Route::get('/applied/list', 'getAppliedFellows')->name('view-applied-fellows');
        Route::get('/shortlist/list', 'getShortlistedFellows')->name('view-shortlisted-fellows');
        Route::get('/shortlist/{id}', 'fellowShortlisted')->name('shortlist-fellow');
        Route::get('/not-shortlist/{id}', 'fellowNotShortlisted')->name('not-shortlist-fellow');
        Route::post('/selected/{id}', 'fellowSelected')->name('selected-fellow');
        Route::get('/not-selected/{id}', 'fellowNotSelected')->name('not-selected-fellow');

        //fellow details
        Route::get('/applied/details/{id}', 'showApplied')->name('applied-fellow-details');
        Route::get('/shortlist/details/{id}', 'showShortlisted')->name('shortlisted-fellow-details');
        //delete fellow
        Route::delete('/delete/{id}', 'destroy')->name('delete-fellow');
    });
});

// // form controller
Route::controller(FormController::class)->group(function () {
    Route::prefix('/Bytewise-Fellowship')->group(function () {
        Route::get('/apply-for-batch-4', 'applyform')->name('applyform');
        Route::post('/submit-form', 'submitform')->name('submitform');
    });
});

// //track controller
Route::controller(TrackController::class)->group(function () {
    Route::prefix('/tracks')->group(function () {
        Route::get('/fellows/list/{id}', 'trackFellows')->name('view-track-fellows');
    });
});

// // group links
Route::controller(GroupLinkController::class)->group(function () {
    Route::prefix('/group-link')->group(function () {
        Route::get('/list', 'index')->name('view-links');
        Route::post('/store', 'store')->name('store-links');
    });
});
//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
