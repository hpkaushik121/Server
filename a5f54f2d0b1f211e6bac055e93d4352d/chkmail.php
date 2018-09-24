<?php
$authhost="{mail.ipuniversity.tk}SENT";

$user = base64_decode(base64_decode(base64_decode(base64_decode($_SESSION['created_email']))));
$pass = base64_decode(base64_decode(base64_decode(base64_decode($_SESSION['created_email_pass']))));

if ($mbox=imap_open( $authhost, $user, $pass))
{
    $dmy=date("d-M-Y H:i:s");



    $msg = ("From:".$to." \r\n"
        . "To: ".$message."\r\n"
        . "Date: ".$dmy."\r\n"
        . "Subject: This is the subject\r\n");

    imap_append($mbox,$authhost,$msg);

    imap_close($mbox);
}
else
{
    echo "<h1>FAIL!</h1>\n";
}
?>
