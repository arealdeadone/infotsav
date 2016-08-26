<?php
require_once('connect.php');
if(isset($_POST['submit']))
{
$event=$_POST['event'];
$q="SELECT * FROM events WHERE name='$event' "; 
$query=mysql_query($q) or die("Can't");
$row=mysql_fetch_array($query,MYSQL_ASSOC);
$min=$row['min'];
$max=$row['max']; 
?>
<html>
<body>
<table>
<tr>
<td>
<a href="register_team.php?event=<?php echo $event;?>"><button name="register" >I already have a team</button></a></td>
<td>
<a href="team_register.php?event=<?php echo $event;?>&min=<?php echo $min;?>&max=<?php echo $max;?>"><button name="register" >I don't have a team</button></a></td>
</table>
</body>
</html>
<?php } ?>
