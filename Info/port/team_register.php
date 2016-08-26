<?php
require_once('connect.php');
if (empty($_GET)) {
    

if(isset($_POST['team_size']))
{
display_team();}
else
display_size();
function display_size(){ 
 ?>
<html>
<body>
<form method="post" action="" >
<table>
<tr>
<td> Please mention the size of your team </td>
<td><input type="text" name="size" /></td>
</tr>
<tr>
<td>
<input type="submit" name="team_size" value="Submit" /></td>
</tr>
</table>
</form>
</body>
</html>
<?php } ?>
<?php
function display_team()
{
?>
<html>
<body>
<form method="post" action="" >
<table>
<tr>
<td>Enter the name of the team:</td>
<td><input type="text" name="name" /></td>
</tr>
<?php
$l=$_POST['size'];
for($i=1;$i<=$l;$i++)
{
?>
<tr>
<td>Member <?php echo $i;?> registration number:</td>
<td><input type="text" name="name<?php echo $i;?>" /></td>
</tr>
<?php
}
for($i=$l+1;$i<=5;$i++)
{
?>
<input type="hidden" name="name<?php echo $i;?>" value="Null" />
<?php } ?>
<input type="hidden" name="size" value="<?php echo $l;?>" />
<tr><td>
<input type="submit" name="submit" value="submit" /></td></tr>
</table>
</form>
</body>
</html>
<?php } ?>
<?php if(isset($_POST['submit']))
{
$ns=$_POST['size'];
$na=$_POST['name'];
$n1=$_POST['name1'];
$n2=$_POST['name2'];
$n3=$_POST['name3'];
$n4=$_POST['name4'];
$n5=$_POST['name5'];
$query="INSERT INTO Teams(name,member1,member2,member3,member4,member5,size) VALUES ('$na','$n1','$n2','$n3','$n4','$n5','$ns')";
mysql_query($query) or die("Can't");
$query="SELECT teamid FROM Teams WHERE name='$na'";
$q=mysql_query($query);
$row=mysql_fetch_array($q,MYSQL_ASSOC);
echo "Team id is:".$row['teamid'];

}
}
else
{
$event_name=$_GET['event'];
$min=$_GET['min'];
$max=$_GET['max'];
if(isset($_POST['team_size_get']))
{
$l=$_POST['size_get'];
if($l<$min)
echo "<script>alert('The team size is less than the minimum allowed size');history.go(-1);</script>";
else if($l>$max)
echo "<script>alert('The team size is more than the maximum allowed size');history.go(-1);</script>";

?>

<html>
<head>
	<title>Just Do it</title>
<body>
	<
<form method="post" action="" >
<table>
<tr>
<td>Enter the name of the team:</td>
<td><input type="text" name="name_get" /></td>
</tr>
<?php

for($i=1;$i<=$l;$i++)
{
?>
<tr>
<td>Member <?php echo $i;?> registration number:</td>
<td><input type="text" name="name<?php echo $i;?>_get" /></td>
</tr>
<?php
}
for($i=$l+1;$i<=5;$i++)
{
?>
<input type="hidden" name="name<?php echo $i;?>_get" value="Null" />
<?php } ?>
<input type="hidden" name="size_get" value="<?php echo $l;?>" />
<tr><td>
<input type="submit" name="submit_get" value="submit" /></td></tr>
</table>
</form>
</body>
</html>
<?php } 

else{


 ?>
<html>
<body>
<form method="post" action="" >
<table>
<tr>
<td> Please mention the size of your team </td>
<td><input type="text" name="size_get" /></td>
</tr>
<tr>
<td>
<input type="submit" name="team_size_get" value="Submit" /></td>
</tr>
</table>
</form>
</body>
</html>
<?php } ?>

<?php if(isset($_POST['submit_get']))
{
$ns=$_POST['size_get'];
$na=$_POST['name_get'];
$n1=$_POST['name1_get'];
$n2=$_POST['name2_get'];
$n3=$_POST['name3_get'];
$n4=$_POST['name4_get'];
$n5=$_POST['name5_get'];
echo $n1;
$query="INSERT INTO teams(name,member1,member2,member3,member4,member5,size) VALUES ('$na','$n1','$n2','$n3','$n4','$n5','$ns')";
mysql_query($query) or die("Can't");
$query="SELECT teamid FROM teams WHERE name='$na'";
$q=mysql_query($query);
$row=mysql_fetch_array($q,MYSQL_ASSOC);
$se=$row['teamid'];
//echo $se;
echo $event_name;

//$quer="INSERT INTO ".$event_name."(teamid) VALUES ('$se')";
$q="INSERT INTO ".$event_name." (teamid) VALUES ('$se')";
mysql_query($q) or die("Cant add to events");
echo "Team id is:".$row['teamid'];

}
}































 ?>


