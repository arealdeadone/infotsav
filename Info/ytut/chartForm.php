<html>
<head>
<link rel="stylesheet" type="text/css" href="file:///C|/Documents%20and%20Settings/Subhash.INVENTION/Desktop/resources/css/chart.css">
</head>
<body onLoad="ResizeFrame()">

<script language="JavaScript">


function updateChart(form) 
{
	rand = Math.round(Math.random()*100000);
	form.chartImage.src = "http://webcharts.fxserver.com/charts/chartImage.php?profile=&pair="+form.pair.value.replace("/", "_")+"&period="+form.period.value+"&width=400"+"&height=250"+"&rand="+rand;
	return false;
}

function ResizeFrame() {
	return false;
	try
	{
		frame = parent.document.getElementById("vtChartFrame");
		if (frame) {
			if (typeof(document.height) == 'number') {
				h = document.height;
			} else {
				h = document.body.scrollHeight;
			}
			frame.height = h;
		}
	} catch (e) {}
	return false;
}
</script>

	<form id='chartForm' method='POST' action='file:///C|/Documents%20and%20Settings/Subhash.INVENTION/Desktop/chartForm.php' name='properties'>
	<input type='hidden' name='action' value='post'>
<table id='maintab' cellspacing="0" cellpadding="0">
<tr><td colspan='2'>
	<img id='chartImage' src='http://webcharts.fxserver.com/charts/chartImage.php?profile=&pair=EUR_USD&period=0&width=400&height=250'>

</td></tr>	
<tr>
<td nowrap rowspan=3 valign="top">
	<div class="key" style="margin:10px 0 3px">
		Please choose currency pair:
	</div>
	<div class="item">
		<select name='pair'><option value='EUR/USD' selected>EUR/USD</option><option value='USD/JPY'>USD/JPY</option><option value='GBP/USD'>GBP/USD</option><option value='USD/CHF'>USD/CHF</option><option value='EUR/CHF'>EUR/CHF</option><option value='AUD/USD'>AUD/USD</option><option value='USD/CAD'>USD/CAD</option><option value='EUR/GBP'>EUR/GBP</option><option value='EUR/JPY'>EUR/JPY</option><option value='GBP/JPY'>GBP/JPY</option><option value='EUR/CAD'>EUR/CAD</option><option value='EUR/AUD'>EUR/AUD</option><option value='GBP/CHF'>GBP/CHF</option><option value='CHF/JPY'>CHF/JPY</option><option value='AUD/CAD'>AUD/CAD</option><option value='AUD/JPY'>AUD/JPY</option><option value='NZD/USD'>NZD/USD</option><option value='CAD/JPY'>CAD/JPY</option></select>

	</div>
	<div class="key" style="margin:15px 0 3px">
		Please choose time interval:
	</div>
	<div class="item">
		<select name='period'><option selected value='0'>1 min</option><option value='1'>5 min</option><option value='2'>10 min</option><option value='3'>15 min</option><option value='4'>30 min</option><option value='5'>1 hour</option><option value='6'>2 hour</option><option value='7'>4 hour</option><option value='8'>1 day</option><option value='9'>1 week</option><option value='10'>1 month</option></select>

	</div>
	<div class="key" style="margin-top:15px">
		<input type='button' value='Refresh' onClick='updateChart(this.form)'>
	</div>
</td>
</tr><tr><td>


</td></tr><tr><td valign="bottom" id='logo'>
	
</td></tr>
<tr><td colspan=2>


	</td></tr>
	</table>
	</form>

</body>
</html>