<?php

$file_name = $_GET['image_name'];

$configs = [
    'configuration' => [
        'DPI' => 300,
        'ScanSide' => 'Duplex',
        'ColorMode' => "Color",
        'SkipBlankPages' => 0
    ]
];

require_once 'functions.php';

$url = 'http://'.$scanner_ip_addr.'/api/session';

$scanner_wake = HTTPPost($url, array("postParam" => "foobar"), null);
$sessionId = json_decode($scanner_wake, true)['SessionId'];

echo $sessionId;

if($sessionId){
    $set_config = HTTPPut($url, $configs, $sessionId);
    $start_scan = HTTPPost($url.'/StartScan', array("SessionId" => $sessionId), $sessionId);
    echo $start_scan;
}
?>
<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="js/jquery-3.4.1.min.js"></script>
    </head>
    <body>
        <div class="container">

            <br><br>

            <div class="row" align="center">
                <div class="col-md-12">
                    <h3>Scanning...</h3>
                </div>
            </div>

            <div class="row" align="center">
                <div class="col-md-12">
                    <h5>Please insert the paper to the scanner</h5>
                </div>
            </div>

            <br>

            <div class="row" align="center">
                <div class="col-md-12">
                    <label><input type="checkbox" id="both_sides" value="both_sides"> Scan Both Sides</label>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-md-12">
                    <a id="done_simplex" href="stop.php?SessionId=<?php echo $sessionId; ?>&file_name=<?php echo $file_name; ?>" class="btn btn-success btn-block btn-lg">Done</a>
                    <a id="done_duplex" href="stop.php?SessionId=<?php echo $sessionId; ?>&file_name=<?php echo $file_name; ?>&mode=2" class="btn btn-success btn-block btn-lg">Done</a>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12" align="center">
                    <a href="cancel.php?SessionId=<?php echo $sessionId; ?>" class="btn btn-danger btn-lg" onclick="window.top.close();">Cancel</a>
                </div>
            </div>
        </div>
    </body>
    <script language="JavaScript">

      $( document ).ready(function() {
        $("#done_duplex").hide();
      });


        $('#both_sides').change(function() {
          if($('#both_sides').is(':checked') ){
            $("#done_simplex").hide();
            $("#done_duplex").show();
          }else{
            $("#done_duplex").hide();
            $("#done_simplex").show();
          }
        });

      window.onbeforeunload = confirmExit;
      function confirmExit()
      {
        alert('asdasdasd');
      }
    </script>
</html>


