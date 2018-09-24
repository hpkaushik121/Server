<?php
session_start();
if(!isset($_SESSION['username']) ||!isset($_SESSION['password'])||!isset($_SESSION['password'])){
  header("Location:/cpanel");
}
$user=$_SESSION['username'];
$pass=$_SESSION['password'];
$username=base64_decode(base64_decode(base64_decode(base64_decode($_GET['username']))));
$password=base64_decode(base64_decode(base64_decode(base64_decode($_GET['pass']))));
$publicname=base64_decode(base64_decode(base64_decode(base64_decode($_GET['publicname']))));
$domain=base64_decode(base64_decode(base64_decode(base64_decode($_GET['domain']))));
if (!file_exists("C:/xampp/MercuryMail/MAIL/".$username)) {
	$conn = mysqli_connect('localhost','root','Skaushik8@','root');
  if(!$conn) {
    
  		echo "we are facing some issue please contact us with this error code(1)";
  }else{
	  
	  $sql = "SELECT * FROM created_emails WHERE username='$user' AND created_email='$username@$domain'";
    $result = mysqli_query( $conn, $sql );
    if (mysqli_num_rows($result) > 0)
                         {
    
echo "we are facing some issue please contact us with this error code(2)";
  }else{
	  
	  $timestamp=time();
	  $email=$username."@".$domain;
	  $sql1 = "INSERT INTO created_emails (user,username,publicname,created_email,pass,timestamp) VALUES ('$user','$username','$publicname','$email','$password','$timestamp')";
    $result = mysqli_query( $conn, $sql1 );
    if ($result)
                         {
	  mkdir('C:/xampp/MercuryMail/MAIL/'.$username, 0777, true);
	//user creation in pmail.usr
$contentPMAIL=file_get_contents("C:/xampp/MercuryMail/MAIL/PMAIL.USR");
$filePMAIL=fopen("C:/xampp/MercuryMail/MAIL/PMAIL.USR","w");

$fileEdit="\nU;".$username.";".$publicname;
$totalFileContent=$contentPMAIL.$fileEdit;
fwrite($filePMAIL,$totalFileContent);
fclose($filePMAIL);
//file creation for new user

$passFile=fopen('C:/xampp/MercuryMail/MAIL/'.$username.'/PASSWD.PM',"w");

$passFileContent="# Mercury/32 User Information File
POP3_access: ".$password."
APOP_secret:
";
fwrite($passFile,$passFileContent);
fclose($passFile);
echo "$email";
shell_exec("start /b C:/xampp/mercury_restart.bat");
						 }else{
							 echo "something went wrong";
							 
						 }
  }
}
}else{
	
	echo "email already exists";
}

?>
