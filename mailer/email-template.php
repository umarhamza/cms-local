<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

$to = $email;
$subject = "Thank your for signing up";

$message = '<p style="background:#212529;padding:25px 15px;color:#fff;text-align:center;font-size:28px;">CMS LOCAL</p>';
$message .= '<h1 style="text-align:center;font-size:20px;">THANK YOU FOR SIGNING UP</h1>';
$message .= '<b>Thanks you for signing up to CMS Local. You can login at anytime from <a href="{$_SERVER["SERVER_NAME"]}" target="_blank">{$_SERVER["SERVER_NAME"]}</a></b>';
$message .= '<p style="background:#000;padding:15px;color:#ccc;text-align:center;">Copyright 2021 CMS Local</p>';

$header = "From:info@cms-local.com \r\n";
$header .= "Cc:umar@umarhamza.com \r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html\r\n";

$retval = mail($to, $subject, $message, $header);

if ($retval == true) {
echo "Message sent successfully...";
} else {
echo "Message could not be sent...";
}
