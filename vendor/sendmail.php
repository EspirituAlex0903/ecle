<?php
/*if(isset($open) && $open){
  ob_start();
  //do what it is supposed to do
}
else {
  header("HTTP/1.1 403 Forbidden");
  exit;
}*/
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'autoload.php';
$mail = new PHPMailer(true);

$body ="<p>Dear Mr. Bolasoc ,</p>
<p>Greetings of peace!</p>
<p>You have successfully applied for the exit clearance.</p>
<p>Please take note of your exit clearance reference number <b></b>.</p>
<p>You may check the status of your clearance using our exit clearance status checker at the CEU ECLE Portal.</p>
<p><b>This is an auto generated email please do not reply.</b></p>
<p>Thank you and stay safe.</p>";




try {
    //Server settings
    //Server settings
     $mail->SMTPDebug = SMTP::DEBUG_SERVER;
     $mail->isSMTP();
     $mail->Host       = 'smtp.gmail.com';     //platform
     $mail->SMTPAuth   = true;
     $mail->Username   = 'ceumlsecle@gmail.com';   //email
     $mail->Password   = 'afjrtcvmtfbbpzhp';                                //password
     $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
     $mail->Port       = 587;

     //Recipients
     $mail->setFrom('ceumlsecle@gmail.com');       //sender
     $mail->addAddress('reymart.bolasoc@gmail.com');

     //Content
     $mail->isHTML(true);
     $mail->Subject = 'Testing from ECLE';
     $mail->Body    = $body;             //content

     $mail->send();
     echo "message has been sent";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
    //header
