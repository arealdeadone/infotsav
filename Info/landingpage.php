<?php
session_start();
	
	include('config.php');
	include('ip.php');
	//mysql database connectivity
	$db=mysqli_connect($dbhost,$dbuser,$dbpassword,$dbdatabase);
	if(isset($_POST['submit'])){
		//echo"inside form";
			
		$name= mysql_real_escape_string(stripslashes($_POST['name']));
		
		$pwd= md5(mysql_real_escape_string(stripslashes($_POST['pwd'])));
		$rpwd= md5(mysql_real_escape_string(stripslashes($_POST['rpwd'])));
		$phone= mysql_real_escape_string(stripslashes($_POST['phone']));
		$email= mysql_real_escape_string(stripslashes($_POST['email']));
		$ins= mysql_real_escape_string(stripslashes($_POST['ins']));
		
		$year= mysql_real_escape_string(stripslashes($_POST['year']));
		$gender= mysql_real_escape_string(stripslashes($_POST['gender']));
		$ip=getIP();	
			$email_check_query="SELECT * FROM registration WHERE email='$email'";
			$email_check_result=mysqli_query($db,$email_check_query);
				if(mysqli_num_rows($email_check_result)>0)
					{
						echo'<script type="text/javascript">
							alert("This email is is aleady registered");
						</script>';
					}
				else
					{
					$activation=md5(uniqid(rand(), true));
		$query= "INSERT INTO registration(name,password,mobileno,institute,year,email,gender,ip,activation) VALUES('$name','$pwd','$phone','$ins','$year','$email','$gender','$ip','$activation')";
		$result=mysqli_query($db,$query);
		if(mysqli_affected_rows($db)>0)
			{
			mysqli_insert_id($db);
			//echo"SUCCESSS";
			$message = " To activate your account, please click on this link:\n\n";
                $message .= WEBSITE_URL . '/activate.php?email=' . urlencode($email) . "&key=$activation";
                mail($email, 'Registration Confirmation', $message, 'From: amanjain7898@gmail.com');

                // Finish the page:
                echo '<script>
							alert("Thank you for registering! A confirmation email has been sent to '.$email.' Please click on the Activation Link to Activate your account");
					  </script>';
				
			}
		/*else
		echo"Failure";*/
					}
	}
	
	
	
	
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>3D lines animation with three.js</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
		
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">
		
		
		
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Nunito:400,300,700' rel='stylesheet' type='text/css'> 
		
	
		
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		
	<!--	<script src="js/bootstrap.js"></script>   -->
	<!--	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.js"></script>   -->
		<script src="js/bootstrap.min.js"></script> 
		
		
        <style>
		
		   @font-face {
           font-family: myFirstFont;
           src: url(trench100free.otf);
           } 
           
			   
            body {
                background-color: #000;
                margin: 0px;
                overflow: hidden;
                font-family:arial;
                color:#fff;
            }
            h1{
                text-align:center;
				font-family: myFirstFont;
				font-size:130px;
				color:black;
				margin-top:0px;
				
            }
			h2{
                text-align:center;
				font-size:27px;
				color:black;
				font-family: myFirstFont;
				
				margin-top:-20px
				
            }
			
			h4{
                text-align:center;
				font-size:35px;
				color:black;
				font-family: myFirstFont;
				margin-top: -40px;
            }
			
			h6{
                text-align:center;
				font-size:45px;
				color:black;
				font-family: myFirstFont;
				margin-top: 30px;
            }
			
			
			h3{
                text-align:center;
				font-family: myFirstFont;
				font-size:25px;
				margin: -10px;
				
            }

            a {
                color:#0078ff;
            }
            #canvas{
                width:100%;
              
                
                position:absolute;
                top:0;
                left:0;
                background-image: url("abcd.jpg"); 
background-size:cover;				
            }
            .canvas-wrap{
                position:relative;
                
            }
            div.canvas-content{
                position:relative;
                z-index:2000;
                color:black;
                text-align:center;
                padding-top:60px;
            }
			.delay-200ms {
    -webkit-animation-delay: 200ms;
    animation-delay: 200ms;
	}
	
				.delay-1000ms {
    -webkit-animation-delay: 1000ms;
    animation-delay: 1000ms;
	}
	.btn.btn-lg {padding: 10px 40px;}
	.btn.btn-hero,
