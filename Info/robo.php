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
<title>Robo Fiesta </title>
<link rel="shortcut icon" href="img/logo200.png" >
 <link href="css/bootstrap.min.css" rel="stylesheet">
 <script src="js/waypoints.min.js"></script>
 <link href="css/animate.css" rel="stylesheet">
 
 <link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.js"></script>
 <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
 <script>
    function myFunction(a){
	
    
	function alertContents(httpRequest){
	//console.log(httpRequest.responseText);
    if (httpRequest.readyState == 4){
        // everything is good, the response is received
        if ((httpRequest.status == 200) || (httpRequest.status == 0)){
            var obj = JSON.parse(httpRequest.responseText);
    
  //upper box title and links  
    var ttl = obj.EVENT[a].TITLE;
    var out = "<h2 class='modal-title' style='color: #1bba9c; font-family:Quicksand; text-align:center; font-size:22px;'><b>";
    var tmp = ttl+"</b></h2>";
    out = out + tmp;
    if(a==19) document.getElementById("myLargeModalLabel19").innerHTML = out;/*takshil_change*/
    if(a==20) document.getElementById("myLargeModalLabel20").innerHTML = out;
    if(a==21) document.getElementById("myLargeModalLabel21").innerHTML = out;
    if(a==22) document.getElementById("myLargeModalLabel22").innerHTML = out;
    

  
        }else{
            alert('There was a problem with the request. ' + httpRequest.status + httpRequest.responseText);
        }
    }
};

function send_with_ajax( the_url ){
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = function() { alertContents(httpRequest); };  
    httpRequest.open("GET", the_url, true);
    httpRequest.send();
};

send_with_ajax( "ajax.php" );
            
  
}
</script>
 

</head>


<body>  	    <!-- Second navbar for sign in -->
		  
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
            
           <li><a style="color:#1abc9c" href="https://play.google.com/store/apps/details?id=infotsav.pack.parse" target="_blank" title="Mobile app">Mobile App</a></li>
            <li><a style="color:#1abc9c" href="index.php#events" title="Events">Events</a></li>
            <li><a style="color:#1abc9c" href="sponsors.php" title="Sponsors">Sponsors</a></li>
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
	

			<div class="content_white container "> 				
   		<?php
            $xml = file_get_contents('events.xml');
             $EVENTLIST = new SimpleXMLElement($xml);
             //echo $EVENTLIST->EVENT[1]->TITLE;?>		

                
   				<h3 class="animated bounceInRight">Robo Fiesta</h3>
                                  
<a  href ="https://docs.google.com/forms/d/1z91A10nJOa_TW0mvs6toe9OT29jPxZXZPwSly2ETG1A/viewform?c=0&w=1" class="Read-more"  role="button" data-toggle="modal" >Register Here</a>
   			<!--	<p >Infotsav, a National level Techno-Management fest born with the motto of promoting technology & inspiring business, entrepreneurship skills among the young 
guns has crossed the rallying point and got launched, with all doors open for the entries to come in and take their position in the various heats.With the event getting started on ***. ’15 shall proceed on up till ******. ’15. So, it’s time to gear up with what all you have in your bag, to be a part of the most crowd-pulling event of Central India. It brings you an opportunity to interact with such personalities who are at the helm of changing our world today. Previous speakers who have graced the lecture series include the likes of John C. Mather (The 2006 Physics Nobel Laureate), Lyn Evans (Project Leader, Large Hadron Collider, CERN), Pranav Mistry (The Inventor of 6th Sense Technology), Stephen P. Morse (Chief Architect, Intel 8086 Microprocessor), Richard Stallman (Founder, Free Software Movement), Walter Bender (Ex-Director, MIT Media Labs), etc. Having gained immense popularity over the past few years, it is widely recognized as the biggest and the best lecture series in the entire nation and we are sure that we'll be successful in outdoing ourselves yet again. So come, listen and get inspired!</p>-->
			    
                
			</div>
			
 <!--start of first event-->           
