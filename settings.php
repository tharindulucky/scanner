<?php
if(isset($_POST['ip_addr'])){
    $cookie_name = "scanner_ip_addr";
    $cookie_value = $_POST['ip_addr'];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

    echo "<script>window.close();</script>";
}
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
            <h3>Settings</h3>
        </div>
    </div>

    <div class="row" align="center">
        <div class="col-md-12">
            <h5>Please set the IP Address of the Scanner</h5>
        </div>
    </div>

    <br>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="row" align="center">
            <div class="col-md-12">
                <input type="text" class="form-control" value="<?php echo $_COOKIE['scanner_ip_addr'] ?? '' ?>" name="ip_addr">
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-12">
                <button type="submit" name="submit" class="btn btn-success btn-block btn-lg">Save</button>
            </div>
        </div>
    </form>

    <br>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12" align="center">
            <a href="#" class="btn btn-danger btn-lg" onclick="window.top.close();">Cancel</a>
        </div>
    </div>
</div>
</body>
</html>