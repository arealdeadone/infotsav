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
    var out = "<h2 class='modal-title' style='color: #1bba9c;'><b>";
    var tmp = ttl+"</b></h2>";
    out = out + tmp;
    if(a==0) document.getElementById("myLargeModalLabel").innerHTML = out;/*takshil_change*/
    if(a==1) document.getElementById("myLargeModalLabel1").innerHTML = out;
    if(a==2) document.getElementById("myLargeModalLabel2").innerHTML = out;
    if(a==3) document.getElementById("myLargeModalLabel3").innerHTML = out;
    if(a==4) document.getElementById("myLargeModalLabel4").innerHTML = out;
    if(a==5) document.getElementById("myLargeModalLabel5").innerHTML = out;
    if(a==6) document.getElementById("myLargeModalLabel6").innerHTML = out;
    if(a==7) document.getElementById("myLargeModalLabel7").innerHTML = out;

  
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


<body>  	  <!-- Second navbar for sign in -->
		  
    <nav class="fixed-nav-bar navbar navbar-default" >
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         <B> <a class="navbar-brand" href="#"><img src="img/a.png" style="width:40px; height:40px; margin-top:-14px">&nbsp;Infotsav</a> </B>
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
		  
            <li><a href="#">Home</a></li>
            <li><a href="#aman">About</a></li>
            <li><a href="#showcase">Mobile app</a></li>
            <li><a href="#">Events</a></li>
            <li><a href="#">Sponsors</a></li>
            <li><a href="#">Contact</a></li>
            
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
					<a class="btn btn-default btn-outline btn-circle collapsed fa fa-user"  data-toggle="collapse" href="#nav-collapse2" aria-expanded="false" aria-controls="nav-collapse2">&nbsp; Sign in</a>
				</li>
				
				<?php
				}
				?>
				
			
          </ul>
		  
          <div class="collapse nav navbar-nav nav-collapse slide-down" id="nav-collapse2">
            <form class="navbar-form navbar-right form-inline" role="form" action="index.php" method="POST">
              <div class="form-group">
                <label class="sr-only" for="Email">Email</label>
                <input type="email" class="form-control" name="lemail" id="Email" placeholder="Email" autofocus required />
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
	

			<div class="content_white container"> 				
   		<?php
            $xml = file_get_contents('events.xml');
             $EVENTLIST = new SimpleXMLElement($xml);
             echo $EVENTLIST->EVENT[1]->TITLE;?>		

                
   				<h3>Technical events</h3>
   				<p >Infotsav, a National level Techno-Management fest born with the motto of promoting technology & inspiring business, entrepreneurship skills among the young 
guns has crossed the rallying point and got launched, with all doors open for the entries to come in and take their position in the various heats.With the event getting started on ***. ’15 shall proceed on up till ******. ’15. So, it’s time to gear up with what all you have in your bag, to be a part of the most crowd-pulling event of Central India. It brings you an opportunity to interact with such personalities who are at the helm of changing our world today. Previous speakers who have graced the lecture series include the likes of John C. Mather (The 2006 Physics Nobel Laureate), Lyn Evans (Project Leader, Large Hadron Collider, CERN), Pranav Mistry (The Inventor of 6th Sense Technology), Stephen P. Morse (Chief Architect, Intel 8086 Microprocessor), Richard Stallman (Founder, Free Software Movement), Walter Bender (Ex-Director, MIT Media Labs), etc. Having gained immense popularity over the past few years, it is widely recognized as the biggest and the best lecture series in the entire nation and we are sure that we'll be successful in outdoing ourselves yet again. So come, listen and get inspired!</p>
			    
                
			</div>
			
 <!--start of first event-->           
<div class="content-section-b">
             
             <div class="container">

     	        
     	        
     	        
     	        <div class="row">
     	         
     	         
     	         
     	         
     	         
        		     <div class="col-lg-5 right_box ">
        		     
        		     
        		     
        		     
        		     
             		      <div class="clearfix"></div>
            		  
            		       <h2 class="animated bounceInLeft" ><?php
            $xml = file_get_contents('events.xml');
             $EVENTLIST = new SimpleXMLElement($xml);
             echo $EVENTLIST->EVENT[0]->TITLE;?></h2>
            		       <p  class="animated bounceInLeft"><?php  echo $EVENTLIST->EVENT[0]->DESCRIPTION; ?></p>
						    <a class="Read-more" onclick="myFunction(0)" role="button" data-toggle="modal" data-target=".bs-example-modal-lg">Read more</a>
						   
						   <!----------
		<div class="container text-center">

