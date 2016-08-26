<?php
session_start();

unset($_SESSION['userid']);

	unset($_SESSION['emailid']);
	unset($_SESSION['status']);
	unset($_SESSION['username']);
	//session_destroy();

header('location:index.php');
?>


