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

Route::name('api_dependency.substance.')->prefix('v1-mp/api/dependency/substance')->namespace('OLEGYERA\ManageBox\Dependency')->group(function () {
    Route::post('/search', 'SubstanceController@search')->name('search');
    Route::post('/get/all', 'SubstanceController@getSubstances')->name('get.all');
    Route::get('/get/{alias}', 'SubstanceController@getSubstance')->name('get');
    Route::post('/create', 'SubstanceController@createSubstance')->name('create');
    Route::post('/update/{alias}', 'SubstanceController@updateSubstance')->name('update');
    Route::delete('/delete/{id}', 'SubstanceController@deleteSubstance')->name('delete');
    Route::post('/verify', 'SubstanceController@verifyCreatingTitles')->name('verify');
    Route::post('/verify/{alias}', 'SubstanceController@verifyEditingTitles')->name('verify');
});

Route::name('api_dependency.inname.')->prefix('v1-mp/api/dependency/inname')->namespace('OLEGYERA\ManageBox\Dependency')->group(function () {
    Route::post('/search', 'InnameController@search')->name('search');
    Route::post('/get/all', 'InnameController@getInnames')->name('get.all');
    Route::get('/get/{alias}', 'InnameController@getInname')->name('get');
    Route::post('/create', 'InnameController@createInname')->name('create');
    Route::post('/update/{alias}', 'InnameController@updateInname')->name('update');
    Route::delete('/delete/{id}', 'InnameController@deleteInname')->name('delete');
    Route::post('/verify', 'InnameController@verifyCreatingTitles')->name('verify');
    Route::post('/verify/{alias}', 'InnameController@verifyEditingTitles')->name('verify');
});

Route::name('api_dependency.pharma.')->prefix('v1-mp/api/dependency/pharma')->namespace('OLEGYERA\ManageBox\Dependency')->group(function () {
    Route::post('/search', 'PharmaController@search')->name('search');
    Route::post('/get/all', 'PharmaController@getPharmas')->name('get.all');
    Route::get('/get/{alias}', 'PharmaController@getPharma')->name('get');
    Route::post('/create', 'PharmaController@createPharma')->name('create');
    Route::post('/update/{alias}', 'PharmaController@updatePharma')->name('update');
    Route::delete('/delete/{id}', 'PharmaController@deletePharma')->name('delete');
    Route::post('/verify', 'PharmaController@verifyCreatingTitles')->name('verify');
    Route::post('/verify/{alias}', 'PharmaController@verifyEditingTitles')->name('verify');
});

Route::name('api_dependency.pharma_bad.')->prefix('v1-mp/api/dependency/pharma_bad')->namespace('OLEGYERA\ManageBox\Dependency')->group(function () {
    Route::post('/search', 'PharmaBadController@search')->name('search');
    Route::post('/get/all', 'PharmaBadController@getPharmaBads')->name('get.all');
    Route::get('/get/{alias}', 'PharmaBadController@getPharmaBad')->name('get');
    Route::post('/create', 'PharmaBadController@createPharmaBad')->name('create');
    Route::post('/update/{alias}', 'PharmaBadController@updatePharmaBad')->name('update');
    Route::delete('/delete/{id}', 'PharmaBadController@deletePharmaBad')->name('delete');
    Route::post('/verify', 'PharmaBadController@verifyCreatingTitles')->name('verify');
    Route::post('/verify/{alias}', 'PharmaBadController@verifyEditingTitles')->name('verify');
});

Route::name('api_dependency.form.')->prefix('v1-mp/api/dependency/form')->namespace('OLEGYERA\ManageBox\Dependency')->group(function () {
    Route::post('/search', 'FormController@search')->name('search');
    Route::post('/get/all', 'FormController@getForms')->name('get.all');
    Route::get('/get/{alias}', 'FormController@getForm')->name('get');
    Route::post('/create', 'FormController@createForm')->name('create');
    Route::post('/update/{alias}', 'FormController@updateForm')->name('update');
    Route::delete('/delete/{id}', 'FormController@deleteForm')->name('delete');
    Route::post('/verify', 'FormController@verifyCreatingTitles')->name('verify');
    Route::post('/verify/{alias}', 'FormController@verifyEditingTitles')->name('verify');
});

