<?php

//header('location:logout.php');
	session_start();
	if(!isset($_SESSION['userid'])||(!isset($_SESSION['status'])))
	header('location:index.php');
	
	if($_SESSION['status']==0 && ($_SESSION['username']!="creative") )
	{	
		header('location:logout.php');
	}


?>


<!doctype html>

<html lang="en-US">
<head>
<meta charset="UTF-8" />
<title>Portfolio</title>
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
<section id="page">
<div id="bodywrap">
<section id="top">
<nav>
<h1 id="sitename"><a href="#">Forex </a></h1>
  
  <ul id="sitenav">
  	<li class="current"><a href="portfolio.php" title="">Portfolio</a></li>
	<!--<li><a href="long.php" title="">Long</a></li>
	<li><a href="short.php" title="">Short</a></li>
        <li><a href="history.php" title="">History</a></li>-->
	
					
					<?php
					 if(isset($_SESSION['userid']) || isset($_SESSION['status'])|| isset($_SESSION['emailid']))
            				{
						$email=$_SESSION['emailid'];
						$access_id=array('luckysuman850@gmail.com','kushagravarshney@infotsav.org','gaurav.dev.iiitm@gmail.com','jayant@gmail.com','');
						if(1)//in_array($email,$access_id)
						{
					?>
						<li><a href="long.php" title="">Long</a></li>
						<li><a href="short.php" title="">Short</a></li>
        					<li><a href="history.php" title="">History</a></li>
							
					<?php
						}

					}
					?>
					<li><a href="top ranker.php">Top Rankers</a></li>
					<li><a href="help.php" title="">Help</a></li>
                 
                    <li><a href="logout.php">logout</a></li>
  <!-- End -->
  </ul>
  
</nav>
<header id="homeheader">


<div id="slider">	
	<div class="container">
	<ul class="slides">


<!--<font size='4' color="yellow">All the transactions have been reset and the simulation will again start at 1245 hrs.<br> Lets get rich.
</font>-->

			<li>
			  <div class="thumbholder">
			  <img src="images/forex.png" width="256" height="225" alt="First Image" />
			  </div><div class="txtholder">
            
            <p><font size="2" color="yellow">Game will end on 30/09/2015. PLease note you are not allowed to make more than one transaction in 2 seconds.</font><br>
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
<div id="sidebar">
<h4 >Welcome <?php echo $_SESSION['username'] ?>!! </h4>
               <br />
                    <?php
	 
	 require"connect.php";
	 require"rank.php";
		require "multi_factor_generator.php";
  		//session_start();
		// this is for calculating latest asserts....
	$query="SELECT * FROM user where id='{$_SESSION['userid']}'";
	$result=@mysql_query($query);
	$row=@mysql_fetch_array($result);
	extract($row);
		
	$query2="SELECT * FROM portfolio where id=$id AND status=1 order by id";
  	$result2=@mysql_query($query2);
  	$asserts=$cash_available;
	$test=@mysql_num_rows($result2);
  	while($row2=@mysql_fetch_array($result2))
  	{
  		extract($row2);
		$factor=multi_factor_generator($product_id);
 		$query3="SELECT bid_price from product WHERE product_id='$product_id'";
		$result3=@mysql_query($query3);
		$bid_price=@mysql_result($result3,0,0);
		$asserts= $asserts - ($lots*100000*$long_price*$factor)*$laverage/50 + ($lots*$bid_price*100000*$factor)*$laverage/50;
	}

if($asserts<0)
{
	@mysql_query("UPDATE user SET cash_available=100000, cash_paid=100000, margin=0, rank=0, act_key=1 WHERE user_id='".$_SESSION

['username']."' OR email_id1='".$_SESSION['username']."'") or die("error1");
//       mysql_query("DELETE FROM deactivated WHERE user_id='".$_SESSION['username']."'") or die("error2");
	   @mysql_query("DELETE FROM portfolio WHERE id='".$_SESSION['userid']."'") or die("error3");
	   @mysql_query("DELETE FROM short WHERE id='".$_SESSION['userid']."'") or die("error4");
	   //mysql_query("DELETE FROM long WHERE id='".$_SESSION['userid']."'") or die("error5");
	   //mysql_query("DELETE FROM short_sell WHERE id='".$_SESSION['userid']."'") or die("error6");
	 //  mysql_query("UPDATE shortcheck SET total=0 WHERE user_id='".$_SESSION['username']."'") or die("error7");
echo '<script type="text/javascript">alert("hello");</script>';
echo '<script type="text/javascript">alert("hello");</script>';
 header("Location: portfolio.php");
}








	if($test!=0)
   $result4=@mysql_query("UPDATE user SET cash_paid='$asserts' WHERE  id='$id' ") or die("cannt update");
	else
	$result5=@mysql_query("UPDATE user SET cash_paid='$asserts',margin=0 WHERE  id='$id' ") or die("cannt update");	
		
	
		
		
		//updation of asserts ends here
		
	  //add balance here
	  	$result21 = @mysql_query("SELECT * FROM user WHERE id = '{$_SESSION['userid']}' AND email_id1='{$_SESSION['emailid']}'");
	  
	  $balance=@mysql_result($result21,0,'cash_available');
	  $asserts=@mysql_result($result21,0,'cash_paid');
	  $margin=@mysql_result($result21,0,'margin');
	  $rank=@mysql_result($result21,0,'rank');
	 
	  
	  
	?>
       <table width="100" border="0" cellspacing="1" cellpadding="0">
        <tr> 
          <td><h3>Balance</h3></td>
         <td><h3><?php echo round($balance,2); ?></h3></td>
        </tr>
        <tr> 
          <td><h3>Assets</h3></td>
          
          <td><h3><span><?php echo round($asserts,2); ?></span></h3></td>
        </tr>
        <tr> 
          <td><h3>Margin</h3></td>
         
          <td><h3><span><?php echo round($margin,2) ;?></span></h3></td>
        </tr>
        <tr> 
          <td><h3>Cash-in-hand</h3></td>
          
          <td><h3><span><?php echo round($balance-$margin,2); ?></span></h3></td>
        </tr>
         <tr>


 <?php        
		if($rank>0)
		{
		echo"<tr> 
          <td><h4>Your Rank</h4></td>
        </tr>
		<tr>
          <td><h3><span>".$rank."</span></h3></td>
        </tr>";
		}
		      
			  ?>
			  </table>

