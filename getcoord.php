<?php 
require_once 'core/init.php';

//if(!Tokens::check(Input::get('hashCheck')))
//{
//	if(Input::get('hashCheck') === Session::get('token_main'))
//		Session::delete('token_main');
//	elseif(Input::get('hashCheck') === Session::get('token_side'))
//		Session::delete('token_side');
//	else
//	{
//		header('Content-Type: application/json');
//		echo json_encode(array('status' => 'error', 'data' => 'No direct Script Access Allowed'));
//		die();
//	}
//}

function caeser($value, $key){
	$ciphertext = "";
	$value = str_split($value);
	for($i=0; $i<count($value); $i++)
		$ciphertext .= ((ord($value[$i]) - ord("0") + $key)%10);
	return $ciphertext;
}

$db = DB::getInstance();
$row = $db->get("coords", array('id', '=', 1))->first();

header('Content-Type: application/json');
if( !$db->error() && isset($_GET['test']))
{
	$res = '[';
	$res .= $row->coordside1.',';
	$res .= $row->coordside2.',';
	$res .= $row->coordside3.',';
	$res .= $row->coordside4.',';
	$res .= $row->coordside5.',';
	$res .= $row->coordside6.']';

	echo $res.PHP_EOL;
	$obj = (object) array('x' => '366', 'y' => '548');
	for($i=0; $i<count(json_decode($res)); $i++)
		if(in_array($obj,json_decode($res)[$i]))
			print_r(json_decode($res));
}
elseif(isset($_GET['coordside']))
{
	$res = '[';
	$res .= $row->coordside1.',';
	$res .= $row->coordside2.',';
	$res .= $row->coordside3.',';
	$res .= $row->coordside4.',';
	$res .= $row->coordside5.',';
	$res .= $row->coordside6.']';

	$decoded = json_decode($res);
	$encrypted = array();
	$ckey = mt_rand(1,8);

	foreach ($decoded as $key => $value) {
		$encrypted[$key] = array();
		foreach ($value as $itemkey => $itemval) {
			$encrypted[$key][$itemkey] = array(
				'x' => caeser($itemval->x,$ckey),
				'y' => caeser($itemval->y,$ckey)
			);
		}
	}

	$encrypted[count($decoded)] = md5($ckey);

	echo json_encode($encrypted);
}
elseif(isset($_GET['main']))
{
	$decoded = json_decode($row->coordinates);
	$encrypted = array();
	$ckey = mt_rand(1,8);
	foreach($decoded as $key => $value){
		$encrypted[$key] = array(
			'x' => caeser($value->x,$ckey),
			'y' => caeser($value->y,$ckey)
		);

	}
	$encrypted[count($decoded)] = md5($ckey);

	echo json_encode($encrypted);
}
else
{
	$res = json_encode(array('status' => 'error', 'data' => "Some error occured!"));
	echo $res;
}

?>