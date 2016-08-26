<?php
	session_start();
	if(isset($_GET))
	{
		if($_GET['q']==$_SESSION['captcha']) echo '1';
		else echo '0';
	}
?>