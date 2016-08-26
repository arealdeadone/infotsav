function getUrlPref(id) {
	url = document.getElementById(id).src;
	return url.substr(0, url.indexOf('/js/'));
}
function addChart(width, height, pair, period, profile, imageHeight) {
	var urlpref = getUrlPref("vtChartForm");
	var htmlCode = "<iframe id='vtChartFrame' src='"+urlpref+"chartForm.php?pair="+pair+"&period="+period+"&width="+width+"&height="+imageHeight+"&profile="+profile+"' frameborder=0 scrolling=no width="+width+" height="+height+"></iframe>";
	document.write(htmlCode);
}
addChart(width, height, pair, period, (typeof(profile)=='undefined'?'':profile), (typeof(imageHeight)=='undefined'?height-140:imageHeight));
