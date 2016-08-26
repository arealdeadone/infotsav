<?php
session_start();
include('config.php');
function run_url($url_otp)
		{
			$ch=curl_init();
			curl_setopt($ch, CURLOPT_URL,$url_otp);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt ($ch, CURLOPT_PORT , 443);
			$otp_json=curl_exec($ch);
			curl_close($ch);
			return $otp_json;
		}
$id=$_SESSION['id'];
//
$con=mysqli_connect($dbhost,$dbuser,$dbpassword,$dbdatabase);
	if(isset($_POST['submit']))
		{
//echo $_POST['otp'];

			if(isset($_POST['otp']) AND !empty($_POST['otp']))
				{
//echo "yo";
					$otp_last=$_POST['otp'];
					$otp_first=$_SESSION['otp_start'];
					$final_otp=$otp_first.$otp_last;
//echo $final_otp;
					$verify_url="https://www.cognalys.com/api/v1/otp/confirm/?app_id=0063f79838044597a6b05d9&access_token=ceb6ea8a693dbf00f78380517c03f69680e12b09&keymatch=".$_SESSION['key']."&otp=".$final_otp;
					$response=run_url($verify_url);
					$json_res=json_decode($response,true);
//echo $json_res['status'];
						if($json_res['status']=="success")
							{
//echo "got in";
								$act_query="UPDATE registration SET phone_act='1' WHERE id='$id'";
								$act_query_res=mysqli_query($con,$act_query) or die("Can't");
								if($act_query_res)
									{
										echo'<script type="text/javascript">
							alert("Your mobile phone is verified,please login again to witness changes.");

window.location.href="index.php";
									</script>';
                                                           //session_destroy();
//header("Location:index.php");

									}
							}
						else
							{
							echo'<script type="text/javascript">
							alert("Your OTP was not correct, please try again, or caontact web admin");
									</script>';
							
							}
				}
		
		}
?>
<!DOCTYPE html>
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="events.css" rel="stylesheet">
 <link href="css/styles.css" rel="stylesheet">
<title>Mobile Verification </title>
<link rel="shortcut icon" href="img/logo200.png" >
 <link href="css/bootstrap.min.css" rel="stylesheet">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.js"></script>
 <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
 
 <style>
	@font-face {
    font-family: myFirstFont;
    src: url(trench100free.otf);
} 
.abc {
    font-family: myFirstFont;
	
}
	</style>

</head>


<body>  	  <!-- Second navbar for sign in -->
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
		  
            <li><a style="color:#1abc9c;" href="index.php" title="Home">Home</a></li>
            <li><a style="color:#1abc9c" href="index.php" title="About">About</a></li>
            <li><a style="color:#1abc9c" href="https://play.google.com/store/apps/details?id=infotsav.pack.parse" target="_blank" title="Mobile app">Mobile app</a></li>
            <li><a style="color:#1abc9c" href="index.php" title="Events">Events</a></li>
            <li><a style="color:#1abc9c" href="sponsors.php" title="Sponsors">Sponsors</a></li>
            			<li>
			 
               <a class="dropdown-toggle dropdown" style="color:#1abc9c" id="menu2" data-toggle="dropdown" href="#">Contact
                  <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu2">
					
                     <li role="presentation"><a href="#" role="menuitem" tabindex="-1 " >Contact us</li>
					 <li role="presentation" class="divider"></li>
                     <li  role="presentation"><a  href="" data-toggle="modal" data-target="#minemodal">Hospitality</a>
                     
                   </ul>
               
			</li>
			
			
			
			
			
			
			
			
			 
            
			<div class="modal fade" id="minemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index:9999;">
							  <div class="modal-dialog modal-lg">
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h2 class="modal-title" id="myModalLabel" style="color: #1bba9c; font-family:Quicksand; text-align:center"><b>Hospitality</b></h2>
									</div>
		
			<div class="modal-body">
			<p style="margin-left:10px; margin-right:10px ;font-size:16px">We would like to inform you that the hospitality team will be there to help all participants of Infotsav round the clock. 
As soon as you reach Gwalior by any mode of conveyance, you can make a call to our hospitality volunteer for any help.<br><br> If the no.of participants are more than 10 from a single college then Infotsav arranges conveyance for them. As you reach the campus, our volunteers will guide you to the help desk and a registration fee has to be paid at the counter. There on he/she'll be guided by Infotsav volunteer to his/her room in one of our hostels.
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
      <li role="presentation"><a href="#" role="menuitem" tabindex="-1" data-toggle="modal" data-target="#" >My profile<span class="glyphicon glyphicon-user pull-right"></span></a></li>
	   <li role="presentation" class="divider"></li>
     <!--  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Notification<span class="glyphicon glyphicon-bell pull-right"></span></a></li>
	  <li role="presentation" class="divider"></li>
	   <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Settings<span class="glyphicon glyphicon-wrench pull-right"></span></a></li>      
      <li role="presentation" class="divider"></li> -->
      <li role="presentation"><a role="menuitem" tabindex="-1" href="logout.php">Logout<span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
    </ul>
  </div>
				<?php
				}
				?>
				
				
				
				
			
          </ul>
		  
          <div class="collapse nav navbar-nav nav-collapse slide-down" id="nav-collapse2">
            <form class="navbar-form navbar-right form-inline" role="form" action="index.php" method="POST">
              <div class="form-group">
                <label class="sr-only" for="Email">Email</label>
                <input type="text" class="form-control" name="lemail" id="Email" placeholder="Email/Phone" autofocus required />
              </div>
              <div class="form-group">
                <label class="sr-only" for="Password">Password</label>
                <input type="password" class="form-control" name="lpwd" id="Password" placeholder="Password" required />
              </div>
              <button type="submit" class="btn btn-success" name="signin">Sign in</button>
            </form>
          </div>
		  
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->	
	
<br><br><br>
			<div class="content_white container "> 				
   				

                
   				<form role="form" method="POST" action="otp_confirm.php">
				<div class="form-group">
    <label  for="email"><font size=4 > Enter OTP Here :</label>
    <input type="text" class="form-control" id="otp" name="otp" placeholder="Last 5 digits of the missed call number">
  </div> <br>
  <button type="submit" class="btn btn-default btn-primary" name="submit">Verify</button>
				</form>
                       

			</div>
			</div>
			
			<footer style=" margin-top: 300px ; 
	padding-bottom:65px">
		
		<div class="container" >
		 
			
			<div class="row">
						
			  <div class="col-lg-12 text-center">
			   <p style="margin-bottom:-50px; margin-left:-10px;"> <font size="3px" > web-credits </font><br>
			  <b> <font size="2px"color="A5A3A8">
			   <a href="https://in.linkedin.com/pub/aman-jain/80/552/512" target="_blank">  Aman Jain</a> |
			  <a href="https://in.linkedin.com/in/anshulvyas16" target="_blank"> Anshul Vyas</a> |
 <a href="https://www.linkedin.com/profile/view?id=376895282&authType=NAME_SEARCH&authToken=MLhu&locale=en_US&trk=tyah&trkInfo=clickedVertical%3Amynetwork%2CclickedEntityId%3A376895282%2CauthType%3ANAME_SEARCH%2Cidx%3A1-1-1%2CtarId%3A1439285084651%2Ctas%3Ashubh" target="_blank"> Shubham Shukla </a> </font></b>
			   
			  </div>
			  
			</div>
        </div>

		</footer>
		
		

		
		


</body>
