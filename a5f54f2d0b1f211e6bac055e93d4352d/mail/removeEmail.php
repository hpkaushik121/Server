<?php 
session_start();
if(isset($_GET['addr'])){
if(!isset($_SESSION['username']) ||!isset($_SESSION['password'])||!isset($_SESSION['password'])){
  header("Location:/cpanel");
}
$user=$_SESSION['username'];
$pass=$_SESSION['password'];
$id= base64_decode(base64_decode(base64_decode(base64_decode($_SESSION['id']))));
$domain=$_GET['addr'];
$password=base64_decode(base64_decode(base64_decode(base64_decode($_GET['pass']))));
$emailid=$_GET['domain'];

  $conn = mysqli_connect('localhost','root','Skaushik8@','root');
  if(!$conn) {
    
  		echo "Connection failed";
  }else{
	
    $sql = "SELECT * FROM created_emails WHERE user='$user'";
    $result = mysqli_query( $conn, $sql );
    if (mysqli_num_rows($result) > 0)
                         {
							  
							 $sql = "DELETE FROM created_emails WHERE user = '$user' AND created_email='$emailid'" ;
							 $result = mysqli_query( $conn, $sql );
    if ($result)
       {
		   
		   $dir = 'C:/xampp/MercuryMail/MAIL/'.$_GET['addr'];

deleteDir($dir);
		   
		   $file= file_get_contents('C:/xampp/MercuryMail/MAIL/PMAIL.USR', FILE_USE_INCLUDE_PATH);
 
  
$pattern = preg_quote($domain, '/');
// finalise the regular expression, matching the whole line
$pattern = "/^.*$pattern.*\$/m";
// search, and store all matching occurences in $matches
if(preg_match_all($pattern, $file, $matches)){
 
 
 $contents = $file;

$line="\nU;".$_GET['addr'].";".$_GET['publicname'];

$contents = str_replace($line, '', $contents);
file_put_contents('C:/xampp/MercuryMail/MAIL/PMAIL.USR', $contents);
echo $emailid." successfully deleted";
shell_exec("start /b C:/xampp/mercury_restart.bat");

}
else{
	echo "domain does not exists";
}

	   }else{
    echo "something went wrong";
  }
                          
}else{

  echo "domain does not exists";
}
  
}

}else{
	  
	  echo "Domain is not set";
  }
 function deleteDir($dirPath) {
    if (! is_dir($dirPath)) {
        throw new InvalidArgumentException("$dirPath must be a directory");
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            self::deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
}
?>