<div class="content-section-b">
             
             <div class="container">

     	        
     	        
     	        
     	        <div class="row">
     	         
     	         
     	         
     	         
     	         
        		     <div class="col-md-6 right_box ">
        		     
        		     
        		     
        		     
        		     
             		      <div class="clearfix"></div>
            		  
            		       <h2 class="animated bounceInLeft" style="font-size:30px;" ><?php
            $xml = file_get_contents('events.xml');
             $EVENTLIST = new SimpleXMLElement($xml);
             echo $EVENTLIST->EVENT[19]->TITLE;?></h2>
            		       <p  class="animated bounceInLeft"><?php  echo $EVENTLIST->EVENT[19]->DESCRIPTION; ?></p>
						    <a class="Read-more" onclick="myFunction(19)" role="button" data-toggle="modal" data-target=".bs-example-modal-lg">Read more</a>
						   
						   <!----------
		<div class="container text-center">

<h1> Click Me </h1>
<!-- Large modal -->


<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="z-index:9999;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" >
	<div id='myLargeModalLabel19' class="modal-header"  ></div>
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

  

  <!-- Wrapper for slides -->
 
 <div class="container"><ul class="nav navbar-nav pull-center" >
  
			<li data-target="#carousel-example-generic" data-slide-to="0" class="active"><a style="color:#1abc9c;" href="" title="Home">DESCRIPTION</a></li>
			
            <li  data-target="#carousel-example-generic" data-slide-to="1"><a style="color:#1abc9c" href="" title="About">RULES</a></li>
			
			<li data-target="#carousel-example-generic" data-slide-to="2"><a style="color:#1abc9c;" href="" title="Home">TRACK</a></li>
			
            <li  data-target="#carousel-example-generic" data-slide-to="3"><a style="color:#1abc9c" href="" title="About">CONTACTS</a></li>
    
   
  </ul></div>

  <!-- Wrapper for slides -->
 
 <div class="carousel-inner" style="border-top: 1px solid #ddd;">
    <div class="item active" style="overflow:scroll; height:300px; ">
	
     <div class="container"><br>
	<?php  echo $EVENTLIST->EVENT[19 ]->DESCRIPTION; ?>
	 </div>
    </div>
	
    <div class="item" style="overflow:scroll; height:300px; ">
      <div class="container"><br>
	 
	  <?php  echo $EVENTLIST->EVENT[19]->RULES; ?>
	 </div>
    </div>
     <div class="item" style="overflow:scroll; height:300px; ">
     <div class="container" style="background-color:#fff">
	 <h5> &nbsp;  &nbsp; &nbsp; &nbsp; Width of Track : 30mm</h5>
	 <img src="img/robotrack.jpg" height="250px" >
	 </div>
    </div>
    <div class="item" style="overflow:scroll; height:300px; ">
     <div class="container" ><br>
	 
	<?php  echo $EVENTLIST->EVENT[19]->CONTACTS; ?>
	 </div>
    </div>
  </div>
  
  
  <!-- Controls 
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>-->

  
  
  
</div>
    </div>
  </div>
  
</div>




</div>


  <div class="col-md-6" style="margin-left:auto; margin-right:auto;">
							<div class="clearfix"></div>
								<img class="img-responsive  eventspic animated bounceInRight"  src="img/line follower.png" alt="">
 		           
						</div>
						   
            	          </div>
						  
						  
						
                       
                  </div>

               </div>
           </div>
   