</div><div id="yourcontent">			
                <div class="post">
				    
                    <h2><a href="#">Your Portfolio</a></h2>
                    
                    <div class="entry">
                    <h3><span>Important note:</span></h3><h4><span><br>All the users Accounts with assets or balance less than 0 will be automatically reseted without any notification or you can close all your deals in order not to let your assets or balance go below 0.</span>
                    </div>
                </div>
                <div class="post">
                    <!--<h2><a href="#">about $ forex</a></h2>
                    
                    <div class="entry">
                        
         
                        
                    </div>-->
                    <table width="75%" border="0">
        <tr background="#"> 
          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Currency Pair</h3></td>
          <td >&nbsp;&nbsp;&nbsp;<h3>&nbsp;Lots</h3></td>
		  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Leverage</h3></td>
          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h3>&nbsp;&nbsp;&nbsp;Profit</h3></td>
       </tr>
        <?php
	if(isset($_SESSION['userid']))
	{	
  		
  		$result=mysql_query("SELECT * FROM portfolio WHERE id='{$_SESSION['userid']}'  AND status=1 ORDER BY order_no DESC ") or die("hi");
  		
		while($row=mysql_fetch_array($result))
  		{
   			extract($row);
			$factor=multi_factor_generator($product_id);
   			$x=mysql_query("SELECT * FROM product WHERE product_id='$product_id'") or die("hi");
   			$product_name=mysql_result($x,0,'product_name') ;
			$bid_price=mysql_result($x,0,'bid_price') ;
   			$profit=($bid_price-$long_price)*$factor*$lots*100000*$laverage/50;//added by me leverage.
		
    		print"<tr >";
    		print "<td  >"."<center><h4>".$product_name."</h4></center>"."</td>";
    		print "<td >"."<center><h4>".$lots."</h4></center>"."</td>";
			print "<td >"."<center><h4>".$laverage."</h4></center>"."</td>";
    		print "<td > "."<center><h4><span>".round($profit,2)."</span></h4</center>"."</td>";
    		print"</tr>";
  		}
	}
	//else header('location:index.htm');
	
  ?>
      </table>
                    
                </div>
               							              
            </div>
<div class="clear"></div>
</section>
</div>
</section>
</br></br></br></br>
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

<div ><iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Finfotsav&amp;width=240&amp;height=270&amp;colorscheme=dark&amp;show_faces=true&amp;border_color=black&amp;stream=false&amp;header=true&amp;appId=268656886499518" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:240px; height:270px;" allowTransparency="true"></iframe></iframe></div>

</div>
<div class="block3">

<h2>More About Infotsav</h2>
<p>"Infotsav" is the annual Technology and Management Festival of ABV-IIITM ,Gwalior. It celebrates the spirit of the institute, embarked by its fight for creativity, excellence and being leader. The festival witnesses big corporate names as sponsors and big institutes as participants. The excellence has always been rewarded, and the witness is huge prize money that is at stake every year." </p>

</div>
<div class="clear"></div>
</div>
<div id="credits">
<p>
<span class="copyright">Copyright &copy; infotsav 2015 @ABV-IIITM All Rights Reserved. Designed by <b>&nbsp;<a href="#" >Anshul Vyas</a></span>
<span id="designcredit"></span>
<!--Creative Common Non-Commercial, Attribution License
Designed by : Roshan Ravi
Author URI : cssheaven.org
Do Not Remove this Credits and Link back to CSSHeaven from the template
<a href="../../index.htm" title="Free CSS Website Template by CSSHeaven">Website Template</a>
Design Credits by ... </span> -->
</p>
</div>
</footer>

</section>
</body>



</html>
