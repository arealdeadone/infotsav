       <?php
	     $xml = file_get_contents('events.xml');
				$EVENTLIST = new SimpleXMLElement($xml);
	    
	    print json_encode ($EVENTLIST);
?>