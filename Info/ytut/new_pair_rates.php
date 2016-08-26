<?php
ini_set("allow_url_fopen", "1");
$file = "http://webcharts.fxserver.com/pairs/index.php";
echo $file;
$file = fopen($file, "r");
echo $file;
$file = fread($file, 4096);
echo $file;
exit;
?>
