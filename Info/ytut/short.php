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
<section id="page">
<div id="bodywrap">
<section id="top">
<nav>
<h1 id="sitename"><a href="#">Forex </a></h1>
  
  <ul id="sitenav">
  	<li ><a href="portfolio.php" title="">Portfolio</a></li>
					<li><a href="long.php" title="">Long</a></li>
					<li class="current"><a href="short.php" title="">Short</a></li>
					<li><a href="history.php" title="">History</a></li>
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
	  	$result21 = @mysql_query("SELECT * FROM user WHERE id = '{$_SESSION['userid']}' AND email_id1='{$_SESSION['emailid']}' ");
	  
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
                <div class="post"><center>
                    <h3><b>Your Status</b></h3>
                    
                    <div class="entry">
                    <table width="650" height="100%" border="0">
        <tr background="#"> 
          <td><h22><b>&nbsp;&nbsp;</h5></td>
          <td><h22><b>Currency Pair</h5></td>
          <td><h22><b>Bid Price</h5></td>
          <td><h22><b>Traded Price</h5></td>
		  <td><h22><b>Lots to be Short</h5></td>
          <td><h22><b>Avaliable Lots</h5></td>
          <td><h22><b>Profit @ Moment</h5></b></td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
		<form  action="short_calculation.php" method="post">
        <?php
	 //session_start();
	//checking whether session exists or not//
      if(isset($_SESSION['userid']))
	{
		
		$query="SELECT * FROM  portfolio WHERE id='{$_SESSION['userid']}' AND status=1 order by order_no DESC ";//'{$_SESSION['userid']}' AND status=1";
		$result=@mysql_query($query);
		$no_of_rows=@mysql_num_rows($result);
		//echo $no_of_rows;
		while($row=@mysql_fetch_assoc($result))
		{ 
			//echo $row['product_id'];
			extract($row);
			$query1=@mysql_query("SELECT * FROM product WHERE product_id='$product_id'") or die("die1");
			$product_name =@mysql_result($query1,0,'product_name') or die("die2");
			$bid_price =@mysql_result($query1,0,'bid_price') or die(" die3");
			//$long_price
		 	print"<tr>";
		 	print "<td><div align=\"center\"><font size=\"+1\" >";
			?>
			<input type="checkbox"name="order_No[<?php echo $i;?>]"value="<?php echo $order_no;?>" />
		 	<?php
			//echo $order_no;
		 	print "</font></div></td>";
			
		 	print "<td><div align=\"center\"><h21><font size=\"+.3\" >"; echo $product_name; print "</h21></div></td>";
		 	print"<td><div align=\"center\"><h21><font size=\"+.3\" >"; echo $bid_price;print"</h21></div></td>";
		 	print"<td><div align=\"center\"><h21><font size=\"+.3\" >"; echo $long_price; print"</h21></div></td>";
			//$queryForOrderNo="SELECT lots FROM short WHERE order_no='$order_no'";
			//if(!($result1=mysql_query($queryForOrderNo)))
			////echo "ERROR !".mysql_error();
			//if(!mysql_num_rows($result1))
			//echo "ERROR 2:".mysql_error();
			//$rowval=mysql_fetch_array($result1);
			?>
			<td><center> <select name="<?php echo $order_no;?>">
			<?php
			//echo $lots."---------------------";
			$m=$lots;
			while($m>=1)
			{
			echo "<option>".$m."</option>";
			$m--;
			}
			echo "</td></select>";
		 	print"<td><div align=\"center\"><h21>";echo $lots; print"</h21></div></td>";
		
			$factor=multi_factor_generator($product_id);
			settype($profit_m,"float");
			$profit_m=($bid_price-$long_price)*100000;
			//echo $profit_m."<br>";
			$profit_m=$profit_m*$factor;
			//echo $profit_m."<br>";
			$profit_m=$profit_m*$lots;
			//echo $profit_m."-----<br>";
			$profit_m=$profit_m*$laverage;
			//echo $profit_m."-----<br>";
			$profit_m=(float)($profit_m/50.0);
			//echo $profit_m."------<br>"; // added by me leverage..
		    //echo $bid_price-$long_price."---------------".$factor."------".$profit_m."----".$lots."----".$laverage."<br>";
			print"<td><div align=\"center\"><h21><span>"; echo round($profit_m,2); print"</span></h21></div></td>";
			print "</tr>";
		 $i++;
		}
	?>
	<tr> 
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
	  <center><input name="submit" type="submit" value="Close Deal" /> 
      </br>
	  </br>

       <script>
          var width=500;      // Frame width
          var height=500;     // Frame height
          var pair="EUR/USD"; // Currency pair
          var period=0;       // Time interval
</script>
      <h3>Currency <span>Chart</span></h3>
      <script id="vtChartForm" src="addChart.js">/**/</script>
      </td>
      </tr>
      </table>
	 
	 </form>
      
      <?php
//header('location:http://localhost/forex/portfolio.php');	
}
else   header('location:index.php');

?>
                    
                    </div>
                </div></center>
               							              
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
