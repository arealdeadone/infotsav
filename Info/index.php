<?php
session_start();
	//require_once('mail.php');
	include('config.php');
	include('ip.php');

//$y=rand(0,9);
//$z=rand(0,9);
//mysql database connectivity
	$y=rand(0,9);
	$z=rand(0,9);
	$x=$z+$y;

	//mysql database connectivity
	$db=mysqli_connect($dbhost,$dbuser,$dbpassword,$dbdatabase);
	if(isset($_POST['submit'])){
//$x=$y+$z;
//echo $_POST['captcha'];
//echo $x;
 //if(($x!=$_POST['captcha']))
/*		{
			echo '<script type="text/javascript">';
			echo 'alert("Invalid Captcha");';
				echo '</script>';
		}
else {*/
$correctsum = $_POST['correctsum'];
$captcha = $_POST['captcha'];
		if($captcha!=$correctsum)
		{
			echo '<script>';
			echo 'alert("Invalid Captcha")';
				echo '</script>';
		}
else
	{
			
		$name= @mysql_real_escape_string(stripslashes($_POST['name']));
$uname= @mysql_real_escape_string(stripslashes($_POST['usname']));
		//$this->$name= $this->mysqli->real_escape_string(stripslashes($_POST['name']));
		$pwd= @md5(mysql_real_escape_string(stripslashes($_POST['pwd'])));
		$rpwd= @md5(mysql_real_escape_string(stripslashes($_POST['rpwd'])));
		$phone= @mysql_real_escape_string(stripslashes($_POST['phone']));
		$email= @mysql_real_escape_string(stripslashes($_POST['email']));
		
		$ins= @mysql_real_escape_string(stripslashes($_POST['ins']));
		
		$year= @mysql_real_escape_string(stripslashes($_POST['year']));
		$gender= @mysql_real_escape_string(stripslashes($_POST['gender']));
		$ip=getIP();	
			$email_check_query="SELECT * FROM registration WHERE email='$email'";
			$email_check_result=mysqli_query($db,$email_check_query);
                         $uname_check="SELECT * FROM registration WHERE username='$uname'";
                         $uname_result=mysqli_query($db,$uname_check);
				if(mysqli_num_rows($email_check_result)>0)
					{
						echo'<script type="text/javascript">
							alert("This Email-ID is aleady Registered");
						</script>';
					}
else if(mysqli_num_rows($uname_result)>0)
{
echo'<script type="text/javascript">
							alert("This Username is aleady Registered");
						</script>';
}
				else
					{
					$activation=md5(uniqid(rand(), true)); 
		$query= "INSERT INTO registration(name,password,mobileno,institute,year,email,gender,ip,activation,username
) VALUES('$name','$pwd','$phone','$ins','$year','$email','$gender','$ip','$activation','$uname')";
		$result=mysqli_query($db,$query);
		if(mysqli_affected_rows($db)>0)
			{
			mysqli_insert_id($db);
			$r=' http://ec2-54-68-60-248.us-west-2.compute.amazonaws.com';
			$r1=' http://www.infotsav.com';
			$message = " To activate your account, please click on this link:\n\n";
                $message .= $r1. '/activate.php?email=' . urlencode($email) . "&key=$activation";
                //mail($email, 'Registration Confirmation', $message, 'From: amanjain7898@gmail.com');
				//' http://ec2-54-68-60-248.us-west-2.compute.amazonaws.com/activate.php?email=' . urlencode($email) . "&key=$activation"
				
				

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have   access to that
date_default_timezone_set('Etc/UTC');

require 'PHPMailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer();

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging

//$mail->SMTPDebug = 3;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
//$mail->Host = 'email-smtp.us-west-2.amazonaws.com';
$mail->Host ='smtp.gmail.com';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
// I tried PORT 25, 465 too
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
//$mail->Username = "SES Secret ID";

//Password to use for SMTP authentication
//$mail->Password = "SES Secret Key";////
//$mail->Username   = "AKIAISKE522APD3K4GTQ";
$mail->Username   = "help@infotsav.org";
$mail->Password   = "bragface56";
//$mail->Password   = "AriprUmUU83IO/u2tiT71fnebOpEnn7QWw9qz2/eP2En";
//Set who the message is to be sent from
$mail->setFrom('help@infotsav.org', 'Infotsav');

//Set who the message is to be sent to
$mail->addAddress($email,$name);

//Set the subject line
$mail->Subject = 'Confirmation Mail Infotsav 2015';


$mail->Body = $message;
//Replace the plain text body with one created manually
//$mail->AltBody = 'This is a plain-text message body';
//$mail->send();
//if(
//{
	
	//alert")
	//header('Location:index.php' );
//}
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo '<script>
						alert("Thank you for registering, Check your mail!");
					  </script>';
}

				
			/*//echo"SUCCESSS";
			

                // Finish the page: */
              //  
			
			}
		/*else
		echo"Failure";*/
					}
	
}
	}
	$inv=0;
	if(isset($_POST['signin'])){
	
		
		$lemail= mysql_real_escape_string(stripslashes($_POST['lemail']));
		$lpwd= md5(mysql_real_escape_string(stripslashes($_POST['lpwd'])));
                  $login="SELECT * FROM registration WHERE (email='$lemail' OR mobileno='$lemail') AND password='$lpwd'  LIMIT 1";
	                    $login_result=mysqli_query($db,$login);
			if(mysqli_affected_rows($db)>0)
				{
					$res=mysqli_fetch_assoc($login_result);
                                          if(!is_numeric($lemail))
                    {
                       
                                        if(($res['email_act']==1))
                                       {
                                       $_SESSION['uname']=$res['name'];
					$_SESSION['id']=$res['id'];
					$_SESSION['email']=$res['email'];
					$_SESSION['phone']=$res['mobileno'];
					$_SESSION['gender']=$res['gender'];
					$_SESSION['ins']=$res['institute'];
					$_SESSION['phono']=$res['phone_act'];
$_SESSION['year']=$res['year'];
                                        // echo '<script language="javascript">';
                                        // echo 'alert("m")';
					header('index.php');

                                         }
                                       else if(($res['email_act']==0) AND($res['phone_act']==1))
                                       {
                                            echo '<script language="javascript">';
                                             echo 'alert("Email not verified,please try your Phone Number")';
						echo '</script>';header('index.php');

                                        }
                                       else 
 

            {
  echo '<script language="javascript">';
                                             echo 'alert("Please verify your credentials")';
						echo '</script>';
header('index.php');
}
}


else
{
//$login="SELECT * FROM registration WHERE email='$lemail'  AND password='$lpwd'  LIMIT 1";
//$login_result=mysqli_query($db,$login);
//			if(mysqli_affected_rows($db)>0)
//				{
//$res=mysqli_fetch_assoc($login_result);
						if(($res['phone_act']==1) )
							{
					$_SESSION['uname']=$res['name'];
					$_SESSION['id']=$res['id'];
					$_SESSION['email']=$res['email'];
					$_SESSION['phone']=$res['mobileno'];
					$_SESSION['gender']=$res['gender'];
					$_SESSION['ins']=$res['institute'];
					$_SESSION['phono']=$res['phone_act'];
					$_SESSION['year']=$res['year'];
//echo $_SESSION['year'];

					header('index.php');
							}
     
                                       else if(($res['email_act']==1) AND($res['phone_act']==0))
                                       {
                                            echo '<script language="javascript">';
                                             echo 'alert("Phone not verified,please try your Email")';
						echo '</script>';
header('index.php');

                                        }
else 
 

            {
  echo '<script language="javascript">';
                                             echo 'alert("Please verify your credentials")';
						echo '</script>';
header('index.php');
}}

}
else
{
echo '<script language="javascript">';
                                             echo 'alert("Wrong Credentials")';
						echo '</script>';
header('index.php');
}
}

		//$login="SELECT * FROM registration WHERE (email='$lemail' or mobileno='$lemail') AND password='$lpwd'  LIMIT 1";
		//$login_result=mysqli_query($db,$login);
			//if(mysqli_affected_rows($db)>0)
				//{
					//$res=mysqli_fetch_assoc($login_result);
						//if(($res['email_act']==1) OR($res['phone_act']==0))
							
					//$_SESSION['uname']=$res['name'];
					//$_SESSION['id']=$res['id'];
					//header('index.php');
							
						//else
						//	{
						//		echo'<script type="text/javascript">
						//	alert("Your account is not activated");
						//</script>';
							
				//}
			
			//else
				//{
				//	echo'<script type="text/javascript">
						//	alert("You are not a registered user");
						//</script>';
				//}
	//}
	
	
