<!DOCTYPE HTML>
<html>
	<head>
		<title>RoboFiesta Events |Infotsav 2k16</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="css/bootstrap.min.css">
 	    <script src="js/jquery.min.js"></script>
    	<script src="js/bootstrap.min.js"></script>
    	<style type="text/css"></style>
    	<style>
    		@font-face{
	font-family: newbold;
	src:url(cuyabrabold.otf);
}
    	</style>
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
    if(a==0) document.getElementById("myLargeModalLabel").innerHTML = out;/*takshil_change*/
    if(a==1) document.getElementById("myLargeModalLabel1").innerHTML = out;
    if(a==2) document.getElementById("myLargeModalLabel2").innerHTML = out;
    if(a==3) document.getElementById("myLargeModalLabel3").innerHTML = out;
    if(a==4) document.getElementById("myLargeModalLabel4").innerHTML = out;
    if(a==5) document.getElementById("myLargeModalLabel5").innerHTML = out;
    if(a==6) document.getElementById("myLargeModalLabel6").innerHTML = out;
    if(a==7) document.getElementById("myLargeModalLabel7").innerHTML = out;
 if(a==23) document.getElementById("myLargeModalLabel23").innerHTML = out;

  
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
$(document).ready(function(){
	$(".Read-more").click(function(){

	});
});
</script>
		</head>
	<body class="landing">

		<!-- Header -->
			<header id="header" class="alt">
				<a href="#nav"></a>
			</header>

		<!-- Nav -->
			<nav id="nav">
				<ul class="links">
					<li><a href="../index.php"><span class="glyphicon glyphicon-home">   Home</span></a></li>
					<li><a href="technicalnew.php"><span class="glyphicon glyphicon-hdd">   Technical</span></a></li>
					<li><a href="managerialnew.php"><span class="glyphicon glyphicon-briefcase">   Managerial</span></a></li>
					<li><a href="onlinenew.php"><span class="glyphicon glyphicon-euro">   Online</span></a></li>
					<li><a href="gamiacsnew.php"><span class="glyphicon glyphicon-screenshot">   Gamiacs</span></a></li>
					<li><a href="robonew.php"><span class="glyphicon glyphicon-magnet">   Robofiesta</span></a></li>
					<li><a href="quiznew.php"><span class="glyphicon glyphicon-book">   Quiz</span></a></li>
				</ul>
			</nav>

		<!-- Banner -->
			<section id="banner" style="background-image: url(img/robot.jpg);" >
				<h2 style="font-family: farray;">ROBOFIESTA</h2>
				<!-- <p>Event description</p> -->
			</section>

		
			<section id="one" class="wrapper style1">
				<div class="inner" >