<h1> Click Me </h1>
<!-- Large modal -->


<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
	<div id='myLargeModalLabel' class="modal-header"  ></div>
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

  

  <!-- Wrapper for slides -->
 
 <div class="carousel-inner">
    <div class="item active">
	
     <div class="container">
	<?php  echo $EVENTLIST->EVENT[0]->RULES; ?>
	 </div>
    </div>
	
    <div class="item">
      <div class="container">
	 
	  <?php  echo $EVENTLIST->EVENT[0]->DESCRIPTION; ?>
	 </div>
    </div>
     <div class="item">
     <div class="container">
	 
	 <?php  echo $EVENTLIST->EVENT[0]->TIMELINE; ?>
	 </div>
    </div>
    <div class="item">
     <div class="container">
	 
	<?php  echo $EVENTLIST->EVENT[0]->CONTACTS; ?>
	 </div>
    </div>
  </div>
  
  
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>

  
  
  
</div>
    </div>
  </div>
  
</div>




</div>


  <div class="col-lg-5"  >
                       <div class="clearfix"></div>
                           <img class="img-responsive"  src="img/a.png" style="max-height:60%; text-align:center ;"alt="">
                          
                         
     	                   
   		             </div>
						   
            	          </div>
						  
						  
						
                       
                  </div>

               </div>
           </div>
   





<div class="content-section-a">

 		        <div class="container">


                  

 		           <div class="row">
				   
				    <div class="col-lg-5"  >
                       <div class="clearfix"></div>
                           <img class="img-responsive"  src="img/a.png" style="max-height:60%; text-align:center ;"alt="">
                          
                         
     	                   
   		             </div>
                   
                    
                 <div class="col-lg-5  ">
                       <div class="clearfix"></div>
                            <h2  class="animated bounceInRight" ><?php echo $EVENTLIST->EVENT[1]->TITLE; ?></h2>
 		                   <p  class="animated bounceInRight"> <?php echo $EVENTLIST->EVENT[1]->DESCRIPTION; ?>
                           </p>                                                                                                                    <!--takshil_change-->
			<!--takshil_change-->   <a class="Read-more" onclick="myFunction(1)" role="button" data-toggle="modal" data-target=".bs-example-modal-lg1">Read more</a>
    <div class="modal fade bs-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
	<div id='myLargeModalLabel1' class="modal-header"  ></div>
      <div id="carousel-example-generic1" class="carousel slide" data-ride="carousel">
                       <!--takshil_change-->
                            <!-- Wrapper for slides -->
 
 <div class="carousel-inner">
    <div class="item active">
	
     <div class="container">
	<?php  echo $EVENTLIST->EVENT[1]->RULES; ?>
	 </div>
    </div>
	
    <div class="item">
      <div class="container">
	 
	  <?php  echo $EVENTLIST->EVENT[1]->DESCRIPTION; ?>
	 </div>
    </div>
     <div class="item">
     <div class="container">
	 
	 <?php  echo $EVENTLIST->EVENT[1]->TIMELINE; ?>
	 </div>
    </div>
    <div class="item">
     <div class="container">
	 
	<?php  echo $EVENTLIST->EVENT[1]->CONTACTS; ?>
	 </div>
    </div>
  </div>
            <!-- Controls -->                            <!--takshil_change-->
  <a class="left carousel-control" href="#carousel-example-generic1" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>                                                    <!--takshil_change-->
  <a class="right carousel-control" href="#carousel-example-generic1" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>               
     	                   
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
             echo $EVENTLIST->EVENT[2]->TITLE;?></h2>
            		       <p  class="animated bounceInLeft"><?php  echo $EVENTLIST->EVENT[2]->DESCRIPTION; ?></p>
						    <a class="Read-more" onclick="myFunction(2)" role="button" data-toggle="modal" data-target=".bs-example-modal-lg2">Read more</a>
						   
						   <!----------
		<div class="container text-center">

<h1> Click Me </h1>
<!-- Large modal -->


