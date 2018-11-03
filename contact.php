<?php
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
/* Set e-mail recipient */
$To  = "jrgraphics23@gmail.com";

/* Check all form inputs using check_input function */
$Firstname = htmlspecialchars($_POST['Firstname']);
$Lastname = htmlspecialchars($_POST['Lastname']);
$Phonenumber = htmlspecialchars($_POST['Phonenumber']);
$Email = htmlspecialchars($_POST['Email']);
$Comment = htmlspecialchars($_POST['Comment']);
$Subject = "Morales Landscaping Quote Request";

/* Message for the email */
$Message = "Hello, <br/>
<br/>
Your contact form has been submitted by: <br/>
<br/>
Name: $Firstname $Lastname <br/>
Phone Number: $Phonenumber <br/>
E-mail: $Email <br/>
<br/>
Comments: <br/>
$Comment <br/>
<br/>
End of message
"; 


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'rubenmoralesjr1021@gmail.com';     // SMTP username
    $mail->Password = 'Moralestech#96';                   // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to
	$mail->SMTPOptions = array(
    						'ssl' => array(
										'verify_peer' => false,
										'verify_peer_name' => false,
										'allow_self_signed' => true
										  )
							   );

    //Recipients
    $mail->setFrom('rubenmoralesjr1021@gmail.com', 'Morales Tech Server');
    $mail->addAddress($To, 'Joe User');                    // Add a recipient, Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                    // Set email format to HTML
    $mail->Subject = $Subject;
    $mail->Body    = $Message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';


    header('Location: thanks.html');
	if(!$mail->Send())
 		{
     		echo "Mailer Error: " . $mail->ErrorInfo;
 		}

?>