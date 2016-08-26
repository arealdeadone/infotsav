<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<style>
@font-face {
    font-family: myFirstFont;
    src: url(sansation_light.woff);
}
#hold {
position:relative;
left:400px;
top:150px;
vertical-align:middle;
 border: 2px ;

    border-radius: 25px;
    width:400px;
    height:200px;
    background-color: #FFFFCC;

}
#former{
padding:60 10 10 10;
}
</style>
</head>
<body>
<div id="hold" font-face="">
<form action="" method="POST" onsubmit="return validateForm()" name="former" id="former">
<table>
<tr>
<td>Enter password: </td>
<td><input type="password" name="password" id="password"  /></td>
</tr>
<tr>
<td>Retype Password:</td>
<td><input type="password" name="rpswrd" id="rpswrd"/></td>

</tr>
<tr>
<td><input type="submit" name="submit" val="Submit" /></td>
<input type="hidden" name="mail" value="<?php echo $remail; ?>" /> 
</tr>
</table>
</form>
</div>
<script type="text/javascript">
function validateForm() {
var z = $('input#password').val();
				if (z == null || z == ""||(z.length<6)) {
					$('input#password').css("border", "3px solid red");
					alert("Enter atleast 6 characters Password!");
					return false;
//flag=false;
					}
				else{
					$('input#password').css("border", "1px solid grey");
					}
			
			//password again
				var m = $('input#rpswrd').val();
				if (m != z) {
					$('input#rpswrd').css("border", "3px solid red");
					alert("Password do not match");
					return false;
//flag=false;
					}
				else{
					$('input#rpswrd').css("border", "1px solid grey");
					} 
return true;}
</script>

<?php 
require_once("config.php");
$db=mysqli_connect($dbhost,$dbuser,$dbpassword,$dbdatabase);
//$connect=mysqli_connect("localhost","root","bcmc3414") or die("Can't");
$remail=@$email= @mysql_real_escape_string(stripslashes($_GET['email']));
//echo $remail;
$keey=$_GET['key'];
//----------------

$q="SELECT * FROM registration WHERE email='$remail'";
$qq=mysqli_query($db,$q)or die("Can't");
//$ds=mysqli_affected_rows($db);
$r=mysqli_fetch_assoc($qq);
//echo $r['username'];
if(($r['tmp_hash']!=$keey)&&($r['tmp_hash']!=NULL))
{
echo '<script>
alert("Sorry, the link has expired.");
window.location.href="index.php";
</script>';
//header("Location:index.php");}
}
//-------------------

else{
//$qry="SELECT * FROM registration WHERE tmp_hash='$keey'";
//$result=mysqli_query($db,$qry);

//$res=mysqli_fetch_assoc($result);






if(isset($_POST['submit']))
{?>

<?php
process($remail,$db);
}
}
function process($remail,$db)
{
//echo $remail;
//$mail=$_POST['mail'];
$password=@md5(mysql_real_escape_string(stripslashes($_POST['password'])));
$qry="UPDATE registration SET password ='$password',tmp_hash='NULL' WHERE email='$remail'";
$reso=mysqli_query($db,$qry);
//mysql_select_db('trovetrace', $connect);
$connect=mysqli_connect("localhost","root","bcmc3414","trovetrace");
$rest="UPDATE registration SET password ='$password' WHERE email='$remail'";
$qry=mysqli_query($connect,$rest);

//for forex password change
$connect=mysqli_connect("localhost","root","bcmc3414","forex");
$rest="UPDATE user SET passwd='$password' WHERE email_id1='$remail'";
$qry_forex=mysqli_query($connect,$rest);

//$resot=mysql_query($rest)or die("Can't");;
if($reso)
{
echo '<script>
alert("Password Changed, Please Login");
window.href.location="index.php";
</script>';
}
else

{
echo '<script>
alert("Sorry Please try again");
</script>';
}
}

//sd
?>

</body>
</html>

