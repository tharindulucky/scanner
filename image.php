<?php

$url = 'http://'.$scanner_ip_addr.'/api/session/image/1?SessionId='.$_GET['SessionId'];
$url_del = 'http://'.$scanner_ip_addr.'/api/session?SessionId='.$_GET['SessionId'];

require_once 'functions.php';

$scannedImage = HTTPGet($url, ['SessionId' => $_GET['SessionId']]);
header('Content-Type: image/jpeg');
header("Content-Length: 484568" );

$new_file = time().'.jpg';
file_put_contents('C:\Users\Tharindu\Desktop\scan\\'.$new_file, $scannedImage);

HTTPDelete($url_del, ['SessionId' => $_GET['SessionId']]);
?>
