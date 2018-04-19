<?php

session_start();
if(isset($_SESSION['user']) && isset($_SESSION['pass'])){
 header("Location:/");

}

elseif(isset($_GET['username']) && $_GET['token']==$_SESSION['token'] ){
  $username = hash('sha256',base64_decode(base64_decode(base64_decode(base64_decode( $_GET['username'])))));
  $password = hash('sha256', base64_decode(base64_decode(base64_decode(base64_decode( $_GET['password'])))));
  $phone = $_GET['phone'];
    $fullname = $_GET['fullname'];
      $email = $_GET['email'];

  $conn = mysqli_connect('localhost','root','Skaushik8@','hostpots');
  if(!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  		echo "fadf";
  }else{
    $sql = "SELECT * FROM user WHERE username='$username' ";
    $result = mysqli_query( $conn, $sql );
    if (mysqli_num_rows($result) > 0)
                         {
                           $j= md5('username');
                           $m= md5('already exists');
header("Location: /register/?".$j."=".$m);
}else{
    $sql = "INSERT INTO user (username,password,phone_no,fullname,email) VALUES ('$username','$password','$phone','$fullname','$email')";
    $result = mysqli_query( $conn, $sql );
    if ($result)
       {
         $sql = "SELECT * FROM user WHERE username='$username' AND password='$password' ";
         $result = mysqli_query( $conn, $sql );
         if (mysqli_num_rows($result) > 0)
                              {
       $row = mysqli_fetch_assoc($result);
       $_SESSION['id_']=$row['id'];
     }
         $_SESSION['user']=$username;
         $_SESSION['fullname_']=$fullname;
         $_SESSION['email_']=$email;
         $_SESSION['phone_']=$phone;
         header("Location:/");

  }else{
    echo "something went wrong";
  }}

}}else{
  header("Location: /");
}
 ?>
