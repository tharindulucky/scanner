<?php

require_once 'functions.php';

$session_id = $_GET['SessionId'];
$file_name = $_GET['file_name'];

$mode = $_GET['mode'] ?? 1;



$url = 'http://'.$scanner_ip_addr.'/api/session?SessionId='.$session_id;

$stopped = HTTPGet($url, ['SessionId' => $session_id]);



//echo $stopped;
echo $session_id."<br>";

?>
<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">

    <br><br>

    <div class="row" align="center">
        <div class="col-md-12">
            <h3>Scan Completed!</h3>
        </div>
    </div>

    <div class="row" align="center">
        <div class="col-md-12">
            <h5>Click Save to finish</h5>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-md-12">
            <a href="image.php?SessionId=<?php echo $session_id; ?>&file_name=<?php echo $file_name; ?>&mode=<?php echo $mode; ?>"  class="btn btn-primary btn-block btn-lg" >Save</a>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12" align="center">
            <a href="cancel.php?SessionId=<?php echo $session_id; ?>" class="btn btn-danger btn-lg" onclick="window.top.close();">Cancel</a>
        </div>
    </div>
</div>
</body>
<script>
  $(window).on("unload", function(e) {
    alert('DDD');
  });
</script>
</html>

