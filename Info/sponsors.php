<?php
session_start();
	include('config.php');
	
	
	
	//mysql database connectivity
	$db = mysql_connect($dbhost, $dbuser, $dbpassword);
	mysql_select_db($dbdatabase, $db);
	
	
	
	if(isset($_POST['submit'])){
		$name= $_POST['name'];
		$uname= $_POST['uname'];
		$pwd= $_POST['pwd'];
		$rpwd= $_POST['rpwd'];
		$phone= $_POST['phone'];
		$email= $_POST['email'];
		$ins= $_POST['ins'];
		$branch= $_POST['branch'];
		$year= $_POST['year'];
		$gender= $_POST['gender'];
		
		$query= "insert into `registration` values('', '$name', '$uname', '$pwd', '$rpwd', '$phone', '$email', '$ins', 
			'$branch', '$year', '$gender')";
		$sql= mysql_query($query);
			
	}
	
	$inv=0;
	if(isset($_POST['signin'])){
	
		
		$lemail= $_POST['lemail'];
		$lpwd= $_POST['lpwd'];
	
		$log= "select * from `registration` where email= '$lemail' and password= '$lpwd'";
		$log_q= mysql_query($log);
		$num= mysql_num_rows($log_q);
		
		
		if($num == 1){
			$row= mysql_fetch_assoc($log_q); 
			
			//set the session variable username
			$_SESSION['uname']= $row['username'];
		}else{
			$inv= 1;
		}
	}
	
	
?>
<!DOCTYPE html>
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="events.css" rel="stylesheet">
 <link href="css/styles.css" rel="stylesheet">
 <link href="css/bootstrap.min.css" rel="stylesheet">
<title>Infotsav | Sponsors</title>
<link rel="shortcut icon" href="img/logo200.png" >
 <link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.js"></script>
 <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script src="js/min/toucheffects-min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="js/flickity.pkgd.min.js"></script>
		<script src="js/jquery.fancybox.pack.js"></script>
	<script src="js/modernizr.custom.js"></script>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/jquery.fancybox.css" rel="stylesheet"> 
		<link href="css/flickity.css" rel="stylesheet" >
		<link href="css/animate.css" rel="stylesheet">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
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
			<?php if($inv == 1){
			?>
			<li>
				<h3 style="color:red">Invalid Sign In!</h3>
			<li>
			<?php
			}
			?>
		  
            <li><a style="color:#1abc9c;" href="index.php" title="Home">Home</a></li>
            <li><a style="color:#1abc9c" href="index.php#about" title="About">About</a></li>
           <li><a style="color:#1abc9c" href="https://play.google.com/store/apps/details?id=infotsav.pack.parse" target="_blank" title="Mobile app">Mobile App</a></li>
            <li><a style="color:#1abc9c" href="index.php#events" title="Events">Events</a></li>
            <li><a style="color:#1abc9c" href="sponsors.php" title="Sponsors">Sponsors</a></li>
<li><a style="color:#1abc9c;" href="payment.php" title="payment">Result</a></li>
            <li>
			 
               <a class="dropdown-toggle dropdown" style="color:#1abc9c" id="menu2" data-toggle="dropdown" href="#">Contact
                  <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu2">
					
                     <li role="presentation"><a href="index.php" role="menuitem" tabindex="-1 " >Contact Us</li>
					 <li role="presentation" class="divider"></li>
                     <li <li role="presentation"><a  href="" data-toggle="modal" data-target="#minemodal">Hospitality</a>
                     
                   </ul>
               
			</li>
			
			
			<!-- mobile app modal -->



			
			
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
			
			



			
			<!-- hospitality modal -->

			
			
			
			
			
			 
            
			<div class="modal fade" id="minemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index:9999;">
							  <div class="modal-dialog modal-lg">
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h2 class="modal-title" id="myModalLabel" style="color: #1bba9c; font-family:Quicksand; text-align:center"><b>Hospitality</b></h2>
									</div>
		
			<div class="modal-body">
			<p style="margin-left:10px; margin-right:10px ;font-size:16px">We would like to inform you that the hospitality team will be there to help all participants of Infotsav round the clock. 
As soon as you reach Gwalior by any mode of conveyance, you can make a call to our hospitality volunteer for any help.<br><br> If the no.of participants are more than 10 from a single college then Infotsav arranges conveyance for them. As you reach the campus, our volunteers will guide you to the help desk and a registration fee has to be paid at the counter. There on he/she'll be guided by Infotsav volunteer to his/her room in one of our hostels.The hostel room will have all the basic amenities <br><br>
<b>Charges:</b> 300/- per person (accomodation included)<br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;  200/- (without accomodation)<br><br>
<b>Rohit Retnakaran</b>
+91- 8989735126
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
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Notification<span class="glyphicon glyphicon-bell pull-right"></span></a></li>
	   <li role="presentation" class="divider"></li>
	   <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Settings<span class="glyphicon glyphicon-wrench pull-right"></span></a></li>      
      <li role="presentation" class="divider"></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="logout.php">Logout<span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
    </ul>
  </div>
 
				
			
			
		
				
				
				<?php
				}else{
				?>
				<li>
					<a style="color:#fff; font-size:15px"class="btn btn-default btn-outline btn-circle collapsed fa fa-user"  data-toggle="collapse" href="#nav-collapse2" aria-expanded="false" aria-controls="nav-collapse2">&nbsp; Login</a>
				</li>
				
				<?php
				}
				?>
				
				
		
				
			
          </ul>
		  
          <div class="collapse nav navbar-nav nav-collapse slide-down" id="nav-collapse2">
            <form class="navbar-form navbar-right form-inline" role="form" action="index.php" method="POST">
              <div class="form-group">
                <label class="sr-only" for="Email">Email</label>
                <input type="text" class="form-control" name="lemail" id="Email" placeholder="Email" autofocus required />
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




