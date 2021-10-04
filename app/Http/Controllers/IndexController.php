<?php

namespace Fresh\Medpravda\Http\Controllers;

use Carbon\Carbon;

use Cache;
use DB;
use Fresh\Medpravda\Landing;
use Illuminate\Support\Facades\Storage;


class IndexController extends MainController
{
    public function landing_show($val){
        $landing = Landing::where('slug', $val)->first();
        $jss = '
            <script>
                $(\'#myTab a\').click(function (e) {
                    e.preventDefault()
                    $(this).tab(\'show\')
                })
            </script>
            <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKFztHzVA7_L75JrTwyrzhk2asYAWUL7I&callback=initMap"
                type="text/javascript">
            </script>

            <!-- Google Tag Manager -->
            <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({\'gtm.start\':
            new Date().getTime(),event:\'gtm.js\'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!=\'dataLayer\'?\'&l=\'+l:\'\';j.async=true;j.src=
            \'https://www.googletagmanager.com/gtm.js?id=\'+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,\'script\',\'dataLayer\',\'GTM-P3VXCMN\');</script>
            <!-- End Google Tag Manager -->
            <!-- Google Tag Manager (noscript) -->
            <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P3VXCMN"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
            <!-- End Google Tag Manager (noscript) -->
        ';

        $banner = $landing->banner;
        $modal = $landing->modals;
        $blocks = $landing->activeBlocks;

//        dd($landing, $banner, $modal, $blocks);

        return view('landings.custom')->with(compact('landing', 'modal', 'blocks', 'banner', 'jss'));
    }


    public function start(){

//        dd(1);
       $urls = [
            "https://cdn3.riastatic.com/photosnew/auto/photo/volkswagen_touareg__341468063f.jpg",
            'https://cdn1.riastatic.com/photosnew/auto/photo/volkswagen_touareg__341468056s.jpg',
            'https://cdn0.riastatic.com/photosnew/auto/photo/volkswagen_touareg__341468060s.jpg',
            'https://cdn4.riastatic.com/photosnew/auto/photo/volkswagen_touareg__341468059s.jpg',
            'https://cdn1.riastatic.com/photosnew/auto/photo/volkswagen_touareg__341468046s.jpg',
            'https://cdn3.riastatic.com/photosnew/auto/photo/volkswagen_touareg__341468058s.jpg',
            'https://cdn1.riastatic.com/photosnew/auto/photo/volkswagen_touareg__341468061s.jpg',
            'https://cdn3.riastatic.com/photosnew/auto/photo/volkswagen_touareg__341468048s.jpg',
            'https://cdn3.riastatic.com/photosnew/auto/photo/volkswagen_touareg__341468053s.jpg',
            'https://cdn2.riastatic.com/photosnew/auto/photo/volkswagen_touareg__341468057s.jpg',
            'https://cdn0.riastatic.com/photosnew/auto/photo/volkswagen_touareg__341468055s.jpg',
            'https://cdn1.riastatic.com/photosnew/auto/photo/volkswagen_touareg__341468051s.jpg',
            'https://cdn0.riastatic.com/photosnew/auto/photo/volkswagen_touareg__341476490s.jpg',
        ];

        for ($i=0; $i < 2; $i++){
        $id = $i;
        foreach($urls as $key=>$url123){
                        $now = Carbon::now();

//            $now = Carbon::now();
//
            $uri = $url123;
//
            $img_name = substr($uri, strrpos($uri, '/') + 1);
            $img_url = substr($uri, 0,strpos($uri, $img_name));
            $name_exploding = explode('.', $img_name);
            $extension = $name_exploding[1];
            $alternate_extension = 'webp';
            $clear_img_path = substr($name_exploding[0], 0, mb_strlen($name_exploding[0]) - 1);


            error_reporting(0);

//            /large
            $seek_img_large_jpg = file_get_contents($img_url . $clear_img_path . 'fx.' . $extension);
            if($seek_img_large_jpg){
                Storage::disk('webdav')->put('auto/photo/' . $id . '/large/' . $cardData['brand'] . '_' . $cardData['model'] . '_' . $key . '.' . $extension, $seek_img_large_jpg);
            }else{
                echo 'Error: ' . $img_url . $clear_img_path . 'fx.' . $extension . '<br/>';
            }

            $seek_img_large_webp = file_get_contents($img_url . $clear_img_path . 'fx.' . $alternate_extension);
            if($seek_img_large_webp){
                Storage::disk('webdav')->put('auto/photo/' . $id . '/large/' . $cardData['brand'] . '_' . $cardData['model'] . '_' . $key . '.' . $alternate_extension, $seek_img_large_webp);
            }else{
                echo 'Error: ' . $img_url . $clear_img_path . 'fx.' . $alternate_extension . '<br/>';
            }

////            /medium
            $seek_img_medium_jpg = file_get_contents($img_url . $clear_img_path . 'f.' . $extension);
            if($seek_img_medium_jpg){
                Storage::disk('webdav')->put('auto/photo/' . $id . '/medium/' . $cardData['brand'] . '_' . $cardData['model'] . '_' . $key . '.' . $extension, $seek_img_medium_jpg);
            }else{
                echo 'Error: ' . $img_url . $clear_img_path . 'f.' . $extension . '<br/>';
            }

            $seek_img_medium_webp = file_get_contents($img_url . $clear_img_path . 'f.' . $alternate_extension);
            if($seek_img_medium_webp){
                Storage::disk('webdav')->put('auto/photo/' . $id . '/medium/' . $cardData['brand'] . '_' . $cardData['model'] . '_' . $key . '.' . $alternate_extension, $seek_img_medium_webp);
            }else{
                echo 'Error: ' . $img_url . $clear_img_path . 'f.' . $alternate_extension . '<br/>';
            }
//
////            /small
//            $seek_img_small_jpg = file_get_contents($img_url . $clear_img_path . 'bx.' . $extension);
//            if($seek_img_small_jpg){
//                Storage::disk('webdav')->put('auto/photo/' . $id . '/small/' . $cardData['brand'] . '_' . $cardData['model'] . '_' . $key . '.' . $extension, $seek_img_small_jpg);
//            }else{
//                echo 'Error: ' . $img_url . $clear_img_path . 'bx.' . $extension . '<br/>';
//            }
//
//            $seek_img_small_webp = file_get_contents($img_url . $clear_img_path . 'bx.' . $alternate_extension);
//            if($seek_img_small_webp){
//                Storage::disk('webdav')->put('auto/photo/' . $id . '/small/' . $cardData['brand'] . '_' . $cardData['model'] . '_' . $key . '.' . $alternate_extension, $seek_img_small_webp);
//            }else{
//                echo 'Error: ' . $img_url . $clear_img_path . 'bx.' . $alternate_extension . '<br/>';
//            }
//
////            /mini
//            $seek_img_mini_jpg = file_get_contents($img_url . $clear_img_path . 's.' . $extension);
//            if($seek_img_mini_jpg){
//                Storage::disk('webdav')->put('auto/photo/' . $id . '/mini/' . $cardData['brand'] . '_' . $cardData['model'] . '_' . $key . '.' . $extension, $seek_img_mini_jpg);
//            }else{
//                echo 'Error: ' . $img_url . $clear_img_path . 's.' . $extension . '<br/>';
//            }
//
//            $seek_img_mini_webp = file_get_contents($img_url . $clear_img_path . 's.' . $alternate_extension);
//            if($seek_img_mini_webp){
//                Storage::disk('webdav')->put('auto/photo/' . $id . '/mini/' . $cardData['brand'] . '_' . $cardData['model'] . '_' . $key . '.' . $alternate_extension, $seek_img_mini_webp);
//            }else{
//                echo 'Error: ' . $img_url . $clear_img_path . 's.' . $alternate_extension . '<br/>';
//            }

            $emitted = Carbon::now();
//
            echo 'Уровень: ' . $key . ', сек: ' . $now->diffInSeconds($emitted) . '<br/>';

            echo "Name: " . $img_name . ', Extension: ' . $extension . ', Type: ' . $clear_img_path  . '<br/>';
//            echo $uri  . '<br/>';

        }




//            echo '<img src="' . route('lol', ['alias' => $i]) . '" />';
        }
    }


    public function generateURL($alias){

//        Cache::forget('img-' . $alias);
        $cache_result = Cache::store('file')->remember('img-' . $alias, 30, function () {
            return Storage::disk('webdav')->get('/Photos/123.png');
        });
        return response($cache_result)->header('Content-type','image/png');
    }
}