Route::name('api_dependency.fabricator.')->prefix('v1-mp/api/dependency/fabricator')->namespace('OLEGYERA\ManageBox\Dependency')->group(function () {
    Route::post('/search', 'FabricatorController@search')->name('search');
    Route::post('/get/all', 'FabricatorController@getFabricators')->name('get.all');
    Route::get('/get/{alias}', 'FabricatorController@getFabricator')->name('get');
    Route::post('/create', 'FabricatorController@createFabricator')->name('create');
    Route::post('/update/{alias}', 'FabricatorController@updateFabricator')->name('update');
    Route::delete('/delete/{id}', 'FabricatorController@deleteFabricator')->name('delete');
    Route::post('/verify', 'FabricatorController@verifyCreatingTitles')->name('verify.creating');
    Route::post('/verify/{alias}', 'FabricatorController@verifyEditingTitles')->name('verify.editing');
    //location
    Route::post('/{fabricator_alias}/location/search', 'FabricatorController@searchLocation')->name('search.location');
    Route::post('{fabricator_alias}/location/get/all', 'FabricatorController@getLocations')->name('get.all.location');
    Route::get('{fabricator_alias}/location/get/{alias}', 'FabricatorController@getLocation')->name('get.all.location');
    Route::post('{fabricator_alias}/location/create', 'FabricatorController@createFabricatorLocation')->name('create.location');
    Route::post('{fabricator_alias}/location/update/{alias}', 'FabricatorController@updateFabricatorLocation')->name('create.location');
    Route::delete('{fabricator_alias}/location/delete/{id}', 'FabricatorController@deleteFabricatorLocation')->name('delete.location');
    Route::post('{fabricator_alias}/location/verify', 'FabricatorController@verifyCreatingLocationTitles')->name('verify.creating.location');
    Route::post('{fabricator_alias}/location/verify/{alias}', 'FabricatorController@verifyEditingLocationTitles')->name('verify.editing.location');
});


Route::name('api_dependency.atx.')->prefix('v1-mp/api/dependency/atx')->namespace('OLEGYERA\ManageBox\Dependency')->group(function () {
    Route::post('/search', 'ATXController@search')->name('search');
    Route::post('/get/all', 'ATXController@getATXs')->name('get.all');
    Route::get('/get/{class}', 'ATXController@getATX')->name('get');
    Route::get('/get/pre-parent/{class}', 'ATXController@getPreparentATX')->name('get');
    Route::post('/{id}/create', 'ATXController@createATX')->name('create'); //id => parent_id - сделанно для совпадения аргументов в репозитории
    Route::post('/update/{alias}', 'ATXController@updateATX')->name('update');
    Route::delete('/delete/{id}', 'ATXController@deleteATX')->name('delete');
    Route::post('{parent_id}/verify', 'ATXController@verifyCreatingTitles')->name('verify.creating');
    Route::post('verify/{class}', 'ATXController@verifyEditingTitles')->name('verify.editing');
    //search for children atx
    Route::post('{class}/get/all', 'ATXController@getChildrenATXs')->name('get.all.location');
});

Route::name('api_dependency.class_bad.')->prefix('v1-mp/api/dependency/class_bad')->namespace('OLEGYERA\ManageBox\Dependency')->group(function () {
    Route::post('/search', 'ClassBadController@search')->name('search');
    Route::post('/get/all', 'ClassBadController@getClassBads')->name('get.all');
    Route::get('/get/{class}', 'ClassBadController@getClassBad')->name('get');
    Route::get('/get/pre-parent/{class}', 'ClassBadController@getPreparentClassBad')->name('get');
    Route::post('/{id}/create', 'ClassBadController@createClassBad')->name('create'); //id => parent_id - сделанно для совпадения аргументов в репозитории
    Route::post('/update/{alias}', 'ClassBadController@updateClassBad')->name('update');
    Route::delete('/delete/{id}', 'ClassBadController@deleteClassBad')->name('delete');
    Route::post('{parent_id}/verify', 'ClassBadController@verifyCreatingTitles')->name('verify.creating');
    Route::post('verify/{class}', 'ClassBadController@verifyEditingTitles')->name('verify.editing');
    //search fo children bad
    Route::post('{class}/get/all', 'ClassBadController@getChildrenClassBads')->name('get.all.location');
});

