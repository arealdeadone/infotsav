<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<?php 
	$total_events = 30;
	$total_ws = 36;
	$scroller = 'a';
?>
<head>
	<title>Infotsav 2012</title>
	<meta charset="utf-8"/>
	<meta name="description" content="Infotsav, Annual Technical-Management Fest of ABV-IIITM, Gwalior"/>
	<meta name="keywords" content="Infotsav, Infotsav '12, Infotsav 12"/>
	<link rel="shortcut icon" href="images/favicon.png" />
	<link rel="stylesheet" href="css/reset.css" type="text/css" media="all"/>
	<link rel="stylesheet" href="css/style0.css" type="text/css" media="all"/>
	<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen"/>
	<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="all"/>
	<link rel="stylesheet" href="css/hot-sneaks/jquery-ui.css" type="text/css"/>
	<link href="css/ticker-style.css" rel="stylesheet" type="text/css" />
	<link href="css/googleMap.css" rel="stylesheet" type="text/css"/>
    <style>
        .ui-button-text-only .ui-button-text,input.ui-button
        {
            padding: 0.05em 1em;
        }
    </style>
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/googleMap.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/cufon-yui.js"></script>
	<script type="text/javascript" src="js/cufon-replace.js"></script>  
	<script type="text/javascript" src="js/Aller_400.js"></script>
	<script type="text/javascript" src="js/bgStretch.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="js/superfish.js"></script>
	<script type="text/javascript" src="js/forms.js"></script>
	<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
	<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
	<script type="text/javascript" src="js/jcarousellite.js"></script>
	<script type="text/javascript" src="js/switcher.js"></script>
	<script type="text/javascript" src="js/sprites.js"></script>
	<script type="text/javascript" src="js/eventAjax1.js"></script>
	<script type="text/javascript" src="js/formValidate.js"></script>
	<script type="text/javascript" src="js/slider.js"></script>
	<script type="text/javascript" src="js/hospitality.js"></script>
	<script src="js/jquery.ticker.js" type="text/javascript"></script>
	<script type="text/javascript">
		var update=new Array()
		$(document).ready(function()
		{			
			$('#js-news').ticker();
			setSlider($('#sp11'));	
			setSlider($('#sp12'));				
			setSlider($('#contentScroller30'));
			setSlider($('#contentScroller31'));
			setSlider($('#contentScroller32'));
			setSlider($('#contentScroller33'));
			setSlider($('#contentScroller34'));
			setSlider($('#contentScroller35'));
			$(".slider-wrap").hide();
			$(".box2").hover(function(){
				$(".slider-wrap").show();
				},
				function(){
				$(".slider-wrap").hide();
			});				
            $(document).keydown(function(e){
                if((e.keyCode==27 || e.which==27 || e.charCode == "27") && $('#fly_div').is(':visible') )
                {
                    $('#fly_div').hide('slide',{direction:'up'},500);
                }
                else if((e.keyCode==77 || e.which==77 || e.keyCode==109 || e.which==109) && !($(e.target).is('input')||$(e.target).is('textarea')))
                {
                    $('#fly_div').toggle('slide',{direction:'up'},500);
                }
            });
            $(document).keypress(function(e){
                if((e.keyCode==27 || e.which==27 || e.charCode == "27") && $('#fly_div').is(':visible') )
                {
                    $('#fly_div').hide('slide',{direction:'up'},500);
                }
                else if((e.keyCode==77 || e.which==77 || e.keyCode==109 || e.which==109) && !($(e.target).is('input')||$(e.target).is('textarea')))
                {
                    $('#fly_div').toggle('slide',{direction:'up'},500);
                }
            });
			$("#hide_fly").click(function(){$('#fly_div').hide('slide',{direction:'up'},500);});
			$("#MyInfotsav").button({
                icons:{secondary:"ui-icon-power"}
            }).click(function(){$('#fly_div').toggle('slide',{direction:'up'},500);});
            $("#hide_fly").button({
                icons:{primary:"ui-icon-closethick"},
                text:false
            });
			var mouse_is_inside = false;
			$('#fly_div,#login_button,#ui-datepicker-div').hover(function(){
				mouse_is_inside=true;
			}, function(){
				mouse_is_inside=false;
			});

			$("body").mouseup(function(){
				if(!mouse_is_inside && $('#fly_div').is(':visible') && !$('#ui-datepicker-div').is(':visible') && !$('.ui-autocomplete').is(':visible'))
					$('#fly_div').hide('slide',{direction:'up'},500);
			});
			
			var last ="#first_guest";
			$(".guest_wrap").hover(function(){
			$(last).animate({width: "140px"}, { queue:false, duration:600 });
			$(this).animate({width: "495px"}, { queue:false, duration:600});
			last = this;
			});
		});
	</script>
  
  <!--[if lt IE 9]>
  	<script type="text/javascript" src="js/html5.js"></script>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="all">
  <![endif]-->
	<!--[if lt IE 8]>
		<div style=' clear: both; text-align:center; position: relative;'>
			<a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode"><img src="images/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." /></a>
		</div>
	<![endif]-->