<!-- start of technical section One -->
<?php 
for($i=18;$i<22;$i++)
{ if($i%2==0)
	{?>
	<?php
           						 $xml = file_get_contents('events.xml');
            					 $EVENTLIST = new SimpleXMLElement($xml);?>
					<article class="feature left" style="box-shadow: 5px 5px 3px #888888;background-color: rgba(0,0,0,0.9); ">
						<span class="image"><img  src="img/<?php echo $EVENTLIST->EVENT[$i]->IMAGE; ?>"  alt="" /></span>
						<div class="content" >
							<center><h2 style="color:white;font-weight: ;font-size:2.2em;font-weight:500;font-family: inherit;margin-bottom: 5%;"><span style="border: solid;padding: 2%;font-family: induction;">
            					<?php echo $EVENTLIST->EVENT[$i]->TITLE;?></span></h2></center>
							<p style="font-size: 1.2em;line-height: 1.2;font-family: newbold;color: rgba(255,255,255,0.9);"><?php echo $EVENTLIST->EVENT[$i]->DESCRIPTION; ?></p>
							<ul class="actions">
								<li>
										<a href="readmore.php?id=<?php echo $i; ?>"> <button class="Read-more"  role="button" style="color: white;border-style: solid;border-color: rgb(0,82,204);border-width:1px;
										 background:none;padding: 5%;margin-bottom: 15%;">Read more </button></a></li></ul>

											<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="z-index:9999;">
											  <div class="modal-dialog modal-lg">
											   <div class="modal-content" style="background: #CCCACA;" >
												<div id='myLargeModalLabel' class="modal-header" style="color:rgb(42,65,111);" ></div>
											      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

																								  

	  <!-- slides -->
																								 
										 <div class="container"><ul class="nav navbar-nav pull-center" >
																								  
											<li data-target="#carousel-example-generic" data-slide-to="0" class="active"><a style="color:rgb(42,65,111);" href="" title="Home">DESCRIPTION</a></li>
																											
								            <li  data-target="#carousel-example-generic" data-slide-to="1"><a style="color:rgb(42,65,111);" href="" title="About">RULES</a></li>
																											
											<li data-target="#carousel-example-generic" data-slide-to="2"><a style="color:rgb(42,65,111);" href="" title="Home">TIMELINE</a></li>
																											
								            <li  data-target="#carousel-example-generic" data-slide-to="3"><a style="color:rgb(42,65,111);" href="" title="About">CONTACTS</a></li>
																								    
																								   
										  </ul></div>

	  <!-- slides -->
																								 
										 <div class="carousel-inner" style="border-top: 1px solid #ddd;">
									     <div class="item active" style="overflow:scroll; height:300px; ">
																									
										<div class="container"><br>
										<?php  echo $EVENTLIST->EVENT[$i]->DESCRIPTION; ?>
										 </div>
										</div>
																									
									  <div class="item" style="overflow:scroll; height:300px; ">
								      <div class="container"><br>
																									 
									  <?php  echo $EVENTLIST->EVENT[$i]->RULES; ?>
									 </div>
								    </div>
								     <div class="item" style="overflow:scroll; height:300px; ">
								     <div class="container"><br>
									 <?php  echo $EVENTLIST->EVENT[$i]->TIMELINE; ?>
									 </div>
										</div>
										<div class="item" style="overflow:scroll; height:300px; ">
										 <div class="container" ><br>
																									 
										<?php  echo $EVENTLIST->EVENT[$i]->CONTACTS; ?>
											 </div>
											 </div>
											 </div></div>
										   </div>
											 </div>
																								  
											</div>

								</li>
							</ul>
						</div>
					</article>

<?php }
else
{?>
<!-- end of section1 -->
<!-- start of new section -->


						<article class="feature right" style="box-shadow: 5px 5px 3px #888888;background-color: rgba(0,0,0,0.9); ">
						<span class="image"><img  src="img/<?php echo $EVENTLIST->EVENT[$i]->IMAGE; ?>" alt="" /></span>
						<div class="content" >
							<center><h2 style="color:white;font-size:2.2em;font-weight:500;font-family: inherit;margin-bottom: 5%;"><span style="border: solid;padding: 2%;font-family: induction;"><?php
           						 $xml = file_get_contents('events.xml');
            					 $EVENTLIST = new SimpleXMLElement($xml);
            					 echo $EVENTLIST->EVENT[$i]->TITLE;?></span></h2></center>
							<p style="font-size: 1.2em;line-height: 1.2;font-family: newbold;color: rgba(255,255,255,0.9);padding-bottom:4%"><?php echo $EVENTLIST->EVENT[$i]->DESCRIPTION; ?></p>
							<ul class="actions">
								<li>
										 <a href="readmore.php?id=<?php echo $i; ?>"> <button class="Read-more"  role="button" style="color: white;border-style: solid;border-color: rgb(0,82,204);
										 background:none;padding: 5%;margin-bottom: 10%;border-width:1px;">Read more </button></a></li></ul>

											<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="z-index:9999;">
											  <div class="modal-dialog modal-lg">
											   <div class="modal-content" style="background: #CCCACA;" >
												<div id='myLargeModalLabel' class="modal-header" style="color:rgb(42,65,111);" ></div>
											      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

																								  

	  <!-- slides -->
																								 
										 <div class="container"><ul class="nav navbar-nav pull-center" >
																								  
											<li data-target="#carousel-example-generic" data-slide-to="0" class="active"><a style="color:rgb(42,65,111);" href="" title="Home">DESCRIPTION</a></li>
																											
								            <li  data-target="#carousel-example-generic" data-slide-to="1"><a style="color:rgb(42,65,111);" href="" title="About">RULES</a></li>
																											
											<li data-target="#carousel-example-generic" data-slide-to="2"><a style="color:rgb(42,65,111);" href="" title="Home">TIMELINE</a></li>
																											
								            <li  data-target="#carousel-example-generic" data-slide-to="3"><a style="color:rgb(42,65,111);" href="" title="About">CONTACTS</a></li>
																								    
																								   
										  </ul></div>

	  <!-- slides -->
																								 
										 <div class="carousel-inner" style="border-top: 1px solid #ddd;">
									     <div class="item active" style="overflow:scroll; height:300px; ">
																									
										<div class="container"><br>
										<?php  echo $EVENTLIST->EVENT[$i]->DESCRIPTION; ?>
										 </div>
										</div>
																									
									  <div class="item" style="overflow:scroll; height:300px; ">
								      <div class="container"><br>
																									 
									  <?php  echo $EVENTLIST->EVENT[$i]->RULES; ?>
									 </div>
								    </div>
								     <div class="item" style="overflow:scroll; height:300px; ">
								     <div class="container"><br>
									 <?php  echo $EVENTLIST->EVENT[$i]->TIMELINE; ?>
									 </div>
										</div>
										<div class="item" style="overflow:scroll; height:300px; ">
										 <div class="container" ><br>
																									 
										<?php  echo $EVENTLIST->EVENT[$i]->CONTACTS; ?>
											 </div>
											 </div>
											 </div></div>
										   </div>
											 </div>
																								  
											</div>

								</li>
							</ul>
						</div>
					</article>
<?php }?>
<?php } ?>
<!-- end of section 1 -->


				</div>
			</section>


		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<ul class="icons">
						<li><a href="https://www.facebook.com/Infotsav/?fref=ts" class="icon fa-facebook">
							<span class="label">Facebook</span>
						</a></li>
						<li><a href="https://www.instagram.com/infotsav2016/" class="icon fa-instagram">
							<span class="label">Instagram</span>
						</a></li>
					</ul>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>