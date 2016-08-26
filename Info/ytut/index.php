<?php

//header('location:logout.php');
	session_start();
 require_once('recaptchalib.php');

echo"<script>window.onload(alert('Game will end on 30/09/2015. PLease note you are not allowed to make more than one transaction in 2 seconds.'));</script>";
	if(isset($_SESSION['userid']) || isset($_SESSION['status']) )
	header('location:portfolio.php');
	
	
?>
<!doctype html>

<html lang="en-US">

<meta charset="UTF-8" />
<title>FOREX</title>
 <link href="style.css" rel="stylesheet" type="text/css" />
 <!--[if IE]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--[if IE 6]>
<script src="js/belatedPNG.js"></script>
<script>
	DD_belatedPNG.fix('*');
</script>
<![endif]-->
<script src="js/jq_1.4.4.js" type="text/javascript" charset="utf-8"></script>
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
<h1 id="sitename"><a href="index.php"></a></h1>
  
  <ul id="sitenav">
  	<li class="current"><a href="#">Home</a></li>
  	<li><a href="http://www.infotsav.com/" target="_blank">Infotsav</a></li>
    <?php
        if(isset($_SESSION['userid']) || isset($_SESSION['status'])|| isset($_SESSION['emailid']))
            {
                        $email=$_SESSION['emailid'];
                        $access_id=array('anshul.vyas380@gmail.com','kushagravarshney@infotsav.org','luckysuman850@gmail.com');
                        if(in_array($email,$access_id))
                            {
    ?>
    <li><a href="top_rankers.php">Top Rankers</a></li>
    <?php
                           }
            }                
    ?>
        <?php
            if(isset($_SESSION['userid']) || isset($_SESSION['status']))
            {
         ?>       
    <li><a href="help.php">Help</a></li>
        <?php
            }
            else
            {
        ?>
    <li><a href="help1.php">Help</a></li> 
    <?php
            }
    ?>   
    <li><a href="team_forex.php">Contact</a></li>
	<!-- Login Dropdown -->
	<li class="last"><a href="javascript:void();" id="login_link" onclick="loginCLick()">Login</a>
	<div id="login_box" class="pop">
	<h2>Fill the email & password</h2>
 <script src="https://www.google.com/recaptcha/api.js" async defer></script>

	<form id="loginform" method="post" action="login_session.php">
		<p><label for="account_email" class="assist_text">Email:</label>
		<input id="account_email" type="text" name="user_name" /></p>
		<p><label for="account_passwd" class="assist_text">
		Password:</label><input id="account_passwd" type="password" name="passwd" />
		<br><br>
<div class="g-recaptcha" data-sitekey="6Lesxw0TAAAAAJOE1ZsBaw6aDwvHkmJ8GDFLin7w" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
      <br/>

		<p><input type="submit" name="submit" id="account_login" value="Log Me In" class="button" />
		</p>
	</form>
	</div>
	</li>
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
            
            <p><!--<font size="4" color="yellow">FOREX HAS BEEN TEMPORARAILY HALTED FOR MAINTAINENCE.</font>--><br>
		
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
<div id="topcolumns"><marquee bgcolor="black" scrollamount="6" onmouseover="this.setAttribute('scrollamount', 0, 0);"onmouseout="this.setAttribute('scrollamount', 6, 0);"><font color="#00FF00" size="+0.2" ><!--The forex main round has finished.Winners will be declared soon. For more information visit our Facebook Page. <a href="http://www.facebook.com/infotsav.forex" style="font-color:white;" target='_blank'>Click Here</a></font>--></marquee><BR /><BR /><BR />
 <h2><a href="#">Forex</a></h2>
