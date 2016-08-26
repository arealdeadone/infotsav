<?php
	session_start();
	include('connect.php');
	if(isset($_REQUEST))
	{
		$name = mysql_real_escape_string(stripslashes($_REQUEST['name']));
		$username = mysql_real_escape_string(stripslashes($_REQUEST['username']));
		$password = md5(mysql_real_escape_string(stripslashes($_REQUEST['password'])));
		$mobile = mysql_real_escape_string(stripslashes($_REQUEST['mobile']));
		$email = mysql_real_escape_string(stripslashes($_REQUEST['email']));
		$institute = mysql_real_escape_string(stripslashes($_REQUEST['institute']));
		$branch = mysql_real_escape_string(stripslashes($_REQUEST['branch']));
		$year = mysql_real_escape_string(stripslashes($_REQUEST['year']));
		$dob = mysql_real_escape_string(stripslashes($_REQUEST['dob']));
		$gender = mysql_real_escape_string(stripslashes($_REQUEST['gender']));
		$address = mysql_real_escape_string(stripslashes($_REQUEST['address']));
		$captcha = mysql_real_escape_string(stripslashes($_REQUEST['captcha']));
		$timestamp = date('yy-m-d H:i:s', time()); 
		if($captcha != $_SESSION['captcha'])
		{
			$htmlError="1";
		}
		else
		{
			include('ip.php');
			$query = "INSERT INTO users VALUES (0, '$name', '$institute', '$branch', '$year', '$username', '$password', '$gender', '$dob', '$mobile', '$email', '$address', 0, '$timestamp', '$external_ip', '$internal_ip')";
			if($result = mysql_query($query,$con)) 
			{
				$htmlError="0";
			}
			else
			{
				$htmlError="2";
			}
		}
		echo $htmlError;
	}
	mysql_close($con);
?>