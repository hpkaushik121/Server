<?php
session_start();
define( '_VALID_MOS', 1 );
define( '_VALID_EXT', 1 );

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

		
if(isset($_SESSION['user']) && isset($_SESSION['fullname_'])&& isset($_SESSION['email_'])
	&& isset($_GET['domain']) ){
		
	
		
		
		
		
		
	$username=base64_decode(base64_decode(base64_decode(base64_decode($_SESSION['user']))));
$password=md5(uniqid(rand()."t".time(), true));
$publicname=base64_decode(base64_decode(base64_decode(base64_decode( $_SESSION['fullname_']))));
$emailId=base64_decode(base64_decode(base64_decode(base64_decode( $_SESSION['email_']))));
require_once( dirname(__FILE__).'/libraries/standalone.php');
//ob_start();
include( dirname(__FILE__).'/admin.extplorer.php' );
require_once( 'libraries/PasswordHash.php');
createUser($username,$password,$publicname,$emailId);


}else{
	echo "<html>
 <head>
 
 </head>
 <style>
 


/* Helpers 
====================== */
.u-imgResponsive {
    max-width: 100%;
}
.u-btn {
    flex: 0 0 100%;
    padding: 14px 20px;
    border: 0;
    background: linear-gradient(to top, rgba(255,255,255,0) 0%, rgba(250,198,100,.27) 100%), rgba(41, 118, 223, 1);
    border-radius: 25px;
    color: #fff;
    font-size: 18px;
    letter-spacing: 1px;
    transition: all .2s ease;
    @include btn-shadow(rgba(41, 118, 223, .5));
    
    &:hover {
        opacity: 0.9;
    }
    &.u-btn--success {
        background: rgba(0,208,0,1);
        @include btn-shadow(rgba(0,208,0,.5));
    }
}

/* Global 
====================== */
html {
    box-sizing: border-box;
    height: 100%;
    
    *,
    *:before
    *:after {
        // Paul Irish technique
        box-sizing: inherit;
    }
}
body {
    font-family: \"Proxima Nova Soft Semibold\", \"Proxima Nova\", 'Helvetica Neue', Helvetica, Arial;
}
body,
.wrapper {
    min-height: 100vh;
}

/* Modal 
====================== */
.wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    background: url(https://dl.dropboxusercontent.com/s/v3m6p0p5kq6xzkz/100daysui_100bg.png) no-repeat, #303540;
    background-size: cover;
}
.modal {
    width: 100%;
    max-width: 530px;
    margin: 20px;
    overflow: hidden;
    box-shadow: 0 60px 80px 0 rgba(0,0,0,.4);
}
.modal-top {
    padding: 30px 30px 20px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    background: rgba(251,251,251,1);
}
.modal-icon {
    display: block;
    max-width: 207px;
    margin: 0 auto 65px;
}
.modal-header {
    margin-bottom: 10px;
    font-size: 25.5px;
    letter-spacing: 2px;
    text-align: center;
}
.modal-subheader {
    max-width: 350px;
    margin: 0 auto;
    font-size: 19px;
    line-height: 1.3;
    letter-spacing: 1.25px;
    text-align: center;
    color: #999;
}
.modal-bottom {
    display: flex;
    flex-wrap: wrap;
    padding: 15px 55px;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    background: #fff;
}
.modal-btn {
    margin: 10px auto;
}

/* Media Queries */
@media (min-width: 456px) {

    .modal-top {
        padding: 69px 0 65px;
    }
    .modal-bottom {
        padding: 30px 60px;
    }
    .modal-btn {
        flex: 1;
        margin: 0;
        max-width: 190px;
        
        &:nth-of-type(2) {
            margin-left: 30px;
        }
    }
}
 
 </style>
 <body>
 
 <div class=\"wrapper\">
    <div class=\"modal modal--congratulations\">
        <div class=\"modal-top\">
            <img class=\"modal-icon u-imgResponsive\" src=\"https://www.hickorytraining.com/wp-content/uploads/2017/01/Fail-Stamp.png\" alt=\"Trophy\" />
            <div class=\"modal-header\">ERROR</div>
            <div class=\"modal-subheader\">Something went wrong</div>
        </div>
        <div class=\"modal-bottom\">
          
            <button style=\"margin:auto;\" class=\"modal-btn u-btn u-btn--success\" onclick=\"redirect();\">Go Back</button>
        </div>
    </div>
</div>
 </body>
 
 <script>
 
 function redirect(){
	 window.location.href=\"https://iserv.tech\";
	 
 }
 </script>
 
 
 </html>";

}
function createUser($username,$password,$publicname,$emailId){
	
	

if (!file_exists("C:/xampp/9f4924d0c56a0aef0b28c0fd877c240a/".$username)) {
		mkdir('C:/xampp/9f4924d0c56a0aef0b28c0fd877c240a/'.$username, 0777, true);
		
		
	}
	
	$data=array($username,extEncodePassword(stripslashes($password)),
    stripslashes('C:/xampp/9f4924d0c56a0aef0b28c0fd877c240a/'.$username),stripslashes('http://localhost'),'0','','3',1);
   ext_add_user($data);
   
   $link = mysqli_connect("localhost", "root", "Skaushik8@","root");
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
		
}else{

$query="SELECT * FROM user WHERE username='$username'";
$res=mysqli_query($link,$query);
if(mysqli_num_rows($res)==0){
$domain=$_GET['domain'];
$dbusername=$username."_user";
//CREATE USER 'username'@'localhost' IDENTIFIED BY 'password'
			$sql = "INSERT INTO  user (username,password,created_email,created_email_pass,
			file_user,file_pass,db_user,db_pass,package,default_domain) VALUES ('$username','$password','master@iserv.tech','master','$username','$password','$dbusername','$password','','$domain')";
			$result = mysqli_query($link, $sql);
			if($result){
				createDB("localhost", "root", "Skaushik8@",$username,$password,$publicname,$emailId);
			}
			
}else{
	echo "
	</div><html>
 <head>
 
 </head>
 <style>
 


/* Helpers 
====================== */
.u-imgResponsive {
    max-width: 100%;
}
.u-btn {
    flex: 0 0 100%;
    padding: 14px 20px;
    border: 0;
    background: linear-gradient(to top, rgba(255,255,255,0) 0%, rgba(250,198,100,.27) 100%), rgba(41, 118, 223, 1);
    border-radius: 25px;
    color: #fff;
    font-size: 18px;
    letter-spacing: 1px;
    transition: all .2s ease;
    @include btn-shadow(rgba(41, 118, 223, .5));
    
    &:hover {
        opacity: 0.9;
    }
    &.u-btn--success {
        background: rgba(0,208,0,1);
        @include btn-shadow(rgba(0,208,0,.5));
    }
}

/* Global 
====================== */
html {
    box-sizing: border-box;
    height: 100%;
    
    *,
    *:before
    *:after {
        // Paul Irish technique
        box-sizing: inherit;
    }
}
body {
    font-family: \"Proxima Nova Soft Semibold\", \"Proxima Nova\", 'Helvetica Neue', Helvetica, Arial;
}
body,
.wrapper {
    min-height: 100vh;
}

/* Modal 
====================== */
.wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    background: url(https://dl.dropboxusercontent.com/s/v3m6p0p5kq6xzkz/100daysui_100bg.png) no-repeat, #303540;
    background-size: cover;
}
.modal {
    width: 100%;
    max-width: 530px;
    margin: 20px;
    overflow: hidden;
    box-shadow: 0 60px 80px 0 rgba(0,0,0,.4);
}
.modal-top {
    padding: 30px 30px 20px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    background: rgba(251,251,251,1);
}
.modal-icon {
    display: block;
    max-width: 207px;
    margin: 0 auto 65px;
}
.modal-header {
    margin-bottom: 10px;
    font-size: 25.5px;
    letter-spacing: 2px;
    text-align: center;
}
.modal-subheader {
    max-width: 350px;
    margin: 0 auto;
    font-size: 19px;
    line-height: 1.3;
    letter-spacing: 1.25px;
    text-align: center;
    color: #999;
}
.modal-bottom {
    display: flex;
    flex-wrap: wrap;
    padding: 15px 55px;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    background: #fff;
}
.modal-btn {
    margin: 10px auto;
}

/* Media Queries */
@media (min-width: 456px) {

    .modal-top {
        padding: 69px 0 65px;
    }
    .modal-bottom {
        padding: 30px 60px;
    }
    .modal-btn {
        flex: 1;
        margin: 0;
        max-width: 190px;
        
        &:nth-of-type(2) {
            margin-left: 30px;
        }
    }
}
 
 </style>
 <body>
 
 <div class=\"wrapper\">
    <div class=\"modal modal--congratulations\">
        <div class=\"modal-top\">
            <img class=\"modal-icon u-imgResponsive\" src=\"https://www.hickorytraining.com/wp-content/uploads/2017/01/Fail-Stamp.png\" alt=\"Trophy\" />
            <div class=\"modal-header\">ERROR</div>
            <div class=\"modal-subheader\">Something went wrong</div>
        </div>
        <div class=\"modal-bottom\">
          
            <button style=\"margin:auto;\" class=\"modal-btn u-btn u-btn--success\" onclick=\"redirect();\">Go Back</button>
        </div>
    </div>
</div>
 </body>
 
 <script>
 
 function redirect(){
	 window.location.href=\"https://iserv.tech\";
	 
 }
 </script>
 
 
 </html>";
}
}
}
	function sendmail($publicname,$emailId,$username,$password){
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
    $mail->addAddress($emailId, '');     // Add a recipient
    $mail->addAddress($emailId);               // Name is optional
    $mail->addReplyTo('master@iserv.tech', 'master');
  //  $mail->addCC('cc@example.com');
  //  $mail->addBCC('bcc@example.com');

    //Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
  //  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Order completed successfully';
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
        <div class="para" style="margin-top:5%;font-style:bold;">Dear,'.$publicname.'
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
          Username:  <b>'.$username.'</b>
          <div style="width:100%;height:10px;"></div>
          Password:  <b>'.$password.'</b>
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
</html>';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
	
   	echo " <html>
 <head>
 
 </head>
 <style>
 


/* Helpers 
====================== */
.u-imgResponsive {
    max-width: 100%;
}
.u-btn {
    flex: 0 0 100%;
    padding: 14px 20px;
    border: 0;
    background: linear-gradient(to top, rgba(255,255,255,0) 0%, rgba(250,198,100,.27) 100%), rgba(41, 118, 223, 1);
    border-radius: 25px;
    color: #fff;
    font-size: 18px;
    letter-spacing: 1px;
    transition: all .2s ease;
    @include btn-shadow(rgba(41, 118, 223, .5));
    
    &:hover {
        opacity: 0.9;
    }
    &.u-btn--success {
        background: rgba(0,208,0,1);
        @include btn-shadow(rgba(0,208,0,.5));
    }
}

/* Global 
====================== */
html {
    box-sizing: border-box;
    height: 100%;
    
    *,
    *:before
    *:after {
        // Paul Irish technique
        box-sizing: inherit;
    }
}
body {
    font-family: \"Proxima Nova Soft Semibold\", \"Proxima Nova\", 'Helvetica Neue', Helvetica, Arial;
}
body,
.wrapper {
    min-height: 100vh;
}

/* Modal 
====================== */
.wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    background: url(https://dl.dropboxusercontent.com/s/v3m6p0p5kq6xzkz/100daysui_100bg.png) no-repeat, #303540;
    background-size: cover;
}
.modal {
    width: 100%;
    max-width: 530px;
    margin: 20px;
    overflow: hidden;
    box-shadow: 0 60px 80px 0 rgba(0,0,0,.4);
}
.modal-top {
    padding: 30px 30px 20px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    background: rgba(251,251,251,1);
}
.modal-icon {
    display: block;
    max-width: 207px;
    margin: 0 auto 65px;
}
.modal-header {
    margin-bottom: 10px;
    font-size: 25.5px;
    letter-spacing: 2px;
    text-align: center;
}
.modal-subheader {
    max-width: 350px;
    margin: 0 auto;
    font-size: 19px;
    line-height: 1.3;
    letter-spacing: 1.25px;
    text-align: center;
    color: #999;
}
.modal-bottom {
    display: flex;
    flex-wrap: wrap;
    padding: 15px 55px;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    background: #fff;
}
.modal-btn {
    margin: 10px auto;
}

/* Media Queries */
@media (min-width: 456px) {

    .modal-top {
        padding: 69px 0 65px;
    }
    .modal-bottom {
        padding: 30px 60px;
    }
    .modal-btn {
        flex: 1;
        margin: 0;
        max-width: 190px;
        
        &:nth-of-type(2) {
            margin-left: 30px;
        }
    }
}
 
 </style>
 <body>
 
 <div class=\"wrapper\">
    <div class=\"modal modal--congratulations\">
        <div class=\"modal-top\">
            <img class=\"modal-icon u-imgResponsive\" src=\"https://dl.dropboxusercontent.com/s/e1t2hhowjcrs7f5/100daysui_100icon.png\" alt=\"Trophy\" />
            <div class=\"modal-header\">Congratulations</div>
            <div class=\"modal-subheader\">Order is completed successfully kindly check your email for login credentials</div>
        </div>
        <div class=\"modal-bottom\">
            <button class=\"modal-btn u-btn u-btn--share\">Share</button>
            <button class=\"modal-btn u-btn u-btn--success\">Have a beer</button>
        </div>
    </div>
</div>
 </body>
 
 
 </html>
";
		
} catch (Exception $e) {
	
	echo"
	<html>
	<
	head>
 
 </head>
 <style>
 


/* Helpers 
====================== */
.u-imgResponsive {
    max-width: 100%;
}
.u-btn {
    flex: 0 0 100%;
    padding: 14px 20px;
    border: 0;
    background: linear-gradient(to top, rgba(255,255,255,0) 0%, rgba(250,198,100,.27) 100%), rgba(41, 118, 223, 1);
    border-radius: 25px;
    color: #fff;
    font-size: 18px;
    letter-spacing: 1px;
    transition: all .2s ease;
    @include btn-shadow(rgba(41, 118, 223, .5));
    
    &:hover {
        opacity: 0.9;
    }
    &.u-btn--success {
        background: rgba(0,208,0,1);
        @include btn-shadow(rgba(0,208,0,.5));
    }
}

/* Global 
====================== */
html {
    box-sizing: border-box;
    height: 100%;
    
    *,
    *:before
    *:after {
        // Paul Irish technique
        box-sizing: inherit;
    }
}
body {
    font-family: \"Proxima Nova Soft Semibold\", \"Proxima Nova\", 'Helvetica Neue', Helvetica, Arial;
}
body,
.wrapper {
    min-height: 100vh;
}

/* Modal 
====================== */
.wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    background: url(https://dl.dropboxusercontent.com/s/v3m6p0p5kq6xzkz/100daysui_100bg.png) no-repeat, #303540;
    background-size: cover;
}
.modal {
    width: 100%;
    max-width: 530px;
    margin: 20px;
    overflow: hidden;
    box-shadow: 0 60px 80px 0 rgba(0,0,0,.4);
}
.modal-top {
    padding: 30px 30px 20px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    background: rgba(251,251,251,1);
}
.modal-icon {
    display: block;
    max-width: 207px;
    margin: 0 auto 65px;
}
.modal-header {
    margin-bottom: 10px;
    font-size: 25.5px;
    letter-spacing: 2px;
    text-align: center;
}
.modal-subheader {
    max-width: 350px;
    margin: 0 auto;
    font-size: 19px;
    line-height: 1.3;
    letter-spacing: 1.25px;
    text-align: center;
    color: #999;
}
.modal-bottom {
    display: flex;
    flex-wrap: wrap;
    padding: 15px 55px;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    background: #fff;
}
.modal-btn {
    margin: 10px auto;
}

/* Media Queries */
@media (min-width: 456px) {

    .modal-top {
        padding: 69px 0 65px;
    }
    .modal-bottom {
        padding: 30px 60px;
    }
    .modal-btn {
        flex: 1;
        margin: 0;
        max-width: 190px;
        
        &:nth-of-type(2) {
            margin-left: 30px;
        }
    }
}
 
 </style>
 <body>
 
 <div class=\"wrapper\">
    <div class=\"modal modal--congratulations\">
        <div class=\"modal-top\">
            <img class=\"modal-icon u-imgResponsive\" src=\"https://www.hickorytraining.com/wp-content/uploads/2017/01/Fail-Stamp.png\" alt=\"Trophy\" />
            <div class=\"modal-header\">ERROR</div>
            <div class=\"modal-subheader\">Something went wrong: ".$mail->ErrorInfo."</div>
        </div>
        <div class=\"modal-bottom\">
           
            <button style=\"margin:auto;\" class=\"modal-btn u-btn u-btn--success\" onclick=\"redirect();\">Go Back</button>
        </div>
    </div>
</div>
 </body>
 
 <script>
 
 function redirect(){
	 window.location.href=\"https://iserv.tech\";
	 
 }
 </script>
 </html>";
  
}


	}
function createDB($servername,$serverusername,$serverpassword,$dbName,$privilege_passwd,$publicname,$emailId){
	
	
	
	$link = mysqli_connect($servername, $serverusername, $serverpassword);
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
		
}else{

//CREATE USER 'username'@'localhost' IDENTIFIED BY 'password'
			$sql = "CREATE USER '" . $dbName . "_user'@'localhost' IDENTIFIED BY '" . $privilege_passwd."'";
			$result = mysqli_query($link, $sql);
			if (!$result)
			{
				$error = 'Error in creating new user.';
				echo $error;
				exit();
			}
			$sql = "CREATE DATABASE ".$dbName;
			$result = mysqli_query($link,$sql);
			if (!$result)
			{
				$error = 'Error ';
				echo $error;
				exit();
			}
		// grant privileges
			$sql = "GRANT ALL PRIVILEGES ON ".$dbName.".* TO '".$dbName."_user'@'localhost'";
			$result = mysqli_query($link, $sql);
			if (!$result)
			{
				$error = 'Error in granting privileges to new user.';
				echo $error;
				exit();
			}
			sendmail($publicname,$emailId,$dbName,$privilege_passwd);
}
}

 ?>
 
 
