<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 15.05.17
 * Time: 17:51
 */

function urlLooper($url)
{
    $urlArray = array();

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'User-Agent:  Mozilla/5.0',
        'Accept: text/html',
        'Accept-Language: ru,en-us',
        'Accept-Charset: utf-8'
    ));

    curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
    curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

    $result = curl_exec($ch);

    $fh = fopen($url.'.txt', 'w') or die("can't open file");
    fwrite($fh, $result);
    fclose($fh);

    curl_close($ch);

    $regex = '|<a.*?href="(.*?)"|';
    preg_match_all($regex, $result, $parts);
    $links = $parts[1];
    foreach ($links as $link) {
        array_push($urlArray, $link);
    }
    curl_close($ch);

    foreach ($urlArray as $value) {
        if (preg_match("^(http|https)$:\/\/".$url.".*",$value)) {
            urlLooper($value);
        }
    }
}

$url = 'http://www.justfundraising.com/';
urlLooper($url, 5);