<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox;

use Fresh\Medpravda\MediaArticle;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

use Fresh\Medpravda\Drug;
use Fresh\Medpravda\BadNew;
use Fresh\Medpravda\WareNew;
use Fresh\Medpravda\CosmeticNew;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox\BasicController;

class ReactiveController extends BasicController
{

    protected function search(Request $request){
        $drugs = Drug::select('id', 'title', 'utitle', 'alias', 'image_id')->where(function($q) use ($request){
            $q->where('title', 'like', $request->search . '%')->orWhere('utitle', 'like', $request->search . '%')->orWhere('alias', 'like', $request->search . '%');
        })->with('image')->take(5)->get();

        $drugs->map(function ($drug) {
            $drug->alias = 'preparat/' . $drug->alias;;
            return $drug;
        });

        $bads = BadNew::select('id', 'title', 'utitle', 'alias', 'image_id')->where(function($q) use ($request){
            $q->where('title', 'like', $request->search  . '%')->orWhere('utitle', 'like', $request->search  . '%')->orWhere('alias', 'like', $request->search  . '%');
        })->with('image')->take(5)->get();

        $bads->map(function ($bad) {
            $bad->alias = 'bad/' . $bad->alias;
            return $bad;
        });

        $cosmetics = CosmeticNew::select('id', 'title', 'utitle', 'alias', 'image_id')->where(function($q) use ($request){
            $q->where('title', 'like', $request->search  . '%')->orWhere('utitle', 'like', $request->search  . '%')->orWhere('alias', 'like', $request->search  . '%');
        })->with('image')->take(5)->get();

        $cosmetics->map(function ($cosmetic) {
            $cosmetic->alias = 'cosmetic/' . $cosmetic->alias;
            return $cosmetic;
        });

        $wares = WareNew::select('id', 'title', 'utitle', 'alias', 'image_id')->where(function($q) use ($request){
            $q->where('title', 'like', $request->search  . '%')->orWhere('utitle', 'like', $request->search  . '%')->orWhere('alias', 'like', $request->search  . '%');
        })->with('image')->take(5)->get();


        $wares->map(function ($ware) {
            $ware->alias = 'ware/' . $ware->alias;
            return $ware;
        });

        $media = MediaArticle::select('id', 'title', 'utitle', 'alias')->where(function($q) use ($request){
            $q->where('title', 'like', $request->search  . '%')->orWhere('utitle', 'like', $request->search  . '%')->orWhere('alias', 'like', $request->search  . '%');
        })->take(5)->get();


        $media->map(function ($media) {
            $media->alias = 'pub_' . $media->id;
            return $media;
        });


        $result = $drugs->merge($bads);
        $result = $result->merge($cosmetics);
        $result = $result->merge($wares);
        $result = $result->merge($media);

        return response()->json($result, 200);
//        $results = [];
//        $globalCounter = 0;
//        $drugs = Drug::select('id', 'title', 'alias', 'image_id')->where('show', 1)->where('title', 'like', $request->search . '%')->take(15)->get();
//        foreach ($drugs as $drug){
//            $drug->inname = $drug->dependency->inname ? $drug->dependency->inname->title : null;
//            $drug->fabricator = $drug->dependency->fabricator ? $drug->dependency->fabricator->title : null;
//            $drug->img_path = asset('/gallery/' . getCategoryName($drug->image->category_id) . '/small/' . $drug->image->path);
//            $drug->id = $globalCounter++;
//            $drug->url = route('ru.drug', ['alias' => $drug->alias]);
//        }
//        array_push($results, ['title' => 'Препараты', 'icon' => 'glyph drug', 'data' => $drugs]);
//
//        $bads = BadNew::select('id', 'title', 'alias', 'image_id')->where('title', 'like', $request->search . '%')->orWhere('alias', 'like', $request->search . '%')->take(15)->get();
//        foreach ($bads as $bad){
//            $bad->inname = null;
//            $bad->fabricator = $bad->dependency->fabricator ? $bad->dependency->fabricator->title : null;
//            $bad->img_path = asset('/gallery/' . getCategoryName($bad->image->category_id) . '/small/' . $bad->image->path);
//            $bad->id = $globalCounter++;
//            $bad->url = route('ru.bad', ['alias' => $bad->alias]);
//        }
//        array_push($results, ['title' => 'Диетические добавки', 'icon' => 'glyph bad', 'data' => $bads]);
//
//        $wares = WareNew::select('id', 'title', 'alias', 'image_id')->where('title', 'like', $request->search . '%')->orWhere('alias', 'like', $request->search . '%')->take(15)->get();
//        foreach ($wares as $ware){
//            $ware->inname = null;
//            $ware->fabricator = $ware->dependency->fabricator ? $ware->dependency->fabricator->title : null;
//            $ware->img_path = asset('/gallery/' . getCategoryName($ware->image->category_id) . '/small/' . $ware->image->path);
//            $ware->id = $globalCounter++;
//            $ware->url = route('ru.ware', ['alias' => $ware->alias]);
//        }
//        array_push($results, ['title' => 'Изделия медицинского назначения', 'icon' => 'glyph ware', 'data' => $wares]);
//
//        $cosmetics = CosmeticNew::select('id', 'title', 'alias', 'image_id')->where('title', 'like', $request->search . '%')->orWhere('alias', 'like', $request->search . '%')->take(15)->get();
//        foreach ($cosmetics as $cosmetic){
//            $cosmetic->inname = null;
//            $cosmetic->fabricator = $cosmetic->dependency->fabricator ? $cosmetic->dependency->fabricator->title : null;
//            $cosmetic->img_path = asset('/gallery/' . getCategoryName($cosmetic->image->category_id) . '/small/' . $cosmetic->image->path);
//            $cosmetic->id = $globalCounter++;
//            $cosmetic->url = route('ru.cosmetic', ['alias' => $cosmetic->alias]);
//        }
//        array_push($results, ['title' => 'Косметические средства', 'icon' => 'glyph cosmetic', 'data' => $cosmetics]);
//        return response()->json($results, 200);
    }