<div class="content-section-a">

 		        <div class="container">


                  

 		           <div class="row">
				   
				    <div class="col-lg-6"  >
                       <div class="clearfix"></div>
                           <img class="img-responsive  eventspic animated bounceInRight"  src="img/robo race.jpg" alt="">
                          
                         
     	                   
   		             </div>
                   
                    
                 <div class="col-lg-6  ">
                       <div class="clearfix"></div>
                            <h2  class="animated bounceInRight" ><?php
            $xml = file_get_contents('events.xml');
             $EVENTLIST = new SimpleXMLElement($xml);
             echo $EVENTLIST->EVENT[20]->TITLE;?></h2>
 		                   <p  class="animated bounceInRight"> <?php echo $EVENTLIST->EVENT[20]->DESCRIPTION; ?>
                           </p>                                                                                                                    <!--takshil_change-->
			<!--takshil_change-->   <a class="Read-more" onclick="myFunction(20)" role="button" data-toggle="modal" data-target=".bs-example-modal-lg1">Read more</a>
    <div class="modal fade bs-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
	<div id='myLargeModalLabel20' class="modal-header"  ></div>
      <div id="carousel-example-generic1" class="carousel slide" data-ride="carousel">
                       <!--takshil_change-->
                            <!-- Wrapper for slides -->
 <div class="container">
 <ul class="nav navbar-nav pull-center" >
  
			<li data-target="#carousel-example-generic1" data-slide-to="0" class="active"><a style="color:#1abc9c;" href="">DESCRIPTION</a></li>
			
            <li  data-target="#carousel-example-generic1" data-slide-to="1"><a style="color:#1abc9c" href="" >RULES</a></li>
			
			<li data-target="#carousel-example-generic1" data-slide-to="2"><a style="color:#1abc9c;" href="">TIMELINE</a></li>
			
            <li  data-target="#carousel-example-generic1" data-slide-to="3"><a style="color:#1abc9c" href="" >CONTACTS</a></li>
    
   
  </ul></div>

  <!-- Wrapper for slides -->
 
 <div class="carousel-inner" style="border-top: 1px solid #ddd;">
    <div class="item active" style="overflow:scroll; height:300px; ">
	
     <div class="container"><br>
	<?php  echo $EVENTLIST->EVENT[20]->DESCRIPTION; ?>
	 </div>
    </div>
	
    <div class="item" style="overflow:scroll; height:300px; ">
      <div class="container"><br>
	 
	  <?php  echo $EVENTLIST->EVENT[20]->RULES; ?>
	 </div>
    </div>
     <div class="item" style="overflow:scroll; height:300px; ">
     <div class="container"><br>
	 
	 <?php  echo $EVENTLIST->EVENT[20]->TIMELINE; ?>
	 </div>
    </div>
    <div class="item" style="overflow:scroll; height:300px; ">
     <div class="container" ><br>
	 
	<?php  echo $EVENTLIST->EVENT[20]->CONTACTS; ?>
	 </div>
    </div>
  </div>              
     	                   
   		             </div>

                   
                       
 		       </div>
       
			</div>
			</div>

             
           </div>
       
			</div>
			</div>



			</div>


<div class="content-section-b">
             
             <div class="container">

     	         <div class="row">
        		     <div class="col-lg-5 right_box ">
             		      <div class="clearfix"></div>
            		  
            		       <h2 class="animated bounceInLeft" ><?php
            $xml = file_get_contents('events.xml');
             $EVENTLIST = new SimpleXMLElement($xml);
             echo $EVENTLIST->EVENT[22]->TITLE;?></h2>
            		       <p  class="animated bounceInLeft"><?php  echo $EVENTLIST->EVENT[22]->DESCRIPTION; ?></p>

						    <a class="Read-more" onclick="myFunction(22)" role="button" data-toggle="modal" data-target=".bs-example-modal-lg4">Read more</a>
						   
						   <!----------
		<div class="container text-center">

<h1> Click Me </h1>
<!-- Large modal -->


<div class="modal fade bs-example-modal-lg4" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
	<div id='myLargeModalLabel22' class="modal-header"  ></div>
      <div id="carousel-example-generic4" class="carousel slide" data-ride="carousel">

  

  <!-- Wrapper for slides -->
 
 <div class="container"><ul class="nav navbar-nav pull-center" >
  
			<li data-target="#carousel-example-generic4" data-slide-to="0" class="active"><a style="color:#1abc9c;" href="" title="Home">DESCRIPTION</a></li>
			
            <li  data-target="#carousel-example-generic4" data-slide-to="1"><a style="color:#1abc9c" href="" title="About">RULES</a></li>
			
			<li data-target="#carousel-example-generic4" data-slide-to="2"><a style="color:#1abc9c;" href="" title="Home">TIMELINE</a></li>
			
            <li  data-target="#carousel-example-generic4" data-slide-to="3"><a style="color:#1abc9c" href="" title="About">CONTACTS</a></li>
    
   
  </ul></div>

  <!-- Wrapper for slides -->
 
 <div class="carousel-inner" style="border-top: 1px solid #ddd;">
    <div class="item active" style="overflow:scroll; height:300px; ">
	
     <div class="container"><br>
	<?php  echo $EVENTLIST->EVENT[22]->DESCRIPTION; ?>
	 </div>
    </div>
	
    <div class="item" style="overflow:scroll; height:300px; ">
      <div class="container"><br>
	 
	  <?php  echo $EVENTLIST->EVENT[22]->RULES; ?>
	 </div>
    </div>
     <div class="item" style="overflow:scroll; height:300px; ">
     <div class="container"><br>
	 
	 <?php  echo $EVENTLIST->EVENT[22]->TIMELINE; ?>
	 </div>
    </div>
    <div class="item" style="overflow:scroll; height:300px; ">
     <div class="container" ><br>
	 
	<?php  echo $EVENTLIST->EVENT[22]->CONTACTS; ?>
	 </div>
    </div>
  </div>  

  
  
  
