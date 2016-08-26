function checkExists(chk,atr)
{
	$.ajax({
		type: "GET",
		url: 'checkExists.php',
		data: 'q='+chk+'&atr='+atr,
		cache: false,
		dataType: "html",
		success:function(result){
			if(result=='1' || result==1)
			{
                $("#"+atr+"_exist").show();
				$("#"+atr).addClass("inputerror");
			}
			else
			{
                $("#"+atr+"_exist").hide();
				$("#"+atr).removeClass("inputerror");
			}
		}
	});
}
function nameValidate()
{
	chk = $("#name").val();
	var Exp = /^[a-zA-Z,\s]{3,100}$/;
	if(chk=='' || !chk.match(Exp))
	{
		$("#name").addClass("inputerror");
		return false;
	}
	else
	{
		$("#name").removeClass("inputerror");
		return true;
	}
}

function usernameValidate()
{
	$("#username_exist").hide();
	chk = $("#username").val();
	var Exp = /^[a-z0-9_]{5,25}$/;
	if(chk=='' || !chk.match(Exp))
	{
		$("#username").addClass("inputerror");
		return false;
	}
	else
	{
		$("#username").removeClass("inputerror");
		checkExists(chk,'username');
		if($("#username").hasClass("inputerror"))
		{
			return false;
		}
		else return true;
	}
}

function passwordValidate()
{
	var chk = $("#password").val();
	var Exp = /^[a-zA-Z0-9!@#$%^&*()_+-=]{5,50}$/;
	if(chk=='' || !chk.match(Exp))
	{
		$("#password").addClass("inputerror");
		return false;
	}
	else
	{
		$("#password").removeClass("inputerror");
		return true;
	}
}

function passwordMatch()
{
	var chk = $("#password").val();
	var chk1 = $("#repassword").val();
	if(chk != chk1 || chk1=='')
	{
		$("#repassword").addClass("inputerror");
		return false;
	}
	else
	{
		$("#repassword").removeClass("inputerror");
		return true;
	}
}

function mobileValidate()
{
	$("#mobile_exist").hide();
	var chk = $("#mobile").val();
	var Exp = /^([7-9]{1})([0-9]{9})$/;
	if(chk=='' || !chk.match(Exp))
	{
		$("#mobile").addClass("inputerror");
		return false;
	}
	else
	{
		$("#mobile").removeClass("inputerror");
		checkExists(chk,'mobile');
		if($("#mobile").hasClass("inputerror"))
		{
			return false;
		}
		else return true;
	}
}

function emailValidate()
{
	$("#email_exist").hide();
	var chk = $("#email").val();
	var Exp = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	if(chk=='' || !chk.match(Exp))
	{
		$("#email").addClass("inputerror");
		return false;
	}
	else
	{
		$("#email").removeClass("inputerror");
		checkExists(chk,'email');
		if($("#email").hasClass("inputerror"))
		{
			return false;
		}
		else return true;
	}
}

function instituteValidate()
{
	chk = $("#institute").val();
	if(chk=='')
	{
		$("#institute").addClass("inputerror");
		return false;
	}
	else
	{
		$("#institute").removeClass("inputerror");
		return true;
	}
}

function branchValidate()
{
	chk = $("#branch").val();
	if(chk=='')
	{
		$("#branch").addClass("inputerror");
		return false;
	}
	else
	{
		$("#branch").removeClass("inputerror");
		return true;
	}
}

function yearValidate()
{
	chk = $("input[name='year']:checked").val();
	if(chk=='1' || chk=='2' || chk=='3' || chk=='4' || chk=='5' || chk>0 || chk<6)
	{
		$("#year_validate").hide();
		return true;
	}
	else
	{
		$("#year_validate").show();
		return false;
	}
}

function dobValidate()
{
	chk = $("#datepicker").val();
	var Exp = /^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/;

	if(chk=='' || !chk.match(Exp))
	{
		$("#datepicker").addClass("inputerror");
		return false;
	}
	else
	{
		$("#datepicker").removeClass("inputerror");
		return true;
	}
}

function genderValidate()
{
	chk = $("input[name='gender']:checked").val();
	if(chk!='male' && chk!='female')
	{
		$("#gender_validate").show();
		return false;
	}
	else
	{
		$("#gender_validate").hide();
		return true;
	}
}
function captchaValidate()
{
	var valid = false;
	$.ajax({
		type: "GET",
		url: 'captcha.php',
		data: 'q='+$("#captcha").val(),
		cache: false,
		dataType: "html",
		success:function(result){
			if(result=='0' || result==0)
			{
				$("#captcha").addClass("inputerror");
			}
			else if(result=='1' || result==1)
			{
				$("#captcha").removeClass("inputerror");
			}
		}
	});
	if($("#captcha").hasClass("inputerror"))
	{
		valid = false;
	}
	else valid = true;
	return valid;
}