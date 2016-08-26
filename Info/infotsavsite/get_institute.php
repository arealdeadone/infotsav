<?php
include('connect.php');
if($con)
{
	$q = strtolower(mysql_real_escape_string(stripslashes($_REQUEST['term'])));
	if (!$q) return;
	$req = "SELECT DISTINCT institute FROM users WHERE institute LIKE '$q%' OR institute LIKE '% $q%'"; 

	$query = mysql_query($req);

	while($row = mysql_fetch_array($query))
	{
		$results[] = $row['institute'];
	}
}
else
{
	return;
}
mysql_close($con);
echo json_encode($results);
?>