<section id="sponsors">

<h1 class="animated fadeInDown" style="text-align:center; margin-top:-20px;"><span>Sponsors</span></h1><BR><BR>
<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center animated fadeInDown delay-05s  ">
			<div class="row ">
			<a href="http://internshala.com/" target="_blank" ><img src="img/sponsors/internshala.png"></a>
			</div>
			<div class="row">
			<div class="sp_name"><span>Event Sponsor</span></div>
			</div>
			</div>			
					
		</div>
<br><br><br>


			<div class="row">
	<div class="col-md-1">
			</div>
		

			<div class="col-lg-3 col-sm-6 animated fadeInDown delay-1s " >
			
			<a href="http://knowafest.com/" target="_blank" ><img src="img/sponsors/know.png"></a>
			
			</div>
		
			<div class="col-lg-3 col-sm-6 animated fadeInDown delay-1s " >      
			
			<a href="http://brainbuxa.com/" target="_blank" ><img src="img/sponsors/brain.png"></a>
			
		        </div>

			<div class="col-lg-3 col-sm-6 animated fadeInDown delay-1s " >
			
			<a href="http://hook2events.com/" target="_blank" ><img src="img/sponsors/hook.png"></a>
			
		        </div>
			
				
				<div class="col-md-2">
			</div>
			
			</div>
			<div class="row">
			<div class="sp_name text-center"><span>Online Media Partners</span></div>
			</div>
		

		</div>

<br><br><br>

<div class="row">
			<div class="col-lg-3 ">
			</div>

			<div class="col-lg-3 col-sm-6 animated fadeInDown delay-1s" >
			
			<a href="http://twenty19.com/" target="_blank"><img src="img/sponsors/t19.png"></a>
			<div class="row">
			<div class="sp_name text-center"><span>Student Oppurtunity Partner</span></div>
			</div>
			
			</div>
		
			

			<div class="col-lg-3 col-sm-6 animated fadeInDown delay-1s" >
			
			<a href="http://thecollegefever.com/" target="_blank" ><img src="img/sponsors/clg.png"></a>
			<div class="row">
			<div class="sp_name text-center"><span>Internship Partner</span></div>
			</div>
			
			
		        </div>
				
			
			<div class="col-lg-2">
			</div>
			</div>
		

		

<br><br>
</div>


	<h1 class="
" style="text-align:center; margin-top:-20px;"><span>Our Past Sponsors</span></h1><BR><BR>
	
	<div class="container">
		
	
			<div class="row">
			<div class="col-md-1 ">
			</div>

			<div class="col-lg-3 col-sm-6 " >
			
			<img src="img/sponsors/jktyre.jpg">
			
			</div>
		
			<div class="col-lg-3 col-sm-6  " >      
			
			<img src="img/sponsors/co2.jpg">
			
		        </div>

			<div class="col-lg-3 col-sm-6 " >
			
			<img src="img/sponsors/co1.jpg">
			
		        </div>
				
			
			<div class="col-md-2">
			</div>
			</div>
		

		

<br><br>


			<div class="row">
			<div class="col-md-1 ">
			</div>

			<div class="col-lg-3 col-sm-6 " >
			
			<img src="img/sponsors/co3.jpg">
			
		        </div>

			<div class="col-lg-3 col-sm-6  ">
			
			<img src="img/sponsors/es1.jpg">
			
			</div>
		
			<div class="col-lg-3 col-sm-6 "  >      
			
			<img src="img/sponsors/es2.jpg">
			
		        </div>

				
			
			<div class="col-md-2">
			</div>
			</div>
		

		



<br><br>


			<div class="row">
			<div class="col-md-1 ">
			</div>

			<div class="col-lg-3 col-sm-6" >
			
			<img src="img/sponsors/op1.jpg">
			
			</div>
		
			<div class="col-lg-3 col-sm-6" >      
			
			<img src="img/sponsors/op2.jpg">
			
		        </div>

			<div class="col-lg-3 col-sm-6" >
			
			<img src="img/sponsors/op3.jpg">
			
		        </div>
				
			
			<div class="col-md-2">
			</div>
			</div>
		

		</div>

			
</section>

<br><br>













	
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
				    <p >Web Credits</p><br>
					<a href="https://in.linkedin.com/pub/aman-jain/80/552/512" target="_blank">Aman Jain </a> &nbsp;| &nbsp;
					<a href="https://in.linkedin.com/in/anshulvyas16" target="_blank">Anshul Vyas  </a> &nbsp;| &nbsp;
					<a href="https://in.linkedin.com/pub/shubham-shukla/a6/27a/842" target="_blank">Shubham Shukla</a>
				<div>
			<div>
		<div>
		</footer>		

		
		


</body>
