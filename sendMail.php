<?php

require 'require/PHPMailer/PHPMailerAutoload.php';
include 'require/messages.php';

function sendWelcomeEmail($redirectActivationURL, $toEmail, $fullName, $firstName) {
    $email_welcome = "<html><head><meta http-equiv=\"Content-Type\" content=\"text/html;\"></head><body style=\"background: #f1f1f1; padding: 20px\" bgcolor=\"#f1f1f1\"><table class=\"main\" style=\"background: #fff; border: 1px solid #e1e1e1; width: 560px\" bgcolor=\"#fff\"><tr><td><p style=\"color: #494848; font-family: 'Open Sans','Helvetica Neue',sans-serif; font-size: 13px; font-weight: 400; margin: 15px; width: 522px\">Hi $firstName,</p><p style=\"color: #494848; font-family: 'Open Sans','Helvetica Neue',sans-serif; font-size: 13px; font-weight: 400; margin: 15px; width: 522px\">Welcome to KDUMOOC! We hope that you would enjoy the services of the trending Massive Open Online Course Provider in Sri Lanka. Wish that you have a fulfilling journey with us. </p><p style=\"color: #494848; font-family: 'Open Sans','Helvetica Neue',sans-serif; font-size: 13px; font-weight: 400; margin: 15px; width: 522px\">Your account has been created, but will not be accessible until you activate it. To do so please visit <a href=\"" . $redirectActivationURL . "\">" . $redirectActivationURL . "</a></p><p style=\"color: #494848; font-family: 'Open Sans','Helvetica Neue',sans-serif; font-size: 13px; font-weight: 400; margin: 15px; width: 522px\">Thanks,<br>KDUMOOC Team</p></td></tr></table><p class=\"footer\" style=\"color: #777; font-family: 'Open Sans','Helvetica Neue',sans-serif; font-size: 11px; font-weight: 400; margin: 15px 0; width: 560px\">&copy; 2015 - KDUMOOC Team. General Sir John Kotelawala Defence University, Sri Lanka. </p></body></html>";
    $mail = new PHPMailer;
    $mail->SMTPDebug = 0;                               // Enable verbose debug output
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = '4x8x12@gmail.com';                 // SMTP username
    $mail->Password = 'pin.cs31';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to 465

    $mail->setFrom('support@kdumooc.com', 'KDUMOOC Support Team');
    $mail->addAddress($toEmail, $fullName);     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('support@kdumooc.com', 'KDUMOOC Support Team');
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Welcome to KDUMOOC';
    $mail->Body = $email_welcome;
    $mail->AltBody = 'This is the account activation email sent from KDUMOOC.';

    if (!$mail->send()) {
        //echo 'Message could not be sent.';
        //echo 'Mailer Error: ' . $mail->ErrorInfo;
        return false;
    } else {
        return true;
        //echo 'Message has been sent';
    }
}

//sendWelcomeEmail("http://52.4.192.228/kdumooc/", "scgcreations@gmail.com", "Sidath Gajanayaka", "Saman");

