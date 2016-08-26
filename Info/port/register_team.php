<?php 
require_once('connect.php');
$event_name=$_GET['event'];
if(isset($_POST['submit']))
{
$team=$_POST['teamid'];
//$set="SELECT * FROM Teams WHERE teamid='$team' ";

//echo $team;
$q="SELECT * FROM Teams WHERE teamid='$team' ";
//echo $q;

$qry=mysql_query($q) or die("Can't connect to teams");
$ar=mysql_affected_rows();
if($ar!=1)
{
echo "<script>alert('The team has not been registered yet or the team id is wrong');history.go(-1);</script>";
}
$row=mysql_fetch_array($qry,MYSQL_ASSOC) or die("Cannot array");
print_r($row);
//echo $row['name'];
$qr="SELECT * FROM events WHERE name='$event_name' ";
$query=mysql_query($qr) or die("Can't connect to events");
$ro=mysql_fetch_array($query,MYSQL_ASSOC);
print_r($ro);
if($row['size']<$ro['min'])
echo "<script>alert('The team size is less than the minimum allowed size');history.go(-1);</script>";
else if($row['size']>$ro['max'])
echo "<script>alert('The team size is more than the maximum allowed size');history.go(-1);</script>";
else 
{

$q="INSERT INTO ".$event_name." (teamid) VALUES ('$team')";
if(mysql_query($q))
echo "Success";
else
echo "Failed";

}
}
?>
<html>
<body>
<form method="POST" action="" >
<table>
<tr>
<td>
Please tell your team id:</td>
<td>
<input type="text" name="teamid" />
</td>
</tr>
<tr>
<td>
<input type="submit" name="submit" />
</td>
</tr>
</table>
</form>
</body>
</html>
