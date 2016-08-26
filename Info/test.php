<?php
$i=(int)$_GET['id'];
$xml = file_get_contents('events.xml');
          $EVENTLIST = new SimpleXMLElement($xml);
          
          echo $EVENTLIST->EVENT[$i]->TITLE;
?>
