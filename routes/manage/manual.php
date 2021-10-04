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

//drug
Route::name('api_manual.drug')->prefix('v1-mp/api/manual/drug')->namespace('OLEGYERA\ManageBox\Manual\Drug')->group(function () {
    Route::post('/get/all', 'DrugController@getDrugs')->name('get.all');
    Route::get('/get/{alias}', 'DrugController@getDrug')->name('get');
    Route::delete('/delete/{id}', 'DrugController@deleteDrug')->name('delete');
    Route::post('/verify', 'DrugController@verifyDrug')->name('verify');
    Route::post('/uverify', 'DrugController@uverifyDrug')->name('uverify');
    Route::post('/create', 'DrugController@createDrug')->name('create');
    Route::get('/get/{alias}', 'DrugController@getDrug')->name('get');
    Route::post('/update/{alias}/image', 'DrugController@updateDrugImage')->name('update.image');
    Route::post('/update/{alias}/title', 'DrugController@updateDrugTitle')->name('update.title');
    Route::post('/update/{alias}/utitle', 'DrugController@updateDrugUTitle')->name('update.utitle');
    Route::post('/update/{alias}/dosage', 'DrugController@updateDrugDosage')->name('update.dosage');
    Route::post('/update/{alias}/udosage', 'DrugController@updateDrugUDosage')->name('update.dosage');
    Route::post('/update/{alias}/switch', 'DrugController@SwitchDrugSetting')->name('switch.setting');
    Route::post('/update/{alias}/registration', 'DrugController@updateDrugRegistration')->name('update.registration');
    Route::post('/update/{alias}/uregistration', 'DrugController@updateDrugURegistration')->name('update.uregistration');
    Route::post('/create/{id}/label', 'DrugController@createDrugLabel')->name('create.label');
    Route::delete('/delete/{id}/label', 'DrugController@deleteDrugLabel')->name('delete.label');
    Route::get('/get/{id}/labels', 'DrugController@getDrugLabels')->name('get.labels');
});

