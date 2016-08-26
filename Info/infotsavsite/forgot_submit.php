<?php
	if(isset($_REQUEST))
	{
		include('connect.php');
		$useremail = mysql_real_escape_string(stripslashes($_REQUEST['useremail']));
		$dob = mysql_real_escape_string(stripslashes($_REQUEST['dob']));
		if($useremail=='' || $dob=='')
		{
			$htmlError="1";
		}
		else
		{
			$query = "SELECT name,username,email FROM users WHERE dob='$dob' AND (username='$useremail' OR email='$useremail')";
			if($result = mysql_query($query,$con)) 
			{
				if($row = mysql_fetch_array($result))
                {
                    $username=$row['username'];
					$name = $row['name'];
					$password = mysql_real_escape_string(stripslashes(substr(str_shuffle('abcefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'),0,8)));
					
					$to=$row['email'];
					$from = "Infotsav 2012 <contact@infotsav.org>";
					$subject = "Your New Password for Infotsav 2012";
					
					$headers  = "MIME-Version: 1.0\r\n";
					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
					$headers .= "From: $from\r\n";
					
					$body = "<div style='width:700px; margin:auto;font-size:14px; font-family:Arial, Helvetica, sans-serif'>
							<br/>
							<a href='http://www.infotsav.org/'><h3 style='font-family:Verdana, Geneva, sans-serif; font-size:20px; text-decoration:none; color:#000'>Infotsav 2012</h3></a>
							<p>Dear $name,</p>
							<p>As requested by you, you new login details for Infotsav'12 are as follows-</p>
							<p>Username: <b>$username</b><br/>New Password: <b>$password</b><br/></p>
							<p>Please feel free to write to us at contact@infotsav.org should you need any clarification or assistance regarding Infotsav'12.</p>
							<p style='color:#666'><br/><br/>---<br/>
							Cheers!<br/>
							Web Admin<br/>
							Infotsav'12<br/>
							http://www.infotsav.org/</p>
						</div>";
					$pass = md5($password);
					$query1 = "UPDATE users SET password = '$pass' WHERE username='$username'";
					if($result = mysql_query($query1,$con)) 
					{
						mail($to,$subject,$body,$headers);
						$htmlError="0";
					}
					else
					{
						$htmlError="3";
					}
                }
                else
                {
                    $htmlError="2";
                }
			}
			else
			{
				$htmlError="4";
			}			
		}
		mysql_close($con);
		echo $htmlError;
	}	
?>