if(isset($_POST['change']))
{
//echo '5';
$act=100*rand(0,9)+10*rand(0,9)+rand(0,9);
$act=md5($act);
$remail=@$email= @mysql_real_escape_string(stripslashes($_POST['lemail']));
$qry="SELECT * FROM registration WHERE email='$remail'";
$result=mysqli_query($db,$qry);
$res=mysqli_fetch_assoc($result);
if($res>0)
{
//echo $act;
//echo $res['username'];
//$qrye="INSERT INTO registration (tmp_hash) VALUES('$act') WHERE email='$remail'";
$qrye="UPDATE registration SET tmp_hash='$act' WHERE email='$remail'";
$resuult=mysqli_query($db,$qrye) or die("Can't");
$url="http://www.infotsav.com/recover.php?email=".$remail."&key=".$act;
$mes="Click on the link to reset password:".$url;
require 'PHPMailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer();

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging

//$mail->SMTPDebug = 3;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
//$mail->Host = 'email-smtp.us-west-2.amazonaws.com';
$mail->Host ='smtp.gmail.com';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
// I tried PORT 25, 465 too
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
//$mail->Username = "SES Secret ID";

//Password to use for SMTP authentication
//$mail->Password = "SES Secret Key";////
//$mail->Username   = "AKIAISKE522APD3K4GTQ";
$mail->Username   = "help@infotsav.org";
$mail->Password   = "bragface56";
//$mail->Password   = "AriprUmUU83IO/u2tiT71fnebOpEnn7QWw9qz2/eP2En";
//Set who the message is to be sent from
$mail->setFrom('help@infotsav.org', 'Infotsav');

//Set who the message is to be sent to
$mail->addAddress($remail);

//Set the subject line
$mail->Subject = 'Reset Password';


$mail->Body = $mes;
if (!$mail->send()) {
echo'<script>
alert("Sorry, Please check your email or Try again, our mail servers might be busy");
</script>';

}
else 
{

echo'<script>
alert("Mail sent, Check your email");
</script>';
}
}
else
{
echo'<script>
alert("You have not registered,Please register as soon as possible");
</script>';
}
}	
?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html lang="en" class="no-js">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
                <meta name="author" content="Infotsav"/>
		<meta name="keywords" content="IIITM, Gwalior, Tech fest, Mangerial Fest, Competition, Fest, knowafest" />
                <meta description="Techno-Managerial fest of IIITM Gwalior"/>
		<title>Infotsav | ABV-IIITM </title>
		
		<!-- Bootstrap -->
		<script src="js/modernizr.custom.js"></script>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/jquery.fancybox.css" rel="stylesheet"> 
		<link href="css/flickity.css" rel="stylesheet" >
		<link href="css/animate.css" rel="stylesheet">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Nunito:400,300,700' rel='stylesheet' type='text/css'> 
		<link href="css/styles.css" rel="stylesheet">
		<link href="css/queries.css" rel="stylesheet">
		<link href="css/style2.css" rel="stylesheet">
		
	
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/min/toucheffects-min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="js/flickity.pkgd.min.js"></script>
		<script src="js/jquery.fancybox.pack.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		
	<!--	<script src="js/bootstrap.js"></script>   -->
	<!--	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.js"></script>   -->
		<script src="js/bootstrap.min.js"></script> 
		<script src="js/retina.js"></script>
		<script src="js/waypoints.min.js"></script>
		<link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
		<script src="js/min/scripts-min.js"></script>
		<!-- Facebook and Twitter integration -->
		<meta property="og:title" content=""/>
		<meta property="og:image" content=""/>
		<meta property="og:url" content=""/>
		<meta property="og:site_name" content=""/>
		<meta property="og:description" content=""/>
		<meta name="twitter:title" content="" />
		<meta name="twitter:image" content="" />
		<meta name="twitter:url" content="" />
		<meta name="twitter:card" content="" />
	
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="img/logo200.png" >
	
	<style>
	@font-face {
    font-family: myFirstFont;
    src: url(trench100free.otf);
} 
.abc {
    font-family: myFirstFont;
	
}
	</style>

<script type="text/javascript">
    $(window).load(function(){

		 $('#newModal').modal('show');
    });
</script> 


	</head>
	
	<body>
		<!--[if lt IE 7]>
		<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->
		<!-- open/close -->

	
<!--<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index:99999;">
							 <div class="modal-dialog modal-lg">
								<div class="modal-content">
								 <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h2 class="modal-title" id="myModalLabel" style="color: #1bba9c; font-family:Quicksand; text-align:center"><b>Notification</b></h2>
									</div>
		
			<div class="modal-body">
			<p style="margin-left:10px; margin-right:10px ;font-size:16px; text-align:center; font-family:Quicksand;"> All the events of Infotsav 2015  have already ended. Click<a  href="payment.php" >here</a> to see the results. </p> <br>

			</div>
			
			</div>
			</div>
			</div>-->
		
		
		
		
		
		
		  <!-- Second navbar for sign in -->
		  
    <nav class="fixed-nav-bar navbar navbar-default" style="background-image=">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         <a class="navbar-brand" style="color:#1abc9c; font-size:30px; " href="index.php" ><img src="img/logo200.png" style="width:50px; height:50px; margin-top:-14px">&nbsp;Infotsav<font size=3 color=#000000><sub>3<sup>rd</sup> & 4<sup>th</sup> Oct</sub></font> </a> 
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-2">
          <ul class="nav navbar-nav navbar-right">
			<?php if($inv == 1){
			?>
			<li>
				<h3 style="color:red">Invalid Sign In!</h3>
			<li>
			<?php
			}
			?>
		  
            <li><a style="color:#1abc9c;" href="#" title="Home">Home</a></li>
            
            <li><a style="color:#1abc9c"href="https://play.google.com/store/apps/details?id=infotsav.pack.parse" target="_blank" title="Mobile app">Mobile app</a></li>
            <li><a style="color:#1abc9c" href="#events" title="Events">Events</a></li>
            <li><a style="color:#1abc9c" href="sponsors.php" title="Sponsors">Sponsors</a></li>
