<?php
session_start();
if(isset($_SESSION['username'])&&isset($_REQUEST))
{ 
	include('connect.php');
    $username = mysql_real_escape_string(stripslashes($_SESSION['username']));
    $curpassword = md5(mysql_real_escape_string(stripslashes($_REQUEST['curpassword'])));
    $password = md5(mysql_real_escape_string(stripslashes($_REQUEST['password'])));   
    $query = "SELECT username FROM users WHERE password='$curpassword' AND username='$username'";
    if($result = mysql_query($query,$con))
    {
        if($row = mysql_fetch_array($result))
        {
            $query1 = "UPDATE users SET password='$password' WHERE password='$curpassword' AND username='$username'";
            if($result = mysql_query($query1,$con))
            {
                $htmlError="0";
            }
            else
            {
                $htmlError="1";
            }
        }
        else
        {
            $htmlError="1";
        }
    }
    else
    {
        $htmlError="1";
    }
    mysql_close($con);
    echo $htmlError;
}
?>