</div>
    </div>
  </div>
</div>
</div>
	  <div class="col-lg-5"  >
                       <div class="clearfix"></div>
                           <img class="img-responsive eventspic"  src="img/robo war.jpg" alt="">
                          
                         
     	                   
   		             </div>					   
            	          </div>
						  
						  
						
                       
                  </div>

               </div>
           </div>
  

<div class="content-section-a">

 		        <div class="container">


                  

 		           <div class="row">
				   
				    <div class="col-lg-6"  >
                       <div class="clearfix"></div>
                           <img class="img-responsive eventspic"  src="img/robo soccer.jpg" alt="">
                          
                         
     	                   
   		             </div>
                   
                    
                 <div class="col-lg-6  ">
                       <div class="clearfix"></div>
                            <h2  class="animated bounceInRight" ><?php echo $EVENTLIST->EVENT[21]->TITLE; ?></h2>
 		                   <p  class="animated bounceInRight"> <?php echo $EVENTLIST->EVENT[21]->DESCRIPTION; ?>
                           </p>                                                                                                                    <!--takshil_change-->
			<!--takshil_change-->   <a class="Read-more" onclick="myFunction(21)" role="button" data-toggle="modal" data-target=".bs-example-modal-lg3">Read more</a>
    <div class="modal fade bs-example-modal-lg3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
	<div id='myLargeModalLabel21' class="modal-header"  ></div>
      <div id="carousel-example-generic5" class="carousel slide" data-ride="carousel">
                       <!--takshil_change-->
                            <!-- Wrapper for slides -->
 
 <div class="container"><ul class="nav navbar-nav pull-center" >
  
			<li data-target="#carousel-example-generic5" data-slide-to="0" class="active"><a style="color:#1abc9c;" href="" title="Home">DESCRIPTION</a></li>
			
            <li  data-target="#carousel-example-generic5" data-slide-to="1"><a style="color:#1abc9c" href="" title="About">RULES</a></li>
			
			<li data-target="#carousel-example-generic5" data-slide-to="2"><a style="color:#1abc9c;" href="" title="Home">TIMELINE</a></li>
		
            <li  data-target="#carousel-example-generic5" data-slide-to="3"><a style="color:#1abc9c" href="" title="About">CONTACTS</a></li>
    
   
  </ul></div>

  <!-- Wrapper for slides -->
 
 <div class="carousel-inner" style="border-top: 1px solid #ddd;">
    <div class="item active" style="overflow:scroll; height:300px; ">
	
     <div class="container"><br>
	<?php  echo $EVENTLIST->EVENT[21]->DESCRIPTION; ?>
	 </div>
    </div>
	
    <div class="item" style="overflow:scroll; height:300px; ">
      <div class="container"><br>
	 
	  <?php  echo $EVENTLIST->EVENT[21]->RULES; ?>
	 </div>
    </div>
     <div class="item" style="overflow:scroll; height:300px; ">
     <div class="container"><br>
	 
	 <?php  echo $EVENTLIST->EVENT[21]->TIMELINE; ?>
	 </div>
    </div>
    <div class="item" style="overflow:scroll; height:300px; ">
     <div class="container" ><br>
	 
	<?php  echo $EVENTLIST->EVENT[21]->CONTACTS; ?>
	 </div>
    </div>
  </div>               
     	                   
   		             </div>

                   
                       
 		       </div>
       
			</div>
			</div>

             
           </div>
       
			</div>
			</div>



			</div>







			
			
<!--end of four events-->			
			
			
			
			
			
			
		
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

<!--tech: WWWizard,App studio, sameeksha,escape,bug spot,scrud,jobs 0-6-->
  <!--managerial: itw,brandsome,pinnacle, tomorrow cities, off track7-11-->
    <!-- jb, forex,stocksutra  trove trace12-15-->
      <!--quiz: enigma,programing quiz16-18-->
	<!--gamiacs 19-->
	  <!-- robo: course chaser, blazing wheels, robo soccer, robo war 20-24 -->