<li><a style="color:#1abc9c;" href="payment.php" title="payment">Result</a></li>
            <li>
			 
               <a class="dropdown-toggle dropdown" style="color:#1abc9c" id="menu2" data-toggle="dropdown" href="">Contact
                  <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu2">
					
                     <li role="presentation"><a href="#team" role="menuitem" tabindex="-1 " >Contact Us</li>
					 <li role="presentation" class="divider"></li>
                     <li  role="presentation"><a  href="" data-toggle="modal" data-target="#minemodal">Hospitality</a>
                     
                   </ul>
               
			</li>
			
			<!-- mobile app modal 



			
			
			<div class="modal fade" id="appmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index:9999;">
							  <div class="modal-dialog modal-lg">
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h2 class="modal-title" id="myModalLabel" style="color: #1bba9c; font-family:Quicksand; text-align:center"><b>Mobile App</b></h2>
									</div>
		
			<div class="modal-body">
			<p style="margin-left:10px; margin-right:10px ;font-size:16px; text-align:center;">Mobile App will be launched soon!
			</div></p>
			
			</div>
			</div>
			</div>
			
			
-->


			
			<!-- hospitality modal -->


			 
            
			<div class="modal fade" id="minemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index:9999;">
							  <div class="modal-dialog modal-lg">
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h2 class="modal-title" id="myModalLabel" style="color: #1bba9c; font-family:Quicksand; text-align:center"><b>Hospitality</b></h2>
									</div>
		
			<div class="modal-body">
			<p style="margin-left:10px; margin-right:10px ;font-size:16px">

			</div></p>
			
			</div>
			</div>
			</div></li>
			
			
			
			
			
			
			
			
			
			
			
			
			
				<?php
				if(isset($_SESSION['uname'])){
				?>
				
				<li>
								 <div class="dropdown">
    <button class="btn   dropdown-toggle" type="button" id="menu1" data-toggle="dropdown"><b> <?php echo $_SESSION['uname']; ?></b> &nbsp;
    <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
      <li role="presentation"><a href="settings.php" role="menuitem" tabindex="-1 " >My profile<span class="glyphicon glyphicon-user pull-right"></span></a></li>
	   <li role="presentation" class="divider"></li>
  
      <li role="presentation"><a role="menuitem" tabindex="-1" href="logout.php">Logout<span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
    </ul>
  </div>
 
				
			
			
		
				
				
				<?php
				}else{
				?>
				<li>
					<a style="color:#fff; font-size:15px"class="btn btn-default btn-outline btn-circle collapsed fa fa-user"  data-toggle="collapse" href="#nav-collapse2" aria-expanded="false" aria-controls="nav-collapse2">&nbsp; Login </a>
				</li>
				
				<?php
				}
				?>
				
				
		
				
			
          </ul>
		  
          <div class="collapse nav navbar-nav nav-collapse slide-down" id="nav-collapse2">
            <form class="navbar-form navbar-right form-inline" role="form" action="index.php" method="POST">
              <div class="form-group">

                <label class="sr-only" for="Email">Email</label>
                <input type="text" class="form-control" name="lemail" id="Emaill" placeholder="Email/Phone" autofocus required />

		
              </div>
              <div class="form-group">
                <label class="sr-only" for="Password">Password</label>
                <input type="password" class="form-control" name="lpwd" id="Password" placeholder="Password" required />
		
		



              </div>

              <button type="submit" class="btn btn-success" name="signin">Sign in</button><br>
		<a style="font-size:12px; " href="" data-toggle="modal" data-target="#password"><b>Forgot Password</b></a>
            </form>
          </div>
		  
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->	
	

          <div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index:9999;">
							  <div class="modal-dialog modal-md-4">
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h2 class="modal-title" id="myModalLabel" style="color: #1bba9c; font-family:Quicksand; text-align:center"><b>Forgot Password</b></h2>
									</div>
		
			<form name="Form1" method="post" action="index.php" ">
									  <div class="modal-body">
										  
										  
										  
										  <table class="table ">
											
											<td>
													<div class="form-group">
													<div class="col-md-4">
														<label class="control-label " id="lemail" style="color: #666666; font-size: 17px; text-align: left" ></label><br><br>
														
														<input type="text" name="lemail"  id="lemail" placeholder="Enter Email-id"><br>
														<button type="submit"  id="change" name="change">Submit</button>
														</td>
												</div> 
													</div>
												</table>
												</div>
												</form>
					
														
														
														
															
			</div>
			
			</div>
			</div>
			</div>
			  
			  </div>
	
	
	<div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
  <!-- Overlay -->
  

  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
    <li data-target="#bs-carousel" data-slide-to="1"></li>
    <li data-target="#bs-carousel" data-slide-to="2"></li>
  </ol>
  
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item slides active">
      <div class="slide-1"></div>
      <div class="hero">
        <hgroup>
            <h1 class="animated fadeInDown">Infotsav 2015</h1>       
            <h3 class="animated fadeInUp"><font size=4>ABV-Indian Institute Of Information Technology and Management Gwalior</h3></font>
        </hgroup>
<?php if(!isset($_SESSION['id'])) { ?>
        <button class="btn btn-hero btn-lg" data-toggle="modal" data-target="#myModal" role="button">Register</button><?php } ?>
      </div>
    </div>
    <div class="item slides">
      <div class="slide-2"></div>
      <div class="hero">        
        <hgroup>
            <h1 class="animated fadeInDown">Infotsav 2015</h1>       
            <h3 class="animated fadeInUp"><font size=4>ABV-Indian Institute Of Information Technology and Management Gwalior</h3></font>
        </hgroup>      
       <?php if(!isset($_SESSION['id'])) { ?>
        <button class="btn btn-hero btn-lg" data-toggle="modal" data-target="#myModal" role="button">Register</button><?php } ?>
      </div>
    </div>
    <div class="item slides">
      <div class="slide-3"></div>
      <div class="hero">        
        <hgroup>
            <h1 class="animated fadeInDown">Infotsav 2015</h1>       
            <h3 class="animated fadeInUp"><font size=4>ABV-Indian Institute Of Information Technology and Management Gwalior</h3></font>
        </hgroup>
        <?php if(!isset($_SESSION['id'])) { ?>
        <button class="btn btn-hero btn-lg" data-toggle="modal" data-target="#myModal" role="button">Register</button><?php } ?>
      </div>
    </div>
  </div> 
