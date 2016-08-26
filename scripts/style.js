function validateEmail(sEmail) {
var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
if (filter.test(sEmail)) 
        return true;    
else 
	return false;
    
	};
var mail;
var match;
$(document).ready(function()
{
$("#confirmPassword").keyup(function(){
	var password = $("#inputPassword").val();
	var confirmpassword =$("#confirmPassword").val();
	if(password !== confirmpassword)
	{
		$("#confirmPassword").parent().addClass('has-error');
		$("#errorPassword").addClass('text-error').text("Passwords do not match");
	}
	if(password === confirmpassword)
		{
			$("#confirmPassword").parent().removeClass('has-error').addClass('has-success');
			$("#errorPassword").removeClass('text-error').addClass('text-success').text("Passwords Match");
			match = "success";
		}
	});
	$("#contact").keyup(function(){
		var num = $("#contact").val().length;
		var filter = /^[789]\d{9}$/;
		//console.log(num);
		 if (/\D/g.test(this.value))
 			 {
  				  // Filter non-digits from input value.
  				  this.value = this.value.replace(/\D/g, '');
  			}
		if(num != 10)
		{
			$("#contact").parent().addClass('has-error');
			$("#errorContact").addClass('text-error').text("Please Enter a valid Contact Number");
		}
		else if(num == 10 && !filter.test(parseInt($("#contact").val()))){
			$("#contact").parent().addClass('has-error');
			$("#errorContact").addClass('text-error').text("Please Enter a valid Contact Number");
		}
		else
		{
			$("#contact").parent().removeClass('has-error').addClass('has-success');
			$("#errorContact").text("");
		}
		});
	$('#inputEmail').keyup(function() {
		var sEmail = $('#inputEmail').val();
		if ($.trim(sEmail).length == 0) {
				$("#inputEmail").parent().addClass('has-error');
				$("#errorEmail").addClass('text-error').text("Please Enter a valid Email");
        	}
		if (validateEmail(sEmail)) {
        	$("#inputEmail").parent().removeClass('has-error').addClass('has-success');
			$("#errorEmail").text("");
        	mail = "success";
        }
        else {
			$("#inputEmail").parent().addClass('has-error');
			$("#errorEmail").addClass('text-error').text("Please Enter a valid Email");
			}
		});
});
$("#inputPassword").keyup(function(){
	lengthPass = $.trim($("#inputPassword").val()).length;
	if(lengthPass < 8)
	{
		$("#inputPassword").parent().addClass('has-error');
		$("#errorPass").addClass('text-error').text("Password should be a minimum of 8 Characters");
	}
	else
	{
		$("#inputPassword").parent().removeClass('has-error').addClass('has-success');
		$("#errorPass").text("");
	}
});
// 	var confirmpass = $.trim($("#confirmPassword").val()).length;
// 	var name = $.trim($("#name").val()).length;
// 	var institute = $.trim($("#Institute").val()).length;
// 	var city = $.trim($("#city").val()).length;
// 	var number = $.trim($("#contact").val()).length;
// 	// if(name > 0 && pass > 0 && confirmpass > 0 && number === 10 && institute > 0 && city > 0 && mail === verified && match=== success)
// 		if(pass > 0)
// 		{	$("#button").removeAttr("disabled");
// 		}
// });

$("#form").submit(function(event){

	event.preventDefault();
	var pass = $.trim($("#inputPassword").val()).length;
	var confirmpass = $.trim($("#confirmPassword").val()).length;
	var name = $.trim($("#name").val()).length;
	var institute = $.trim($("#Institute").val()).length;
	var city = $.trim($("#city").val()).length;
	var number = $.trim($("#contact").val()).length;
	
	if(name === 0 || pass < 8 ||  confirmpass === 0 || number > 10 || number <10 || institute === 0 || city === 0 && mail === "success" && match === "success")
	{	
		swal("Oops!","There are some errors in your form Please correct them before proceeding", "error");
	}
	else
		document.forms[0].submit();
	

});
