<?php
session_start();
if(isset($_GET['r'])){
$name = 'sourabh';
$email =  base64_decode(base64_decode(base64_decode(base64_decode($_SESSION['created_email']))));
$subject = $_GET['subject'];
$message = $_GET['r'];
$to = $_GET['to'];
$headers = 'From: '.$email."\r\n" .
        'Reply-To: '.$to."\r\n" .
        'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers, "From: " . $name);

$authhost="{mail.ipuniversity.tk}SENT";

$user= base64_decode(base64_decode(base64_decode(base64_decode($_SESSION['created_email']))));
$pass = base64_decode(base64_decode(base64_decode(base64_decode($_SESSION['created_email_pass']))));

if ($mbox=imap_open( $authhost, $user, $pass))
{
    $dmy=date("d-M-Y H:i:s");



    $msg = ("From:".$to." \r\n"
        . "To: ".$message."\r\n"
        . "Date: ".$dmy."\r\n"
        . "Subject: ".$subject."\r\n");

    imap_append($mbox,$authhost,$msg);

    imap_close($mbox);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}else{
    echo "<h1>FAILED! to </h1>\n";
}
}else{
    echo "<h1>FAILED! to send mail</h1>\n";
}

?>