</div>
		
		
	
		
			
				

				
				
				 
					
					
					
			
							
							
							
							<!-- Modal -->
							
							   <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby=        "myModalLabel" aria-hidden="true" style="z-index:9999;">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h2 class="modal-title" id="myModalLabel" style="color: #1bba9c; font-size: 25px; "><br>Register Here</h2>			
											</div>
								  
								  
										<form name="myForm" method="post" action="index.php" onsubmit="return validateForm()">
										
										<div class="modal-body">
										  
										    <table class="table ">
												<tr>
													<td><br>
												
														<div class="form-group">
														
															<label class="control-label col-md-4" id="name" style="color: #666666; font-size: 17px; text-align: left" > Name: </label>
																
															<div class="col-md-6">
															
																<input type="text" name="name" class="form-control" id="name"placeholder="Enter Name">
																
															</div>
														</div>
													</td>
													
													<td><br>
														<div class="form-group">
															<label class="control-label col-md-4" style="color: #666666; 	font-size: 17px; text-align: left" > Email 	ID: </label>
																															
															<div class="col-md-6">
																<input type="email" name="email" class="form-control" id="email" placeholder="Email id">
															</div>
														</div>
													</td>
												</tr>
												
												
											<tr>
												<td>
													<div class="form-group">
														<label class="control-label col-md-4" style="color: #666666; font-size: 17px; text-align: left" > Password: </label>
														
														<div class="col-md-6">
															<input type="password" name="pwd" class="form-control" id="pwd" placeholder="Password">
														</div>
													</div>
												</td>
												
												<td>
													<div class="form-group">
														<label class="control-label col-md-4" style="color: #666666; font-size: 17px; text-align: left"  > Re-Enter Password: </label>
														
														<div class="col-md-6">
															<input type="password" name="rpwd" class="form-control" id="rpwd" placeholder="Password Again">
														</div>
													</div>												
												</td>
											</tr>
											
											<tr>
												<td>
													<div class="form-group">
														<label class="control-label col-md-4" style="color: #666666; font-size: 17px; text-align: left" > Gender: </label>
														<div class="col-md-6">
															<select class="form-control" id="gender" name="gender">
																<option >Select Gender</option>
																<option value="male">Male</option>
																<option value="female">Female</option>
															</select>
														</div>
													</div>
												
												</td>
												<td>
												
													<div class="form-group">
														<label class=" col-md-4" style="color: #666666; font-size: 17px; text-align: left" > Mobile No: </label>
														<div class="col-md-6">
															<input type="text" name="phone" class="form-control" id="phone" placeholder="Mobile No.">
														</div>
													</div>
												</td>
												
											</tr>
											
											<tr>
												<td>
													<div class="form-group">
														<label class="control-label col-md-4" style="color: #666666; font-size: 17px; text-align: left" > Institute Name: </label>
														<div class="col-md-6">
															<input type="text" name="ins" class="form-control" id="ins" placeholder="Institute Name">
														</div>
													</div>
												</td>
												
												<td>
												
													<div class="form-group">
														<label class="control-label col-md-4" style="color: #666666; font-size: 17px; text-align: left"> Current Year: </label>
														<div class="col-md-6">
															<select class="form-control" id="year" name="year">
																<option>Select Year</option>
																<option value="1">1st</option>
																<option value="2">2nd</option>
																<option value="3">3rd</option>
																<option value="4">4th</option>
																
																<option value="5">Other</option>
															</select>
														</div>
													</div>
												</td>
												
											</tr>
<tr>
												<td>
													<div class="form-group">
											         <label class="control-label col-md-4" style="color: #666666; font-size: 17px; text-align: left"> Username: </label>
                                                     <div class="col-md-6">
                                                	 <input type="text" name="usname" class="form-control" id="usname" placeholder="Username">
										
													</div>
												</div>
												</td>
												<td>
													<div class="form-group">
											         <label class="control-label col-md-4" style="color: #666666; font-size: 17px; text-align: left"> <?php $z=rand(0,9); $y=rand(0,9); $x=$z+$y; echo $z;?> + <?php echo $y; ?>= </label>
												 <div class="col-md-6">
                                                	 <input type="text" name="captcha" class="form-control" id="captcha" placeholder="Answer">
										
													</div>
												</div>
												</td>
											</tr>
<input type="hidden" method="POST" name="correctsum" value="<?php echo $x; ?>"/>

											
												<td colspan="2" style="text-align:center"><br>
													<button type="submit" class="btn btn-hero btn-lg" name="submit">Submit!</button>
												</td>
											
											
										  </table>		  
										  
									  </div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										</div>
										
								  </form>

   
   

								  
								  
								  
				
								</div>
							  </div>
							</div>
							
							
							
							
						</div>
					        
					
					
					
					    <div class="scroll-top-wrapper ">
	                        <span class="scroll-top-inner">
		                    <i class="fa fa-2x fa-arrow-circle-up"></i>
                            </span>
                        </div>
				
				
			
		
		
		
		

		
		
		
		
		

  
 
		
		
		
		
		
		
		<section class="video" id="ABC" >
			<div class="container" >
				<div class="row">
					<div class="col-lg-12 text-center">
						<h1><a href="https://www.youtube.com/watch?v=gEbH3NQ6xw8" class="youtube-media"><i class="fa fa-play-circle-o"></i></a></h1>
						     <ul class="social">
                                <li><a href="https://www.facebook.com/Infotsav?fref=ts" target="_blank" ><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
		         	            <!--
			                    <li><a href=""><i class="fa fa-youtube-play"></i></a></li>
			                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
		          	            -->
                            </ul>
					</div>
				</div>
			</div>
		</section>
		
		
		
		<!-- Aman Section
   ================================================== -->
     <section id="about">
	 <div class="container">

      

         <div class="rofl wp1">

            <img class="profile-pic"  src="img/logog.png" alt="" />

         </div>

         <div class="lol " >

            <h2  ><B>About Infotsav'15</B></h2>

            <p style="font-size:14px">With vivid fests’ jubilations hovering around every college, Infotsav is unique in

its kind as it encourages knowledge with fun. It is an unprecedented fest which 

focuses on enhancing technical skill development and raging towards bang-on 

entrepreneurship. An amalgamation of Technical, Managerial, Online 

Simulation and Quizzing Events, Infotsav is back to challenge innovative minds.

 A series of Challenging and exciting Technical events will be held including 

Programming Contest, Software development, App Development contests 

which will have a new flavour. Several other skill based events such as Web 

Development, Code Rush and BugSpot are also a great snack for code lovers. 

