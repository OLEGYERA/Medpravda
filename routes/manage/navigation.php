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


Route::name('manage.navigation.')->middleware('admin')->prefix('manage')->namespace('OLEGYERA\ManageBox')->group(function () {
    Route::get('/administration/manager', 'NavigationController@getAdministrationManager')->name('administration.manager');
    Route::get('/administration/rolling', 'NavigationController@getAdministrationRolling')->name('administration.rolling');

    Route::get('/dependency/term', 'NavigationController@getDependencyTerm')->name('dependency.term');
    Route::get('/dependency/tag', 'NavigationController@getDependencyTag')->name('dependency.tag');
    Route::get('/dependency/substance', 'NavigationController@getDependencySubstance')->name('dependency.substance');
    Route::get('/dependency/inname', 'NavigationController@getDependencyInname')->name('dependency.inname');
    Route::get('/dependency/pharma', 'NavigationController@getDependencyPharma')->name('dependency.pharma');
    Route::get('/dependency/pharma_bad', 'NavigationController@getDependencyPharmaBad')->name('dependency.pharma_bad');

    Route::get('/dependency/form', 'NavigationController@getDependencyForm')->name('dependency.form');
    Route::get('/dependency/fabricator', 'NavigationController@getDependencyFabricator')->name('dependency.fabricator');
    Route::get('/dependency/atx', 'NavigationController@getDependencyATX')->name('dependency.atx');
    Route::get('/dependency/class_bad', 'NavigationController@getDependencyClassBad')->name('dependency.class_bad');
    Route::get('/dependency/class_ware', 'NavigationController@getDependencyClassWare')->name('dependency.class_ware');
    Route::get('/dependency/class_cosmetic', 'NavigationController@getDependencyClassCosmetic')->name('dependency.class_cosmetic');

    Route::get('/manual/drug', 'NavigationController@getManualDrug')->name('manual.drug');
    Route::get('/manual/bad', 'NavigationController@getManualBad')->name('manual.bad');
    Route::get('/manual/ware', 'NavigationController@getManualWare')->name('manual.ware');
    Route::get('/manual/cosmetic', 'NavigationController@getManualCosmetic')->name('manual.cosmetic');


    Route::get('/media/category', 'NavigationController@getMediaCategory')->name('media.category');
    Route::get('/media/structure', 'NavigationController@getMediaStructure')->name('media.structure');
    Route::get('/media/article', 'NavigationController@getManualMedia')->name('media.article');


});
