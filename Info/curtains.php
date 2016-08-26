<!--
Animate a Curtain Opening with jQuery
index.html
By Sam Dunn
2009 Build Internet! www.buildinternet.com
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Welcome to Infotsav</title>
	<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.js"></script>
	<script src="jquery.easing.1.3.js" type="text/javascript"></script>  

	<script type="text/javascript">
		$(document).ready(function() {
		
			$curtainopen = false;
		
			$(".rope").click(function(){
				$(this).blur();
				if ($curtainopen == false){ 
					$(this).stop().animate({top: '0px' }, {queue:false, duration:350, easing:'easeOutBounce'}); 
					$(".leftcurtain").stop().animate({width:'60px'}, 2000 );
					$(".rightcurtain").stop().animate({width:'60px'},2000 );
					$curtainopen = true;
					var delay=1000;
					setTimeout(function(){
  window.location="index.php";
}, delay); 
					
				}else{
					$(this).stop().animate({top: '-40px' }, {queue:false, duration:350, easing:'easeOutBounce'}); 
					$(".leftcurtain").stop().animate({width:'50%'}, 2000 );
					$(".rightcurtain").stop().animate({width:'51%'}, 2000 );
					$curtainopen = false;
				}
				return false;
			});
			
		});	
	</script>
	<style type="text/css">
	    *{
	    	margin:0;
	    	padding:0;
	    }
	    body {
	    	text-align: center;
	    	background: #4f3722 url('images/darkcurtain.jpg') repeat-x;
	    }
	    img{
			border: none;
		}
	    .leftcurtain{
			width: 50%;
			height: 495px;
			top: 0px;
			left: 0px;
			position: absolute;
			z-index: 2;
		}
		 .rightcurtain{
			width: 51%;
			height: 495px;
			right: 0px;
			top: 0px;
			position: absolute;
			z-index: 3;
		}
		.rightcurtain img, .leftcurtain img{
			width: 100%;
			height: 100%;
		}
		.logo{
			margin: 0px auto;
			margin-top: 150px;
		}
		.rope{
			position: absolute;
			top: -40px;
			left: 70%;
			z-index: 4;
		}
	   
	</style>
</head>

<body>
	<div class="leftcurtain"><img src="images/frontcurtain.jpg"/></div>
	<div class="rightcurtain"><img src="images/frontcurtain.jpg"/></div>
	<br><br>
	<h1 style="color :white; font-size: 40px">Welcome to Infotsav</h1>
	<a class="rope" href="#">
		<img src="images/rope.png"/>
	</a>
</body>
</html>