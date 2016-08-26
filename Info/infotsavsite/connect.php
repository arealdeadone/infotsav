<?php 
$hostname = "localhost"; // usually is localhost, but if not sure, check with your hosting company, if you are with webune leave as localhost
$db_user = "infotsav12"; // change to your database user
$db_password = "infotsav_12$"; // change to your database password
$database = "infotsav12"; // provide your database name


# STOP HERE
####################################################################
# THIS CODE IS USED TO CONNECT TO THE MYSQL DATABASE
$con = mysql_connect($hostname, $db_user, $db_password);
mysql_select_db($database,$con);
?>
