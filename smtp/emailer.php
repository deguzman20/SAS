<?php 

require 'PHPMailer/src/PHPMailer.php';

$mail = new PHPMailer();

$mail->Host='smtp.gmail.com';
$mail->SMTPAuth='true';
$mail->Username='lorenzpascual45@gmail.com';
$mail->Password='pascual123';
$mail->Port=587;

$mail->SetFrom('loorenz@gmail.com','Developer');
$mail->addAddress('lorenzpascual45@gmail.com');

$mail->Subject='asd';
$mail->Body='adaf';



if($mail->send()){
	echo 'Mail Sent';
}else{
	echo 'Mail Not Sent';

}
?>