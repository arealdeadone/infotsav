<?php 
require_once('connect.php');
$q="SELECT * FROM events";
$r=mysql_query($q) or die("Can't connect");
 $affected_rows=mysql_affected_rows();
?>
<html>
<body>
<form method="POST" action="event_loader.php">
<select name="event">

<?php
while($affected_rows!=0)
{
$row=mysql_fetch_array($r,MYSQL_ASSOC);
?>
<option name="<?php echo $row['name'];?>"><?php echo $row['name']; $affected_rows--; ?></option><?php } ?>

</select>
<input type="submit" value="submit" name="submit" />
</form>
</body>
</html>

