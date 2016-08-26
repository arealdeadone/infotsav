<?php session_start(); ?>
<style>
	.ui-autocomplete {
		font-size: 12px;
		max-height: 250px;
		overflow-y: auto;
		/* prevent horizontal scrollbar */
		overflow-x: hidden;
		/* add padding to account for vertical scrollbar */
		padding-right: 20px;
	}
	.ui-autocomplete-loading { background: #ddd url('images/ui-anim_basic_16x16.gif') right center no-repeat; }
	/* IE 6 doesn't support max-height
	 * we use height instead, but this forces the menu to always be this tall
	 */
	* html .ui-autocomplete {
		height: 250px;
	}
	#ui-datepicker-div
	{
        font-size: 12px;
	}
</style>
<script type="text/javascript">
		$(document).ready(function()
		{
            $(".exist").hide();
			$(".go_login").click(function(){
                $("#login_loader").show();
                $("#user_form").load('login.php');
            });
			$( ".datepicker" ).datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: 'yy-mm-dd',
				yearRange: "1980:2012"
			});
			$(".radio_in").buttonset();
			$(".go_login,#register_title,input:submit").button();
			$("#institute").autocomplete({source: 'get_institute.php',minLength: 1,autoFocus: true});			
			$("#branch").autocomplete({source: 'get_branch.php',minLength: 1,autoFocus: true});

			$("#name").blur(nameValidate);	
			$("#username").blur(usernameValidate);	
			$("#password").blur(passwordValidate);	
			$("#repassword").blur(passwordMatch);	
			$("#mobile").blur(mobileValidate);					
			$("#email").blur(emailValidate);	
			$("#institute").blur(instituteValidate);	
			$("#branch").blur(branchValidate);	
			$("#datepicker").blur(dobValidate);		
			$("#datepicker").change(dobValidate);
			$("#captcha").blur(captchaValidate);
			
			$("#submit_register").click(function(){
				var noError = true;
				var name = $("#name").val();
				var username = $("#username").val();
				var password = $("#password").val();
				var repassword = $("#repassword").val();
				var mobile = $("#mobile").val();
				var email = $("#email").val();
				var institute = $("#institute").val();
				var branch = $("#branch").val();
				var year = $("input[name='year']:checked").val();
				var dob = $("#datepicker").val();
				var gender = $("input[name='gender']:checked").val();
				var address = $("#address").val();
				var captcha = $("#captcha").val();
				
				/* var dataString = 'name='+name+'&username='+username+'&password='+password+'&mobile='+mobile+'&email='+email+'&institute='+institute+'&branch='+branch+'&year='+year+'&dob='+dob+'&gender='+gender+'&address='+address+'&captcha='+captcha; */
				var dataString = $("#contact_form").serialize();
				
				try{
				noError = captchaValidate(); 
				noError = nameValidate() && noError; 
				noError = usernameValidate() && noError; 
				noError = passwordValidate() && noError; 
				noError = passwordMatch() && noError; 
				noError = mobileValidate() && noError; 
				noError = emailValidate() && noError; 
				noError = instituteValidate() && noError; 
				noError = branchValidate() && noError; 
				noError = yearValidate() && noError; 
				noError = dobValidate() && noError; 
				noError = genderValidate() && noError;
				}
				catch(err)
				{
					alert("Error "+err.message);
				}
				
				if(noError==true)
				{
					$("#reg_loader").show();
					$.ajax({
						type: "POST",
						url: "registration_submit.php",
						data: dataString,
						cache: false,
						success: function(htmlResult){
							if(htmlResult=="0" || htmlResult==0)
							{
								$("#user_form").load('login.php?term=Congratulations%20You%20are%20registered%20successfully%20for%20Infotsav%202012');
								return;
							}
							else if(htmlResult=="1" || htmlResult==1)
							{
								$("#reg_loader").hide();
								$("#notice").html('Sorry Captcha you entered is not correct').show(100).delay(2000).hide(1000);	
								return;
							}
							else
							{
								$("#reg_loader").hide();
								$("#notice").html('Error in Registration').show(100).delay(2000).hide(1000);	
								return;
							}
						}
					});
				}
				else
				{
					$("#notice").html('Please fill all required details correctly').show(100).delay(2000).hide(1000);
				}
				return false;
			});
		});
