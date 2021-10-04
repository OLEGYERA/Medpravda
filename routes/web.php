<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|
*/

//Route::get('/start', 'IndexController@start');
//Route::get('/imgs/{alias}', 'IndexController@generateURL')->name('lol');
Route::get('/parse', 'Controller@parse');

Route::get('/exist', 'Controller@exist');

Route::get('/landing-page/citramon-maksi', function (){
    return view('landing.citramon');
});

Route::get('/ua/landing-page/{val}', 'OLEGYERA\FrontBox\HomeController@controlUa')->name('ua.control');
Route::get('/landing-page/{val}', 'OLEGYERA\FrontBox\HomeController@controlRu')->name('ru.control');

Route::post('/callback/leads/potencia', 'Controller@emailPotencia');


Route::get('/landing/potencia/page', function (){
    return view('landing.potencia');
});
Route::get('/landing/potencia/page-ua', function (){
    return view('landing.potencia_ua');
});







Route::get('/landing/orvi/page', function (){
    return view('landing.orvi');
});

Route::get('/landing/test/page', function (){
    return view('tilda.project1647962.page7372392');
});

Route::get('/test/{val}', 'OLEGYERA\FrontBox\BasicController@getLastMod');
Route::get('sitemap-{alias}-{type}-{page}.xml', 'OLEGYERA\FrontBox\SitemapController@getSitemap');
Route::get('sitemapindex.xml', 'OLEGYERA\FrontBox\SitemapController@getSitemapIndex');

Route::get('sim_analize_img/{type}/{query}', 'Controller@simAnal');

Route::get('sitemap', function(){
    return view('OLEGYERA.FrontBox.Pages.PreparatMap.ru');
})->name('sitemap');


Route::name('api_reactive.')->prefix('v1-mp/api/reactive')->namespace('OLEGYERA\FrontBox')->group(function () {
    Route::post('/new/review/{alias}', 'Drug\ReviewController@addReview');
    Route::post('/search', 'ReactiveController@search')->name('search');
});
