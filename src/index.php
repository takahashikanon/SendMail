<?php

include "Mailer_Z.php";

// .php->html
ob_start();
include("view.php");
$readingView = ob_get_contents();
ob_end_clean();

$mail = new Mailer_Z();
$mail->setFrom('address');
$to = ['address', 'address'];
$mail->setTo($to);
$mail->setSubject('example');
$mail->setHTMLbody($readingView);

$mail->Make_Mail();
$mail->Send_Mail();