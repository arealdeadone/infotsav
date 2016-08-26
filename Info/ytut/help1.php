<!doctype html>

<html lang="en-US">
<head>
<meta charset="UTF-8" />
<title>Help</title>
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
                        $email=$_SESSION['emailid'];
                        $access_id=array('anshul.vyas380@gmail.com','jayantsingh304@gmail.com');
                        if(0)//in_array($email,$access_id)
                            {
    ?>
    <li><a href="top_rankers.php">Top Rankers</a></li>
    <?php
                           }
            }                
    ?>
    <li class="current"><a href="help1.php">Help</a></li>
    <li><a href="team_forex.php">Contact</a></li>
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

                   <h2><a href="#">Foreign Exchange</a></h2>
                    <h4>an online currency exchange simulation</h4>
                    <div class="entry"><br />
                     <h2>Key Terms</h2>
           <p><a href="help.wmv">Click here</a> to see the flash help file. The 
             size of the flash is little big, please be patient till it loads...
           <br />
           <br />
           <b> Exchange Rate</b>
           <p>The value of one currency expressed in terms of another. For example, 
             if EUR/USD is 1.3200, 1 Euro is worth US$1.3200.</p>
           <br />
           <b>Currency Pair</b><br />
           <p>The two currencies that make up an exchange rate. When one is bought, 
             the other is sold, and vice versa.</p>
           <br />
           <b>Base Currency</b><br />
           <p>The first currency in the pair. Also the currency your account is 
             denominated in. </p>
           <p><br />
               <b>Counter Currency</b></br>
           </p>
           <p>The second currency in the pair. Also known as the terms currency.</p>
           <br />
           <b>ISO Currency Codes</b></br>
           USD = US Dollar<br />
           EUR = Euro</br>
           JPY = Japanese Yen<br />
           GBP = British Pound<br />
           CHF = Swiss Franc<br />
           CAD = Canadian Dollar<br />
           AUD = Australian Dollar<br />
           NZD = New Zealand Dollar<br />
           <b>Bid price/Ask price</b><br />
           <p>The sell quote is displayed on the left and is the price at which 
             you can sell the base currency. It is also referred to as the market 
             maker's bid price. For example, if the EUR/USD quotes 1.3200/03, you 
             can sell 1 Euro at the bid price of US$ 1.3200 and to buy 1 EUR you 
             have to pay US$ 1.3203. </p>
           <br />
           <b>Buy Quote / Offer Price</b><br />
           <p>The buy quote is displayed on the right and is the price at which 
             you can buy the base currency. It is also referred to as the market 
             maker's ask or offer price. For example, if the EUR/USD quotes 1.3200/03, 
             you can buy 1 Euro at the offer price of US$1.3203.</p>
           <br />
           <b>Lots</b></br>
           <p>The standard unit size of a transaction. Typically, one &quot;standard&quot; 
             lot is equal to 100,000 units of the base currency (as in our game), 
             Some dealers offer the ability to trade in any unit size, down to 
             as little as 1 unit!</p>
           <br />
           <b>Spread</b><br />
           <p>The difference between the sell quote and the buy quote or the bid 
             and offer price. For example, if EUR/USD quotes read 1.3200/03, the 
             spread is the difference between 1.3200 and 1.3203, or 3 pips. In 
             order to break even on a trade, a position must move in the direction 
             of the trade by an amount equal to the spread.</p>
           <br />
           <b>Margin</b><br />
           <p>The deposit required to open or maintain a position. A 1% margin 
             requirement allows you to control a $100,000 position with a $1,000 
             margin deposit. The margin depends on leverage and lots selected, 
             being minimum with the leverage 400 and maximum with leverage 50. 
             ( The reason is as the risk level in the deal increses, the margin 
             for that deal decreases).</p>
           <br />
           <b>Leverage</b><br />
           <p>Leverage is so far the most interesting term in Forex. Let explain 
             it with an example .Suppose you buy 1 lot of EUR/USD pair at the rate 
             1.4412/1.4418. Without leverage you have to pay 1.4418*100000. But 
             when we look at the amount we earn in this deal, its not more than 
             US$ 2000. Now which investor would like to invest more than 1.5 lakhs 
             to earn 2000 bucks? That's why Forex introduces leverage. If leverage 
             is 100 and the amount for the deal without leverage is X, than you 
             have to pay only X/100 for that deal!!!!! </p>
           <br />
           <b>Long Position</b><br />
           <p>A position in which the trader attempts to profit from an increase 
             in price. i.e. Buy low, sell high.</p>
           <br />
           <b>Short Position</b><br />
           <p>A position in which the trader attempts to profit from a decrease 
             in price. i.e. Sell high, buy low. But its not included in our Forex</p>
           </br>
           <b>Technical Analysis </b><br />
           <p>A style of trading that involves analysing price charts for technical 
             patterns of behaviour. </p>
           <br />
           <b>Fundamental Analysis </b><br />
           <p>A style of trading that involves analysing the macroeconomic factors 
             of an economy underpinning the value of a currency and placing trades 
             that support the trader's outlook. </p>
           <br />
           <b>Trend Trading </b><br />
           <p>A style of trading that attempts to profit from riding short, medium 
             or long term trends in price. </p>
           <br />
           <b>Range Trading </b><br />
           <p>A style of trading that attempts to profit from buying technical 
             levels of support and selling technical levels of resistance. The 
             upper level of resistance and lower level of support defines the range. </p>
           <br />
           <b>Scalping </b><br />
           <p>A style of trading that involves frequent trading seeking small gains 
             over a very short period of time. Trades can last from seconds to 
             minutes. </p>
           <br />
           <b>Day Trading </b><br />
           <p>A style of trading that involves multiple trades on an intra-day 
             basis. Trades can last from minutes to hours. </p>
           </br>
           <b>Swing Trading </b><br />
           <p>A style of trading that involves seeking to profit from short to 
             medium term swings in trend. Trades can last from hours to days. </p>
           <br />
           <b>Position Trading </b><br />
           <p>A style of trading that involves taking a longer term position that 
             reflects a longer term outlook. Trades can last from weeks to months. </p>
           <br />
           <b>Discretionary Trading </b><br />
           <p>A style of trading that uses human judgement and decision making 
             on every trade. </p>
           <br />
           <b>Automated Trading </b><br />
           <p>A style of trading that involves neither human decision making nor 
             involvement, but uses a pre-programmed strategy based on technical 
             or fundamental analysis to automatically execute trades via an automated 
             trading platform. </p>
           <br />
           <b>Example Trade</b><br />
           <p>Assume you have a trading account at a broker that requires a 1% 
             margin deposit for every trade. The current quote for EUR/USD is 1.3225/28 
             and you want to place a market order to buy 1 standard lot of 100,000 
             Euros at 1.3228, for a total value of US$132,280 (100,000 * $1.3228). 
             The broker requires you to deposit 1% of the total, or $1322.80 to 
             open the trade. At the same time you place a take-profit order at 
             1.3278, 50 pips above your order price. In taking this trade you expect 
             the Euro to strengthen against the U.S. dollar. As you expected, the 
             Euro strengthens against the U.S. dollar and you take your profit 
             at 1.3278, closing out the trade. As each pip is worth US$10, your 
             total profit for this trade is $500, for a total return of 38%.</p>
           <br />
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
Designed by : ANSHUL VYAS
Author URI : INFOTSAV.COM
Do Not Remove this Credits and Link back to CSSHeaven from the template
<a href="../../index.htm" title="Free CSS Website Template by CSSHeaven">Website Template</a>
<!--Design Credits by ... </span> -->
</p>
</div>
</footer>

</section>
</body>
</html>
