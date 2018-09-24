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
$dirPath=$_GET['folderPath'];

  $conn = mysqli_connect('localhost','root','Skaushik8@','root');
  if(!$conn) {
    
  		echo "Connection failed";
  }else{
	  if(filter_var(gethostbyname($_GET['addr']), FILTER_VALIDATE_IP))
{
    $sql = "SELECT * FROM linkdomains WHERE linked_domains='$domain'";
    $result = mysqli_query( $conn, $sql );
    if (mysqli_num_rows($result) > 0)
                         {
                           echo "domain already exists";
}else{
	$time=time();
    $sql = "INSERT INTO linkdomains (username,user_id,linked_domains,date,directory_path) VALUES ('$user','$id','$domain','$time','$dirPath')";
    $result = mysqli_query( $conn, $sql );
    if ($result)
       {
		   
		   $file= file_get_contents('../apache/conf/extra/httpd-vhosts.conf', FILE_USE_INCLUDE_PATH);
 
   
$pattern = preg_quote($_GET['addr'], '/');
// finalise the regular expression, matching the whole line
$pattern = "/^.*$pattern.*\$/m";
// search, and store all matching occurences in $matches
if(preg_match_all($pattern, $file, $matches)){
   echo "domain already exists";
}
else{
	if (!file_exists("C:/xampp/9f4924d0c56a0aef0b28c0fd877c240a/".$_GET['folderPath'])) {
		mkdir('C:/xampp/9f4924d0c56a0aef0b28c0fd877c240a/'.$_GET['folderPath'], 0777, true);
		
		
	}
	$editted= $file."\n \n <VirtualHost *:80>
    
    DocumentRoot \"C:/xampp/9f4924d0c56a0aef0b28c0fd877c240a/".$_GET['folderPath']."/\"
    ServerName ".$_GET['addr']."
ServerAlias www.".$_GET['addr']. "  \n
  ErrorLog \"logs/dummy-host.example.com-error.log\"
    CustomLog \"logs/dummy-host.example.com-access.log\" common
 
</VirtualHost>";

file_put_contents('../apache/conf/extra/httpd-vhosts.conf', $editted);
echo $domain." successfully added";
}

	   }else{
    echo "something went wrong";
  }}
}else{
	echo "domain is not valid";

        

  }
  }
}else{
	  
	  echo "something went wrong";
  }

?>