    protected function searchUa(Request $request){
        $results = [];
        $globalCounter = 0;
        $drugs = Drug::select('id', 'utitle as title', 'alias', 'image_id')->where('utitle', 'like', $request->search . '%')->orWhere('alias', 'like', $request->search . '%')->take(15)->get();
        foreach ($drugs as $drug){
            $drug->inname = $drug->dependency->inname ? $drug->dependency->inname->title : null;
            $drug->fabricator = $drug->dependency->fabricator ? $drug->dependency->fabricator->title : null;
            $drug->img_path = asset('/gallery/' . getCategoryName($drug->image->category_id) . '/small/' . $drug->image->path);
            $drug->id = $globalCounter++;
            $drug->url = route('ua.drug', ['alias' => $drug->alias]);
        }
        array_push($results, ['title' => 'Препарати', 'icon' => 'glyph drug', 'data' => $drugs]);

        $bads = BadNew::select('id', 'title', 'alias', 'image_id')->where('utitle', 'like', $request->search . '%')->orWhere('alias', 'like', $request->search . '%')->take(15)->get();
        foreach ($bads as $bad){
            $bad->inname = null;
            $bad->fabricator = $bad->dependency->fabricator ? $bad->dependency->fabricator->title : null;
            $bad->img_path = asset('/gallery/' . getCategoryName($bad->image->category_id) . '/small/' . $bad->image->path);
            $bad->id = $globalCounter++;
            $bad->url = route('ua.bad', ['alias' => $bad->alias]);
        }
        array_push($results, ['title' => 'Дієтичні добавки', 'icon' => 'glyph bad', 'data' => $bads]);

        $wares = WareNew::select('id', 'title', 'alias', 'image_id')->where('utitle', 'like', $request->search . '%')->orWhere('alias', 'like', $request->search . '%')->take(15)->get();
        foreach ($wares as $ware){
            $ware->inname = null;
            $ware->fabricator = $ware->dependency->fabricator ? $ware->dependency->fabricator->title : null;
            $ware->img_path = asset('/gallery/' . getCategoryName($ware->image->category_id) . '/small/' . $ware->image->path);
            $ware->id = $globalCounter++;
            $ware->url = route('ua.ware', ['alias' => $ware->alias]);
        }
        array_push($results, ['title' => 'Вироби медичного призначення', 'icon' => 'glyph ware', 'data' => $wares]);

        $cosmetics = CosmeticNew::select('id', 'title', 'alias', 'image_id')->where('utitle', 'like', $request->search . '%')->orWhere('alias', 'like', $request->search . '%')->take(15)->get();
        foreach ($cosmetics as $cosmetic){
            $cosmetic->inname = null;
            $cosmetic->fabricator = $cosmetic->dependency->fabricator ? $cosmetic->dependency->fabricator->title : null;
            $cosmetic->img_path = asset('/gallery/' . getCategoryName($cosmetic->image->category_id) . '/small/' . $cosmetic->image->path);
            $cosmetic->id = $globalCounter++;
            $cosmetic->url = route('ua.cosmetic', ['alias' => $cosmetic->alias]);
        }
        array_push($results, ['title' => 'Косметичні засоби', 'icon' => 'glyph cosmetic', 'data' => $cosmetics]);
        return response()->json($results, 200);
    }

    protected function getDrug(Request $request){
        $q = mb_convert_encoding($request->q, "utf-8", "windows-1251");
        $drug = Drug::select('id', 'title', 'alias', 'image_id')->where('show', 1)->where('title', 'like', $q . '%')->take(15)->get();

        return response()->json($drug, 200);
    }
}
