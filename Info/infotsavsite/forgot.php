<style>
	#ui-datepicker-div
	{
        font-size: 12px;
	}
</style>
<script type="text/javascript">
    $(document).ready(function()
    {
        $("#go_login").click(function(){			
			$("#login_loader").show();
			$("#user_form").load('login.php');
		});
        $("#go_login,input:submit").button();
		$( ".datepicker" ).datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: 'yy-mm-dd',
				yearRange: "1980:2012"
			});
        $("#forgot_submit").click(function(){
            var useremail = $("#useremail").val();
            var dob = $("#dob").val();
            /* var dataString = 'curpassword='+curpassword+'&password='+password;	 */		
			var dataString = $("#contact_form").serialize();
            if(useremail!='' && dob!='')
            {			
				$("#change_loader").show();
                $.ajax({
                    type: "POST",
                    url: "forgot_submit.php",
                    data: dataString,
                    cache: false,
                    success: function(htmlResult){
                        if(htmlResult=="0" || htmlResult==0)
                        {
                            $("#user_form").load('login.php?term=New%20Password%20has%20been%20sent%20to%20your%20registered%20email,%20please%20check%20spam%20folder%20as%20well');
                            return;
                        }
                        else if(htmlResult=="2" || htmlResult==2)
                        {
							$("#change_loader").hide();
                            $("#notice").html('Sorry! wrong username/email or date of birth.').show(100).delay(2000).hide(1000);
                            return;
                        }
						else
                        {
							$("#change_loader").hide();
                            $("#notice").html('Wrond data entered.').show(100).delay(2000).hide(1000);
                            return;
                        }
                    }
                });
            }
            else
            {
                $("#notice").html('Empty or No Data').show(100).delay(2000).hide(1000);
            }
            return false;
        });

    });
</script>
<form method="post" id="contact_form" class="form_validate" action="forgot_submit.php">
    <ul>
        <li class="one_col">
            <a id="go_login">Back to Login</a>
            <img src='images/ajax_loader_bar.gif' id="login_loader" style="margin:5px;display:none"/>
        </li>
        <li class="two_col">
			<label for="useremail">Username/Email</label>
			<input class="text single" name="useremail" id="useremail" type="text" required="required" placeholder="Username or Email"/>
		</li>
		<li class="two_col">
			<label for="datepicker">Date of Birth</label>
			<input class="text single datepicker" id="dob" name="dob" type="text" placeholder="yyyy-mm-dd"/>
		</li>
        <li class="one_col">
            <input type="submit" id="forgot_submit"  value="Mail me new password" name="submit"/>			
            <img src='images/ajax_loader_bar.gif' id="change_loader" style="margin:5px;display:none"/>
        </li>
        <li class="one_col">
            <span id="notice" style="display:none"></span>
        </li>
    </ul>
</form>