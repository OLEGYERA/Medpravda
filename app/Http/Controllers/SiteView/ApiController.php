<?php

namespace Fresh\Medpravda\Http\Controllers\SiteView;

use Fresh\Medpravda\Drug;
use Fresh\Medpravda\BadNew;
use Fresh\Medpravda\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function searchRu(Request $request){
        $drugs = Drug::select('id', 'title', 'utitle', 'alias', 'image_id')->where(function($q) use ($request){
            $q->where('title', 'like', $request->search . '%')->orWhere('utitle', 'like', $request->search . '%')->orWhere('alias', 'like', $request->search . '%');
        })->with('image')->take(10)->get();

        $bads = BadNew::select('id', 'title', 'utitle', 'alias', 'image_id')->where(function($q) use ($request){
            $q->where('title', 'like', $request->search  . '%')->orWhere('utitle', 'like', $request->search  . '%')->orWhere('alias', 'like', $request->search  . '%');
        })->with('image')->take(10)->get();

        $result = $drugs->merge($bads);

        return response()->json($result, 200);
    }
}