</head>
<body>
<div class="page_spinner"></div>
<div id="bgStretch"><img src="images/bg1.jpg" alt=""></div>
<div id="login_button"><a id="MyInfotsav">My Infotsav</a></div>
<div id="fly_div" style="display:none">
	<div style="width:100%;height:3em;background:#31444B;padding-top:0.5em">
		<center><h2>Welcome to Infotsav 2012</h2></center>
		<button id="hide_fly" style="float:right;margin-right:0.5em;margin-top:-3.2em;font-size: 0.8em;">Close</button>
	</div>
	<div id="user_form"><?php include('login.php');?></div>
</div>
<div class="extra">
<!--header -->
		<header>		
				
				<div class="bg1">
					<div class="main">
						<nav class="menu">
							<ul id="menu">
								<li class="with_ul"><a href="javascript:void(0);" class="ex-1">events</a>
									<ul class="submenu_1">
										<li><a href="javascript:void(0);" class="inlineBlock">technical&nbsp;&nbsp;</a>
											<ul class="submenu_2">
												<li><a href="#!/Event0" title="The Hacking Contest" onclick="loadEvent(0)">Akraman</a></li>
												<li><a href="#!/Event1" onclick="loadEvent(1)">Reverse Engg.</a></li>
												<li><a href="#!/Event2" onclick="loadEvent(2)">Code Weavers</a></li>
												<li><a href="#!/Event3" onclick="loadEvent(3)">La Ingenious</a></li>
												<li><a href="#!/Event4" onclick="loadEvent(4)">Web Mania</a></li>
												<li><a href="#!/Event5" onclick="loadEvent(5)">Witch Hunt</a></li>
											</ul>
										</li>
										<li><a href="javascript:void(0);" class="inlineBlock">managerial</a>
											<ul class="submenu_2">
												<li><a href="#!/Event6" onclick="loadEvent(6)">Analyst</a></li>
												<li><a href="#!/Event7" onclick="loadEvent(7)">Brouhaha</a></li>
												<li><a href="#!/Event8" onclick="loadEvent(8)">Pinnacle</a></li>
												<li><a href="#!/Event9" onclick="loadEvent(9)">Tycoon</a></li>
											</ul>
										</li>
										<li><a href="javascript:void(0);" class="inlineBlock">online events</a>
											<ul class="submenu_2">
												<li><a href="#!/Event10" onclick="loadEvent(10)">Forex</a></li>
												<li><a href="#!/Event11" onclick="loadEvent(11)">Stock Sutra</a></li>
												<li><a href="#!/Event12" onclick="loadEvent(12)">Trove Trace</a></li>
												<li><a href="#!/Event13" onclick="loadEvent(13)">Job Bureau</a></li>
											</ul>
										</li>
                                        <li><a href="#!/Event16" onclick="loadEvent(16)" class="inlineBlock">Chakravyuh</a></li>
										<li><a href="#!/Event17" onclick="loadEvent(17)" class="inlineBlock">Sameeksha&nbsp;&nbsp;</a></li>
										<li><a href="javascript:void(0);" class="inlineBlock">Gamiacs&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
											<ul class="submenu_2">
												<li><a href="#!/Event27" onclick="loadEvent(27)">cs 1.6</a></li>
												<li><a href="#!/Event28" onclick="loadEvent(28)">nfs</a></li>
												<li><a href="#!/Event29" onclick="loadEvent(29)">fifa</a></li>
											</ul>
										</li>
										<li><a href="javascript:void(0);" class="inlineBlock">Techuiz&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
											<ul class="submenu_2">
												<li><a href="#!/Event15" onclick="loadEvent(15)">Enigma</a></li>
												<li><a href="#!/Event19" onclick="loadEvent(19)">Nutshell</a></li>
												<li><a href="#!/Event20" onclick="loadEvent(20)">SynC</a></li>
												<li><a href="#!/Event21" onclick="loadEvent(21)">Class-Byte</a></li>
											</ul>
										</li>
										<li><a href="javascript:void(0);" class="inlineBlock">Robo Fiesta</a>
											<ul class="submenu_2">
												<li><a href="#!/Event22" onclick="loadEvent(22)">Line Sequentes</a></li>
												<li><a href="#!/Event23" onclick="loadEvent(23)">Open Challenge</a></li>
												<li><a href="#!/Event24" onclick="loadEvent(24)">Robo Race</a></li>
												<li><a href="#!/Event25" onclick="loadEvent(25)">Robo Soccer</a></li>
												<li><a href="#!/Event26" onclick="loadEvent(26)">Robowars Mini</a></li>
											</ul>
										</li>
									</ul>
								</li>
								<li class="with_ul"><a href="javascript:void(0);" class="ex-1">workshops</a>
									<ul class="submenu_1">
										<li><a href="#!/Android">Android</a></li>
										<li><a href="#!/Sixth-sense">6Sense Robo</a></li>
										<li><a href="#!/Mobile-robotics">Mobile Robo</a></li>
										<li><a href="#!/Ethical-hacking">Eth. Hacking</a></li>
										<li><a href="#!/Cloud">Cloud</a></li>
										<li><a href="#!/Drupal">Drupal</a></li>
									</ul>
								</li>
								<li><a href="#!/guest_lectures" class="ex-1">guest lectures</a></li>
								<li class="with_ul"><a href="#" class="ex-1">sponsors</a>
									<ul class="submenu_1">
										<li><a href="#!/sponsors11">2011</a></li>
										<li><a href="#!/sponsors12">2012</a></li>
									</ul>
								</li>
								<li class="last with_ul"><a href="javascript:void(0);" class="ex-1">contact us</a>
									<ul class="submenu_1">
										<li><a href="#!/hospitality" onclick="hospitality(1)">Hospitality</a></li>
										<li><a href="#!/contacts">Contacts</a></li>
									</ul>
								</li>
							</ul>
						</nav>
					</div>
				</div>
                <div class="main">
					<h1><a href="#!/splash" id="logo">Infotsav</a></h1>
				</div>
        </header>
			<!--header end-->
    <nav id="bg_pagination">
    	<ul>
    		<li><a href="images/bg1.jpg"></a></li>
    	</ul>
    </nav>
		<div class="main">
			<!--content -->
            <article id="content">
				<ul>
					<li id="guest_lectures">
                    	<?php include('guests.php'); ?>
                    </li>
					<?php for($i=0;$i<$total_events;$i++) { ?>
					<li id="Event<?php echo $i ?>">
                    	<div class="box1">
                            <div class="box2">
                                <div class="container_12">
                                    <div class="wrapper">
                                        <div class="grid_9 alpha">
											<div class="block_pozition">
												<h2 id="event_title<?php echo $i ?>">Event Title</h2>
													<div class="line_title_events">&nbsp;</div>
													<div id="contentScroller<?php echo $i ?>" class="contentScroller">
														<div style="padding-right:20px" id="event_details<?php echo $i ?>">
															<p>Event Details</p>
														</div>
													</div>
											</div>
										</div>
                                        <div class="grid_3">
											<div class="block1_pozition"><div>
												<ul class="svertical right">
													<li><a href="javascript:void(0);" onclick="loadEventDetails(<?php echo $i; ?>,1)">Description</a></li>
													<li><a href="javascript:void(0);" onclick="loadEventDetails(<?php echo $i; ?>,2)">Rules</a></li>
													<li><a href="javascript:void(0);" onclick="loadEventDetails(<?php echo $i; ?>,3)">Timeline</a></li>
													<li><a href="javascript:void(0);" onclick="loadEventDetails(<?php echo $i; ?>,4)">Downloads</a></li>
													<li><a href="javascript:void(0);" onclick="loadEventDetails(<?php echo $i; ?>,5)">Contacts</a></li>	
												</ul></div>
												<!--<div class="box4">
												</div>-->
                                            </div>
										</div>
									</div>
								</div>
							</div>
						</div>
                    </li>
					<?php } ?>
					<li id="Android">
						<?php include 'workshop/android.php'; ?>
                    </li>
					<li id="Sixth-sense">
						<?php include 'workshop/sixth-sense.php'; ?>
                    </li>
					<li id="Mobile-robotics">
						<?php include 'workshop/mobile-robotics.php'; ?>
                    </li>
					<li id="Ethical-hacking">
						<?php include 'workshop/ethical-hacking.php'; ?>
                    </li>
					<li id="Cloud">
						<?php include 'workshop/cloud-computing.php'; ?>
                    </li>
					<li id="Drupal">
						<?php include 'workshop/web-designing.php'; ?>
                    </li>
					<li id="sponsors11">
                    	<div class="box1">
                            <div class="box2">
                                <div class="container_12">
                                    <div class="wrapper">
                                        <div class="grid_12 alpha">
											<div class="block_pozition">
												<h2>Sponsors 2011</h2>
													<div class="line_title_p6">&nbsp;</div>
													<div id="sp11" class="contentScroller">
														<div class="pic_poz1">
															<div class="left"><img src="images/sponsor11/btech.png"  alt=""/></div>
															<div class="left"><img src="images/sponsor11/btext.png"  alt=""/></div>
															<div class="left"><img src="images/sponsor11/cat.png"  alt=""/></div>
															<div class="left"><img src="images/sponsor11/college khabar.png"  alt=""/></div>
															<div class="left"><img src="images/sponsor11/collegefreak.png"  alt=""/></div>
															<div class="left"><img src="images/sponsor11/ei sys.png"  alt=""/></div>
															<div class="left"><img src="images/sponsor11/decent.png"  alt=""/></div>
															<div class="left"><img src="images/sponsor11/dare.png"  alt=""/></div>
															<div class="left"><img src="images/sponsor11/fadoo.png"  alt=""/></div>
															<div class="left"><img src="images/sponsor11/fusion.png"  alt=""/></div>
															<div class="left"><img src="images/sponsor11/student.png"  alt=""/></div>
															<div class="left"><img src="images/sponsor11/tech.png"  alt=""/></div>
														</div>
													</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                    </li>
                    <li id="sponsors12">
                    	<?php include('sponsors12.php'); ?>
                    </li>
					<li id="hospitality">
						<?php include('hospitality.php'); ?>
					</li>
					<li id="credits">
                    	<div class="box1">
                            <div class="box2">
                                <div class="container_12">
                                    <div class="wrapper">
                                        <div class="grid_12 alpha">
											<div class="block_pozition">
												<h2>Credits</h2>
													<div class="line_title_p6">&nbsp;</div>
													<h4>Web Development</h4>
													<h6>Sandesh Kumar Gangwar</h6><br/><br/><br/><br/>
													<h4>Graphics Design</h4>
													<h6>DSSR Akhilesh</h6>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                    </li>
					<li id="contacts">
                    	<div class="box1">
                            <div class="box2">
                                <div class="container_12">
                                    <div class="wrapper">
                                        <div class="grid_7 alpha">
											<div class="block_pozition">
												<h2>Contact Us</h2>
													<div class="line_title1_p5">&nbsp;</div>
													<h4>Student Co-ordinators :</h4>
													<h4>Vishwa Prakash Gayasen</h4>
													<p>
														<span class="phone">Phone: </span>+91 9039647967<br/>
														<span class="phone">E-mail: </span><a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&source=mailto&to=vishwaprakash@infotsav.org" class="color1" target="_blank">vishwaprakash@infotsav.org</a>											
													</p>
													<h4>Akshit Gaur</h4>
													<p>
														<span class="phone">Phone: </span>+91 9165083232<br/>
														<span class="phone">E-mail: </span><a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&source=mailto&to=akshit@infotsav.org" class="color1" target="_blank">akshit@infotsav.org</a>											
													</p>
											</div>
										</div>
                                        <div class="grid_4">
											<div class="block1_pozition">
												<h2>Our Address</h2>
													<div class="line_title2_p5">&nbsp;</div>
													    <div id="gall_poz1">
															<figure class="google_map"></figure>
														</div>
												<h4>A Block, ABV-Indian Institute of Information Technology and Management<br/>NH-92 (Morena Link Road),<br/>Gwalior.</h4>
                                            </div>
										</div>
									</div>
								</div>
							</div>
						</div>
                    </li>
                </ul>
			</article>
			<!--content end-->
		</div>
	<div class="block"></div>
    