The Fest is a perfect concoction of technical and non-technical events.
            </p>

           
               

                  <h2><B>Contact Details</B></h2>
                  <p class="address" style="font-size:16px">
						   <span>Infotsav Cell</span><br>
						   <span>ABV-
						        Indian Institute of Information<br>
								Technology & Management Gwalior</span><br>
						   <span>+91-9479874663</span><br>
                     <span>help@infotsav.org</span>
					   </p></font>

               

               <!-- <div class="columns download">
                  <p>
                     <a href="#" class="button"><i class="fa fa-download"></i>Download Resume</a>
                  </p>
               </div> -->

             <!-- end row -->

         </div> <!-- end .main-col -->

		 
    
    </div>
   </section> 
		
		
		
		<section class="features-list" id="features">
			<div class="container" style="border-bottom: 1px solid #4e9ba3;" >
				<div class="row" >
					<div class="col-md-12" style="right:10px">

						<div class="col-md-4 feature-1 wp2">
							<div class="feature-icon">
								<i class="fa fa-code fa-lg"></i>
							</div>
							<div class="feature-content">
								<h1>Events</h1>
								<p>It's raw, hot and happening. The fiesta complemented by extravagent events.A must to attend for new bloods.</p>
								<a href="#events" class="read-more-btn">Read More <i class="fa fa-chevron-circle-right"></i></a>
							</div>
						</div>
						<div class="col-md-4 feature-2 wp2 delay-05s">
							<div class="feature-icon">
								<i class="fa fa-flash fa-lg"></i>
							</div>
							<div class="feature-content">
								<h1>Guest-lectures</h1>
								<p>Technology advancing at the rate knots.The fest allows you to witness and learn about the change and keep pace with time.</p>
								<a href="#lectures" class="read-more-btn">Read More <i class="fa fa-chevron-circle-right"></i></a>
							</div>
						</div>
						<div class="col-md-4 feature-3 wp2 delay-1s">
							<div class="feature-icon">
								<i class="fa fa-cogs fa-lg"></i>
							</div>
							<div class="feature-content">
								<h1>Workshops</h1>
								<p>Doing is the best way to learn. Be apart of our workshops and get an expertise over your domain.</p>
								<a href="#guest" class="read-more-btn">Read More <i class="fa fa-chevron-circle-right"></i></a>
							</div>
						</div>

					</div>
				</div><br><br><br><br><br><br><br><br>
			</div>
		</section>
		
			
		
		<section class="events" id="events">
			<div class="container"  style="border-bottom: 1px solid #4e9ba3;">
				<div class="row">
				<h1 style="text-align:center;"><span>Check out our Events</span></h1><BR><BR><BR><br>
					<ul class="grid "  >
					
		
						<li >
							<figure>
								<img src="img/abc/technical.png" alt="Screenshot 01"><br>
							
								<figcaption>
								<div class="caption-content">
									<a href="technical.php" >
										<i class="fa fa-search"></i><br>
										<p>TECHNICAL</p>
									</a>
								</div>
								</figcaption>
							</style>
							</figure>
						</li>
						<li>
							<figure>
								<img src="img/abc/sameeksha.jpg" alt="events 01">
								
								<figcaption>
								<div class="caption-content">
									<a href="managerial.php"  class="single_image">
										<i class="fa fa-search"></i><br>
										<p>MANAGERIAL</p>
									</a>
								</div>
								</figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="img/abc/it quiz.jpg" alt="events 01">
								
								<figcaption>
								<div class="caption-content">
									<a href="simulation.php"  class="single_image">
										<i class="fa fa-search"></i><br>
										<p>SIMULATION EVENTS</p>
									</a>
								</div>
								</figcaption>
							</figure>
						</li>
						
					</ul>
				</div>
				<div class="row">
					<ul class="grid">
						
						<li style="border-right: 1px solid #828282;">
							<figure>
								<img src="img/abc/gamiacs.png" alt="events 01">
                               
								<figcaption>
								<div class="caption-content">
									<a href="gamiacs.php"  class="single_image">
										<i class="fa fa-search"></i><br>
										<p>GAMIACS</p>
									</a>
								</div>
								</figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="img/abc/codeweavers.jpg" alt="events 01">
								
								<figcaption>
								<div class="caption-content">
									<a href="quiz.php"  class="single_image">
										<i class="fa fa-search"></i><br>
										<p>Quiz</p>
									</a>
								</div>
								</figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="img/abc/robo.jpg" alt="events 01">
								
								<figcaption>
								<div class="caption-content">
									<a href="robo.php"  class="single_image">
										<i class="fa fa-search"></i><br>
										<p>ROBO FIESTA</p>
									</a>
								</div>
								</figcaption>
							</figure>
						</li>
					</ul>
				</div> <br><br><br><br><br>
			</div>
		</section>
		
        <section id="guest" style="border-bottom: 1px solid #ddd;">	
  <div class="container" >
  <div class="row">
    <div class="col-lg-12"><br>
      <h1 style="text-align:center;"><span>Our Workshops</span></h1><BR><BR><BR>
      
      <ul class="timeline">
        <li style="list-style:none">
          <div class="timeline-image rotate ">
            <img class="img-circle img-responsive" src="img/ws1.jpg" alt="">
          </div>
          <div class="timeline-panel">
            <div class="timeline-heading">
             	
              <h4 class="subheading">Cyber Hacking</h4>
		
		

            </div>
            <div class="timeline-body">
              <p class="text-muted" style="text-align:justify" >
              <font color=#404040>  Cyberx Securities </font>offers Workshop-cum-Championship under the aegis of Infotsav'15.It will be a two days workshop covering as many as possible topics like Cyber Securtiy, Cryptography, Website hacking. <font color=#404040>Free tool kit</font>  will be given to all the participants along with a certificate from Cyberx Securities and will provide further assistance in career opportunities. Top 3 winners of the workshop will get Gift Vouchers. Registration fee is Rs. 900/-
              </p>
		<a class="pull-left" data-toggle="modal" data-target="#cyber" style="font-size:18px" href="">Read more</a>
            </div>
          </div>
          <div class="line"></div>
        </li>

        <li class="timeline-inverted">
          <div class="timeline-image rotate">
            <img class="img-circle img-responsive" src="img/ws2.png" alt="">
          </div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              
              <h4 class="subheading">Game Development</h4>
            </div>
            <div class="timeline-body">
              <p class="text-muted">
               <font color=#404040>TechBharat Consulting</font> offers its Workshop on Game Development under the aegis of Infotsav'15.It will be a two days workshop covering all the elements of Game Development.Registration fee is Rs.1000/-  
              </p>
<a class="pull-left" data-toggle="modal" data-target="#game" style="font-size:18px" href="">Read more</a>
            </div>
          </div>
          <div class="line"></div>
        </li>
        <li style="list-style:none">
          <div class="timeline-image rotate">
            <img class=" img-responsive" src="img/ws3.jpg" alt="">
          </div>
          <div class="timeline-panel">
            <div class="timeline-heading">
             
              <h4 class="subheading">How to build your own Startup</h4>
            </div>
            <div class="timeline-body">
              <p class="text-muted" style="text-align:justify">
               "You're committing to search for one of the rare ideas that generates rapid growth" - <b>Paul Graham.</b> An Entrepreneur starting a startup is committing to solve a harder type of problem than ordinary businesses do. For all those budding Entrepreneur we present our workshop on 'How To Build your own Startup'.Registration fee is Rs.600/- The workshop will be conducted by an eminent entrepreneur <b>Ronak Dhoot - CTO & Co-founder <i>Geek Shastra</i></b>.
              </p>
<a class="pull-left" data-toggle="modal" data-target="#startup" style="font-size:18px" href="">Read more</a>
            </div>
          </div>
          
        </li>
       
      </ul>
	  <br><br><br><br>
    </div>
  </div>
</div>
</section>
<br><br>



<!--modals-->



	
<div class="modal fade" id="cyber" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index:99999;">
							 <div class="modal-dialog modal-lg">
								<div class="modal-content">
								 <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h2 class="modal-title" id="myModalLabel" style="color: #1bba9c; font-family:Quicksand; text-align:center"><b>Cyber Hacking</b></h2>
									</div>
		
			<div class="modal-body">
			<p style="margin-left:auto; margin-right:auto ;text-align:center;font-size:16px;font-family:Quicksand;">Complete details will be uploaded soon</p> <br>

			</div>
			
			</div>
			</div>
			</div>
		



