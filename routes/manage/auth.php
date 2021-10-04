<?php
use Illuminate\Http\Request;

/*
 * by Olegyera
|--------------------------------------------------------------------------
| Manage Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Manage routes for MP. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::name('manage.')->prefix('manage')->namespace('OLEGYERA\ManageBox\Auth')->group(function () {
    Route::match(['post', 'get'], '/login/', 'LogInController@login')->name('login');
    Route::match(['post', 'get'], '/forgot/login', 'LogInController@forgotLogin')->name('forgot.login');
    Route::match(['post', 'get'], '/forgot/password', 'LogInController@forgotPass')->name('forgot.password');
});
