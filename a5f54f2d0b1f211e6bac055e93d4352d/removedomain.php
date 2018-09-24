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

  $conn = mysqli_connect('localhost','root','Skaushik8@','root');
  if(!$conn) {
    
  		echo "Connection failed";
  }else{
	  if(filter_var(gethostbyname($_GET['addr']), FILTER_VALIDATE_IP))
{
    $sql = "SELECT * FROM linkdomains WHERE linked_domains='$domain'";
    $result1 = mysqli_query( $conn, $sql );
    if (mysqli_num_rows($result1) > 0)
                         {
							 
							 $sql = "DELETE FROM linkdomains WHERE username = '$user' AND linked_domains='$domain'" ;
							 $result = mysqli_query( $conn, $sql );
    if ($result)
       {
		   
		   $file= file_get_contents('../apache/conf/extra/httpd-vhosts.conf', FILE_USE_INCLUDE_PATH);
 $row=mysqli_fetch_assoc($result1);
   
$pattern = preg_quote($_GET['addr'], '/');
// finalise the regular expression, matching the whole line
$pattern = "/^.*$pattern.*\$/m";
// search, and store all matching occurences in $matches
if(preg_match_all($pattern, $file, $matches)){
 
 
 $contents = $file;

$line="<VirtualHost *:80>
    
    DocumentRoot \"C:/xampp/9f4924d0c56a0aef0b28c0fd877c240a/".$row['directory_path']."/\"
    ServerName ".$_GET['addr']."
ServerAlias www.".$_GET['addr']. "  \n
  ErrorLog \"logs/dummy-host.example.com-error.log\"
    CustomLog \"logs/dummy-host.example.com-access.log\" common
 
</VirtualHost>";

$contents = str_replace($line, '', $contents);
file_put_contents('../apache/conf/extra/httpd-vhosts.conf', $contents);
echo $domain." successfully deleted";
}
else{
	echo "domain does not exists";
}

	   }else{
    echo "something went wrong";
  }
                          
}else{
   /* $sql = "INSERT INTO linkdomains (username,user_id,linked_domains) VALUES ('$user','$id','$domain')";
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
	$editted= $file."\n \n <VirtualHost *:80>
    
    DocumentRoot \"C:/xampp/9f4924d0c56a0aef0b28c0fd877c240a/ibuilt\"
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
  }}*/
  echo "domain does not exists";
}
  }else{
	echo "domain is not valid";

        

  }
}

}else{
	  
	  echo "Domain is not set";
  }

?>