Route::name('api_dependency.class_ware.')->prefix('v1-mp/api/dependency/class_ware')->namespace('OLEGYERA\ManageBox\Dependency')->group(function () {
    Route::post('/search', 'ClassWareController@search')->name('search');
    Route::post('/get/all', 'ClassWareController@getClassWares')->name('get.all');
    Route::get('/get/{class}', 'ClassWareController@getClassWare')->name('get');
    Route::get('/get/pre-parent/{class}', 'ClassWareController@getPreparentClassWare')->name('get');
    Route::post('/{id}/create', 'ClassWareController@createClassWare')->name('create'); //id => parent_id - сделанно для совпадения аргументов в репозитории
    Route::post('/update/{alias}', 'ClassWareController@updateClassWare')->name('update');
    Route::delete('/delete/{id}', 'ClassWareController@deleteClassWare')->name('delete');
    Route::post('{parent_id}/verify', 'ClassWareController@verifyCreatingTitles')->name('verify.creating');
    Route::post('verify/{class}', 'ClassWareController@verifyEditingTitles')->name('verify.editing');
    //search fo children ware
    Route::post('{class}/get/all', 'ClassWareController@getChildrenClassWares')->name('get.all.location');
});

Route::name('api_dependency.class_cosmetic.')->prefix('v1-mp/api/dependency/class_cosmetic')->namespace('OLEGYERA\ManageBox\Dependency')->group(function () {
    Route::post('/search', 'ClassCosmeticController@search')->name('search');
    Route::post('/get/all', 'ClassCosmeticController@getClassCosmetics')->name('get.all');
    Route::get('/get/{class}', 'ClassCosmeticController@getClassCosmetic')->name('get');
    Route::get('/get/pre-parent/{class}', 'ClassCosmeticController@getPreparentClassCosmetic')->name('get');
    Route::post('/{id}/create', 'ClassCosmeticController@createClassCosmetic')->name('create'); //id => parent_id - сделанно для совпадения аргументов в репозитории
    Route::post('/update/{alias}', 'ClassCosmeticController@updateClassCosmetic')->name('update');
    Route::delete('/delete/{id}', 'ClassCosmeticController@deleteClassCosmetic')->name('delete');
    Route::post('{parent_id}/verify', 'ClassCosmeticController@verifyCreatingTitles')->name('verify.creating');
    Route::post('verify/{class}', 'ClassCosmeticController@verifyEditingTitles')->name('verify.editing');
    //search fo children cosmetic
    Route::post('{class}/get/all', 'ClassCosmeticController@getChildrenClassCosmetics')->name('get.all.location');
});



Route::name('api_dependency.term.')->prefix('v1-mp/api/dependency/term')->namespace('OLEGYERA\ManageBox\Dependency')->group(function () {
    Route::post('/search', 'TermController@search')->name('search');
    Route::post('/create', 'TermController@createTerm')->name('create');
    Route::post('/get/all', 'TermController@getTerms')->name('get.all');
    Route::get('/get/{alias}', 'TermController@getTerm')->name('get');
    Route::get('/get/id/{id}', 'TermController@getTermID')->name('get');
    Route::post('/create', 'TermController@createTerm')->name('create');
    Route::post('/update/{alias}', 'TermController@updateTerm')->name('update');
    Route::delete('/delete/{id}', 'TermController@deleteTerm')->name('delete');
    Route::post('/verify', 'TermController@verifyCreatingTitles')->name('verify');
    Route::post('/verify/{alias}', 'TermController@verifyEditingTitles')->name('verify');
});


Route::name('api_dependency.tag.')->prefix('v1-mp/api/dependency/tag')->namespace('OLEGYERA\ManageBox\Dependency')->group(function () {
    Route::post('/search', 'TagController@search')->name('search');
    Route::post('/create', 'TagController@createTag')->name('create');
    Route::post('/get/all', 'TagController@getTags')->name('get.all');
    Route::get('/get/{alias}', 'TagController@getTag')->name('get');
    Route::get('/get/id/{id}', 'TagController@getTagID')->name('get');
    Route::post('/create', 'TagController@createTag')->name('create');
    Route::post('/update/{alias}', 'TagController@updateTag')->name('update');
    Route::delete('/delete/{id}', 'TagController@deleteTag')->name('delete');
    Route::post('/verify', 'TagController@verifyCreatingTitles')->name('verify');
    Route::post('/verify/{alias}', 'TagController@verifyEditingTitles')->name('verify');
});







