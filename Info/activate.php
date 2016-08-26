<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Activate Your Account</title>


    
    
    
<style type="text/css">
body {
	font-family:"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
	font-size:12px;
}



 .success {
	border: 1px solid;
	margin: 0 auto;
	padding:10px 5px 10px 60px;
	background-repeat: no-repeat;
	background-position: 10px center;
    
     width:450px;
     color: #4F8A10;
	background-color: #DFF2BF;
	background-image:url('images/success.png');
     
}



 .errormsgbox {
	border: 1px solid;
	margin: 0 auto;
	padding:10px 5px 10px 60px;
	background-repeat: no-repeat;
	background-position: 10px center;

     width:450px;
    	color: #D8000C;
	background-color: #FFBABA;
	background-image: url('images/error.png');
     
}

</style>

</head>
<body><?php
include ('config.php');
//connecting to database
$db=mysqli_connect($dbhost,$dbuser,$dbpassword,$dbdatabase);

if (isset($_GET['email']) && preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/', $_GET['email']))
{
    $email = $_GET['email'];
	//echo $email;
}
if (isset($_GET['key']) && (strlen($_GET['key']) == 32))//The Activation key will always be 32 since it is MD5 Hash
{
    $key = $_GET['key'];
	//echo $key;
}


if (isset($email) && isset($key))
{

    // Update the database to set the "activation" field to null
	
    $query_activate_account = "UPDATE registration SET email_act='1' WHERE(email ='$email' AND activation='$key')LIMIT 1";
    $result_activate_account = mysqli_query($db, $query_activate_account) ;
	/*$q="SELECT email_act FROM registration WHERE (email ='$email' AND activation='$key')";
	$r=mysqli_query($db,$q);
		if(mysqli_affected_rows($db)>0)
			{
				$re=mysqli_fetch_assoc($r);
				echo "\n".$re['email_act'];
			}
		else
			{
				echo"foff";
			}*/

    // Print a customized message:
    if (mysqli_affected_rows($db) == 1)//if update query was successfull
    {
    echo '<div class="success">Your account is now active. You may now <a href="index.php">Log in</a></div>';

    } else
    {
        echo '<div class="errormsgbox">Oopsa!Your account could not be activated. Please recheck the link or contact the system administrator.</div>';

    }

    mysqli_close($db);

} else {
        echo '<div class="errormsgbox">Error Occured .</div>';
}


?>
</body>
</html>