<!-- game development modal -->


	
<div class="modal fade" id="game" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index:99999;">
							 <div class="modal-dialog modal-lg">
								<div class="modal-content">
								 <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h2 class="modal-title" id="myModalLabel" style="color: #1bba9c; font-family:Quicksand; text-align:center"><b>Game Development</b></h2>
									</div>
		
			<div class="modal-body">
			<p style="margin-left:auto; margin-right:auto ;text-align:center;font-size:16px;font-family:Quicksand;">Complete details will be uploaded soon</p> <br>

			</div>
			
			</div>
			</div>
			</div>
		

<!-- startup modal -->



	
<div class="modal fade" id="startup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index:99999;">
							 <div class="modal-dialog modal-lg">
								<div class="modal-content">
								 <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h2 class="modal-title" id="myModalLabel" style="color: #1bba9c; font-family:Quicksand; text-align:center"><b>How to build your own Startup</b></h2>
									</div>
		
			<div class="modal-body">
			<p style="margin-left:auto; margin-right:auto ;text-align:center;font-size:16px;font-family:Quicksand;">Complete details will be uploaded soon</p> <br>

			</div>
			
			</div>
			</div>
			</div>























		
		
		
		<section id="lectures" style="border-bottom: 1px solid #ddd;">
		<div class="container"> 
        <div class="row">



                    <div class="col-md-12 text-center " data-wow-delay="0.1s">
					<h1 style="text-align:center;"><span>Guest-lectures</span></h1><BR><BR><BR>
                        <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                            <!-- Bottom Carousel Indicators -->
                           <ol class="carousel-indicators">
                                <li data-target="#quote-carousel" data-slide-to="0" class="active"><img class="img-responsive " src="img/l1.jpg" alt="">
                                </li>
                                <li data-target="#quote-carousel" data-slide-to="1"><img class="img-responsive" src="img/l2.jpg" alt="">
                                </li>
                                <li data-target="#quote-carousel" data-slide-to="2"><img class="img-responsive" src="img/l3.jpg" alt="">
                                </li>
				<li data-target="#quote-carousel" data-slide-to="3"><img class="img-responsive" src="img/l4.jpg" alt="">
                                </li>
				<li data-target="#quote-carousel" data-slide-to="4"><img class="img-responsive" src="img/l5.jpg" alt="">
                                </li>
                            </ol>

                            <!-- Carousel Slides / Quotes -->
                           <div class="carousel-inner text-center">
							
							

                                <!-- Quote 1 -->
                            	 <div class="item active">
                                    <blockquote>
                                        <div class="row">
                                            <div class="col-sm-8 col-sm-offset-2">

                                             
<p>An Engineer by education , an entrepreneur by accident , a photographer by interest & humane by choice. He is Co-founder of companies like 'LeapEd Knowledge Solutions Pvt. Ltd.' & 'ZestMD Inc.' In the year 2007 he also co-founded VISWAS and was honoured with Community Service Award by IIT Delhi Alumini Association for his work under VISWAS. </p><br>
 <small style="font-size:16px">Vinayak Garg , Founder - ZestMD Inc. </small>
                                                
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                                <!-- Quote 2 -->
                            <div class="item">
                                    <blockquote>
                                        <div class="row">
                                            <div class="col-sm-8 col-sm-offset-2">

                                                <p>A seasoned entrepreneur and a management professional & a visiting faculty at IIT Delhi. Priyank is an alumnus of IIM Ahemdabad & Asian Institute of Management.Priyank started his career with IBM as an HR partner.He is Co-founder & CEO of PeopleDynamic & IndiaPreneurship </p><br>
                                                <small style="font-size:16px">Priyank Narayan , Founder - IndiaPreneurship</small>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                                <!-- Quote 3 -->
                            <div class="item">
                                    <blockquote>
                                        <div class="row">
                                            <div class="col-sm-8 col-sm-offset-2">

                                                <p>Dr Vijayaraghavan M Chariar is an Associate Professor at the Centre for Rural Development and Technology, Indian Institute of Technology, Delhi. He is a joint Faculty at IIT Delhi's National Resource Centre for Value Education in Engineering. He is also the Chairman of the startup 'Ekam Eco Solutions' </p><br>
                                                <small style="font-size:16px">Dr Vijayaraghavan M Chariar , Associate Professor-IIT Delhi</small>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>

				 <!-- Quote 4 -->
                            <div class="item">
                                    <blockquote>
                                        <div class="row">
                                            <div class="col-sm-8 col-sm-offset-2">


                                                <p>Ashish Mahajan studied from BIT Mesra & Shailesh J. Mehta School of Management.In the past he worked with famous companies like 'AOTS Japan - as Asst. General Manager' and many others like 'Larsen & Toubro' 'John Deere' . Currently he is working for Yamaha Motor India  </p><br>

                                                <small style="font-size:16px" >Ashish Mahajan, Sales Strategy Head - Yamaha Motor India</small>
                                            </div>
                                        </div>
                                    </blockquote>

                                </div>
 			 <!-- Quote 5 -->
                            <div class="item">
                                    <blockquote>
                                        <div class="row">
                                            <div class="col-sm-8 col-sm-offset-2">

                                                <p>Dr. V.S.R. Krishnaiah is Senior Technical Director at National Informatics Center.This IIT Delhi alumnus is responsible for training the Senior Civil Services Officers of Central and State Governments on E-Governance and Project Management and will guide us on 'Achieving the vision of digital india' </p><br>
                                                <small style="font-size:16px">Dr. V.S.R. Krishnaiah  , Senior Technical Director - National Informatics Center</small>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>

                            </div>

                            <!-- Carousel Buttons Next/Prev -->
                          <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
                            <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
				<br><br><br>
</div>
	
</section> 
		
		
		
		
		
		

	
		
		
		<!--<section id="contact-info">
        
        <div class="gmap-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 text-center">
                        <div class="gmap">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14313.535514325711!2d78.17300296137695!3d26.249201799999998!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf834069adc0c9b89!2sAtal+Bihari+Vajpayee+Indian+Institute+Of+Information+Technology+And+Management!5e0!3m2!1sen!2s!4v1437942278120" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>

                     <div class="col-sm-7 map-content">
                        <ul class="row">
                            <li class="col-sm-6">
                                <address>
                                  <br>Contact us 
                                    
                                    <p>Infotsac Cell <br>ABV-Indian Institute of Information Technology and Management Gwalior,<br>	
									Morena Link Road Gwalior<br> Madhya Pradesh 474010 
									<br> India <br>
                                    amanjain7898@gmail.com</p>
                                </address>
                                
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>-->







<section id="team">
<h1 style="text-align:center;"><span><br><br>Our Team</span></h1><BR><BR><BR><br>


<div class="container">
	<div class="row">
