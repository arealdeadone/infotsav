<?php
require_once('connect.php');
if(isset($_POST['submit']))
{
$q="SELECT num FROM seq";
$r=mysql_query($q)or die("Not able to read in seq database");
$row=mysql_fetch_array($r,MYSQL_ASSOC);

//$affected=mysql_affected_rows();
/*while($affected!=0)
{

$affected--;
}*/
//echo $row['num'];
$gen=$row['num']+1;
//echo $gen;
$q="UPDATE seq SET num='$gen' WHERE 1";
//$q="REPLACE INTO seq(num) values('$gen')";
$r=mysql_query($q)or die("Not able to enter in seq database");
$name=$_POST['name'];
$college=$_POST['college'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$trans=($_POST['trans']=="")?"Not Paid":$_POST['trans'];
$reg=$gen;
$q="INSERT INTO participant (name,college,email,phone,transid,regid) values('$name','$college','$email','$phone','$trans','$reg')";
$r=mysql_query($q) or die("Not able to acces participant database");
echo "The Registration id is ".$reg;

}
?>