</script>
<form method="post" id="contact_form" class="form_validate" action="registration_submit.php">
	<ul>
		<li class="one_col">
			<a class="go_login">Back to Login</a>
            <img src='images/ajax_loader_bar.gif' id="login_loader" style="margin:5px;display:none"/>
		</li>
		<li class="two_col">
			<label for="name">Name</label>
			<input class="text single" name="name" id="name" type="text" required="required" placeholder="Enter Your Full Name"/>
		</li>	
		<li class="two_col">
			<label for="username">Username(min 5 char)</label> <span id="username_exist" class="exist">Already Exists</span>
			<input class="text single" name="username" id="username" type="text" required="required" placeholder="lowercase letters, numbers and underscore"/>	
		</li>
		<li class="two_col">
			<label for="password">Password(min 5 char)</label>
			<input class="text single" name="password" id="password" type="password" required="required" placeholder="Enter Password"/>
		</li>
		<li class="two_col">
			<label for="repassword">Repeat Password</label>
			<input class="text single" name="repassword" id="repassword" type="password" required="required" placeholder="Re-enter Password"/>
		</li>
		<li class="two_col">
			<label for="mobile">10 Digit Mobile Number</label> <span id="mobile_exist" class="exist">Already Exists</span>
			<input class="text single" name="mobile" id="mobile" type="text" required="required"  placeholder="XXXXXXXXXX" maxlength="10"/>
		</li>				
		<li class="two_col">
			<label for="email">Your Email Address</label> <span id="email_exist" class="exist">Already Exists</span>
			<input class="text single" name="email" id="email" type="email"  required="required" placeholder="xyz@example.com"/>
		</li>
		<li class="one_col">
			<label for="institute">Institute Name</label>
			<input class="text double" name="institute" id="institute" type="text" required="required" placeholder="Enter Your Institute Name"/>
		</li> 
		<li class="two_col">
			<label for="branch">Branch</label>
			<input class="text single" name="branch" id="branch" type="text" required="required" placeholder="Branch/Trade"/>
		</li> 
		<li class="two_col radio_in">
			<label>Current Year</label><span id="year_validate" class="exist">*</span>
			<div>
				<label for="y1">1</label>
				<input type="radio" name="year" id="y1" value="1" />			
				<label for="y2">2</label>
				<input type="radio" name="year" id="y2" value="2" />		
				<label for="y3">3</label>
				<input type="radio" name="year" id="y3" value="3" />			
				<label for="y4">4</label>
				<input type="radio" name="year" id="y4" value="4" />		
				<label for="y5">5</label>	
				<input type="radio" name="year" id="y5" value="5" />
			</div>					
		</li>
		<li class="two_col">
			<label for="datepicker">Date of Birth</label>
			<input class="text single datepicker" id="datepicker" name="dob" type="text" placeholder="yyyy-mm-dd"/>
		</li>
		<li class="two_col radio_in">
			<label>Gender</label><span id="gender_validate" class="exist">*</span>
			<div>
				<label for="male">Male</label>
				<input type="radio" name="gender" id="male" value="male" />			
				<label for="female">Female</label>
				<input type="radio" name="gender" id="female" value="female" />	
			</div>					
		</li>
		<li class="one_col">
			<label for="address">Address</label>
			<textarea class="text" name="address" id="address" cols="47" rows="4" placeholder="Enter Your Current Address and City" ></textarea>
		</li>
		<?php $a=rand(1,10);$b=rand(1,10);
		$_SESSION['captcha']=$a+$b;
		?>
		<li class="two_col">
		<label style="width:120px;">What is <?php echo $a." + ".$b; ?>?</label>
		<input class="text single" name="captcha" id="captcha" type="text" autocomplete="off" required="required" maxlength="3" /></li>
		<li class="two_col"><br/>
			<input type="submit" id="submit_register"  value="Register" name="submit"/><img src='images/ajax_loader_bar.gif' id="reg_loader" style="margin:5px;display:none"/>
		</li>
		<li class="one_col">
			<span id="notice" style="display:none"></span>
		</li>
	</ul>
</form>

