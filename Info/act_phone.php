<?php
session_start();
include('config.php');
include('keysrandom.php');
function run_url($url_otp)
		{
			$ch=curl_init();
			curl_setopt($ch, CURLOPT_URL,$url_otp);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt ($ch, CURLOPT_PORT , 443);
			$otp_json=curl_exec($ch);
			curl_close($ch);
			return $otp_json;
		}
$id=$_SESSION['id'];
$mobile_act_query="SELECT mobileno FROM registration WHERE id='$id'";
$con=mysqli_connect($dbhost,$dbuser,$dbpassword,$dbdatabase);
$mobile_act_res=mysqli_query($con,$mobile_act_query);
$res=mysqli_fetch_assoc($mobile_act_res) ;
 $mob=$res['mobileno'] ;
 //echo $mob;
$mob_otp="+91".$mob;
//$url_otp="https://www.cognalys.com/api/v1/otp/?app_id=0063f79838044597a6b05d9&access_token=ceb6ea8a693dbf00f78380517c03f69680e12b09&mobile=";
//header("Location:".$url_otp);
$url_otp="https://www.cognalys.com/api/v1/otp/?app_id=".$array['app_id']."&access_token=".$array['access_token']."&mobile=".$mob_otp;
$otp_res=run_url($url_otp);
echo $otp_res;
$json_res=json_decode($otp_res,true);
	if($json_res['status']=='success')
		{
			$otp_start=$json_res['otp_start'];
$key=$json_res['keymatch'];
$_SESSION['key']=$json_res['keymatch'];
			$_SESSION['otp_start']=$otp_start;
			header('Location:otp_confirm.php');
		}
	else
		{
			echo $json_res['errors'];
		}
			
 
 

?>
