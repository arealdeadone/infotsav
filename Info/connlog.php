<?php 
session_start();
$con=mysql_connect("localhost","root","") or die("Failed to connect server");
$db=mysql_select_db("classinfo",$con) or die("Failed to connect to MySQL: " . mysql_error());

/*if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
else
{
echo "connected to database";
}
*/
function SignIn()
{  // $u=mysql_real_escape_string(htmlentities($_POST['user']);
	//$p=mysql_real_escape_string(htmlentities($_POST['pass']);
	// echo "Signup Called";
	// print_r($_POST);
   
if(!empty($_POST['user']))  
{
	
	$row = mysql_fetch_assoc(mysql_query("SELECT *  FROM `login` where `username`='".mysql_real_escape_string(htmlentities($_POST['user']))."' AND `pass`='".mysql_real_escape_string(htmlentities($_POST['pass']))."'"));
	//print_r($row);
	if(!empty($row))
	{

            if (isset($_COOKIE[['user']) && isset($_COOKIE['pass')) 
                      {
                      if (($_POST['user']!= $row['username']) || ($_POST['pass']!= $row['pass']) {    
                      header('Location: login.php');
                      } 
                      else {
                      header('location:index.html');
                         }



		if (isset('rmemberme')) {
			 setcookie('user', $_POST['user'], time()+60*60*24*365);
		     setcookie('pass', $_POST['pass'], time()+60*60*24*365);
		}
		else
			{setcookie('user', $_POST['user'], false;
		     setcookie('pass', $_POST['pass'], false);
		}//$_SESSION['id'] = $row['id'];
        header('location:index.html');
		//echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE...";
		//echo $_SESSION['id'];

	}
	else
	{
		echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...";
	}
}
}
if(isset($_POST['submit']))
{
	SignIn();
}


 ?>
