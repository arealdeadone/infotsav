<?php

	if(!isset($_SESSION['userid']))
	header('location:index.htm');


?>



<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>long</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="stylesheet" type="text/css" href="default.css" />
</head>

<body>
<div id="header">
	
  <div id="header_inner"> 
    <h1><span>Forex</span></h1>
	
    <div id="slogan"><?php echo $_SESSION['username'];?></div>
  </div>
</div>

<div id="main"> 
  <div id="lcol"> 
    <div id="menu"> 
      <ul>
        <li><a href="portfolio.php">Portfolio<span></span></a></li>
        <li><a href="long.php">Long<span></span></a></li>
        <li><a href="short.php">Short<span></span></a></li>
        <li><a href="top_rankers.php">Top Rankers<span></span></a></li>
        <li><a href="help.php">Help<span></span></a></li>
        <li><a href="faqs.php">FAQs<span></span></a></li>
        <li><a href="team_forex.php">Team Forex<span></span></a></li>
        <li><a href="logout.php">LogOut<span></span></a></li>
      </ul>
    </div>
    <div id="menu_end"></div>
    <div id="lcontent"> 
      <h3>news.<span>flash</span></h3>
       <iframe id="forex" src="news.htm" width="150px" height="95px" marginwidth="0" marginheight="0" hspace="0" vspace="0" 	frameborder="0" 	scrolling="no"></iframe>
	
    </div>
    <div id="menu_end"></div>
    <div id="lcontent"> 
      <h3 class="first">Other.<span>Links</span></h3>
      <ul class="divided">
        <li class="first"><a href="http://www.infotsav.org">infotsav '08</a></li>
        <li><a href="forex.pdf">More help</a></li>
        <li><a href="under_construction.php">simula</a></li>
        <li><a href="http://aurora.iiitm.ac.in">Aurora</a></li>
      </ul>
    </div>
  </div>
  <div id="rcol"> 
    <DIV class="vt_cp" style="margin:0; padding:0"> </div>
    <div> 
      <script>
var height='auto';     // Frame height
var width=500;         // Frame width
var profile="default"; // Profile
</script>
      <script id="vtCurrencyPairs" src="http://webcharts.fxserver.com/pairs/js/addActivePairs.js">/**/</script>
      <br>
      <br>
      <script>
var width=500;      // Frame width
var height=500;     // Frame height
var pair="EUR/USD"; // Currency pair
var period=0;       // Time interval
</script>
      <h3>currency.<span>chart</span></h3>
      <script id="vtChartForm" src="addChart.js">/**/</script>
      <h3>currency.<span>calculator</span></h3>
      <script id="vtCurrencyCalc" src="http://webcharts.fxserver.com/calc/js/addCalc.js">/**/</script>
      <br>
      <br>
      <h3>trade.<span>here</span></h3>
      <form name="long_form" action="calculation.php" method="post">
        <table width="100" border="0" cellspacing="1" cellpadding="0">
          <tr> 
            <td><center>
                <h23>Currency Pair</h23></center></td>
            <td>&nbsp;</td>
            <td><center>
                <h23>Laverage</h23></center></td>
            <td>&nbsp;</td>
            <td><center>
                <h23>Lots</h23></center></td>
          </tr>
          <tr> 
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
            <td>&nbsp;</td>
            <td><select name="laverage">
                <option value="50">&nbsp;&nbsp;50:1</option>
                <option value="100">&nbsp;&nbsp;100:1</option>
                <option value="200">&nbsp;&nbsp;200:1</option>
                <option value="300">&nbsp;&nbsp;300:1</option>
                <option value="400">&nbsp;&nbsp;400:1&nbsp;&nbsp;</option>
              </select></td>
            <td>&nbsp;</td>
            <td><select name="lots">
                <option value="1">&nbsp;&nbsp;1</option>
                <option value="2">&nbsp;&nbsp;2</option>
                <option value="3">&nbsp;&nbsp;3</option>
                <option value="4">&nbsp;&nbsp;4</option>
                <option value="5">&nbsp;&nbsp;5&nbsp;&nbsp;</option>
              </select></td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input name="submit" type="submit" value="Submit" /></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
  <div class='hint' id='hint_cur_week' style="display:none"> 
    <div class='hint_head'> <span class='close_t'>[</span><span class='close' id='t_cur_week' onclick='vts_closeHint(this.id)'>close</span><span class='close_t'>]</span> 
    </div>
    <div class='hint_text'> The change on the week follows the currency pairs 
      change from Sunday global open at 4pm EST until the current moment. </div>
  </div>
</div>
</DIV>
<br><br>
	


  </div>
</div>

<div id="footer">
	&copy; 2008 forex.iiitm. All rights reserved. Design by <a href="">utkarsh $ subhash</a>.<br />


</a></a>
</div>

</body>
</html>

