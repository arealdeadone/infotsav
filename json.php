<?php

require_once 'core/init.php';

$db = DB::getInstance();

//new main row
$coord = array();
for ($i=0; $i <6 ; $i++) {
	$x=mt_rand(0,100);
	$y=mt_rand(0,2300);
	$coord[$i] = array('x' => $x, 'y' => $y);
}


//new side row
$coord1=array();
for ($i=0; $i <2 ; $i++) {
	$x=mt_rand(300,580);
	$y=mt_rand(510,642);
	$coord1[$i] = array('x' => $x, 'y' => $y);
}


//new side row
$coord2=array();
for ($i=0; $i <2 ; $i++) {
	$x=mt_rand(780,1030);
	$y=mt_rand(786,930);
	$coord2[$i] = array('x' => $x, 'y' => $y);
}

//new side row
$coord3=array();
for ($i=0; $i <2 ; $i++) {
	$x=mt_rand(342,558);
	$y=mt_rand(1005,1149);
	$coord3[$i] = array('x' => $x, 'y' => $y);
}


//new side row
$coord4=array();
for ($i=0; $i <2 ; $i++) {
	$x=mt_rand(774,1002);
	$y=mt_rand(1221,1365);
	$coord4[$i] = array('x' => $x, 'y' => $y);
}

//new side row
$coord5=array();
for ($i=0; $i <2 ; $i++) {
	$x=mt_rand(296,560);
	$y=mt_rand(1439,1583);
	$coord5[$i] = array('x' => $x, 'y' => $y);
}

//new side row
$coord6=array();
for ($i=0; $i <2 ; $i++) {
	$x=mt_rand(786,1003);
	$y=mt_rand(1658,1790);
	$coord6[$i] = array('x' => $x, 'y' => $y);
}

$coord = json_encode($coord);
$coord1 = json_encode($coord1);
$coord2 = json_encode($coord2);
$coord3 = json_encode($coord3);
$coord4 = json_encode($coord4);
$coord5 = json_encode($coord5);
$coord6 = json_encode($coord6);

$updateArray = array(
	'coordinates' => $coord,
	'coordside1'  => $coord1,
	'coordside2'  => $coord2,
	'coordside3'  => $coord3,
	'coordside4'  => $coord4,
	'coordside5'  => $coord5,
	'coordside6'  => $coord6
);

$db->update("coords",1, $updateArray);

echo "updated";