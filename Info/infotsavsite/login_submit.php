<?php
	session_start();
	if(isset($_REQUEST))
	{
		include('connect.php');
		$useremail = mysql_real_escape_string(stripslashes($_REQUEST['useremail']));
		$password = md5(mysql_real_escape_string(stripslashes($_REQUEST['password']))); 
		if($useremail=='' || $password=='')
		{
			$htmlError="1";
		}
		else
		{
			$query = "SELECT name,username,email FROM users WHERE password='$password' AND (username='$useremail' OR email='$useremail')";
			if($result = mysql_query($query,$con)) 
			{
				if($row = mysql_fetch_array($result))
                {
                    $_SESSION['username']=$row['username'];
                    $_SESSION['email']=$row['email'];
                    $_SESSION['name']=$row['name'];
                    $htmlError="0";
                }
                else
                {
                    $htmlError="2";
                }
			}
			else
			{
				$htmlError="3";
			}			
		}
		mysql_close($con);
		echo $htmlError;
	}	
?>