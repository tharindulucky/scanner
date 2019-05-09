<?php

function HTTPGet($url, array $params) {
    $ch    = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

function HTTPPost($url, array $params, $sessionId) {
    $query = http_build_query($params);
    $ch    = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
    \curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'SessionId: '.$sessionId,  ));
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

function HTTPPut($url, array $params, $sessionId) {
    $query = \http_build_query($params);
    $ch    = \curl_init();
    \curl_setopt($ch, \CURLOPT_RETURNTRANSFER, true);
    \curl_setopt($ch, \CURLOPT_HEADER, 1);
    \curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'SessionId: '.$sessionId,  ));
    \curl_setopt($ch, \CURLOPT_URL, $url);
    \curl_setopt($ch, \CURLOPT_CUSTOMREQUEST, 'PUT');
    \curl_setopt($ch, \CURLOPT_POSTFIELDS, $query);
    $response = \curl_exec($ch);
    \curl_close($ch);
    return $response;
}

function HTTPDelete($url, array $params) {
    $query = \http_build_query($params);
    $ch    = \curl_init();
    \curl_setopt($ch, \CURLOPT_RETURNTRANSFER, true);
    \curl_setopt($ch, \CURLOPT_HEADER, false);
    \curl_setopt($ch, \CURLOPT_URL, $url);
    \curl_setopt($ch, \CURLOPT_CUSTOMREQUEST, 'DELETE');
    \curl_setopt($ch, \CURLOPT_POSTFIELDS, $query);
    $response = \curl_exec($ch);
    \curl_close($ch);
    return $response;
}

$scanner_ip_addr =  $_COOKIE['scanner_ip_addr'] ?? '10.1.1.0';