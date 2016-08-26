<?php
session_start();
if(isset($_SESSION['username']))
{
?>

<script type="text/javascript">
    $(document).ready(function()
    {
        $("#go_login").click(function(){			
			$("#login_loader").show();
			$("#user_form").load('login.php');
		});
        $("#go_login,#change_title,input:submit").button();
        $("#password").blur(passwordValidate);
        $("#repassword").blur(passwordMatch);

        $("#submit_change_password").click(function(){
            var curpassword = $("#curpassword").val();
            var password = $("#password").val();
            var repassword = $("#repassword").val();
            /* var dataString = 'curpassword='+curpassword+'&password='+password;	 */		
			var dataString = $("#contact_form").serialize();
            noError = passwordValidate() && passwordMatch();
            if(curpassword!='' && noError)
            {			
				$("#change_loader").show();
                $.ajax({
                    type: "POST",
                    url: "password_change_submit.php",
                    data: dataString,
                    cache: false,
                    success: function(htmlResult){
                        if(htmlResult=="0" || htmlResult==0)
                        {
                            $("#user_form").load('login.php?term=Password%20Changed%20Successfully');
                            return;
                        }
                        else
                        {
							$("#change_loader").hide();
                            $("#notice").html('Wrong Data Entered').show(100).delay(2000).hide(1000);
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
<form method="post" id="contact_form" class="form_validate" action="password_change_submit.php">
    <ul>
        <li class="one_col">
            <a id="go_login">Back to My Infotsav</a>
            <img src='images/ajax_loader_bar.gif' id="login_loader" style="margin:5px;display:none"/>
        </li>
        <li class="one_col">
            <label for="curpassword">Current Password</label>
            <input class="text single" name="curpassword" id="curpassword" type="password" required="required" placeholder="Current Password"/>
        </li>
        <li class="two_col">
            <label for="password">New Password</label>
            <input class="text single" name="password" id="password" type="password" required="required" placeholder="New Password" />
        </li>
        <li class="two_col">
            <label for="repassword">Re-enter New Password</label>
            <input class="text single" name="repassword" id="repassword" type="password" required="required" placeholder="Re-enter New Password" />
        </li>
        <li class="two_col">
            <input type="submit" id="submit_change_password"  value="Change Password" name="submit"/>			
            <img src='images/ajax_loader_bar.gif' id="change_loader" style="margin:5px;display:none"/>
        </li>
        <li class="two_col">
            <span id="notice" style="display:none"></span>
        </li>
    </ul>
</form>
<?php
}
?>