<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox;

use Fresh\Medpravda\Medicine;
use Fresh\Medpravda\Umedicine;
use Fresh\Medpravda\Amedicine;
use Fresh\Medpravda\Uamedicine;

use Fresh\Medpravda\Drug;
use Fresh\Medpravda\DrugSetting;
use Fresh\Medpravda\DrugDep;
use Fresh\Medpravda\DepSeo;
use Fresh\Medpravda\DrugInstruction;
use Fresh\Medpravda\DrugInstructionUa;
use Fresh\Medpravda\DrugInstructionAdaptive;
use Fresh\Medpravda\DrugInstructionAdaptiveUa;


use Fresh\Medpravda\BadNew;
use Fresh\Medpravda\CosmeticNew;
use Fresh\Medpravda\WareNew;

use Cache;



use Fresh\Medpravda\Substance;

use Auth;
use Illuminate\Http\Request;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox\BasicController;

class SitemapController extends BasicController
{
    public function getSitemap($alias, $type, $page){
        switch ($alias){
            case 'preparat':
                $url = 'preparat';
                Cache::forget('preparat-' . $page);
                $cache_result = Cache::store('file')->remember('preparat-' . $page, 24*60*60, function () use ($page) {
                    return Drug::orderBy('id')->skip(999 * ($page - 1))->take(999)->get();
                });
                break;
            case 'bad':
                $url = 'bad';
                Cache::forget('bad-' . $page);
                $cache_result = Cache::store('file')->remember('bad-' . $page, 24*60*60, function () use ($page) {
                    return BadNew::orderBy('id')->skip(999 * ($page - 1))->take(999)->get();
                });
                break;
            case 'cosmetic':
                $url = 'cosmetic';
                Cache::forget('cosmetic-' . $page);
                $cache_result = Cache::store('file')->remember('cosmetic-' . $page, 24*60*60, function () use ($page) {
                    return CosmeticNew::orderBy('id')->skip(999 * ($page - 1))->take(999)->get();
                });
                break;
            case 'ware':
                $url = 'ware';
                Cache::forget('ware-' . $page);
                $cache_result = Cache::store('file')->remember('ware-' . $page, 24*60*60, function () use ($page) {
                    return WareNew::orderBy('id')->skip(999 * ($page - 1))->take(999)->get();
                });
                break;
            default:
                abort(404);
                break;
        }

        if(count($cache_result) == 0){
            abort(404);
        }


//
        return response()->view('OLEGYERA.FrontBox.sitemap', ['data' => $cache_result, 'url' => $url, 'type' => $type])->header('Content-Type','text/xml');
    }

    public function getSitemapIndex(){
        Cache::forget('sitemapindex');
        $cache_result = Cache::store('file')->remember('sitemapindex', 24*60*60, function () {
            $sitemaps = [];
            array_push($sitemaps, ['pages' => round(Drug::count() / 999), 'name' => 'preparat-ua']);
            array_push($sitemaps, ['pages' => round(Drug::count() / 999), 'name' => 'preparat-uam']);
            array_push($sitemaps, ['pages' => round(Drug::count() / 999), 'name' => 'preparat-ru']);
            array_push($sitemaps, ['pages' => round(Drug::count() / 999), 'name' => 'preparat-rum']);

            array_push($sitemaps, ['pages' => round(BadNew::count() / 999), 'name' => 'bad-ua']);
            array_push($sitemaps, ['pages' => round(BadNew::count() / 999), 'name' => 'bad-uam']);
            array_push($sitemaps, ['pages' => round(BadNew::count() / 999), 'name' => 'bad-ru']);
            array_push($sitemaps, ['pages' => round(BadNew::count() / 999), 'name' => 'bad-rum']);

            array_push($sitemaps, ['pages' => round(CosmeticNew::count() / 999), 'name' => 'cosmetic-ua']);
            array_push($sitemaps, ['pages' => round(CosmeticNew::count() / 999), 'name' => 'cosmetic-uam']);
            array_push($sitemaps, ['pages' => round(CosmeticNew::count() / 999), 'name' => 'cosmetic-ru']);
            array_push($sitemaps, ['pages' => round(CosmeticNew::count() / 999), 'name' => 'cosmetic-rum']);

            array_push($sitemaps, ['pages' => round( WareNew::count() / 999), 'name' => 'ware-ua']);
            array_push($sitemaps, ['pages' => round( WareNew::count() / 999), 'name' => 'ware-uam']);
            array_push($sitemaps, ['pages' => round( WareNew::count() / 999), 'name' => 'ware-ru']);
            array_push($sitemaps, ['pages' => round( WareNew::count() / 999), 'name' => 'ware-rum']);

            return view('OLEGYERA.FrontBox.sitemapindex', ['data' => $sitemaps])->render();
        });

        return response($cache_result)->header('Content-Type','text/xml');

    }

}

//


