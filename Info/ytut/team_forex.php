<?php
session_start();
?>
<!doctype html>

<html lang="en-US">
<head>
<meta charset="UTF-8" />
<title>Team Forex</title>
 <link href="style.css" rel="stylesheet" type="text/css" />
 <!--[if IE]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--[if IE 6]>
<script src="js/belatedPNG.js"></script>
<script>
	DD_belatedPNG.fix('*');
</script>
<![endif]--><script src="js/jquery-1.4.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/loopedslider.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
	$(function(){
		$('#slider').loopedSlider({
			autoStart: 6000,
			restart: 5000
		});
		
	});
	
	function loginCLick()
	{
		if ($('#login_box').is(":hidden")) {
			$('#login_box').slideDown('slow');
		} else {
			$('#login_box').slideUp('slow');
		}
	}
	
		
</script>
<link href="login_page.css" rel="stylesheet" type="text/css" />
<!--<script src="js/site.min.js" type="text/javascript" charset="utf-8"></script>-->
</head>

<body>
<section id="page">
<div id="bodywrap">
<section id="top">
<nav>
<h1 id="sitename"><a href="#">Forex </a></h1>
  
  <ul id="sitenav">
  	<li ><a href="index.php">Home</a></li>
  	<li><a href="http://www.infotsav.com/">Infotsav</a></li>
	
  		<?php
        if(isset($_SESSION['userid']) || isset($_SESSION['status'])|| isset($_SESSION['emailid']))
            {
                        
    ?>
    	<li><a href="long.php" title="">Long</a></li>
     	<li><a href="short.php" title="">Short</a></li>
	<li><a href="history.php" title="">History</a></li>
	<li><a href="top_rankers.php">Top Rankers</a></li>
	<li ><a href="help.php">Help</a></li>
	s<li ><a href="logout.php">logout</a></li>
    	<?php
                          
            }  
	else
	{

	?>
              
    <li ><a href="help1.php">Help</a></li>
    <li class="current"><a href="team_forex.php">Contact</a></li>
	<!-- Login Dropdown -->
	<li class="last"><a href="javascript:void();" id="login_link" onclick="loginCLick()">Login</a>
	<div id="login_box" class="pop">
	<h2>Fill the email & password</h2>
	<form id="loginform" method="post" action="login_session.php">
		<p><label for="account_email" class="assist_text">Email:</label>
		<input id="account_email" type="text" name="user_name" /></p>
		<p><label for="account_passwd" class="assist_text">
		Password:</label><input id="account_passwd" type="password" name="passwd" />
		<p><button type="submit" id="account_login" class="button" onclick="recordFormClick(this, 'logMeInButton', 'topNavigation'); return false;">Log Me In</button>
		</p>
	</form>
	</div>
	</li>
	<?php
	}
	?>
  <!-- End -->
  </ul>
  
</nav>
<header id="homeheader">


<div id="slider">	
	<div class="container">
	<ul class="slides">
			<li>
			  <div class="thumbholder">
			  <img src="images/forex.png" width="256" height="225" alt="First Image" />
			  </div><div class="txtholder">
            
            <p><br>
             "Buy when everyone else is selling and hold until everyone else<br> 
            is buying. That's not just a catchy slogan. It's the very essence 
            </br>of successful investing." </p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>J. Paul Getty</b></p>
			</div></li>
		</ul>
    </div>
</div>


</header>
</section>
<section id="contentwrap">
<div id="contents">
<div id="topcolumns">

                  <center><div class="post">
                     <br/><br /><br /><br />
                    <font size="+1"><h1>Anshul Vyas</h3>
                    +91-9407002735<br />
                    anshul.vyas380@gmail.com
                    <br /><br /><br />
                   </font>
                    
                    
                    </div></center>
               			
        
<div class="clear"></div>

</div>


<div class="clear"></div>
</section>
</div>
</section>
</div>
<footer id="pagefooter">
<div id="bottom">
<div class="block1">
<div class="teamimg">
<br><br>

<iframe src="news.html" width="230px" height="210px" marginwidth="0" marginheight="0" hspace="0" vspace="0" 	frameborder="0" 	scrolling="No"></iframe>
</div>
</div>
<div class="block2">

<div ><iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Finfotsav&amp;width=240&amp;height=270&amp;colorscheme=dark&amp;show_faces=true&amp;border_color=black&amp;stream=false&amp;header=true&amp;appId=268656886499518" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:240px; height:270px;" allowTransparency="true"></iframe></div>

</div>
<div class="block3">

<h2>More About Infotsav</h2>
<p>"Infotsav" is the annual Technology and Management Festival of ABV-IIITM ,Gwalior. It celebrates the spirit of the institute, embarked by its fight for creativity, excellence and being leader. The festival witnesses big corporate names as sponsors and big institutes as participants. The excellence has always been rewarded, and the witness is huge prize money that is at stake every year." </p>

</div>
<div class="clear"></div>
</div>
<div id="credits">
<p>
<span class="copyright">Copyright &copy; infotsav 2015 @ABV-IIITM All Rights Reserved. Designed by <b>&nbsp;<a href="#" >Anshul Vyas</a>&nbsp;</span>
<span id="designcredit">
<!--Creative Common Non-Commercial, Attribution License
Designed by : Roshan Ravi
Author URI : cssheaven.org
Do Not Remove this Credits and Link back to CSSHeaven from the template
<a href="../../index.htm" title="Free CSS Website Template by CSSHeaven">Website Template</a>
<!--Design Credits by ... </span> -->
</p>
</div>
</footer>

</section>
</body>
</html>
