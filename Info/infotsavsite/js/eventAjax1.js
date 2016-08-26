var xmlDoc;
function loadXMLDoc(dname)
{
	if (window.XMLHttpRequest)
	{
		xmlhttp=new XMLHttpRequest();
	}
	else
	{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.open("GET",dname,false);
	xmlhttp.send();
	return xmlhttp.responseXML;
}
function loadBody()
{
	var txt,xx,i,totalEvents=30;
	var x = new Array();
	var today = new Date();
	xmlDoc = loadXMLDoc("events.xml?q="+today.getTime());
	for(i=0;i<totalEvents;i++)
	{
		document.getElementById('event_title'+i).innerHTML = "Loading...";
		txt="<h2>";
		x=xmlDoc.documentElement.getElementsByTagName("EVENT");
		xx=x[i].getElementsByTagName("TITLE");
		{
			try
			{
				txt=txt +  xx[0].firstChild.nodeValue ;
			}
			catch (er)
			{
			txt=txt + "Event Not Available";
			}
		}
		xx=x[i].getElementsByTagName("TAGLINE");
		{
			try
			{
				txt=txt + " - " +  xx[0].firstChild.nodeValue ;
			}
			catch (er)
			{
			txt=txt + "&nbsp;";
			}
		}
		txt = txt + "</h2>";
		document.getElementById('event_title'+i).innerHTML = txt;
		loadEvent(i);
	}
	
}
function loadEvent(eid)
{
	document.getElementById('event_details'+eid).innerHTML = "<center><img src='images/ajax_loader_bar.gif' alt='loading...'</img></center>";
	loadEventDetails(eid,1);	
}
function loadEventDetails(eid,mid)
{
	document.getElementById('event_details'+eid).innerHTML = "<center><img src='images/ajax_loader_bar.gif' alt='loading...'</img></center>";
	var txt,xx,x,i;
	txt="";
	x=xmlDoc.documentElement.getElementsByTagName("EVENT");
	if(mid == 1)
	{
		xx=x[eid].getElementsByTagName("IMAGE");
		{
			try
			{
				txt=txt + "<div class='img_indent3 left'><img src='images/events/"+ xx[0].firstChild.nodeValue +"'  alt=''/></div>";
			}
			catch (er)
			{
				txt=txt + "&nbsp;";
			}
		}
		xx=x[eid].getElementsByTagName("DESCRIPTION");
		{
			try
			{
				txt=txt + xx[0].firstChild.nodeValue;
			}
			catch (er)
			{
				txt=txt + "<center>to be uploaded soon</center>";
			}
		}
	}
	else if(mid == 2)
	{
		xx=x[eid].getElementsByTagName("RULES");
		{
			try
			{
				txt=txt + "<ul class='circle'>"+ xx[0].firstChild.nodeValue + "</ul>";
			}
			catch (er)
			{
				txt=txt + "<center>to be uploaded soon</center>";
			}
		}
	}
	else if(mid == 3)
	{
		xx=x[eid].getElementsByTagName("TIMELINE");
		{
			try
			{
				txt=txt + "<ul class='circle'>"+ xx[0].firstChild.nodeValue + "</ul>";
			}
			catch (er)
			{
				txt=txt + "<center>to be uploaded soon</center>";
			}
		}
	}
	else if(mid == 4)
	{
		xx=x[eid].getElementsByTagName("DOWNLOADS");
		{
			try
			{
				txt=txt + "<ul class='download'>"+ xx[0].firstChild.nodeValue + "</ul>";
			}
			catch (er)
			{
				txt=txt + "<center>to be uploaded soon</center>";
			}
		}
	}
	else if(mid == 5)
	{
		xx=x[eid].getElementsByTagName("CONTACTS");
		{
			try
			{
				txt=txt + xx[0].firstChild.nodeValue;
			}
			catch (er)
			{
				txt=txt + "<center>to be uploaded soon</center>";
			}
		}
	}
	document.getElementById('event_details'+eid).innerHTML = txt;	
	setSlider($('#contentScroller'+eid));
	
}