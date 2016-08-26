<?php
//header('location:logout.php');  
session_start();
  if(!isset($_SESSION['userid'])||(!isset($_SESSION['status'])))
  header('location:index.php');
  
  if($_SESSION['status']==0 && ($_SESSION['username']!="creative") )
  { 
    header('location:logout.php');
  }
// for captcha
  $var1=mt_rand(1,9);
  $var2=mt_rand(1,9);
  $_SESSION['var3']=$var1+$var2;
  if(!isset($_SESSION['count']))
  {
    $_SESSION['count']=0;
  }
  if(!isset($_SESSION['trantime']))
	{
		$_SESSION['trantime']=date("H:i:s");
		
	}

?>

<!doctype html>

<html lang="en-US">
<head>
 <title>LONG</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    <link href="style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="dropdowncontent.js"></script>
  <script type="text/javascript" src="animatedcollapse.js"></script>
  <link href="phpcaptcha/css/style.css" rel="stylesheet">
  <script type='text/javascript'>
function refreshCaptcha(){
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>
  <script type="text/javascript">
  function submiter()
  {
    document.getElementById('submit').disabled=true;
    document.getElementById('base').value=1;
    if(document.getElementById('submit').disabled)
    {
      return true;
    }
    return false;   
  }
    
    
  </script>
 <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
<section id="page">
<div id="bodywrap">
<section id="top">
<nav>
<h1 id="sitename"><a href="#">Forex </a></h1>
  
  <ul id="sitenav">
          <li><a href="portfolio.php" title="">Portfolio</a></li>
          <li class="current"><a href="long.php" title="">Long</a></li>
          <li><a href="short.php" title="">Short</a></li>
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
            
            <p><br><font size="2" color="yellow">Game will end on 30/09/2015. PLease note you are not allowed to make more than one transaction in 2 seconds.</font><br>
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
   
    
    
  ?> <form name="long_form" action="calculation.php" method="POST" onsubmit="submiter()">
      <table width="100" border="0" cellspacing="1" cellpadding="0">
	<?php //echo "time=".$_SESSION['trantime'];?>
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
     
      <div style="float:right;">
      <tr> 
          <td><h4>Trade here</h4></td>
        </tr>
           
            <div id="rofl">
             
                <tr>
                  <td><br /><br />
                    <h3><span class="style4">Currency-Pair</span></h3>
                  </td>
                  <td><select name="currency_pair">
                    <option value="1">&nbsp;&nbsp;EUR/USD&nbsp;&nbsp;</option>
                    <option value="2">&nbsp;&nbsp;GBP/USD</option>
                    <option value="3">&nbsp;&nbsp;USD/JPY</option>
                    <option value="4">&nbsp;&nbsp;GBP/JPY</option>
                    <option value="5">&nbsp;&nbsp;GBP/CHF</option>
                    <option value="6">&nbsp;&nbsp;USD/CAD</option>
                    <option value="7">&nbsp;&nbsp;EUR/JPY</option>
                    <option value="8">&nbsp;&nbsp;USD/CHF</option>
                    <option value="9">&nbsp;&nbsp;NZD/USD</option>
                    <option value="10">&nbsp;&nbsp;AUD/USD</option>
                    <option value="11">&nbsp;&nbsp;CAD/JPY&nbsp;&nbsp;</option>
                    <option value="12">&nbsp;&nbsp;EUR/CHF</option>
                    <option value="13">&nbsp;&nbsp;EUR/AUD</option>
                    <option value="14">&nbsp;&nbsp;AUD/JPY</option>
                    <option value="15">&nbsp;&nbsp;NZD/JPY</option>
                    <option value="16">&nbsp;&nbsp;EUR/GBP</option>
                    <option value="17">&nbsp;&nbsp;CHF/JPY&nbsp;&nbsp;</option>
                    <option value="18">&nbsp;&nbsp;EUR/CAD&nbsp;&nbsp;</option>
                    <option value="19">&nbsp;&nbsp;AUD/CAD&nbsp;&nbsp;</option>
                  </select></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr></tr>
  <td><center>
    <h3><span class="style4"></ br>Leverage</span></h3>
  </center></td>
    <td><select name="laverage">
      <option value="50">&nbsp;&nbsp;50:1</option>
      <option value="100">&nbsp;&nbsp;100:1</option>
      <option value="200">&nbsp;&nbsp;200:1</option>
      <option value="300">&nbsp;&nbsp;300:1</option>
      <option value="400">&nbsp;&nbsp;400:1&nbsp;&nbsp;</option>
    </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><center>
      <h3><span class="style4">Lots</span></h3>
    </center></td>
  <input type="hidden" name="base" id="base" value="0" />
    <td><select name="lots">
      <option value="5">&nbsp;&nbsp;5</option>
      <option value="4">&nbsp;&nbsp;4</option>
      <option value="3">&nbsp;&nbsp;3</option>
      <option value="2">&nbsp;&nbsp;2</option>
      <option value="1">&nbsp;&nbsp;1&nbsp;&nbsp;</option>
    </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>

  <?php
   //echo $_SESSION['count'];
  if($_SESSION['count']==4)
  {
      ?><?php
require_once('recaptchalib.php');
$publickey='6Lerxg0TAAAAAD8ljTIvnWmKjmB3MI8iHZCGGrtD';
echo recaptcha_get_html($publickey);
?>
<input type="hidden" name="REMOTE_ADDR" value="<?php echo $_SERVER['REMOTE_ADDR'];?>" />
<?php
?>
<?php
  }
  ?>
  </tr>
  <tr>
    <td>&nbsp;</td>
	<?php 
	$time=date("H:i:s");
	?>
	<input type="hidden" name="trantime" value="<?php echo $time; ?>">
    <td><input name="submit" type="submit" value="Submit" id="submit"/></td>
  </tr>
              </table>
              </div>
            </form>
      

<div id="yourcontent">      
                <div align="right">
 <script>
var height='auto';     // Frame height
var width=600;         // Frame width
var profile="default"; // Profile
</script>
      <script id="vtCurrencyPairs" src="http://webcharts.fxserver.com/pairs/js/addActivePairs.js">/**/</script>
      <br>
      <center>
      <a href="javascript:collapse2.slideit()"> </a>
      <h4 class="style3"><a href="javascript:collapse2.slideit()"><img src="images/carchart.png"></a></h4>
      <a href="javascript:collapse2.slideit()"></a>
      <div id="cat" style="width:500px; background-color: #FFFFF;"  > <script>
var width=600;      // Frame width
var height=425;     // Frame height
var pair="EUR/USD"; // Currency pair
var period=0;       // Time interval
</script>
        <!--Your DIV content as follows. Note to add CSS padding or margins,
do it inside a DIV within the Collapsible DIV -->
        <div style="padding: 0 5px;"> <br>
      <p>&nbsp;</p>
      <script id="vtChartForm" src="addChart.js">/**/</script></div><script type="text/javascript">
//Syntax: var uniquevar=new animatedcollapse("DIV_id",animatetime_milisec, enablepersist(true/fase), [initialstate] )
var collapse2=new animatedcollapse("cat", 800, true)
</script></div><br><br>
      <h3 align="centre" class="style3" style="margin-top:"><a href="#" id="contentlink" rel="subcontent2"><img src="images/curcal.png"></a></h3>
      
      <DIV id="subcontent2" style="position:absolute; visibility: hidden; border: 9px solid orange; background-color: #FFFAEC
   ; width: 300px; height: 110px; padding: 4px;"><script id="vtCurrencyCalc" src="http://webcharts.fxserver.com/calc/js/addCalc.js">/**/</script>
</p></DIV>

<script type="text/javascript">
//Call dropdowncontent.init("anchorID", "positionString", glideduration, "revealBehavior") at the end of the page:
dropdowncontent.init("contentlink", "right-bottom", 300, "click")

</script></center>
            
      <br><br>
      </div>
      </div>
      
<div class="clear"></div>
</section>
</div>

</section>
</br></br></br></br>
</div></div>

<footer id="pagefooter">
<div id="bottom">
<div class="block1">
<div class="teamimg">
<br><br>

<iframe src="news.html" width="230px" height="210px" marginwidth="0" marginheight="0" hspace="0" vspace="0"   frameborder="0"   scrolling="No"></iframe>
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