<div class="col-lg-3">
  </div>
		<div class="col-lg-3 col-sm-6" " >

            <div class="card hovercard ">
                
              <!--  <div class="avatar ">
                    <img  alt="" src="team/kv.jpg">
                </div> -->
                <div class="info ">
                    <div class="title">
                        <a href="https://twitter.com/kushagravar" target="_blank">Kushagra Varshney</a>
                    </div>
                    <div class=" designation">Student Co-ordinator</div>
                    <div class="desc">+91-9479874663</div>
                    <div class="desc">kushagravarshney@infotsav.org</div>
                </div>
                
            </div>

        </div>

	<div class="col-lg-3 col-sm-6" ">

            <div class="card hovercard ">
               
             <!--   <div class="avatar ">
                    <img alt="" src="team/milan.jpg">
                </div> -->
                <div class="info ">
                    <div class="title">
                        <a href="https://www.facebook.com/milan.singh.9889?fref=ts" target="_blank">Milan Pal Singh</a>
                    </div>
                    <div class="designation">Student Co-ordinator</div>
                    <div class="desc">+91-8234834188</div>
                    <div class="desc">milanpsingh57@gmail.com</div>
                </div>
              
            </div>

        </div>
<div class="col-lg-2">
  </div>

	</div>






<!--  2nd row -->


<br>


<div class="row">
<div class="col-md-1 ">
</div>

<div class="col-lg-3 col-sm-6" ">

            <div class="card hovercard wp2 delay-05s  ">
               
               <!-- <div class="avatar">
                    <img alt="" src="team/shubham.jpg">
                </div> -->
                <div class="info">
                    <div class="title">
                        <a href="https://www.facebook.com/notagarwal02?fref=ts" target="_blank" >Shubham Agarwal</a>
                    </div>
                    <div class="designation">Event Management</div>
                    <div class="desc">+91-8358954506</div>
                    <div class="desc">shubhamagarwal83@infotsav.org</div>
                </div>
               
            </div>

        </div>
		<div class="col-lg-3 col-sm-6" " >

            <div class="card hovercard wp2 delay-05s  ">
                
                <!-- <div class="avatar">
                    <img alt="" src="team/shubham.jpg">
                </div> -->
                <div class="info">
                    <div class="title">
                        <a href="https://www.facebook.com/profile.php?id=100000210347696&fref=ts" target="_blank" >Jayant Singh</a>
                    </div>
                    <div class="designation">Event Management</div>
                    <div class="desc">+91-9754399739</div>
                    <div class="desc">jayantsingh@infotsav.org</div>
                </div>
             
            </div>

        </div>

	<div class="col-lg-3 col-sm-6" ">

            <div class="card hovercard wp2 delay-05s ">
               
               <!-- <div class="avatar">
                    <img alt="" src="team/shubham.jpg">
                </div> -->
                <div class="info">
                    <div class="title">
                        <a href="https://www.facebook.com/rohit.retnakaran" target="_blank" >Rohit Retnakaran</a>
                    </div>
                    <div class="designation">Event Management</div>
                    <div class="desc">+91-8989735126</div>
                    <div class="desc">rohitretnakaran@gmail.com</div>
                </div>
               
            </div>

        </div>


<div class="col-md-1">
  </div>

	</div>










<!--  3rd row -->

<br>



<div class="row">



<div class="col-lg-3 col-sm-6" ">

            <div class="card hovercard wp2 delay-2s ">
               
                <!-- <div class="avatar">
                    <img alt="" src="team/shubham.jpg">
                </div> -->
                <div class="info">
                    <div class="title">
                        <a href="https://www.facebook.com/faiz.malik.9883?fref=ts" target="_blank" >Faiz Malik</a>
                    </div>
                    <div class="designation">Designing Head</div>
                    <div class="desc">+91-9669340896</div>
                    <div class="desc">faizmalik278@gmail.com</div>
                </div>
               
            </div>

        </div>
		<div class="col-lg-3 col-sm-6" " >

            <div class="card hovercard wp2 delay-2s ">
               <!-- <div class="avatar">
                    <img alt="" src="team/shubham.jpg">
                </div> -->
                <div class="info">
                    <div class="title">
                        <a href="https://www.facebook.com/profile.php?id=100003199138215&fref=ts" target="_blank" >Vishal Kumar</a>
                    </div>
                    <div class=" designation">Promotion Head</div>
                    <div class="desc">+91-9406989670</div>
                    <div class="desc">vishalk114@gmail.com</div>
                </div>
                
            </div>

        </div>

	<div class="col-lg-3 col-sm-6" ">

            <div class="card hovercard wp2 delay-2s ">
               <!-- <div class="avatar">
                    <img alt="" src="team/shubham.jpg">
                </div> -->
                <div class="info">
                    <div class="title">
                        <a href="https://www.facebook.com/hammad.uzair.3?fref=ts" target="_blank" >Syed Hammad Uzair</a>
                    </div>
                    <div class="designation">Online Events Head</div>
                    <div class="desc">+91-7354540478</div>
                    <div class="desc">hammaduzair786@gmail.com</div>
                </div>
              
            </div>

        </div>

<div class="col-lg-3 col-sm-6" ">

            <div class="card hovercard wp2 delay-2s ">
               
                <!-- <div class="avatar">
                    <img alt="" src="team/shubham.jpg">
                </div> -->
                <div class="info">
                    <div class="title">
                        <a href="https://www.facebook.com/faizysheikh07?fref=ts" target="_blank" >Sheikh Faizy</a>
                    </div>
                    <div class="designation">Transportation Head</div>
                    <div class="desc">+91- 9479600006</div>
                    <div class="desc">faizysheikh07@gmail.com</div>
                </div>
               
            </div>

        </div>


	</div>







<!--  4th row -->


<br>


<div class="row">



<div class="col-lg-3 col-sm-6" ">

            <div class="card hovercard wp2 delay-2s ">
               
               <!-- <div class="avatar">
                    <img alt="" src="team/shubham.jpg">
                </div> -->
                <div class="info">
                    <div class="title">
                        <a href="https://www.facebook.com/krishna.Kish0re?fref=ts" target="_blank" >Krishna Kishore</a>
                    </div>
                    <div class=" designation">Graphics Designer</div>
                    <div class="desc">+91-9479874775</div>
                    <div class="desc">krishnakishore.jmj@gmail.com</div>
                </div>
                
            </div>

</div>
		<div class="col-lg-3 col-sm-6"  >

            <div class="card hovercard wp2 delay-2s ">
                
               <!-- <div class="avatar">
                    <img alt="" src="team/shubham.jpg">
                </div> -->
                <div class="info">
                    <div class="title">
                        <a href="https://www.facebook.com/p.lakshminarayana?fref=ts" target="_blank" >P Lakshminarayana</a>
                    </div>
                    <div class="designation">Hospitality Head</div>
                    <div class="desc">+91-9406500369</div>
                    <div class="desc">narayanapot@gmail.com</div>
                </div>
                
            </div>

        </div>

<div class="col-lg-3 col-sm-6 " >

            <div class="card hovercard wp2 delay-3s">
                
                <!-- <div class="avatar">
                    <img alt="" src="team/shubham.jpg">

                </div> -->
                <div class="info">
                    <div class="title">
                        <a href="https://www.facebook.com/manishkumar888?fref=ts" target="_blank" >Manish Kumar</a>
                    </div>
                    <div class=" designation">Hospitality Manager</div>
                    <div class="desc">+91-9907995806</div>
                    <div class="desc">manu.prince2050@gmail.com</div>
                </div>
             
            </div>

        </div>

	