<div class="footerdiv">
	<div>
			<!--footer -->
			<footer>
					<nav id="link_nav">
						<ul id="footer_link">
							<li><a href="#!/credits">credits</a></li>|
							<li><a href="#!/contacts">contacts</a></li>
						</ul>
					</nav>
					<ul id="js-news" class="js-hidden">
						<?php include('updates.php'); ?>
					</ul>
					<nav id="social_nav">
						<ul id="footer_social">
							<li style="background-image:url(images/social/facebook.png);"><a href="http://www.facebook.com/Infotsav/" target="_blank"></a></li>
							<li style="background-image:url(images/social/twitter.png);"><a href="https://twitter.com/Infotsav/" target="_blank"></a></li>
							<li style="background-image:url(images/social/blogger.png);"><a href="http://infotsav2012.blogspot.in/" target="_blank"></a></li>
						</ul>
					</nav>
				<!--<div class="buttons">
					<a href="#" class="next1"><img src="images/marker_left.png" alt="" class="img"><img src="images/marker_left_active.png" alt="" class="img_act"></a>
					<a href="#" class="prev1"><img src="images/marker_right.png" alt="" class="img"><img src="images/marker_right_active.png" alt="" class="img_act"></a>
				</div>-->
				<ul id="caption">
                	<li><div class="slog">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Annual Techno-Management Fest of ABV-IIITM Gwalior</div>
					      <!--<div class="more"><a href="#" class="ex-4">Explore</a>
						  <div class="ex-5">&nbsp;</div>
							
						  </div>-->
					</li>
                </ul>
				<ul id="caption1">
                	<li><div class="slog2">9-11 Nov. 2012</div></li>
                </ul>
				<!-- {%FOOTER_LINK} -->
			</footer>
			<!--footer end-->
	</div>
</div>
<script type="text/javascript"> Cufon.now(); </script>
<script>
$(window).load(function() {	
	loadBody();
	$('.page_spinner').fadeOut();
	$('body').css({overflow:'visible'})
})
</script>

</body>

</html>
