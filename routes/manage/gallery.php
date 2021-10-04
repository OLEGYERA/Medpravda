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



Route::name('api_gallery.')->prefix('v1-mp/api/gallery')->namespace('OLEGYERA\ManageBox')->group(function () {
    Route::get('/get/{id}', 'GalleryController@getFile')->name('get');
    Route::post('/upload', 'GalleryController@uploadFile')->name('upload');
    Route::post('/get/all', 'GalleryController@getFiles')->name('get.all');
    Route::post('/edit/{id}', 'GalleryController@editFile')->name('edit');
    Route::delete('/delete/{id}', 'GalleryController@deleteFile')->name('delete');
});
