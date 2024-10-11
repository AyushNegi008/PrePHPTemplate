<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;




require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';





//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);




function sendmessage($email,$namein,$messagein){
global $mail;
    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'abc@gmail.com';                     //SMTP username
        $mail->Password   = 'pass';                            //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('abc@gmail.com', '#message-smDB');    //Add a recipient
        $mail->addAddress('mail at @gmail.com');              //Name is optional
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $namein;
        $mail->Body    = '<div><b>mailid- '.$email.'</b><br><b>name- '.$namein.'</b><br><b>message- '.$messagein.'</b></div>';
        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    
}
?>