<div class="modal fade bs-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
	<div id='myLargeModalLabel2' class="modal-header"  ></div>
      <div id="carousel-example-generic2" class="carousel slide" data-ride="carousel">

  

  <!-- Wrapper for slides -->
 
 <div class="carousel-inner">
    <div class="item active">
	
     <div class="container">
	<?php  echo $EVENTLIST->EVENT[2]->RULES; ?>
	 </div>
    </div>
	
    <div class="item">
      <div class="container">
	 
	  <?php  echo $EVENTLIST->EVENT[2]->DESCRIPTION; ?>
	 </div>
    </div>
     <div class="item">
     <div class="container">
	 
	 <?php  echo $EVENTLIST->EVENT[2]->TIMELINE; ?>
	 </div>
    </div>
    <div class="item">
     <div class="container">
	 
	<?php  echo $EVENTLIST->EVENT[2]->CONTACTS; ?>
	 </div>
    </div>
  </div>
  
  
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic2" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic2" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>

  
  
  
</div>
    </div>
  </div>
</div>
</div>
	  <div class="col-lg-5"  >
                       <div class="clearfix"></div>
                           <img class="img-responsive"  src="img/a.png" style="max-height:60%; text-align:center ;"alt="">
                          
                         
     	                   
   		             </div>					   
            	          </div>
						  
						  
						
                       
                  </div>

               </div>
           </div>
   

<!--end of b-->



<div class="content-section-a">

 		        <div class="container">


                  

 		           <div class="row">
				   
				    <div class="col-lg-5"  >
                       <div class="clearfix"></div>
                           <img class="img-responsive"  src="img/a.png" style="max-height:60%; text-align:center ;"alt="">
                          
                         
     	                   
   		             </div>
                   
                    
                 <div class="col-lg-5  ">
                       <div class="clearfix"></div>
                            <h2  class="animated bounceInRight" ><?php echo $EVENTLIST->EVENT[3]->TITLE; ?></h2>
 		                   <p  class="animated bounceInRight"> <?php echo $EVENTLIST->EVENT[3]->DESCRIPTION; ?>
                           </p>                                                                                                                    <!--takshil_change-->
			<!--takshil_change-->   <a class="Read-more" onclick="myFunction(3)" role="button" data-toggle="modal" data-target=".bs-example-modal-lg3">Read more</a>
    <div class="modal fade bs-example-modal-lg3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
	<div id='myLargeModalLabel3' class="modal-header"  ></div>
      <div id="carousel-example-generic3" class="carousel slide" data-ride="carousel">
                       <!--takshil_change-->
                            <!-- Wrapper for slides -->
 
 <div class="carousel-inner">
    <div class="item active">
	
     <div class="container">
	<?php  echo $EVENTLIST->EVENT[3]->RULES; ?>
	 </div>
    </div>
	
    <div class="item">
      <div class="container">
	 
	  <?php  echo $EVENTLIST->EVENT[3]->DESCRIPTION; ?>
	 </div>
    </div>
     <div class="item">
     <div class="container">
	 
	 <?php  echo $EVENTLIST->EVENT[3]->TIMELINE; ?>
	 </div>
    </div>
    <div class="item">
     <div class="container">
	 
	<?php  echo $EVENTLIST->EVENT[3]->CONTACTS; ?>
	 </div>
    </div>
  </div>
            <!-- Controls -->                            <!--takshil_change-->
  <a class="left carousel-control" href="#carousel-example-generic3" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>                                                    <!--takshil_change-->
  <a class="right carousel-control" href="#carousel-example-generic3" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>               
     	                   
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
             echo $EVENTLIST->EVENT[4]->TITLE;?></h2>
            		       <p  class="animated bounceInLeft"><?php  echo $EVENTLIST->EVENT[4]->DESCRIPTION; ?></p>
						    <a class="Read-more" onclick="myFunction(4)" role="button" data-toggle="modal" data-target=".bs-example-modal-lg4">Read more</a>
						   
						   <!----------
		<div class="container text-center">

<h1> Click Me </h1>
<!-- Large modal -->


