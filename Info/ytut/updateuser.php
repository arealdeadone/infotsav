<?php
require ("connect.php");
$id=$_POST['id'];
$act_key=$_POST['act'];
$query="update user set act_key='$act_key' where id='$id'";
$result=mysql_query($query);
header("location:starkenterprise.php")
?>
