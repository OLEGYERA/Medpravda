<?php
use Illuminate\Http\Request;
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

Route::name('ru.')->namespace('OLEGYERA\Web')->group(function () {
    Route::get('/', 'HomeView@ru')->name('home');

    Route::name('tags.')->prefix('tags')->namespace('Tags')->group(function () {
        Route::get('/news', 'NewsView@ru')->name('news');
        Route::get('/articles', 'ArticlesView@ru')->name('articles');
        Route::get('/interviews', 'InterviewView@ru')->name('interviews');
        Route::get('/{alias}', 'InterviewView@ru')->name('optionally');

    });

    Route::get('/pub_{id}', 'MediaView@ru')->name('pub');
});

Route::name('ru.')->namespace('OLEGYERA\FrontBox')->group(function () {


//    Route::get('/', 'HomeController@homeRu')->name('home');

    Route::get('prescription_conditions', 'Other\PrescriptionController@getPrescriptionRu')->name('prescription_conditions');
    Route::get('terms_of_use', 'Other\TermsUseController@getTermsUseRu')->name('terms');
    Route::get('confidentiality', 'Other\ConfidentialityController@getConfidentialityRu')->name('confidentiality');
    Route::get('editors', 'Other\EditorController@getEditorsRu')->name('editors');
    Route::get('about', 'Other\AboutController@getAboutRu')->name('about');
    Route::get('cooperation', 'Other\CooperationController@getCooperationRu')->name('cooperation');
    Route::get('advertising', 'Other\AdvertisingController@getAdvertisingRu')->name('advertising');

    Route::get('/preparat/{alias}', 'Drug\DrugController@getDrugRu')->name('drug');
    Route::get('/preparat/{alias}/reviews', 'Drug\ReviewController@getDrugReviewRu')->name('drug.review');

    Route::get('/preparat/adapted/{alias}', function ($alias){return redirect()->route('ru.drug', ['alias'=>$alias]);});
    Route::get('/preparat/{alias}/amp', function ($alias){return redirect()->route('ru.drug', ['alias'=>$alias]);});
    Route::get('/preparat/{alias}/faq', function ($alias){return redirect()->route('ru.drug', ['alias'=>$alias]);});
    Route::get('/preparat/{alias}/price/kiev', function ($alias){return redirect()->route('ru.drug', ['alias'=>$alias]);});
    Route::get('/preparat/official/{alias}', function ($alias){return redirect()->route('ru.drug', ['alias'=>$alias]);});
    Route::get('/preparat/{alias}/analog', function ($alias){return redirect()->route('ru.drug', ['alias'=>$alias]);});
    Route::get('/preparat/{alias}/official', function ($alias){return redirect()->route('ru.drug', ['alias'=>$alias]);});
    Route::get('/preparat/{alias}/adaptive', function ($alias){return redirect()->route('ru.drug', ['alias'=>$alias]);});
    Route::get('/preparat/{alias}/print/official', function ($alias){return redirect()->route('ru.drug', ['alias'=>$alias]);});
    Route::get('/preparat/{alias}/print/adaptive', function ($alias){return redirect()->route('ru.drug', ['alias'=>$alias]);});

    Route::get('/bad/{alias}', 'BadController@getBadRu')->name('bad');
    Route::get('/bad/adapted/{alias}', function ($alias){return redirect()->route('ru.bad', ['alias'=>$alias]);});
    Route::get('/bad/{alias}/amp', function ($alias){return redirect()->route('ru.bad', ['alias'=>$alias]);});
    Route::get('/bad/{alias}/faq', function ($alias){return redirect()->route('ru.bad', ['alias'=>$alias]);});
    Route::get('/bad/{alias}/price/kiev', function ($alias){return redirect()->route('ru.bad', ['alias'=>$alias]);});
    Route::get('/bad/official/{alias}', function ($alias){return redirect()->route('ru.bad', ['alias'=>$alias]);});
    Route::get('/bad/{alias}/analog', function ($alias){return redirect()->route('ru.bad', ['alias'=>$alias]);});
    Route::get('/bad/{alias}/official', function ($alias){return redirect()->route('ru.bad', ['alias'=>$alias]);});
    Route::get('/bad/{alias}/adaptive', function ($alias){return redirect()->route('ru.bad', ['alias'=>$alias]);});
    Route::get('/bad/{alias}/print/official', function ($alias){return redirect()->route('ru.bad', ['alias'=>$alias]);});
    Route::get('/bad/{alias}/print/adaptive', function ($alias){return redirect()->route('ru.bad', ['alias'=>$alias]);});



    Route::get('/ware/{alias}', 'WareController@getWareRu')->name('ware');
    Route::get('/ware/adapted/{alias}', function ($alias){return redirect()->route('ru.ware', ['alias'=>$alias]);});
    Route::get('/bad/{alias}/amp', function ($alias){return redirect()->route('ru.bad', ['alias'=>$alias]);});
    Route::get('/ware/{alias}/faq', function ($alias){return redirect()->route('ru.ware', ['alias'=>$alias]);});
    Route::get('/ware/{alias}/price/kiev', function ($alias){return redirect()->route('ru.ware', ['alias'=>$alias]);});
    Route::get('/ware/official/{alias}', function ($alias){return redirect()->route('ru.ware', ['alias'=>$alias]);});
    Route::get('/ware/{alias}/analog', function ($alias){return redirect()->route('ru.ware', ['alias'=>$alias]);});
    Route::get('/ware/{alias}/official', function ($alias){return redirect()->route('ru.ware', ['alias'=>$alias]);});
    Route::get('/ware/{alias}/adaptive', function ($alias){return redirect()->route('ru.ware', ['alias'=>$alias]);});
    Route::get('/ware/{alias}/print/official', function ($alias){return redirect()->route('ru.ware', ['alias'=>$alias]);});
    Route::get('/ware/{alias}/print/adaptive', function ($alias){return redirect()->route('ru.ware', ['alias'=>$alias]);});

    Route::get('/cosmetic/{alias}', 'CosmeticController@getCosmeticRu')->name('cosmetic');
    Route::get('/cosmetic/adapted/{alias}', function ($alias){return redirect()->route('ru.cosmetic', ['alias'=>$alias]);});
    Route::get('/cosmetic/{alias}/amp', function ($alias){return redirect()->route('ru.cosmetic', ['alias'=>$alias]);});
    Route::get('/cosmetic/{alias}/faq', function ($alias){return redirect()->route('ru.cosmetic', ['alias'=>$alias]);});
    Route::get('/cosmetic/{alias}/price/kiev', function ($alias){return redirect()->route('ru.cosmetic', ['alias'=>$alias]);});
    Route::get('/cosmetic/official/{alias}', function ($alias){return redirect()->route('ru.cosmetic', ['alias'=>$alias]);});
    Route::get('/cosmetic/{alias}/analog', function ($alias){return redirect()->route('ru.cosmetic', ['alias'=>$alias]);});
    Route::get('/cosmetic/{alias}/official', function ($alias){return redirect()->route('ru.cosmetic', ['alias'=>$alias]);});
    Route::get('/cosmetic/{alias}/adaptive', function ($alias){return redirect()->route('ru.cosmetic', ['alias'=>$alias]);});
    Route::get('/cosmetic/{alias}/print/official', function ($alias){return redirect()->route('ru.cosmetic', ['alias'=>$alias]);});
    Route::get('/cosmetic/{alias}/print/adaptive', function ($alias){return redirect()->route('ru.cosmetic', ['alias'=>$alias]);});


    Route::get('/term/{alias}', 'TermController@getTermRu')->name('term');





    Route::name('catalog.')->prefix('catalog')->group(function () {
        Route::get('/preparat/alphabet/{val?}', 'CatalogController@drugRu')->name('drug.alphabet');
        Route::get('/bad/alphabet/{val?}', 'CatalogController@badRu')->name('bad.alphabet');
        Route::get('/ware/alphabet/{val?}', 'CatalogController@wareRu')->name('ware.alphabet');
        Route::get('/cosmetic/alphabet/{val?}', 'CatalogController@cosmeticRu')->name('cosmetic.alphabet');
        Route::get('/inname/alphabet/{val?}', 'CatalogController@innameRu')->name('inname.alphabet');
        Route::get('/preparat/inname/{val?}', 'CatalogController@drugInnameRu')->name('drug.inname');
        Route::get('/pharma/alphabet/{val?}', 'CatalogController@pharmaRu')->name('pharma.alphabet');
        Route::get('/preparat/pharma/{val?}', 'CatalogController@drugPharmaRu')->name('drug.pharma');
        Route::get('/pharma-bad/list', 'CatalogController@pharmaBadRu')->name('pharma_bad.list');
        Route::get('/bad/pharma-bad/{val?}', 'CatalogController@badPharmaBadRu')->name('bad.pharma_bad');
        Route::get('/fabricator/alphabet/{val?}', 'CatalogController@fabricatorRu')->name('fabricator.alphabet');
        Route::get('/list/fabricator/{val?}', 'CatalogController@listFabricatorRu')->name('list.fabricator');

        Route::get('/preparat/atc/{val?}', 'CatalogController@drugATXRu')->name('drug.atx');
        Route::get('/bad/atc/{val?}', 'CatalogController@badATXRu')->name('bad.atx');
        Route::get('/ware/atc/{val?}', 'CatalogController@wareATXRu')->name('ware.atx');
        Route::get('/cosmetic/atc/{val?}', 'CatalogController@cosmeticATXRu')->name('cosmetic.atx');

        Route::get('/term/alphabet/{val?}', 'CatalogController@termRu')->name('term.alphabet');
        ;
    });





    Route::get('/articles/problematic/{alias}', 'MediaZone\ArticleController@getArticleRu')->name('media-zone.article');
//    Route::get('/media/{alias}', 'MediaController@showMedia')->name('media.show');
});



//Route::name('api_reactive.')->prefix('v2-mp/api/')->group(function () {
//    Route::post('/search/ru', 'ApiController@searchRu')->name('search.ru');
//    Route::post('/add-review', 'ApiController@addReview');
//    Route::get('/review', 'ApiController@getReview');
//});
//Route::namespace('Medicines')->group(function () {
//    Route::get('preparat/{alias}', 'DrugController@getDrugRu')->name('drug');
//});



