<?php 
if(!isset($_SESSION))session_start();
if(isset($_GET['lg']))
{
    if(isset($_SESSION['username'])) session_destroy();
}
if(isset($_SESSION['username']))
{
    $username = $_SESSION['username'];
	$email = $_SESSION['email'];
	$name = $_SESSION['name'];
?>
    <script type="text/javascript">
        $(document).ready(function()
        {
            $("#logout").click(function(){
				$("#user_form").load('login.php?lg=1&term=Logout%20Successfully',function(){
					$("#user_form").load('login.php?lg=1&term=Logout%20Successfully');
				}
			);});
            $("#change_password").click(function(){$("#user_form").load('change_password.php')});
            $("#change_password,#logout").button();
            <?php if(isset($_GET['term'])){?>
			    $("#notice").html(<?php echo "'".$_GET['term']."'" ?>).show(100).delay(3000).hide(1000);
			<?php } ?>
        });
    </script>
    <div id="dashboard">
        <ul>
            <li class="one_col">
                <span id="welcome">Welcome <?php echo "$name ($username)";?></span>
            </li>
            <li class="two_col">
                <a id="change_password">Change Password</a>
            </li>
            <li class="two_col">
                <a id="logout">Logout</a>
            </li>
			<li class="one_col">
				<span id="notice">&nbsp;</span>
			</li>
        </ul>
    </div>
<?php
}
else
{
?>
<script type="text/javascript">
		$(document).ready(function()
        {
            $("#go_register").click(function(){
                $("#reg_loader").show();
                $("#user_form").load('registration.php');
            });
			$("#go_forgot").click(function(){
                $("#forgot_loader").show();
                $("#user_form").load('forgot.php');
            });
			$("#go_register,#go_forgot,#login_title,input:submit").button();
			<?php if(isset($_GET['term'])){?>
			$("#notice").html(<?php echo "'".$_GET['term']."'" ?>).show(100).delay(3000).hide(1000);
			<?php }else{ ?>
			$("#notice").hide();
			<?php } ?>
			
			$("#submit_login").click(function(){
                $("#login_loader").hide();
				var useremail = $("#useremail").val();
				var password = $("#password").val();
				/* var dataString = 'useremail='+useremail+'&password='+password; */
				var dataString = $("#contact_form").serialize();
				if(useremail!='' && password!='')
				{
					$("#login_loader").show();
					$.ajax({
						type: "POST",
						url: "login_submit.php",
						data: dataString,
						cache: false,
						success: function(htmlResult){
							if(htmlResult=="0" || htmlResult==0)
							{
								$("#user_form").load('login.php');
								return;
							}
							else if(htmlResult=="1" || htmlResult==1)
							{
								$("#login_loader").hide();
								$("#notice").html('No Username/Email or Password').show(100).delay(2000).hide(1000);
								return;
							}
							else if(htmlResult=="2" || htmlResult==2)
							{
								$("#login_loader").hide();
								$("#notice").html('Wrong Username/Email or Password').show(100).delay(2000).hide(1000);
								return;
							}
							else
							{
								$("#login_loader").hide();
								$("#notice").html('Error in Login').show(100).delay(2000).hide(1000);
								return;
							}
						}
					});
				}
				else
				{
					$("#notice").html('No Username/Email or Password').show(100).delay(2000).hide(1000);
				}
				return false;
			});
			
		});
</script>
<form method="post" id="contact_form" class="form_validate" action="login_submit.php">
	<ul>				
		<li class="two_col">
			<label for="useremail">Username/Email</label>
			<input class="text single" name="useremail" id="useremail" type="text" required="required" placeholder="Username or Email"/>
		</li>
		<li class="two_col">
			<label for="password">Password</label>
			<input class="text single" name="password" id="password" type="password" required="required" placeholder="Password" />
		</li>
		<li class="two_col">
			<a id="go_register">Register Here</a><img src='images/ajax_loader_bar.gif' id="reg_loader" style="margin:5px;display:none"/>
		</li>
		<li class="two_col">
			<input type="submit" id="submit_login"  value="Login" name="submit"/><img src='images/ajax_loader_bar.gif' id="login_loader" style="margin:5px;display:none"/>			
			<a id="go_forgot">Forgot Password</a><img src='images/ajax_loader_bar.gif' id="forgot_loader" style="margin:5px;display:none"/>
		</li>
		<li class="one_col">
			<span id="notice" style="display:none"></span>
		</li>
	</ul>
</form>
<?php } ?>