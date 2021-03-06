<?php

/*function formatDate2() {
    return date('d.m.Y');
}*/


 if (!function_exists('getRusDate')) {
    function getRusDate($dateTime, $format = '%DAYWEEK%, d %MONTH% Y H:i', $offset = 0)
    {
       if (is_null($dateTime))
        {
            return '';
        }
        $date = \DateTime::createFromFormat('Y-m-d H:i:s', $dateTime);
        if (!$date)
        {
            return '';
        }

        $monthArray = array('января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря');
        $daysArray = array('Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье');

        $timestamp = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $dateTime)->timestamp;
        $timestamp += 3600 * $offset;

        $findArray = array('/%MONTH%/i', '/%DAYWEEK%/i');
        $replaceArray = array($monthArray[date("m", $timestamp) - 1], $daysArray[date("N", $timestamp) - 1]);
        $format = preg_replace($findArray, $replaceArray, $format);

        return date($format, $timestamp);
    }
}

if (!function_exists('uploads_path')) {
    function uploads_path()
    {
        return storage_path('app.uploads');
    }
}
if (!function_exists('string_split')) {
    function string_split($string = '')
    {
        return preg_split("/\\r\\n|\\r|\\n/",$string);
    }
}

if (!function_exists('count_addresses')) {
    function count_addresses($addresses = 0)
    {
        if($addresses){
            $addr_count = count(string_split($addresses));
            $addresses = $addr_count> 0 ? $addr_count : 0;
        }

        return $addresses;
    }
}

if (!function_exists('sort_link')) {
    function sort_link($link, $sorting, $tag = false)
    {
        if($tag){
            return $link.'?sort_by='.$sorting.'&tag='.$tag;
        }else{
            return $link.'?sort_by='.$sorting;
        }
    }
 }

if (!function_exists('format_string')) {
    function format_string($string)
    {
        return nl2br($string);
    }
}

if (!function_exists('ajax_respond')) {
    function ajax_respond($respond)
    {
        if($respond == true){
            return 1;
        }elseif(is_numeric($respond)){
            return $respond;
        }else{
            return 0;
        }
    }
}