<?php

namespace Fresh\Medpravda\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Artisan;

class CacheKiller
{
    public function handle($request, Closure $next)
    {
//        return $next($request);
//        $cachedViewsDirectory = app('path.storage').'/framework/views/';
//        if ($handle = opendir($cachedViewsDirectory))
//        {
//            Artisan::call('cache:clear');
//            while (false !== ($entry = readdir($handle)))
//            {
//                if (strstr($entry, '.'))
//                {
//                    continue;
//                }
//                @unlink($cachedViewsDirectory.$entry);
//            }
////            Artisan::call('view:clear');
//
//            closedir($handle);
//        }
//
        return $next($request);
    }
}
