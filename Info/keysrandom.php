<?php
$app_id=array("0063f79838044597a6b05d9","c484c4c2c3b1400a869dd58","0427a2133b234f4e924523f");
$access_token=array("ceb6ea8a693dbf00f78380517c03f69680e12b09","8b0811742db5e7858273d1bc3ae64a778e02293e","fc6cec0e0c3bcbe5b0e73cc171c22488598781e6");
$random=rand(0,sizeof($app_id)-1);
$array = array("app_id" => $app_id[$random],"access_token" => $access_token[$random]);
//print_r(json_encode($array));
?>

