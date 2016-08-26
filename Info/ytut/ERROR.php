<?php
// here a lot contain 100000 units//

session_start();
$error =$_REQUEST['errors'];


?>
<!doctype html>

<html lang="en-US">
<head>
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
<![endif]--><script src="js/jquery-1.4.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/loopedslider.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
	$(function(){
		$('#slider').loopedSlider({
			autoStart: 6000,
			restart: 5000
		});
		
	});
</script>
<link href="login_page.css" rel="stylesheet" type="text/css" />
<script src="js/site.min.js" type="text/javascript" charset="utf-8"></script>
</head>

<body>
<script language="JavaScript">
function verifydata(form)
{
  var flag=0;
  var i;
  error1=new Array(4);
  error1[0]="Username; ";
  error1[1]="Old Password; ";
  error1[2]="New Password; ";
  error1[3]="Confirm New Password; ";
  var r="";
  for(i=0;i<4;i++)
  {
     if(form.elements[i].value=="")
	 {
	   flag=1;
	   r=r+error1[i];
	 }
  }
  if(flag==1)
  {
     alert("Please fill the following field/fields:-"+r);
      for(i=0;i<4;i++)
	  {
			if(form.elements[i].value=="")
			{
			  form.elements[i].focus();
			  break;
			}
       }
	return false;
  }
  else
  return true;
}

</script>

<section id="page">
<div id="bodywrap">
<section id="top">
<nav>
<h1 id="sitename"><a href="#">Forex </a></h1>
  
  <ul id="sitenav">
  	<li class="current"><a href="index.php">Home</a></li>
  	<li><a href="http://www.infotsav.com/">Infotsav</a></li>
  		<?php
        if(isset($_SESSION['userid']) || isset($_SESSION['status'])|| isset($_SESSION['emailid']))
            {
                        $email=$_SESSION['emailid'];
                        $access_id=array('anshul.vyas380@gmail.com','jayantsingh304@gmail.com');
                        if(in_array($email,$access_id))
                            {
    ?>
    <li><a href="top_rankers.php">Top Rankers</a></li>
     <?php
                           }
            }                
    ?>
    <li><a href="help1.php">Help</a></li>
    <li><a href="team_forex.php">Contact</a></li>
	<!-- Login Dropdown -->
	<?php 
if(isset($_SESSION['emailid']))
	{
echo'<li><a href="logout.php">logout</a></li>
';
	}
	else

{


	//echo'';
include "cappu.php";
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
 <h2><a href="#">Attention</a></h2>
                    
                    <div class="entry">
                    <p><br>
           <?php
		  echo $error."<br />";
		  
			?>
            <br>
            <br>
          </p>
                        
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
<span class="copyright">Copyright &copy; infotsav 2015 @ABV-IIITM All Rights Reserved. Designed by <b>&nbsp;<a href="#" >Anshul Vyas</a></b></span>
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
