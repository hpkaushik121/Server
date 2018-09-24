<?php
$response["message"]="null";
$response["status"]="null";
try{

$val=json_decode(file_get_contents('php://input'), true);

if(array_key_exists("user",$val) && array_key_exists("token",$val)){
$user = $val["user"];
  $token = $val["token"];

if($user!="" && $token!=""){
  $conn = mysqli_connect('localhost','root','Skaushik8@','xmpp');
  if(!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  		echo "fadf";
  }else{
    $sql = "SELECT * FROM token WHERE user='$user' ";
    $result = mysqli_query( $conn, $sql );
    if (mysqli_num_rows($result) > 0)
                         {
                         $sql = "UPDATE token SET token='$token' WHERE user=$user";

if ($conn->query($sql) === TRUE) {
    $response["message"]="success";
$response["status"]="0";
} else {
    $response["message"]="db connection failur";
$response["status"]="-1";
} 
}else{
    $sql = "INSERT INTO token (user,token) VALUES ('$user','$token')";
    $result = mysqli_query( $conn, $sql );
    if ($result)
       {
        $response["message"]="success";
$response["status"]="0";

  }else{
    $response["message"]="db connection failur";
$response["status"]="-1";
  }
  }

}
}else{
	$response["message"]="failed to get data";
$response["status"]="-1";
}
}
}catch(Exception $e){
	$response["message"]=$e;
$response["status"]="-1";
}
print_r (json_encode($response));
 ?>
