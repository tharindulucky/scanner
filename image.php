<?php

require_once 'functions.php';

$url = 'http://'.$scanner_ip_addr.'/api/session/image/1?SessionId='.$_GET['SessionId'];
$url2 = 'http://'.$scanner_ip_addr.'/api/session/image/2?SessionId='.$_GET['SessionId'];
$url_del = 'http://'.$scanner_ip_addr.'/api/session?SessionId='.$_GET['SessionId'];

$file_name = $_GET['file_name'];
$mode = $_GET['mode'] ?? 1;

if($mode == 1){
    $scannedImage = HTTPGet($url, ['SessionId' => $_GET['SessionId']]);
    //header('Content-Type: image/jpeg');
    //header("Content-Length: 484568" );

    $new_file = $file_name.'.jpg';
    file_put_contents('C:\APPL\scans\\'.$new_file, $scannedImage);

    HTTPDelete($url_del, ['SessionId' => $_GET['SessionId']]);
}elseif($mode == 2){
    $scannedImage1 = $url;
    $scannedImage2 = $url2;

    $dest = imagecreatefromjpeg($scannedImage1);
    $src = imagecreatefromjpeg($scannedImage2);

    $dest_dimesnsions = getimagesize($scannedImage1);

    $new_img = imagecreatetruecolor($dest_dimesnsions[0], $dest_dimesnsions[1] *2 );

    imagecopy($new_img, $dest, 0, 0, 0, 0, $dest_dimesnsions[0], $dest_dimesnsions[1]);
    imagecopy($new_img, $src, 0, $dest_dimesnsions[1], 0, 0, $dest_dimesnsions[0], $dest_dimesnsions[1]);

    imagedestroy($dest);
    imagedestroy($src);

    ///////////////


    //header('Content-Type: image/jpeg');
    //header("Content-Length: 9004568" );

    $new_file = $file_name.'.jpg';
    imagejpeg($new_img, 'C:\APPL\scans\\'.$new_file);
    //file_put_contents('C:\APPL\scans\\'.$new_file, file_get_contents(imagejpeg($new_img)));

    HTTPDelete($url_del, ['SessionId' => $_GET['SessionId']]);

}

echo "<script>window.close();</script>";

?>
