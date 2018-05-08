<?php
require 'PHPMailerAutoload.php';
require 'phpmailer/class.phpmailer.php';
$email   = $_POST['email'];
$message = $_POST['msg'];

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();               
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);       
$mail->SMTPDebug = 1;                // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'lorenzpascual45@gmail.com';                 // SMTP username
$mail->Password = 'pascual123';                           // SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('lorenzpascual45@gmail.com', 'Search And Secure');
$mail->addAddress($email);     // Add a recipient
$mail->addReplyTo("lorenzpascual45@gmail.com");
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'SAS';
$mail->Body    = $message;
// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>