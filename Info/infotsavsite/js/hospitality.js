function hospitality(mid)
{
	$('#event_details36').html("<center><img src='images/ajax_loader_bar.gif' alt='loading...'</img></center>");
	var txt;
	txt="";
	if(mid == 1)
	{
		txt=txt + "We would like to inform you that the hospitality team will be there to help all participants of Infotsav round the clock. <br/>As soon as you reach Gwalior by any mode of conveyance, you can make a call to our hospitality volunteer for any help. If the no.of participants are more than 10 from a single college then Infotsav arranges conveyance for them. As you reach the campus, our volunteers will guide you to the help desk and a registration fee has to be paid at the counter. There on he/she'll be guided by Infotsav volunteer to his/her room in one of our hostels.";
		
	}
	else if(mid == 2)
	{
		txt=txt + "<h4>Infotsav Regstration</h4><ul class='circle'><li>Registration Fee: &#8377; 350.00 per person</li><li>It includes registration for all the events (excluding Gamiacs), seminars and exhibitions of Infotsav.</li><li>Every person registering for Infotsav will get:<ul><li>I. 1 Stationery kit</li><li>II. 1 Exclusive Infotsav magazine</li><li>III. Participation certificate of Infotsav 2012</li></ul></li><li>Registration for workshops includes participation only in that particular workshop. To participate in an event, registration for Infotsav is required, though he/she can attend the seminars and exhibitions without any extra registration.</li></ul><br/><h4>Gamiacs Regsitration</h4><ul class='circle'><li>Any student (school or college) can participate in Gamiacs.</li><li>To participate in Gamiacs, students have to submit separate fee. This fee is neither included in Infotsav registration nor in Workshop registration.</li><li>Fees for gamiacs is as follows:<ul><li>I. &#8377; 50.00 per participant for Need for Speed - Most Wanted</li><li>II. &#8377; 50.00 per participant for FIFA 09</li><li>III. &#8377; 50.00 per participant (&#8377; 200.00 per Clan) for Counter Strike 1.6</li></ul></li></ul>";
	}
	else if(mid == 3)
	{
		txt = txt + "<ul class='circle'><li>Accommodation facility is available on payment basis. Any one registering for Infotsav or workshops can avail this facility.</li><li>Student will get:<ul><li>I. 1 mattress</li><li>II. 1 pillow (with cover)</li><li>III.2 bed sheets</li></ul></li><li>Buckets, mugs will be available in the bathrooms. All other things required should be brought by your own. </li><li>Charges for accommodation (per person):<ul class='circle'><li>&#8377; 150.00 (for 3 nights and 3 days - 8th November night to 11th November)</li><li>&#8377; 50.00 (for a single day)</li></ul></li></ul>";
	}
	else if(mid == 4)
	{
		txt=txt + "<ul class='circle'><li>There will be various food options/stalls.</li><li>Apart from food stalls, mess facility can be availed on the payment basis.</li><li>Mess will provide morning breakfast, lunch and dinner.</li></ul>";
	}
	else if(mid == 5)
	{
		txt=txt + "For more details, please contact our Hospitality Managers:<br/><br/><h4>Saurabh</h4><p><span class='phone'>Phone: </span>+91 9770937218<br/><span class='phone'>E-mail: </span>saurabh@infotsav.org</p><h4>Nitish Bhardwaj</h4><p><span class='phone'>Phone: </span>+91 9575968955<br/><span class='phone'>E-mail: </span>nitish.bhardwaj@infotsav.org</p><h4>Amit Samdarshi</h4><p><span class='phone'>Phone: </span>+91 9770126368<br/><span class='phone'>E-mail: </span>amit.samdarshi@infotsav.org</p><h4>Sachchit Bansal</h4><p><span class='phone'>Phone: </span>+91 8305532657<br/><span class='phone'>E-mail: </span>sachchit.bansal@infotsav.org</p>";
	}
	$('#event_details36').html(txt);	
	setSlider($('#contentScroller36'));
	
}