.btn.btn-hero:hover,
.btn.btn-hero:focus {
    color: #f5f5f5;
    background-color: #1abc9c;
    border-color: #1abc9c;
    outline: none;
	
    margin: 20px auto;
}

			
        </style>
    </head>
    <body>
        <section class="canvas-wrap">
		
            <div class="canvas-content " >
			    <h2 class="animated fadeIndown "><b>ABV-Indian Institue Of Information Technology And Management Gwalior</h2>
				<img src="img/large/logo200.png" height="100px" width="100px">
                <h1 class="animated fadeInDown">Infotsav</h1>
				
				<h3 class="animated  fadeInDown delay-1000ms">3<sup>rd</sup>& 4<sup>th</sup> Oct 2015</h3> 
				<h6 class="animated  fadeInUp">Annual Techno-Managerial Fest</h6>
				<button class="btn btn-hero btn-lg animated  fadeInUp delay-1000ms" data-toggle="modal" data-target="#myModal" role="button">Register</button>
				
				<!-- Modal -->
							
							    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index:9999;">
							  <div class="modal-dialog modal-lg">
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h2 class="modal-title" id="myModalLabel" style="color: #1bba9c;"><b>Register Here!</b></h2>								  </div>
								  
								  
								 <form name="myForm" method="post" action="landingpage.php" onsubmit="return validateForm()">
									  <div class="modal-body">
										  
										  
										  
										  <table class="table ">
											<tr>
												<td>
												
													<div class="form-group">
														<label class="control-label col-md-4" id="name" style="color: #666666; font-size: 17px; text-align: left" > Name: </label>
														<div class="col-md-6">
														<input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
														</div>
													</div>
												</td>
												<td>
													<div class="form-group">
														<label class="control-label col-md-4" style="color: #666666; font-size: 17px; text-align: left" > Email ID: </label>
														<div class="col-md-6">
														<input type="email" name="email" class="form-control" id="email" placeholder="Email id">
														
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
																<option value="male">male</option>
																<option value="female">female</option>
															</select>
														</div>
													</div>
												
												</td>
												<td>
												
													<div class="form-group">
														<label class="control-label col-md-4" style="color: #666666; font-size: 17px; text-align: left" > Mobile No: </label>
														<div class="col-md-6">
														<input type="number" name="phone" class="form-control" id="phone" placeholder="Mobile No.">
														<!--<input type="number" name="phone" class="form-control bfh-phone" id="phone" placeholder="10-digit Mobile No." data-format="ddddd-ddddd"> -->
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
																<option value="5">5th</option>
																<option value="5">others</option>
															</select>
														</div>
													</div>
												</td>
												
											</tr>
											
											
												<td colspan="2" style="text-align:center">
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
					        <!-- modal over (c)shreya; -->
				
				
				
				
            </div>
            <div id="canvas" class="gradient"></div>
            
        </section>
        
        <!-- Main library -->
        <script src="js/three.min.js"></script>
      
        <!-- Helpers -->
        <script src="js/projector.js"></script>
        <script src="js/canvas-renderer.js"></script>

        <!-- Visualitzation adjustments -->
        <script src="js/3d-lines-animation.js"></script>

        <!-- Animated background color --
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script> 
        <script src="js/color.js"></script> -->

<script>
 
 function validateForm() {
		//name
			var x = $('input#name').val();
			if (x == null || x == "") {
		        $('input#name').css("border", "2px solid red");
		        return false;
		    }else{
				$('input#name').css("border", "1px solid grey");
			}
		
		
		//password
		var z = $('input#pwd').val();
			if (z == null || z == ""||(z.length<6)) {
		        $('input#pwd').css("border", "3px solid red");
				alert("Enter atleast 6 characters password !");
		        return false;
		    }else{
				$('input#pwd').css("border", "1px solid grey");
			}
			
		//password again
		var m = $('input#rpwd').val();
			if (m != z) {
		        $('input#rpwd').css("border", "3px solid red");
				alert("password does not match");
		        return false;
		    }else{
				$('input#rpwd').css("border", "1px solid grey");
			}
			
		//mobile
		var a = $('input#phone').val();
			if (a == null || a == ""||(a.length!=10)) {
		        $('input#phone').css("border", "3px solid red");
				alert("invalid mobile number");
		        return false;
		    }else{
				$('input#phone').css("border", "1px solid grey");
			}
			
		//email
		var b = $('input#email').val();
			if (b == null || b == "") {
		        $('input#email').css("border", "3px solid red");
		        return false;
		    }else{
				$('input#email').css("border", "1px solid grey");
			}
			
		//institute name
		var c = $('input#ins').val();
			if (c == null || c == "") {
		        $('input#ins').css("border", "3px solid red");
		        return false;
		    }else{
				$('input#ins').css("border", "1px solid grey");
			}
			
		
		
			
		//year
		var e = $('select#year').val(); 
			if (e === "Select Year") {
		        $('select#year').css("border", "3px solid red");
		        return false;
		    }else{
				$('select#year').css("border", "1px solid grey");
			}
			
			
			
		var f = $('select#gender').val();
			if (f === "Select Gender") {
		        $('select#gender').css("border", "3px solid red");
		        return false;
		    }else{
				$('select#gender').css("border", "1px solid grey");
			}
			
	
			
}
</script>
    </body>
</html>
