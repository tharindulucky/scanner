<?php

$img1 = 'http://192.168.1.113/api/session/image/1?SessionId=115397420';
$img2 = 'http://192.168.1.113/api/session/image/2?SessionId=115397420';

$dest = imagecreatefromjpeg($img1);
$src = imagecreatefromjpeg($img2);

$dest_dimesnsions = getimagesize($img1);

$new = imagecreatetruecolor($dest_dimesnsions[0], $dest_dimesnsions[1] *2 );

imagecopy($new, $dest, 0, 0, 0, 0, $dest_dimesnsions[0], $dest_dimesnsions[1]);
imagecopy($new, $src, 0, $dest_dimesnsions[1], 0, 0, $dest_dimesnsions[0], $dest_dimesnsions[1]);

header('Content-Type: image/jpeg');
imagejpeg($new);

imagedestroy($dest);
imagedestroy($src);