<p> A Forex game is a simulation in which a person is allowed to make Forex 
        trades without the risks associated with a 'real' Forex transaction. All 
        money is virtual, with a higher amount being bestowed at the beginning 
        of the game. Throughout the course of the Forex game, a person makes trades 
        as if they were doing it for real. This involves being able to see the 
        Forex ticker, which shows all of the fluctuating currency rates as well 
        as any other resources that might be of assistance if one were trading 
        for real. </p><br>
        <h2><a href="#">Important  Notes:</a></h2>
                   
                    <div class="entry">
     <!--     <p class="style1 style9">The trials for the game is currently running.--></p>
          <span class="style1"><br><br>
          </span>              
          <p class="style1 style9">The Main event will begin on 21st september 9:30 a.m. .</p>
          <span class="style1"><br><br>
          </span>   
          <p class="style1">The top ten players (as according to the rank , finally calculated on september 29th 5:00 PM) will be scrutinized for any fraud or fake transactions. The Final Winners shall be then intimated through mail and a list will be put up here. </p>
          <span class="style1"><br><br>
          </span>
          <p class="style1">Please visit your account to know your final rank and for further details</p>
          <span class="style1"><br><br>
	      </span>
          <p class="style1">Prizes worth Rs. 9000 INR to be won</p>
          <span class="style5"><br><br>
          </span>
		   <!--<p class="style1"> All The Top 10 participants will get certificate by ABV-IIITM which would be sent to him or her at provided address.</p> --><br> 
          <span class="style5">
                    </div>
        
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
<!--<div id="fb-root"></div>
<script type="text/javascript">
    window.fbAsyncInit = function() {
        FB.init({appId: '133957350084960', status: true, cookie: true, xfbml: true});

        /* All the events registered */
        FB.Event.subscribe('auth.login', function(response) {
            // do something with response

            login(response);
        });
        FB.Event.subscribe('auth.logout', function(response) {
            // do something with response
            logout();
        });

        FB.getLoginStatus(function(response) {
            console.log(response);
            if (response.status=='connected') {
                // logged in and connected user, someone you know

                login(response);
            }
        });
    };
    (function() {
        var e = document.createElement('script');
        e.type = 'text/javascript';
        e.src = document.location.protocol +
            '//connect.facebook.net/en_US/all.js';
        e.async = true;
        document.getElementById('fb-root').appendChild(e);
    }());

    function login(response){
        FB.login(function(response) {
            if (response.authResponse) {

                FB.api('/me', function(response) {
                    var query = FB.Data.query('select  pic_square from user where uid={0}', response.id);
                    query.wait(function(rows) {

                        var pic = rows[0].pic_square;

                        $.post("fblogincheck1.php", {pic_sqr:pic,response:response},
                            function(data){

                                console.log(data);
                                if(data=='success')
                                {
                                    window.location='http://forex.infotsav.org/portfolio.php';
                                }
                            });



                    });
                });
            } else {

            }
        },{scope: 'user_education_history,user_birthday,user_hometown,user_about_me'});

    }
    function logout(){
        window.location='http://job.infotsav.org/logout.php';
        document.getElementById('login').style.display = "none";
        window.location='http://job.infotsav.org/logout.php';
    }

    //stream publish method
    function streamPublish(name, description, hrefTitle, hrefLink, userPrompt){
        FB.ui(
            {
                method: 'stream.publish',
                message: '',
                attachment: {
                    name: name,
                    caption: '',
                    description: (description),
                    href: hrefLink
                },
                action_links: [
                    { text: hrefTitle, href: hrefLink }
                ],
                user_prompt_message: userPrompt
            },
            function(response) {

            });

    }
    function showStream(){
        FB.api('/me', function(response) {
            //console.log(response.id);
            streamPublish(response.name, 'Job contains geeky stuff', 'hrefTitle', 'http://thinkdiff.net', "Share thinkdiff.net");
        });
    }

    function share(){
        var share = {
            method: 'stream.share',
            u: 'http://thinkdiff.net/'
        };

        FB.ui(share, function(response) { console.log(response); });
    }

    function graphStreamPublish(){
        var body = 'asdsadsa';
        FB.api('/me/feed', 'post', { message: body }, function(response) {
            if (!response || response.error) {
                alert('Error occured');
            } else {
                alert('Post ID: ' + response.id);
            }
        });
    }

    function fqlQuery(){
        FB.api('/me', function(response) {
            var query = FB.Data.query('select  pic_square from user where uid={0}', response.id);
            query.wait(function(rows) {

                console.log(rows);
            });
        });
    }

    function setStatus(){
        status1 = document.getElementById('status').value;
        FB.api(
            {
                method: 'status.set',
                status: status1
            },
            function(response) {
                if (response == 0){
                    alert('Your facebook status not updated. Give Status Update Permission.');
                }
                else{
                    alert('Your facebook status updated');
                }
            }
        );
    }
</script>-->



</body>
</html>
