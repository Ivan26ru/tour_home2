<?php
$mailto = "example@mail.com";
$charset = "windows-1251";
$subject = "Reserve a table";
$content = "text/plain";
$message = " Name: ";
$message .= $_POST['posName'];
$message .= "\n Phone Number: ";
$message .= $_POST['posTel'];
$message .= "\n Date: ";
$message .= $_POST['posDen'];
$message .= "\n Time: ";
$message .= $_POST['posVremy'];
$message .= "\n Table number: ";
$message .= $_POST['table'];
$statusError = "";
$statusSuccess = "";
$errors_name = 'Enter your name';
$errors_tel  = 'Enter your phone number';
$errors_den = 'Enter the reservation date';
$errors_vremy = 'Enter the time of reservation ';
$errors_subject = 'Enter the subject of your message';
$captcha_error = 'Check that you entered the security code';
$send = 'Your message has been sent successfully';
?>
