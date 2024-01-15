<?php

function c($url, $post = false) {

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}


function isValidMd5($md5 = '') {
    return preg_match('/^[a-f0-9]{32}$/', $md5);
}

function build_url($key, $value, $current_url = false) {
    $get_array = array();
    if ($current_url == false) {
        $current_url = $_SERVER['QUERY_STRING'];
    } else {
        $current_url = parse_url($current_url, PHP_URL_QUERY);
    }
    if (isset($current_url) && $current_url != "") {
        parse_str($current_url, $get_array);
    }
    $get_array[$key] = $value;
    if ($value == 'clear') {
        unset($get_array[$key]);
    }

    return http_build_query($get_array);
}