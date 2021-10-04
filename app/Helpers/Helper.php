<?php

use Carbon\Carbon;

/**
 *  function what return string with height, width tags
 * @param $abs_image_path
 * @return string
 */

function image_width_height_return_tags($abs_image_path)
{
    try {
        list($width, $height) = getimagesize($abs_image_path);

        return sprintf('width="%s" height="%s"', $width, $height);
    } catch (ErrorException $e)
    {
        return '';
    }
}

function getCityName($city)
{

   //$city = \DB::connection('mysql2')->select(" select city FROM region_cities_views WHERE slug_city like '%$city%' LIMIT 0,1");
    $city = \DB::connection('mysql2')->select(" select city FROM drug_stores WHERE slug_city like '%$city%' LIMIT 0,1");

    return $city[0]->city;
}

function getCategoryName($id){
    switch ($id){
        case 1:
            return 'Vne-Kategorii';
            break;
        case 2:
            return 'Avatari';
            break;
        case 3:
            return 'Diplomy';
            break;
        case 4:
            return 'Preparaty';
            break;
    }
}

function calcAvarage($review){
    return ($review->quality + $review->packaging + $review->effect + $review->safety + $review->availability)/5;

}

function getRatingAvarage($reviews){
    $averageRating = 0;
    if(count($reviews) === 0){
        return 0;
    }
    foreach ($reviews as $key => $review){
        $temporaryAverageRating = calcAvarage($review);
        if($key == 0){
            $averageRating = $temporaryAverageRating;
        }
        else{
            $averageRating += $temporaryAverageRating;
        }
    }
    return round($averageRating/count($reviews), 2);
}

function getItemAvarage($reviews, $type){
    $averageRating = 0;
    if(count($reviews) === 0){
        return 0;
    }
    foreach ($reviews as $key => $review){
        $temporaryAverageRating = $review[$type];

        if($key == 0){
            $averageRating = $temporaryAverageRating;
        }
        else{
            $averageRating += $temporaryAverageRating;
        }
    }
    return round($averageRating/count($reviews), 2);
}


function generateRatingStar($rating, $title){
    $rating_str = '<div class="review-estimation" title="' . $title . ': ' . $rating . ' из 5">';

    if($rating < 1){
        $rating_str .= '<span class="icon-empty-star"></span><span class="icon-empty-star"></span><span class="icon-empty-star"></span><span class="icon-empty-star"></span><span class="icon-empty-star"></span>';
    }
    else if($rating >= 1 && $rating <= 1.2){
        $rating_str .= '<span class="icon-star"></span><span class="icon-empty-star"></span><span class="icon-empty-star"></span><span class="icon-empty-star"></span><span class="icon-empty-star"></span>';
    }
    else if($rating > 1.2 && $rating < 1.8){
        $rating_str .= '<span class="icon-star"></span><span class="icon-half-star"></span><span class="icon-empty-star"></span><span class="icon-empty-star"></span><span class="icon-empty-star"></span>';
    }
    else if($rating >= 1.8 && $rating <= 2.2){
        $rating_str .= '<span class="icon-star"></span><span class="icon-star"></span><span class="icon-empty-star"></span><span class="icon-empty-star"></span><span class="icon-empty-star"></span>';
    }
    else if($rating > 2.2 && $rating < 2.8){
        $rating_str .= '<span class="icon-star"></span><span class="icon-star"></span><span class="icon-half-star"></span><span class="icon-empty-star"></span><span class="icon-empty-star"></span>';
    }
    else if($rating >= 2.8 && $rating <= 3.2){
        $rating_str .= '<span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-empty-star"></span><span class="icon-empty-star"></span>';
    }
    else if($rating > 3.2 && $rating < 3.8){
        $rating_str .= '<span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-half-star"></span><span class="icon-empty-star"></span>';
    }
    else if($rating >= 3.8 && $rating <= 4.2){
        $rating_str .= '<span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-empty-star"></span>';
    }
    else if($rating > 4.2 && $rating < 4.8){
        $rating_str .= '<span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-half-star"></span>';
    }
    else if($rating >= 4.8){
        $rating_str .= '<span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span>';
    }

    $rating_str .= '</div>';

    return $rating_str;
}

function renderNameOfMonth($mon, $lang)
{
    $year_months = [
        'Jan' => ['ru' => 'января', 'ua' => 'січня'],
        'Feb' => ['ru' => 'февраля', 'ua' => 'лютого'],
        'Mar' => ['ru' => 'марта', 'ua' => 'березня'],
        'Apr' => ['ru' => 'апреля', 'ua' => 'квітня'],
        'May' => ['ru' => 'мая', 'ua' => 'травня'],
        'Jun' => ['ru' => 'июня', 'ua' => 'червня'],
        'Jul' => ['ru' => 'июля', 'ua' => 'липня'],
        'Aug' => ['ru' => 'августа', 'ua' => 'серпня'],
        'Sep' => ['ru' => 'сентября', 'ua' => 'вересня'],
        'Oct' => ['ru' => 'октября', 'ua' => 'жовтня'],
        'Nov' => ['ru' => 'ноября', 'ua' => 'листопада'],
        'Dec' => ['ru' => 'декабря', 'ua' => 'грудня'],
    ];

    return $year_months[$mon][$lang];
}

function shortTag($text){
    $textNhtml = strip_tags($text);
    $textNbsp = str_replace("&nbsp;", '', $textNhtml);

    if(mb_strlen($textNbsp) > 256){
        return mb_substr($textNbsp, 0, 256) . '...';
    } else{
        return $textNbsp;
    }
}



function daysOrMonth($time, $lang)
{
    $diff = Carbon::now()->format('d') - $time->format('d');
    switch ($diff){
        case 0:
            return ['time' => $time->format('H:i'), 'date' => $lang == "ru" ? 'Сегодня' : 'Сьогодні'];
        case 1:
            return ['time' => $time->format('H:i'), 'date' => $lang == "ru" ? 'Вчера' : 'Вчора'];
        default:
            return ['time' => $time->format('H:i'), 'date' => $time->format('d') . ' ' . renderNameOfMonth($time->format('M'), $lang)];
    }
}

