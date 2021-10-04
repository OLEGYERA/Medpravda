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

//article
Route::name('api_media.article')->prefix('v1-mp/api/media/article')->namespace('OLEGYERA\ManageBox\Media')->group(function () {
    Route::post('/get/all', 'ArticleController@getArticles')->name('get.all');
    Route::get('/get/{alias}', 'ArticleController@getArticle')->name('get');
    Route::post('/verify', 'ArticleController@verifyArticle')->name('verify');
    Route::post('/create', 'ArticleController@createArticle')->name('create');
    Route::post('/update/{alias}/title', 'ArticleController@updateArticleTitle')->name('update.title');
    Route::post('/update/{alias}/utitle', 'ArticleController@updateArticleUTitle')->name('update.utitle');
    Route::post('/update/{alias}/switch', 'ArticleController@switchArticleSetting')->name('switch.setting');
    Route::post('/update/{alias}/image', 'ArticleController@updateArticleImage')->name('update.image');
    Route::delete('/delete/{id}', 'ArticleController@deleteArticle')->name('delete');
});

Route::name('api_media.article.content')->prefix('v1-mp/api/media/article/content')->namespace('OLEGYERA\ManageBox\Media')->group(function () {
    Route::get('get/{alias}/{type}/{column}', 'ArticleController@getArticleColumn')->name('get.column');
    Route::post('update/{alias}/{type}/{column}', 'ArticleController@updateArticleColumn')->name('update.column');
});

//Categories Api
Route::name('api_media.category.')->prefix('v1-mp/api/media/category')->namespace('OLEGYERA\ManageBox\Media')->group(function () {
    Route::post('/get/all', 'CategoryController@getCategories')->name('get.all');
    Route::get('/get/{alias}', 'CategoryController@getCategory')->name('get');
    Route::post('/update/{alias}', 'CategoryController@updateCategory')->name('update');
    Route::post('/{id?}/create', 'CategoryController@createCategory')->name('create'); //id => parent_id - сделанно для совпадения аргументов в репозитории
    Route::post('/search', 'CategoryController@search')->name('search');
    Route::post('verify/{alias}', 'CategoryController@verifyEditingTitles')->name('verify.editing');
    Route::post('{parent_id}/verify', 'CategoryController@verifyCreatingTitles')->name('verify.creating');
    Route::get('/get/pre-parent/{class}', 'CategoryController@getPreparentCategory')->name('get');
    Route::delete('/delete/{id}', 'CategoryController@deleteCategory')->name('delete');
    //search for children categories from main category
    Route::post('{alias}/get/all', 'CategoryController@getChildrenCategories')->name('get.all.location');
});


//Structure Api
Route::name('api_media.structure.')->prefix('v1-mp/api/media/structure')->namespace('OLEGYERA\ManageBox\Media')->group(function () {
    Route::post('/create', 'StructureController@createStructure')->name('create');
    Route::post('/search', 'StructureController@search')->name('search');
    Route::post('/get/all', 'StructureController@getStructures')->name('get.all');
    Route::get('/get/{alias}', 'StructureController@getStructure')->name('get');
    Route::post('verify', 'StructureController@verifyStructure')->name('verify.editing');
    Route::post('/update/{alias}/title', 'StructureController@updateStructureTitle')->name('update.title');
    Route::post('/update/{alias}/switch', 'StructureController@SwitchStructureSetting')->name('switch.setting');

    Route::get('/get/{alias}/blocks', 'StructureController@getStructureBlocks')->name('get');
    Route::post('/create/{alias}/block', 'StructureController@createStructureBlock')->name('create.block');
    Route::delete('/delete/{id}/block', 'StructureController@deleteStructureBlock')->name('delete.block');


});


Route::name('api_media.article.')->prefix('v1-mp/api/media/article')->namespace('OLEGYERA\ManageBox\Media')->group(function () {
    Route::post('/get/all', 'ArticleController@getArticles')->name('get.all');
    Route::get('/get/{alias}', 'ArticleController@getArticle')->name('get');

    Route::post('/verify', 'ArticleController@verifyArticle')->name('verify');
    Route::post('/uverify', 'ArticleController@uverifyArticle')->name('uverify');
    Route::post('/create', 'ArticleController@createArticle')->name('create');
    Route::post('/update/{alias}/title', 'ArticleController@updateArticleTitle')->name('update.title');
    Route::post('/update/{alias}/utitle', 'ArticleController@updateArticleUTitle')->name('update.utitle');



    Route::delete('/delete/{id}', 'ArticleController@deleteArticle')->name('delete');

    Route::post('/update/{alias}/image', 'ArticleController@updateArticleImage')->name('update.image');
    Route::post('/update/{alias}/dosage', 'ArticleController@updateArticleDosage')->name('update.dosage');
    Route::post('/update/{alias}/udosage', 'ArticleController@updateArticleUDosage')->name('update.dosage');
    Route::post('/update/{alias}/switch', 'ArticleController@SwitchArticleSetting')->name('switch.setting');
    Route::post('/update/{alias}/registration', 'ArticleController@updateArticleRegistration')->name('update.registration');
    Route::post('/update/{alias}/uregistration', 'ArticleController@updateArticleURegistration')->name('update.uregistration');
    Route::post('/create/{id}/label', 'ArticleController@createArticleLabel')->name('create.label');
    Route::delete('/delete/{id}/label', 'ArticleController@deleteArticleLabel')->name('delete.label');
    Route::get('/get/{id}/labels', 'ArticleController@getArticleLabels')->name('get.labels');
});


Route::name('api_media.article.dependency')->prefix('v1-mp/api/media/article/dependency')->namespace('OLEGYERA\ManageBox\Media')->group(function () {
    Route::get('/get/{alias}', 'ArticleDependencyController@getArticleDependency')->name('get');
    Route::post('/update/{alias}/category', 'ArticleDependencyController@updateArticleCategory')->name('update.category');
    Route::post('/update/{alias}/structure', 'ArticleDependencyController@updateArticleStructure')->name('update.structure');
});

Route::name('api_manual.article.instruction')->prefix('v1-mp/api/media/article/instruction')->namespace('OLEGYERA\ManageBox\Media')->group(function () {
    Route::get('get/{alias}/{lang}', 'ArticleContentController@getArticleContent')->name('get.content');
    Route::post('update/{alias}/{lang}', 'ArticleContentController@updateArticleContent')->name('update.content');

    Route::get('get/blocklist/{alias}/{lang}', 'ArticleContentController@getArticleContentBlockList')->name('get.blocklist');
    Route::get('get/{alias}/{block_id}/{lang}', 'ArticleContentController@getArticleContentBlockInstruction')->name('get.block.instruction');
    Route::post('update/{alias}/{block_id}/{lang}', 'ArticleContentController@updateArticleContentBlockInstruction')->name('update.block.instruction');

    //    Route::post('update/{alias}/{type}/{column}', 'DrugInstructionController@updateDrugColumn')->name('update.column');
});
