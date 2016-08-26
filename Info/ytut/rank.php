<?php

require "connect.php";

//updating rank now


$query5="SELECT id FROM user  order by cash_paid DESC";
$result5=@mysql_query($query5);
$i=1;
while($row=@mysql_fetch_row($result5))
{
	$result6=@mysql_query("UPDATE user SET rank='$i' WHERE  id='$row[0]' ") or die("cann't update");
	$i++;
	 
}


?>
