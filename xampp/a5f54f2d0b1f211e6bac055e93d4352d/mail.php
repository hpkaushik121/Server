<?php
if(isset($_GET['id'])){
  if(isset($_GET['msg'])){$mail = $_GET['msg'];}
$hostname = '{mail.ipuniversity.tk:143/novalidate-cert}'.$mail;
$username = base64_decode(base64_decode(base64_decode(base64_decode($_SESSION['created_email']))));
$password = base64_decode(base64_decode(base64_decode(base64_decode($_SESSION['created_email_pass']))));

/* try to connect */
$inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());

/* grab emails */
$emails = imap_search($inbox,'ALL');

/* if emails are returned, cycle through each... */
if($emails) {

  /* begin output var */
  $output = '';

  /* put the newest emails on top */
  rsort($emails);
$arr= $_GET['id'];
$pieces = explode(",", $arr);
foreach ($pieces as $str) {
  imap_delete($inbox, $str);
  imap_expunge($inbox);
}

}imap_close($inbox);
header('Location: message.php?del=true');
}
?>
