function getUrlPref(id) {
	var url = document.getElementById(id).src;
	return url.substr(0, url.indexOf('/js/'));
}

function vtsIframeOnload(blockId) {
	document.getElementById(blockId).style.display="none";
}

function addPairs(profile, width, height) {
	var urlpref = getUrlPref("vtCurrencyPairs");
	var blockId = Math.random();
	
	var getFormattedValue = function($val) {
		if ( (new RegExp('^[ \t]*[0-9]+(\%|px|pt|em)[ \t]*$','i')).test($val) ) {
			return $val;
		}
		return parseInt($val)+"px";
	}

	width  = getFormattedValue(width);
	height = getFormattedValue(height);
	
	document.write("<link rel='stylesheet' type='text/css' href='"+urlpref+"/../common/css/onload.css?version=1.3'>");
	document.write("<div class='vts_pairs_block'>");
	document.write("<iframe onload='vtsIframeOnload("+blockId+")' scrolling='No' frameborder='text/html' src='"+urlpref+"/activePairs.php?profile="+profile+"' width='"+width+"' height='"+height+"' style='border: 0px solid black;'></iframe>");
	document.write("<div id='"+blockId+"' class='vts_pairs_onload' style='width:"+width+";height:"+height+"'></div>");
	document.write("</div>");
}

if (typeof(profile)=='undefined')	var profile = '';
if (typeof(width  )=='undefined') var width   = 500;
if (typeof(height )=='undefined')	var height  = 'auto';

if (height!='auto') {
	addPairs(profile, width, height);
} else {
	var urlpref = getUrlPref("vtCurrencyPairs");
	document.write("<script src='"+urlpref+"/activePairsAutoHeight.php?profile="+profile+"&width="+width+"'></script>");
}