Route::name('api_manual.drug.dependency')->prefix('v1-mp/api/manual/drug/dependency')->namespace('OLEGYERA\ManageBox\Manual\Drug')->group(function () {
    Route::get('/get/{alias}', 'DrugDependencyController@getDrugDependency')->name('get');
    Route::post('/update/{alias}/form', 'DrugDependencyController@updateDrugForm')->name('update.form');
    Route::post('/update/{alias}/substances', 'DrugDependencyController@updateDrugSubstances')->name('update.substances');
    Route::post('/update/{alias}/tags', 'DrugDependencyController@updateDrugTags')->name('update.tags');
    Route::post('/update/{alias}/pharma', 'DrugDependencyController@updateDrugPharma')->name('update.pharma');
    Route::post('/update/{alias}/fabricator', 'DrugDependencyController@updateDrugFabricator')->name('update.fabricator');
    Route::post('/update/{alias}/fabricator/location', 'DrugDependencyController@updateDrugFabricatorLocation')->name('update.fabricator.location');
    Route::post('/update/{alias}/atx', 'DrugDependencyController@updateDrugATX')->name('update.atx');
    Route::post('/update/{alias}/inname', 'DrugDependencyController@updateDrugInname')->name('update.inname');
});
Route::name('api_manual.drug.instruction')->prefix('v1-mp/api/manual/drug/instruction')->namespace('OLEGYERA\ManageBox\Manual\Drug')->group(function () {
    Route::get('get/{alias}/{type}/{column}', 'DrugInstructionController@getDrugColumn')->name('get.column');
    Route::post('update/{alias}/{type}/{column}', 'DrugInstructionController@updateDrugColumn')->name('update.column');
});
//bad
Route::name('api_manual.bad')->prefix('v1-mp/api/manual/bad')->namespace('OLEGYERA\ManageBox\Manual\Bad')->group(function () {
    Route::post('/get/all', 'BadController@getBads')->name('get.all');
    Route::get('/get/{alias}', 'BadController@getBad')->name('get');
    Route::delete('/delete/{id}', 'BadController@deleteBad')->name('delete');
    Route::post('/verify', 'BadController@verifyBad')->name('verify');
    Route::post('/uverify', 'BadController@uverifyBad')->name('uverify');
    Route::post('/create', 'BadController@createBad')->name('create');
    Route::get('/get/{alias}', 'BadController@getBad')->name('get');
    Route::post('/update/{alias}/image', 'BadController@updateBadImage')->name('update.image');
    Route::post('/update/{alias}/title', 'BadController@updateBadTitle')->name('update.title');
    Route::post('/update/{alias}/utitle', 'BadController@updateBadUTitle')->name('update.utitle');
    Route::post('/update/{alias}/dosage', 'BadController@updateBadDosage')->name('update.dosage');
    Route::post('/update/{alias}/udosage', 'BadController@updateBadUDosage')->name('update.dosage');
    Route::post('/update/{alias}/switch', 'BadController@SwitchBadSetting')->name('switch.setting');
    Route::post('/update/{alias}/registration', 'BadController@updateBadRegistration')->name('update.registration');
    Route::post('/update/{alias}/uregistration', 'BadController@updateBadURegistration')->name('update.uregistration');
});
Route::name('api_manual.bad.dependency')->prefix('v1-mp/api/manual/bad/dependency')->namespace('OLEGYERA\ManageBox\Manual\Bad')->group(function () {
    Route::get('/get/{alias}', 'BadDependencyController@getBadDependency')->name('get');
    Route::post('/update/{alias}/tags', 'BadDependencyController@updateBadTags')->name('update.tags');
    Route::post('/update/{alias}/pharma_bad', 'BadDependencyController@updateBadPharma')->name('update.pharma');
    Route::post('/update/{alias}/fabricator', 'BadDependencyController@updateBadFabricator')->name('update.fabricator');
    Route::post('/update/{alias}/fabricator/location', 'BadDependencyController@updateBadFabricatorLocation')->name('update.fabricator.location');
    Route::post('/update/{alias}/bad_classification', 'BadDependencyController@updateBadClassification')->name('update.bad_classification');
});
Route::name('api_manual.bad.instruction')->prefix('v1-mp/api/manual/bad/instruction')->namespace('OLEGYERA\ManageBox\Manual\Bad')->group(function () {
    Route::get('get/{alias}/{type}/{column}', 'BadInstructionController@getBadColumn')->name('get.column');
    Route::post('update/{alias}/{type}/{column}', 'BadInstructionController@updateBadColumn')->name('update.column');
});
//ware
Route::name('api_manual.ware')->prefix('v1-mp/api/manual/ware')->namespace('OLEGYERA\ManageBox\Manual\Ware')->group(function () {
    Route::post('/get/all', 'WareController@getWares')->name('get.all');
    Route::get('/get/{alias}', 'WareController@getWare')->name('get');
    Route::delete('/delete/{id}', 'WareController@deleteWare')->name('delete');
    Route::post('/verify', 'WareController@verifyWare')->name('verify');
    Route::post('/uverify', 'WareController@uverifyWare')->name('uverify');
    Route::post('/create', 'WareController@createWare')->name('create');
    Route::get('/get/{alias}', 'WareController@getWare')->name('get');
    Route::post('/update/{alias}/image', 'WareController@updateWareImage')->name('update.image');
    Route::post('/update/{alias}/title', 'WareController@updateWareTitle')->name('update.title');
    Route::post('/update/{alias}/utitle', 'WareController@updateWareUTitle')->name('update.utitle');
    Route::post('/update/{alias}/dosage', 'WareController@updateWareDosage')->name('update.dosage');
    Route::post('/update/{alias}/udosage', 'WareController@updateWareUDosage')->name('update.dosage');
    Route::post('/update/{alias}/switch', 'WareController@SwitchWareSetting')->name('switch.setting');
    Route::post('/update/{alias}/registration', 'WareController@updateWareRegistration')->name('update.registration');
    Route::post('/update/{alias}/uregistration', 'WareController@updateWareURegistration')->name('update.uregistration');
});
Route::name('api_manual.ware.dependency')->prefix('v1-mp/api/manual/ware/dependency')->namespace('OLEGYERA\ManageBox\Manual\Ware')->group(function () {
    Route::get('/get/{alias}', 'WareDependencyController@getWareDependency')->name('get');
    Route::post('/update/{alias}/fabricator', 'WareDependencyController@updateWareFabricator')->name('update.fabricator');
    Route::post('/update/{alias}/fabricator/location', 'WareDependencyController@updateWareFabricatorLocation')->name('update.fabricator.location');
    Route::post('/update/{alias}/ware_classification', 'WareDependencyController@updateWareClassification')->name('update.ware_classification');
});
Route::name('api_manual.ware.instruction')->prefix('v1-mp/api/manual/ware/instruction')->namespace('OLEGYERA\ManageBox\Manual\Ware')->group(function () {
    Route::get('get/{alias}/{type}/{column}', 'WareInstructionController@getWareColumn')->name('get.column');
    Route::post('update/{alias}/{type}/{column}', 'WareInstructionController@updateWareColumn')->name('update.column');
});
//cosmetic
Route::name('api_manual.cosmetic')->prefix('v1-mp/api/manual/cosmetic')->namespace('OLEGYERA\ManageBox\Manual\Cosmetic')->group(function () {
    Route::post('/get/all', 'CosmeticController@getCosmetics')->name('get.all');
    Route::get('/get/{alias}', 'CosmeticController@getCosmetic')->name('get');
    Route::delete('/delete/{id}', 'CosmeticController@deleteCosmetic')->name('delete');
    Route::post('/verify', 'CosmeticController@verifyCosmetic')->name('verify');
    Route::post('/uverify', 'CosmeticController@uverifyCosmetic')->name('uverify');
    Route::post('/create', 'CosmeticController@createCosmetic')->name('create');
    Route::get('/get/{alias}', 'CosmeticController@getCosmetic')->name('get');
    Route::post('/update/{alias}/image', 'CosmeticController@updateCosmeticImage')->name('update.image');
    Route::post('/update/{alias}/title', 'CosmeticController@updateCosmeticTitle')->name('update.title');
    Route::post('/update/{alias}/utitle', 'CosmeticController@updateCosmeticUTitle')->name('update.utitle');
    Route::post('/update/{alias}/dosage', 'CosmeticController@updateCosmeticDosage')->name('update.dosage');
    Route::post('/update/{alias}/udosage', 'CosmeticController@updateCosmeticUDosage')->name('update.dosage');
    Route::post('/update/{alias}/switch', 'CosmeticController@SwitchCosmeticSetting')->name('switch.setting');
    Route::post('/update/{alias}/registration', 'CosmeticController@updateCosmeticRegistration')->name('update.registration');
    Route::post('/update/{alias}/uregistration', 'CosmeticController@updateCosmeticURegistration')->name('update.uregistration');
});
Route::name('api_manual.cosmetic.dependency')->prefix('v1-mp/api/manual/cosmetic/dependency')->namespace('OLEGYERA\ManageBox\Manual\Cosmetic')->group(function () {
    Route::get('/get/{alias}', 'CosmeticDependencyController@getCosmeticDependency')->name('get');
    Route::post('/update/{alias}/fabricator', 'CosmeticDependencyController@updateCosmeticFabricator')->name('update.fabricator');
    Route::post('/update/{alias}/fabricator/location', 'CosmeticDependencyController@updateCosmeticFabricatorLocation')->name('update.fabricator.location');
    Route::post('/update/{alias}/cosmetic_classification', 'CosmeticDependencyController@updateCosmeticClassification')->name('update.cosmetic_classification');
});
Route::name('api_manual.cosmetic.instruction')->prefix('v1-mp/api/manual/cosmetic/instruction')->namespace('OLEGYERA\ManageBox\Manual\Cosmetic')->group(function () {
    Route::get('get/{alias}/{type}/{column}', 'CosmeticInstructionController@getCosmeticColumn')->name('get.column');
    Route::post('update/{alias}/{type}/{column}', 'CosmeticInstructionController@updateCosmeticColumn')->name('update.column');
});
