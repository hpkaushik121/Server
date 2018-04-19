<?php
$a=base64_decode(base64_decode(base64_decode(base64_decode($_GET['username']))));
if (!file_exists($a)) {
    mkdir($a, 0777, true);
	//user creation in pmail.usr
$f=file_get_contents("PMAIL.USR");
$q=fopen("PMAIL.USR","w");
$b=base64_decode(base64_decode(base64_decode(base64_decode($_GET['publicname']))));
$g="\nU;".$a.";".$b;
$h=$f.$g;
fwrite($q,$h);
fclose($q);
//file creation for new user
$password=base64_decode(base64_decode(base64_decode(base64_decode($_GET['pass']))));
$p=fopen($a.'/PASSWD.PM',"w");
$l=file_get_contents($a.'/PASSWD.PM');

$txt="# Mercury/32 User Information File
POP3_access: ".$password."
APOP_secret:
";
fwrite($p,$txt);
fclose($p);
header('Location: ' . $_SERVER['HTTP_REFERER'].'?msg='.base64_encode(base64_encode(base64_encode(base64_encode('success')))));
}
else{header('Location: ' . $_SERVER['HTTP_REFERER'].'?msg='.base64_encode(base64_encode(base64_encode(base64_encode('failed')))));}



?>
