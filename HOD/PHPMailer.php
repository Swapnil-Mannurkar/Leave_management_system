<?php
require 'PHPMailer/PHPMailerAutoload.php';
require 'constants.php';

//mail send sample code
$mail = new PHPMailer();
//$mail->SMTPDebug = 3;
$mail->isSMTP(true);
$mail->SMTPAuth =true;
$mail->SMTPSecure='tls';  //tls ssl
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;    // 587 465
$mail->IsHTML(true);
$mail->CharSet='UTF-8';
$mail->Username=/*Enter your Email ID in single quotes*/;
$mail->Password=/*Enter your Email ID password in single quotes*/;
$mail->SetFrom(/*Enter your Email ID in single quotes*/, SENDER_NAME);
$mail->AddAddress(RECEIVER, RECEIVER_NAME);
$mail->addReplyTo('no-reply@gmail.com', 'No-reply');
$mail->addCC(RECEIVER);
$mail->addBCC(RECEIVER);
#$mail->addAttachment('byby.png');   
$mail->Subject = 'Test Mail example';
$mail->Body="This is my sample mail";
$mail->SMTPOptions = array(
    'ssl' => [
        'verify_peer' => false,
        'verify_depth' => false,
        'allow_self_signed' => false,
        'verify_peer_name' => false
    ]
);

if (!$mail->send()) {
    echo '<br>Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo '<br>Message sent!';
    header('location:leave.php');
}

?>