<div class="col-lg-3 col-sm-6" >

            <div class="card hovercard wp2 delay-2s ">
               
               <!-- <div class="avatar">
                    <img alt="" src="team/shubham.jpg">
                </div> -->
                <div class="info">
                    <div class="title">
                        <a href="https://www.facebook.com/ashish.krish?fref=ts" target="_blank" >Ashish Krishna</a>
                    </div>
                    <div class=" designation">Event Management</div>
                    <div class="desc">+91-8989808213</div>
                    <div class="desc">ashishkrishna007@gmail.com</div>
                </div>
                
            </div>

        </div>


	</div>




<!--  5th row -->


<br>


<div class="row">


<div class="col-lg-3 col-sm-6 ">

            <div class="card hovercard wp2 delay-3s ">
               
               <!-- <div class="avatar">
                    <img alt="" src="team/shubham.jpg">
                </div> -->
                <div class="info">
                    <div class="title">
                        <a href="https://www.facebook.com/aman.agarwal.1232760?fref=ts" target="_blank" >Aman Agarwal</a>
                    </div>
                    <div class=" designation">Event Management</div>
                    <div class="desc">+91-9411262942</div>
                    <div class="desc">agarwalaman0307@gmail.com</div>
                </div>
               
            </div>

        </div>
		<div class="col-lg-3 col-sm-6 " >

            <div class="card hovercard wp2 delay-3s">
                
                <!-- <div class="avatar">
                    <img alt="" src="team/shubham.jpg">
                </div> -->
                <div class="info">
                    <div class="title">
                        <a href="https://www.facebook.com/kriti.poddar?fref=ts" target="_blank" >Kriti Poddar</a>
                    </div>
                    <div class=" designation">Event Management</div>
                    <div class="desc">+91-9977081333</div>
                    <div class="desc">kriti16.kp@gmail.com</div>
                </div>
             
            </div>

        </div>

	<div class="col-lg-3 col-sm-6 wp2   delay-3s ">

            <div class="card hovercard  ">
               
               <!-- <div class="avatar">
                    <img alt="" src="team/shubham.jpg">
                </div> -->
                <div class="info">
                    <div class="title">
                        <a href="https://www.facebook.com/mmanishbhargav?fref=ts" target="_blank" >Manish Bhargav</a>
                    </div>
                    <div class= designation">Event Management</div>
                    <div class="desc">+91-9425725423</div>
                    <div class="desc">mmanishbhargav@gmail.com</div>
                </div>
               
            </div>

        </div>

	
	<div class="col-lg-3 col-sm-6 ">

            <div class="card hovercard wp2 delay-2s ">
               
                <!-- <div class="avatar">
                    <img alt="" src="team/shubham.jpg">
                </div> -->
                <div class="info">
                    <div class="title">
                        <a href="https://www.facebook.com/sarthak.joshi.7771?fref=ts" target="_blank" >Sarthak Joshi</a>
                    </div>
                    <div class="designation">Event Management</div>
                    <div class="desc">+91-8004804540</div>
                    <div class="desc">sarthakjoshi58@gmail.com</div>
                </div>
               
            </div>

        </div>



	</div>





</div>

</section>









		
		
		<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
				    <p >Web Credits</p><br>
					<a href="https://in.linkedin.com/pub/aman-jain/80/552/512" target="_blank">Aman Jain</a> &nbsp;| &nbsp;
					<a href="https://in.linkedin.com/in/anshulvyas16" target="_blank">Anshul Vyas</a> &nbsp;| &nbsp;
					<a href="https://in.linkedin.com/pub/shubham-shukla/a6/27a/842" target="_blank">Shubham Shukla</a>
				<div>
			<div>
		<div>
		</footer>	



		<script>
 
		function validateForm() {
			//name
var flag=true;
				var x = $('input#name').val();
				if (x == null || x == "") {
					$('input#name').css("border", "2px solid red");
					return false;
//flag=false;

					}
				else{
					$('input#name').css("border", "1px solid grey");
					}
		
			
			//email
				var b = $('input#email').val();
				if (b == null || b == "") {
					$('input#email').css("border", "3px solid red");
					return false;
//flag=false;
					}
				else{
					$('input#email').css("border", "1px solid grey");
					}
			
			
			//password
				var z = $('input#pwd').val();
				if (z == null || z == ""||(z.length<6)) {
					$('input#pwd').css("border", "3px solid red");
					alert("Enter atleast 6 characters Password!");
					return false;
//flag=false;
					}
				else{
					$('input#pwd').css("border", "1px solid grey");
					}
			
			//password again
				var m = $('input#rpwd').val();
				if (m != z) {
					$('input#rpwd').css("border", "3px solid red");
					alert("Password do not match");
					return false;
//flag=false;
					}
				else{
					$('input#rpwd').css("border", "1px solid grey");
					}
			
			
			//gender
				var f = $('select#gender').val();
				if (f === "Select Gender") {
					$('select#gender').css("border", "3px solid red");
					return false;
//flag=false;
					}
				else{
					$('select#gender').css("border", "1px solid grey");
					}
					
					
					
			//mobile
				var a = $('input#phone').val();
				if (a == null || a == ""||(a.length!=10)||(isNaN(a))) {
					$('input#phone').css("border", "3px solid red");
					alert("Invalid Mobile Number");
					return false;
//flag=false;
					}
				else{
					$('input#phone').css("border", "1px solid grey");
					}
			
		
			
			//institute name
				var c = $('input#ins').val();
				if (c == null || c == "") {
					$('input#ins').css("border", "3px solid red");
					return false;
//flag=false;
					}
				else{
					$('input#ins').css("border", "1px solid grey");
					}
			
		
		
			
			//year
				var e = $('select#year').val(); 
				if (e === "Select Year") {
					$('select#year').css("border", "3px solid red");
					return false;
//flag=false;
					}
				else{
					$('select#year').css("border", "1px solid grey");
					}
                                  //username
var f = $('input#usname').val();
			if(f==null||f==""){
									$('input#usname').css("border", "3px solid red");
					return false;
//flag=false;
					}
				else{
					$('input#usname').css("border", "1px solid grey");
					}
					var g=$('input#captcha').val();

					if(g==null||g==""){
						$('input#captcha').css("border", "3px solid red");
					
return false;
//flag=false;
					}
				else{
					$('input#captcha').css("border", "1px solid grey");
					}
			
			//return flag;
			
			
	
			
}

 
$(function(){
 
	$(document).on( 'scroll', function(){
 
		if ($(window).scrollTop() > 100) {
			$('.scroll-top-wrapper').addClass('show');
		} else {
			$('.scroll-top-wrapper').removeClass('show');
		}
	});
});
</script>
		
<script>
 
$(function(){
 
	$(document).on( 'scroll', function(){
 
		if ($(window).scrollTop() > 100) {
			$('.scroll-top-wrapper').addClass('show');
		} else {
			$('.scroll-top-wrapper').removeClass('show');
		}
	});
 
	$('.scroll-top-wrapper').on('click', scrollToTop);
});
 
function scrollToTop() {
	verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
	element = $('body');
	offset = element.offset();
	offsetTop = offset.top;
	$('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
}
</script>		
		
	 
 
		
		<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
		<script>
		(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
		function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
		e=o.createElement(i);r=o.getElementsByTagName(i)[0];
		e.src='//www.google-analytics.com/analytics.js';
		r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
		ga('create','UA-XXXXX-X');ga('send','pageview');
		</script>
	</body>
	
</html>
