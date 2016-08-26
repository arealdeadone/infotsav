<?php
	if(isset($_GET))
	{
		include ("connect.php");
		$q = mysql_real_escape_string(stripslashes($_REQUEST['q']));
		$atr = mysql_real_escape_string(stripslashes($_REQUEST['atr']));
		$query ="SELECT $atr FROM users WHERE $atr ='$q';";
		$result = mysql_query($query,$con) or die('error occured : '.mysql_error());
		if($row = mysql_fetch_array($result))
		{
			$rslt = '1';
		}
		else
		{
			$rslt = '0';
		}
		mysql_close($con);
	}
	else $rslt = '0';
	echo $rslt;
?>