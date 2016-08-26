<?php
require './PHPMailer/PHPMailerAutoload.php';
					$activation=md5(uniqid(rand(), true));
$mail = new PHPMailer;
echo "sdasda ";
//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'unishubh1@gmail.com';                 // SMTP username
$mail->Password = 'imshubh008';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
$message = " To activate your account, please click on this link:\n\n";
               // $message .= WEBSITE_URL . '/activate.php?email=' . urlencode($email) . "&key=$activation";
$mail->From = 'unishubh1@gmail.com';
$mail->FromName = 'Mailer';
$mail->addAddress('amanjain7898@gmail','Aman');    
// Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Account Authentication';
$mail->Body    = $message."Please Click on the link to continue.";
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

print_r($mail);

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
					
		//echo"inside form";
			
		/*$name= mysql_real_escape_string(stripslashes($_POST['name']));
		
		$pwd= md5(mysql_real_escape_string(stripslashes($_POST['pwd'])));
		$rpwd= md5(mysql_real_escape_string(stripslashes($_POST['rpwd'])));
		$phone= mysql_real_escape_string(stripslashes($_POST['phone']));
		$email= mysql_real_escape_string(stripslashes($_POST['email']));
		$ins= mysql_real_escape_string(stripslashes($_POST['ins']));
		
		$year= mysql_real_escape_string(stripslashes($_POST['year']));
		$gender= mysql_real_escape_string(stripslashes($_POST['gender']));
		$ip=getIP();	
			$email_check_query="SELECT * FROM registration WHERE email='$email'";
			$email_check_result=mysqli_query($db,$email_check_query);
				if(mysqli_num_rows($email_check_result)>0)
					{
						echo'<script type="text/javascript">
							alert("This Email-ID is aleady Registered");
						</script>';
					}
				else
					{
					$activation=md5(uniqid(rand(), true));
		$query= "INSERT INTO registration(name,password,mobileno,institute,year,email,gender,ip,activation) VALUES('$name','$pwd','$phone','$ins','$year','$email','$gender','$ip','$activation')";
		$result=mysqli_query($db,$query);
		if(mysqli_affected_rows($db)>0)
			{
			mysqli_insert_id($db);
			//echo"SUCCESSS";
			$message = " To activate your account, please click on this link:\n\n";
                $message .= WEBSITE_URL . '/activate.php?email=' . urlencode($email) . "&key=$activation";
                mail($email, 'Registration Confirmation', $message, 'From: amanjain7898@gmail.com');

                // Finish the page:
                echo '<script>
							alert("Thank you for registering!   A confirmation email has been sent to   '.$email.'   Please click on the Activation Link to Activate your account");
					  </script>';
			
			}
		/*else
		echo"Failure";*/
					
	
	
	
	
	
?>
