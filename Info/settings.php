<?php
session_start();	


?>
<?php
if(!isset($_SESSION['uname']))
	{
		echo"Sorry you should be logged in to continue here";
		exit;
	}
	
?>
<!DOCTYPE html>
<head>
 <meta charset="utf-8">
<title>Settings</title>
<link rel="shortcut icon" href="img/logo200.png" >
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="events.css" rel="stylesheet">
 <link href="css/styles.css" rel="stylesheet">
 <link href="css/bootstrap.min.css" rel="stylesheet">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.js"></script>
<link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
 <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
 
 <style>
	@font-face {
    font-family: myFirstFont;
    src: url(trench100free.otf);
} 
.abc {
    font-family: myFirstFont;
	
}


	.user-row {
    margin-bottom: 14px;
}

.user-row:last-child {
    margin-bottom: 0;
}

.dropdown-user {
    margin: 13px 0;
    padding: 5px;
    height: 100%;
}

.dropdown-user:hover {
    cursor: pointer;
}

.table-user-information > tbody > tr {
    border-top: 1px solid rgb(221, 221, 221);
}

.table-user-information > tbody > tr:first-child {
    border-top: 0;
}


.table-user-information > tbody > tr > td {
    border-top: 0;
}
.toppad
{margin-top:20px;
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
            
           <li><a style="color:#1abc9c" href="https://play.google.com/store/apps/details?id=infotsav.pack.parse" target="_blank" title="Mobile app">Mobile App</a></li>
            <li><a style="color:#1abc9c" href="index.php#events" title="Events">Events</a></li>
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
      <li role="presentation"><a href="settings.php" role="menuitem" tabindex="-1 " >My Profile<span class="glyphicon glyphicon-user pull-right"></span></a></li>
	   <li role="presentation" class="divider"></li>
    <!--  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Notification<span class="glyphicon glyphicon-bell pull-right"></span></a></li>
	   <li role="presentation" class="divider"></li> -->
	 
      <li role="presentation"><a role="menuitem" tabindex="-1" href="logout.php">Logout<span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
    </ul>
  </div>
 
				
			
			
		
				
				
				<?php
				}else{
				?>
				<li>
					<a style="color:#fff; font-size:15px"class="btn btn-default btn-outline btn-circle collapsed fa fa-user"  data-toggle="collapse" href="#nav-collapse2" aria-expanded="false" aria-controls="nav-collapse2">&nbsp; Sign in</a>
				</li>
				
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
	
	<!-- Settings---->

			<div class="content_white container abc"> 				
   				

                
   				<h3> Account Settings</h3>
				
</div>
			
			<div class="panel ">
			<div class="panel-body">
			<div class="col-md-12">
			 <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="img/profilepic.jpg" class="img-circle img-responsive" style="width:200px; height:200px;"> </div>
               
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Name:</td>
                        <td><?php echo $_SESSION['uname']; ?></td>
                      </tr>
                      <tr>
                        <td>Email-id:</td>
                        <td><?php echo $_SESSION['email']; ?></td>
                      </tr>
                      <tr>
                        <td>Mobile Number</td>
                        <td><?php echo $_SESSION['phone']; ?>&nbsp;&nbsp;&nbsp;	<?php if($_SESSION['phono']==0) { ?>
   				<a href="act_phone.php">Activate your Mobile No.</a>
			<?php } 
			else {?>
			Verified <?php } ?>
                       </td>
						
                      </tr>
                   
                         <tr>
                             <tr>
                        <td>Gender</td>
                        <td><?php echo $_SESSION['gender']; ?></td>
                      </tr>
                        <tr>
                        <td>Institute</td>
                        <td><?php echo $_SESSION['ins']; ?></td>
                      </tr>
                     
                           
                  
                    </tbody>
                  </table>
                  
                
                </div>
              </div>
            </div>
			</div>
		
			
	
		
		

		
		

<footer style="margin-top:260px; margin-bottom:0px">
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
</body>
