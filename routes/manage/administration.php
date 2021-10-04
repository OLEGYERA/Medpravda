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

Route::name('api_administration.rule.')->prefix('v1-mp/api/administration/rule')->namespace('OLEGYERA\ManageBox\Administration')->group(function () {
    Route::post('/verify', 'RulesController@verifyRule')->name('verify');
    Route::post('/create', 'RulesController@createRule')->name('create');
    Route::get('/get/{alias}', 'RulesController@getRule')->name('get');
    Route::post('/get/all', 'RulesController@getRules')->name('get.all');
    Route::post('/update/{alias}/status', 'RulesController@updateRuleStatus')->name('update.status');
    Route::post('/update/{alias}/title', 'RulesController@updateRuleTitle')->name('update.title');
    Route::post('/switch/{alias}/category', 'RulesController@switchRuleCategory')->name('switch.category');
    Route::delete('/delete/{id}', 'RulesController@deleteRule')->name('delete');
});

Route::name('api_administration.manager.')->prefix('v1-mp/api/administration/manager')->namespace('OLEGYERA\ManageBox\Administration')->group(function () {
    Route::post('/verify', 'ManagersController@verifyManager')->name('verify');
    Route::post('/create', 'ManagersController@createManager')->name('create');
    Route::get('/get/{email}', 'ManagersController@getManager')->name('get');
    Route::post('/get/all', 'ManagersController@getManagers')->name('get.all');
    Route::post('/update/{email}/avatar', 'ManagersController@updateAvatar')->name('update.avatar');
    Route::post('/update/{email}/rule', 'ManagersController@updateRule')->name('update.rule');
    Route::post('/update/{email}/editor', 'ManagersController@switchEditor')->name('switch.editor');
    Route::post('/update/{email}/email', 'ManagersController@updateEmail')->name('update.email');
    Route::post('/update/{email}/login', 'ManagersController@updateLogin')->name('update.login');
    Route::post('/update/{email}/surname', 'ManagersController@updateSurName')->name('update.surname');
    Route::post('/update/{email}/name', 'ManagersController@updateName')->name('update.name');
    Route::post('/update/{email}/middle_name', 'ManagersController@updateMiddleName')->name('update.middle_name');
    Route::post('/update/{email}/country', 'ManagersController@updateCountry')->name('update.country');
    Route::post('/update/{email}/city', 'ManagersController@updateCity')->name('update.city');

    Route::get('/get/{email}/editor', 'ManagerEditorController@getEditor')->name('get.editor');
    Route::post('/update/{email}/editor/diploms', 'ManagerEditorController@updateEditorDiploms')->name('update.editor.diploms');
    Route::post('/update/{email}/editor/specialty', 'ManagerEditorController@updateEditorSpecialty')->name('update.editor.specialty');
    Route::post('/update/{email}/editor/specialization', 'ManagerEditorController@updateEditorSpecialization')->name('update.editor.specialization');
    Route::post('/update/{email}/editor/rank', 'ManagerEditorController@updateEditorRank')->name('update.editor.rank');
    Route::post('/update/{email}/editor/facebook', 'ManagerEditorController@updateEditorFacebook')->name('update.editor.facebook');
    Route::post('/update/{email}/editor/instagram', 'ManagerEditorController@updateEditorInstagram')->name('update.editor.instagram');
    Route::post('/update/{email}/editor/education', 'ManagerEditorController@updateEditorEducation')->name('update.editor.education');

});
