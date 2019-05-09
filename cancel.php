<?php

require_once 'functions.php';

$url_del = 'http://'.$scanner_ip_addr.'/api/session?SessionId='.$_GET['SessionId'];
HTTPDelete($url_del, ['SessionId' => $_GET['SessionId']]);

?>
