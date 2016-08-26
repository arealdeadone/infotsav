<?php
/*
AUTHOR:Anshul Vyas
*/
require "connect.php";
require "connect1.php";
require "security.php";


$secret="6Lesxw0TAAAAALlbgIihBz8x9p4VEV7eT9cTcI_o";
$ip=$_SERVER['REMOTE_ADDR'];
$captcha=$_POST['g-recaptcha-response'];
$rsp=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");
$arr=json_decode($rsp,TRUE);
if(!$arr['success'])
{
echo"1111";
header("location:ERROR.php?errors=Wrong Captcha");
}
else
{

$teamname=$_POST['user_name'];
$password=$_POST['passwd'];
$teamname=escape_for_mysql($teamname);
$password=escape_for_mysql($password);
$passwordHash = md5($password);

session_start();
/*include_once 'securimage/securimage.php';
	$securimage = new Securimage();
if ($securimage->check($_POST['captcha_code']) == false) {

	  // the code was incorrect

	  // you should handle the error so that the form processor doesn't continue

	 

	  // or you can use the following code if there is no validation or you do not know how

	  header("Location:ERROR.php?errors=The security code entered was incorrect.<br><a href=index.php>Click here</a> to go back");

	  exit;}*/
/////////////////////////////////////////////////////////////////////////////////////////
$mail = escape_for_mysql($_POST['user_name']);
/*if(strstr($teamname,'@'))
{
	$eid=explode("@", $teamname);
		
	if($eid[1]=="gmail.com")
	{
		$email=str_replace(".", "", $eid[0]);
		$mail=$email."@gmail.com";
	}
}*/

//require "connect1.php";
//fetching data from admin
$admin_query="SELECT haltvar FROM admin";
$admin_res=@mysql_query($admin_query);
$res=@mysql_fetch_assoc($admin_res);
$haltvar=$res['haltvar'];
if($haltvar==1)
{
// searching in the forex users database 
	$forex_user_query="SELECT * FROM user WHERE email_id1='$mail' LIMIT 1
	";
	$forex_user_res=@mysql_query($forex_user_query);
	if(@mysql_num_rows($forex_user_res)==1)
		{
			$result=@mysql_fetch_assoc($forex_user_res);
			if($result['passwd']==$passwordHash)
			{
			if($result['act_key']==1)
				{
			$_SESSION['userid']=$result['id'];
			$_SESSION['username']=$result['user_id'];
			$_SESSION['emailid']=$result['email_id1'];
			$_SESSION['status']=$haltvar;

			//redirecting the user to games page
			header('location:portfolio.php');
				}
			else
				{
					header('location:ERROR.php?errors=Your account is not yet activated!!');
				}
			}
			else
			{
				header('location:ERROR.php?errors=Wrong Password!!!!<br><a href=index.php>Click here</a> to go back');
			}		
		}
	else
		{
			//fetching users data from infotsav's table
			
			$info_user_query="SELECT * FROM infotsav15.registration WHERE email='$mail' LIMIT 1";
			$info_result=@mysql_query($info_user_query);
			if(@mysql_num_rows($info_result)==1)
			{
			$result=@mysql_fetch_assoc($info_result);
			$password=$result['password'];
			if($password==$passwordHash)
				{
			$mob_flag=$result['phone_act'];
			$email_flag=$result['email_act'];

				if($mob_flag==1 || $email_flag==1)
					{	
						//echo $mob_flag." ".$email_flag;
						$name=$result['name'];
						$college=$result['institute'];
						$email=$result['email'];
						$teamname=$result['username'];
						$password=$result['password'];
						$uid=$result['id'];
						if($mob_flag==1)
							$act=$mob_flag;
						if($email_flag==1)
							$act=$email_flag;

						
						// if account is existing and is activated write the data into forex user table
						$sql="INSERT INTO user (name1, institute_name, email_id1, user_id, passwd,name2,email_id2,id,cash_available,cash_paid,margin,act_key)
						VALUES('$name','$college','$email','$teamname','$password','','','$uid','100000','100000','0','$act')";
						if(@mysql_query($sql))
							{
								$_SESSION['userid']=$uid;
								$_SESSION['username']=$teamname;
								$_SESSION['emailid']=$email;
								$_SESSION['status']=$haltvar;
								header('location:portfolio.php');
							}
						
						else
							{
								header('location:ERROR.php?errors=System Error!!!!!<br><a href=index.php>Click here</a> to go back');
							}
					}
					else
					{
						header('location:ERROR.php?errors=Your account is not yet activated!!<br><a href=index.php>Click here</a> to go back');
					}
				}
				else
					{
						header('location:ERROR.php?errors=Wrong Password!!!!<br><a href=index.php>Click here</a> to go back');
					}
				}
			else
				{
					header('location:ERROR.php?errors=Please register yourself at infotsav.com<br><a href=http://www.infotsav.com>Click here</a> to register');
				}
		}	

}
else
{
	header('location:ERROR.php?errors=Forex is halted temporarily,will begin at 1230 hrs' );
}}
?>