<div class="modal fade bs-example-modal-lg4" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
	<div id='myLargeModalLabel4' class="modal-header"  ></div>
      <div id="carousel-example-generic4" class="carousel slide" data-ride="carousel">

  

  <!-- Wrapper for slides -->
 
 <div class="carousel-inner">
    <div class="item active">
	
     <div class="container">
	<?php  echo $EVENTLIST->EVENT[4]->RULES; ?>
	 </div>
    </div>
	
    <div class="item">
      <div class="container">
	 
	  <?php  echo $EVENTLIST->EVENT[4]->DESCRIPTION; ?>
	 </div>
    </div>
     <div class="item">
     <div class="container">
	 
	 <?php  echo $EVENTLIST->EVENT[4]->TIMELINE; ?>
	 </div>
    </div>
    <div class="item">
     <div class="container">
	 
	<?php  echo $EVENTLIST->EVENT[4]->CONTACTS; ?>
	 </div>
    </div>
  </div>
  
  
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic4" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic4" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>

  
  
  
</div>
    </div>
  </div>
</div>

</div>
	  <div class="col-lg-5"  >
                       <div class="clearfix"></div>
                           <img class="img-responsive"  src="img/a.png" style="max-height:60%; text-align:center ;"alt="">
                          
                         
     	                   
   		             </div>					   
            	          </div>
						  
						  
						
                       
                  </div>

               </div>
           </div>
  




<div class="content-section-a">

 		        <div class="container">


                  

 		           <div class="row">
				   
				    <div class="col-lg-5"  >
                       <div class="clearfix"></div>
                           <img class="img-responsive"  src="img/a.png" style="max-height:60%; text-align:center ;"alt="">
                          
                         
     	                   
   		             </div>
                   
                    
                 <div class="col-lg-5  ">
                       <div class="clearfix"></div>
                            <h2  class="animated bounceInRight" ><?php echo $EVENTLIST->EVENT[5]->TITLE; ?></h2>
 		                   <p  class="animated bounceInRight"> <?php echo $EVENTLIST->EVENT[5]->DESCRIPTION; ?>
                           </p>                                                                                                                    <!--takshil_change-->
			<!--takshil_change-->   <a class="Read-more" onclick="myFunction(5)" role="button" data-toggle="modal" data-target=".bs-example-modal-lg5">Read more</a>
    <div class="modal fade bs-example-modal-lg5" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
	<div id='myLargeModalLabel5' class="modal-header"  ></div>
      <div id="carousel-example-generic5" class="carousel slide" data-ride="carousel">
                       <!--takshil_change-->
                            <!-- Wrapper for slides -->
 
 <div class="carousel-inner">
    <div class="item active">
	
     <div class="container">
	<?php  echo $EVENTLIST->EVENT[5]->RULES; ?>
	 </div>
    </div>
	
    <div class="item">
      <div class="container">
	 
	  <?php  echo $EVENTLIST->EVENT[5]->DESCRIPTION; ?>
	 </div>
    </div>
     <div class="item">
     <div class="container">
	 
	 <?php  echo $EVENTLIST->EVENT[5]->TIMELINE; ?>
	 </div>
    </div>
    <div class="item">
     <div class="container">
	 
	<?php  echo $EVENTLIST->EVENT[5]->CONTACTS; ?>
	 </div>
    </div>
  </div>
            <!-- Controls -->                            <!--takshil_change-->
  <a class="left carousel-control" href="#carousel-example-generic5" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>                                                    <!--takshil_change-->
  <a class="right carousel-control" href="#carousel-example-generic5" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>               
     	                   
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
			   <p style="margin-bottom:-50px; margin-left:-10px;"> <font size="3px" color="grey"> web-credits </font><br>
			  <b> <font size="2px"color="A5A3A8"><a href="https://www.facebook.com/ritu.jha.1485?fref=ts" target="_blank"> Ritu jha</a> |
			   <a href="https://www.facebook.com/profile.php?id=100006584536238&fref=ts" target="_blank">  Aman jain</a> |
			   <a href="https://www.facebook.com/shreya.sahu.507?fref=ts" target="_blank"> Shreya Sahu </a> </font></b>
			   
			  </div>
			  
			</div>
        </div>

		</footer>
		
		

		
		


</body>

<!--tech: WWWizard,App studio, sameeksha,escape,bug spot,scrud,jobs 0-6-->
  <!--managerial: itw,brandsome,pinnacle, tomorrow cities, off track7-11-->
    <!-- jb, forex,stocksutra  trove trace12-15-->
      <!--quiz: enigma,programing quiz16-17-->
	<!--gamiacs 18-->
	  <!-- robo: course chaser, blazing wheels, robo soccer, robo war 19-22 -->
