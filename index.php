<?php

$file_name = $_GET['image_name'];

?>
<a href="scanner.php"
   onclick="window.open('scanner.php?'<?php echo $file_name; ?>,
                         'newwindow',
                         'width=300,height=250');
              return false;">Scan</a>