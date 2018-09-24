<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'C:/Users/geetika/vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.iserv.tech';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'master@iserv.tech';                 // SMTP username
    $mail->Password = 'TpaRQ$C7';                           // SMTP password
   // $mail->SMTPSecure = 'STARTTLS';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
	$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

    //Recipients
    $mail->setFrom('master@iserv.tech', 'master');
    $mail->addAddress('hpkaushik121@gmail.com', '');     // Add a recipient
    $mail->addAddress('hpkaushik121@gmail.com');               // Name is optional
    $mail->addReplyTo('master@iserv.tech', 'master');
  //  $mail->addCC('cc@example.com');
  //  $mail->addBCC('bcc@example.com');

    //Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
  //  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
<html>
  <head>
    
  </head>
  <body style="background-color:#f4f4f4; margin:0;">
    <div class="topOrange" style="z-index:-100;width:100%;height:30%;background-color:#eea637; ">
	<img style="margin-left:30px; margin-top:30px; float:left; " src="http://iserv.tech/assets/images/sitelogo.png" width="100"/>
	<div style="float:right; margin:30px;">
	<p style="float:right;">24/7 Support: +917838941249</p>
	 <p>
<p style="float:right; margin-top:-10px;">Mail us   — info@iserv.tech</p>


	
	</div>
 
         </div>
    <div class="bigContainer" style="border-radius:5px;width:100%;height:auto;">
	<div style="width:100%;height:10px;"></div>
          <div style="width:100%;height:10px;"></div>
      <div class="container" style="padding:50px;margin:auto;word-wrap:break-word;border-radius:5px;background-color:#ffffff;width:60%;height:auto;">
        <div class="heading" style="text-align:center;width:100%;"><h1>Welcome!</h1></div>
        <div class="para" style="margin-top:5%;font-style:bold;">Dear, name of user
          <div style="width:100%;height:10px;"></div>
          <div style="width:100%;height:10px;"></div>
                       Congratulations, Your order is successfully completed .
          <div style="width:100%;height:10px;"></div>
          <div style="width:100%;height:10px;"></div>
          we\'re  excited to have you get started, your login credential are given below.
 keep these credentials safe: </div>
        <div style="width:100%;height:10px;"></div>
        <div class="para" style="margin-top:5%;font-style:bold;">
          This applies to the following domain(s):
          <div style="width:100%;height:10px;"></div>
          <a href="#"><b>Domain.com</b></a>
        </div>
        <div style="width:100%;height:10px;"></div>
        <div style="width:100%;height:10px;"></div>
        <div class="midPara" style="widht:100%;">
          Username:  <b>ifasoidjfoijasjdfjiasjdifaosdfia</b>
          <div style="width:100%;height:10px;"></div>
          Password:  <b>ajsdfjiajsdoifjaijsdifjajsidfiajs</b>
        </div>
        <div style="width:100%;height:10px;"></div>
        <div style="width:100%;height:10px;"></div>
        <div style="width:100%;height:10px;"></div>
        <div style="width:100%; text-align:center; margin:auto;">
          <a class="btn" href="#" style="background:#eea637;color:#fff;text-decoration:none;padding:12px;border-radius:6px;">CLICK TO LOGIN</a>
        </div>
        <div style="width:100%;height:10px;"></div>
        <div style="width:100%;height:10px;"></div>
        <div class="para" style="margin-top:5%;font-style:bold;">
          If this change was made in error or fraudulently, please contact us at <a href="mailto:info@iserv.tech">info@iserv.tech</a>
        </div>
      </div>
    </div>
    <div style="width:100%;height:10px;"></div>
    <div style="width:100%;height:10px;"></div>
    <div style="width:100%;  background-color:#e8eae8;">
      <div style="width:100%;height:10px;"></div>
      <div style="width:100%;height:10px;"></div>
      <div style="width:100%;height:10px;"></div>
      <div style="width:50%; margin:auto">
        *<a href="https://iserv.tech/terms">Terms and Conditions</a>
        <div style="width:100%;height:10px;"></div>
        <div style="width:100%;height:10px;"></div>
        Please do not reply to this email. Emails sent to this address will not be answered.
        <div style="width:100%;height:10px;"></div>
        <div style="width:100%;height:10px;"></div>
        Copyright © 2017-2018 Iserv Operating Company, LLC. India. All rights reserved.
        <div style="width:100%;height:10px;"></div>
        <div style="width:100%;height:10px;"></div>
      </div>
    </div>
  </body>
</html>
';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

?>