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

Route::name('ua.')->prefix('ua')->namespace('OLEGYERA\Web')->group(function () {
    Route::get('/', 'HomeView@ua')->name('home');

    Route::name('tags.')->prefix('tags')->namespace('Tags')->group(function () {
        Route::get('/news', 'NewsView@ua')->name('news');
        Route::get('/articles', 'ArticlesView@ua')->name('articles');
        Route::get('/interviews', 'InterviewView@ua')->name('interviews');
        Route::get('/{alias}', 'InterviewView@ru')->name('optionally');
    });

    Route::get('/pub_{id}', 'MediaView@ua')->name('pub');

});


Route::name('ua.')->prefix('ua')->namespace('OLEGYERA\FrontBox')->group(function () {
//    Route::get('/', 'HomeController@homeUa')->name('home');

    Route::get('prescription_conditions', 'Other\PrescriptionController@getPrescriptionUa')->name('prescription_conditions');
    Route::get('terms_of_use', 'Other\TermsUseController@getTermsUseUa')->name('terms');
    Route::get('confidentiality', 'Other\ConfidentialityController@getConfidentialityUa')->name('confidentiality');
    Route::get('editors', 'Other\EditorController@getEditorsUa')->name('editors');
    Route::get('about', 'Other\AboutController@getAboutUa')->name('about');
    Route::get('cooperation', 'Other\CooperationController@getCooperationUa')->name('cooperation');
    Route::get('advertising', 'Other\AdvertisingController@getAdvertisingUa')->name('advertising');


    Route::get('/preparat/{alias}', 'Drug\DrugController@getDrugUa')->name('drug');
    Route::get('/preparat/{alias}/reviews', 'Drug\ReviewController@getDrugReviewUa')->name('drug.review');

    Route::get('/preparat/adapted/{alias}', function ($alias){return redirect()->route('ua.drug', ['alias'=>$alias]);});
    Route::get('/preparat/{alias}/amp', function ($alias){return redirect()->route('ua.drug', ['alias'=>$alias]);});
    Route::get('/preparat/{alias}/faq', function ($alias){return redirect()->route('ua.drug', ['alias'=>$alias]);});
    Route::get('/preparat/{alias}/price/kiev', function ($alias){return redirect()->route('ua.drug', ['alias'=>$alias]);});
    Route::get('/preparat/official/{alias}', function ($alias){return redirect()->route('ua.drug', ['alias'=>$alias]);});
    Route::get('/preparat/{alias}/analog', function ($alias){return redirect()->route('ua.drug', ['alias'=>$alias]);});
    Route::get('/preparat/{alias}/official', function ($alias){return redirect()->route('ua.drug', ['alias'=>$alias]);});
    Route::get('/preparat/{alias}/adaptive', function ($alias){return redirect()->route('ua.drug', ['alias'=>$alias]);});
    Route::get('/preparat/{alias}/print/official', function ($alias){return redirect()->route('ua.drug', ['alias'=>$alias]);});
    Route::get('/preparat/{alias}/print/adaptive', function ($alias){return redirect()->route('ua.drug', ['alias'=>$alias]);});

    Route::get('/bad/{alias}', 'BadController@getBadUa')->name('bad');
    Route::get('/bad/adapted/{alias}', function ($alias){return redirect()->route('ua.bad', ['alias'=>$alias]);});
    Route::get('/bad/{alias}/amp', function ($alias){return redirect()->route('ua.bad', ['alias'=>$alias]);});
    Route::get('/bad/{alias}/faq', function ($alias){return redirect()->route('ua.bad', ['alias'=>$alias]);});
    Route::get('/bad/{alias}/price/kiev', function ($alias){return redirect()->route('ua.bad', ['alias'=>$alias]);});
    Route::get('/bad/official/{alias}', function ($alias){return redirect()->route('ua.bad', ['alias'=>$alias]);});
    Route::get('/bad/{alias}/analog', function ($alias){return redirect()->route('ua.bad', ['alias'=>$alias]);});
    Route::get('/bad/{alias}/official', function ($alias){return redirect()->route('ua.bad', ['alias'=>$alias]);});
    Route::get('/bad/{alias}/adaptive', function ($alias){return redirect()->route('ua.bad', ['alias'=>$alias]);});
    Route::get('/bad/{alias}/print/official', function ($alias){return redirect()->route('ua.bad', ['alias'=>$alias]);});
    Route::get('/bad/{alias}/print/adaptive', function ($alias){return redirect()->route('ua.bad', ['alias'=>$alias]);});

    Route::get('/ware/{alias}', 'WareController@getWareUa')->name('ware');
    Route::get('/ware/adapted/{alias}', function ($alias){return redirect()->route('ua.ware', ['alias'=>$alias]);});
    Route::get('/ware/{alias}/amp', function ($alias){return redirect()->route('ua.ware', ['alias'=>$alias]);});
    Route::get('/ware/{alias}/faq', function ($alias){return redirect()->route('ua.ware', ['alias'=>$alias]);});
    Route::get('/ware/{alias}/price/kiev', function ($alias){return redirect()->route('ua.ware', ['alias'=>$alias]);});
    Route::get('/ware/official/{alias}', function ($alias){return redirect()->route('ua.ware', ['alias'=>$alias]);});
    Route::get('/ware/{alias}/analog', function ($alias){return redirect()->route('ua.ware', ['alias'=>$alias]);});
    Route::get('/ware/{alias}/official', function ($alias){return redirect()->route('ua.ware', ['alias'=>$alias]);});
    Route::get('/ware/{alias}/adaptive', function ($alias){return redirect()->route('ua.ware', ['alias'=>$alias]);});
    Route::get('/ware/{alias}/print/official', function ($alias){return redirect()->route('ua.ware', ['alias'=>$alias]);});
    Route::get('/ware/{alias}/print/adaptive', function ($alias){return redirect()->route('ua.ware', ['alias'=>$alias]);});

    Route::get('/cosmetic/{alias}', 'CosmeticController@getCosmeticUa')->name('cosmetic');
    Route::get('/cosmetic/adapted/{alias}', function ($alias){return redirect()->route('ua.cosmetic', ['alias'=>$alias]);});
    Route::get('/cosmetic/{alias}/amp', function ($alias){return redirect()->route('ua.cosmetic', ['alias'=>$alias]);});
    Route::get('/cosmetic/{alias}/faq', function ($alias){return redirect()->route('ua.cosmetic', ['alias'=>$alias]);});
    Route::get('/cosmetic/{alias}/price/kiev', function ($alias){return redirect()->route('ua.cosmetic', ['alias'=>$alias]);});
    Route::get('/cosmetic/official/{alias}', function ($alias){return redirect()->route('ua.cosmetic', ['alias'=>$alias]);});
    Route::get('/cosmetic/{alias}/analog', function ($alias){return redirect()->route('ua.cosmetic', ['alias'=>$alias]);});
    Route::get('/cosmetic/{alias}/official', function ($alias){return redirect()->route('ua.ware', ['alias'=>$alias]);});
    Route::get('/cosmetic/{alias}/adaptive', function ($alias){return redirect()->route('ua.ware', ['alias'=>$alias]);});
    Route::get('/cosmetic/{alias}/print/official', function ($alias){return redirect()->route('ua.ware', ['alias'=>$alias]);});
    Route::get('/cosmetic/{alias}/print/adaptive', function ($alias){return redirect()->route('ua.ware', ['alias'=>$alias]);});

    Route::get('/term/{alias}', 'TermController@getTermUa')->name('term');


    Route::get('/articles/problematic/{alias}', 'MediaZone\ArticleController@getArticleUa')->name('media-zone.article');



    Route::name('catalog.')->prefix('catalog')->group(function () {
        Route::get('/preparat/alphabet/{val?}', 'CatalogController@drugUa')->name('drug.alphabet');
        Route::get('/bad/alphabet/{val?}', 'CatalogController@badUa')->name('bad.alphabet');
        Route::get('/ware/alphabet/{val?}', 'CatalogController@wareUa')->name('ware.alphabet');
        Route::get('/cosmetic/alphabet/{val?}', 'CatalogController@cosmeticUa')->name('cosmetic.alphabet');
        Route::get('/inname/alphabet/{val?}', 'CatalogController@innameUa')->name('inname.alphabet');
        Route::get('/preparat/inname/{val?}', 'CatalogController@drugInnameUa')->name('drug.inname');
        Route::get('/pharma/alphabet/{val?}', 'CatalogController@pharmaUa')->name('pharma.alphabet');
        Route::get('/preparat/pharma/{val?}', 'CatalogController@drugPharmaUa')->name('drug.pharma');
        Route::get('/pharma-bad/list', 'CatalogController@pharmaBadUa')->name('pharma_bad.list');
        Route::get('/bad/pharma-bad/{val?}', 'CatalogController@badPharmaBadUa')->name('bad.pharma_bad');
        Route::get('/fabricator/alphabet/{val?}', 'CatalogController@fabricatorUa')->name('fabricator.alphabet');
        Route::get('/list/fabricator/{val?}', 'CatalogController@listFabricatorUa')->name('list.fabricator');


        Route::get('/preparat/atc/{val?}', 'CatalogController@drugATXUa')->name('drug.atx');
        Route::get('/bad/atc/{val?}', 'CatalogController@badATXUa')->name('bad.atx');
        Route::get('/ware/atc/{val?}', 'CatalogController@wareATXUa')->name('ware.atx');
        Route::get('/cosmetic/atc/{val?}', 'CatalogController@cosmeticATXUa')->name('cosmetic.atx');

        Route::get('/term/alphabet/{val?}', 'CatalogController@termUa')->name('term.alphabet');

    });

    Route::name('media.')->prefix('media')->group(function () {
        Route::get('/article/{alias}_{id}.html', 'Media\ArticleController@getArticleUa')->name('article');
    });

    Route::get('/media/{alias}', 'MediaController@showMediaUa')->name('media.show');
});
