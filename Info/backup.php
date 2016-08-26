<?php
mysql_connect('127.0.0.1','root','bcmc3414');
mysql_select_db('infotsav15');

if(isset($_POST['submit']))
{
processform();
}
else
{
displayform();
}
function processform()
{
$pass="nexusoi54";
if(!(strcmp($_POST['password'],$pass)))
{
$query="SELECT * FROM registration";
$res=mysql_query($query);
$ar=mysql_affected_rows() or die("Cannot Open");
$f='backup.csv';
$fa=fopen($f,"w+");
while($ar!=0)
{
	$row=mysql_fetch_array($res,MYSQL_ASSOC);
	//foreach($row)
	fputcsv($fa,$row);
	/*fputcsv($fa,$row['password']);
	fputcsv($fa,$row['mobileno']);
	fputcsv($fa,$row['institue']);
	fputcsv($fa,$row['year']);
	fputcsv($fa,$row['username']);
	fputcsv($fa,$row['email']);
	fputcsv($fa,$row['branch']);
	fputcsv($fa,$row['gender']);
	fputcsv($fa,$row['ip']);
	fputcsv($fa,$row['email_act']);
	fputcsv($fa,$row['activation']);
	fputcsv($fa,$row['mob_act']);*/
$ar--;
}
backup_tables('localhost','root','bcmc3414','forex');
backup_tables_job('localhost','root','bcmc3414','jobbureau');
/**Mailer
*/
require 'PHPMailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer();

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging

//$mail->SMTPDebug = 3;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
//$mail->Host = 'email-smtp.us-west-2.amazonaws.com';
$mail->Host ='smtp.gmail.com';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
// I tried PORT 25, 465 too
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
//$mail->Username = "SES Secret ID";

//Password to use for SMTP authentication
//$mail->Password = "SES Secret Key";////
//$mail->Username   = "AKIAISKE522APD3K4GTQ";
$mail->Username   = "help@infotsav.org";
$mail->Password   = "bragface56";
//$mail->Password   = "AriprUmUU83IO/u2tiT71fnebOpEnn7QWw9qz2/eP2En";
//Set who the message is to be sent from
$mail->setFrom('help@infotsav.org', 'Infotsav');

//Set who the message is to be sent to
$mail->addAddress("kushagravarshney94@gmail.com","
Lo aa gya");

//Set the subject line
$mail->Subject = 'Confirmation Mail Infotsav 2015';


$mail->Body = "BAckup file";
$mail->AddAttachment('backup.csv');
//Replace the plain text body with one created manually
//$mail->AltBody = 'This is a plain-text message body';
$mail->send();

/*
*/
fclose($fa);
unlink("backup.csv");
}
/*else
{
header("Location:http://www.infotsav.com");
}*/
}

//forex backup
//backup_tables('localhost','root','bcmc3414','forex');

/* backup the db OR just a table */
function backup_tables($host,$user,$pass,$name,$tables = '*')
{
	
	$link = mysql_connect($host,$user,$pass);
	mysql_select_db($name,$link);
	
	//get all of the tables
	if($tables == '*')
	{
		$tables = array();
		$result = mysql_query('SHOW TABLES');
		while($row = mysql_fetch_row($result))
		{
			$tables[] = $row[0];
		}
print_r($tables);
	}
	else
	{
		$tables = is_array($tables) ? $tables : explode(',',$tables);
	}
	
	//cycle through
	$time=date('Y-m-d H:i:s');
	$dir='forex_backups/backup_'.$time;
		mkdir($dir, 0700);
	foreach($tables as $table)
	{
		$result = mysql_query('SELECT * FROM '.$table.' LIMIT 100000');
		$num_fields = mysql_num_fields($result);
		
		
		$f=$dir.'/backup'.$table.'_'.$time.'.csv';
		echo $f;
		$fa=fopen($f,"w+");
		echo $num_fields;
		while($row=mysql_fetch_array($result,MYSQL_ASSOC))
			{
			//$row=mysql_fetch_array($result,MYSQL_ASSOC);
			print_r($row);
			fputcsv($fa,$row);
			/*fputcsv($fa,$row['password']);
			fputcsv($fa,$row['mobileno']);
			fputcsv($fa,$row['institue']);
			fputcsv($fa,$row['year']);
			fputcsv($fa,$row['username']);
			fputcsv($fa,$row['email']);
			fputcsv($fa,$row['branch']);
			fputcsv($fa,$row['gender']);
			fputcsv($fa,$row['ip']);
			fputcsv($fa,$row['email_act']);
			fputcsv($fa,$row['activation']);
			fputcsv($fa,$row['mob_act']);*/
			//$num_fields--;
		}


	fclose($fa);
		
	}		
}





function backup_tables_job($host,$user,$pass,$name,$tables = '*')
{
	
	$link = mysql_connect($host,$user,$pass);
	mysql_select_db($name,$link);
	
	//get all of the tables
	if($tables == '*')
	{
		$tables = array();
		$result = mysql_query('SHOW TABLES');
		while($row = mysql_fetch_row($result))
		{
			$tables[] = $row[0];
		}
	print_r($tables);
	}
	else
	{
		$tables = is_array($tables) ? $tables : explode(',',$tables);
	}
	
	//cycle through
	$time=date('Y-m-d H:i:s');
	$dir='job_backups/backup_'.$time;
		mkdir($dir, 0700);
	foreach($tables as $table)
	{
		$result = mysql_query('SELECT * FROM '.$table.' LIMIT 100000');
		$num_fields = mysql_num_fields($result);
		
		
		$f=$dir.'/backup'.$table.'_'.$time.'.csv';
		echo $f;
		$fa=fopen($f,"w+");
		echo $num_fields;
		while($row=mysql_fetch_array($result,MYSQL_ASSOC))
			{
			//$row=mysql_fetch_array($result,MYSQL_ASSOC);
			print_r($row);
			fputcsv($fa,$row);
			/*fputcsv($fa,$row['password']);
			fputcsv($fa,$row['mobileno']);
			fputcsv($fa,$row['institue']);
			fputcsv($fa,$row['year']);
			fputcsv($fa,$row['username']);
			fputcsv($fa,$row['email']);
			fputcsv($fa,$row['branch']);
			fputcsv($fa,$row['gender']);
			fputcsv($fa,$row['ip']);
			fputcsv($fa,$row['email_act']);
			fputcsv($fa,$row['activation']);
			fputcsv($fa,$row['mob_act']);*/
			//$num_fields--;
		}


	fclose($fa);
		
	}		
}


















?>
<?php
function displayform()
{?>
<html>
<body>
<form method="POST" action="">
<input type="password" name="password" />
<input type="submit" name="submit" value="Submit" />
</form>
</body>
</html>
<?php } ?>
