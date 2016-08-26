<?php
include('connect.php');
if($con)
{
	if(isset($_REQUEST['term']))
	{
		$q = strtolower(mysql_real_escape_string(stripslashes($_REQUEST['term'])));
	}
	else return;
	$req = "SELECT DISTINCT branch FROM users WHERE branch LIKE '$q%' OR branch LIKE '% $q%'"; 

	$query = mysql_query($req);

	while($row = mysql_fetch_array($query))
	{
		$results[] = $row['branch'];
	}
}
else
{
	return;
}
mysql_close($con);
echo json_encode($results);
?>