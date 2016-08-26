<?php
      $dbhost="localhost";
	  $dbuser="root";
	  $dbpassword="bcmc3414";
	  $dbdatabase="infotsav15";
	  
	  
	  /*Default time zone ,to be able to send mail */
date_default_timezone_set('UTC');

/*You might not need this */
ini_set('SMTP', "mail.myt.mu"); // Overide The Default Php.ini settings for sending mail


//This is the address that will appear coming from ( Sender )
define('EMAIL', 'amanjain7898@gmail.com');

/*Define the root url where the script will be found such as http://website.com or http://website.com/Folder/ */
DEFINE('WEBSITE_URL', 'http://localhost');


// Make the connection:
/*$db=mysqli_connect(dbhost, dbuser, dbpassword,
    dbdatabase);

if (!$db) {
    trigger_error('Could not connect to MySQL: ' . mysqli_connect_error());
}*/
	 
?>

