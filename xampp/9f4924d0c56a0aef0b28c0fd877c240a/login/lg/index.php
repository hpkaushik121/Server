<?php

session_start();
if(isset($_SESSION['user']) && isset($_SESSION['pass'])){

header("/");

  }



elseif(isset($_POST['username']) ){
  $username = hash('sha256', $_POST['username']);
  $password = hash('sha256', $_POST['password']);

  $conn = mysqli_connect('localhost','root','Skaushik8@','hostpots');
  if(!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  		echo "fadf";
  }else{

    $sql = "SELECT * FROM user WHERE username='$username' AND password = '$password'";
    $result = mysqli_query( $conn, $sql );
    if (mysqli_num_rows($result) > 0)
                         {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['user']=$row['username'];
    $_SESSION['fullname_']=$row['fullname'];
    $_SESSION['id_']=$row['id'];
    $_SESSION['email_']=$row['email'];
    $_SESSION['phone_']=$row['phone_no'];
    if(isset($_COOKIE['num'])) {
    $num=$_COOKIE['num'];

    for($i=0;$i<=$num;$i++){
    $package= $_COOKIE['package'.$i];
    $conn = mysqli_connect('localhost','root','Skaushik8@','hostpots');
    if(!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        echo "fadf";
    }
    $username=$_SESSION['user'];
    $id=$_SESSION['id_'];
      $sql = "INSERT INTO cart (username,user_id,package) VALUES ('$username','$id','$package')";
      $result = mysqli_query( $conn, $sql );
      if ($result)
         {
unset($_COOKIE['package'.$i]);
          }else{
    break;
    }
  }
  }unset($_COOKIE['num']);

    header("Location:/");



  }else{
    echo "username of password is wrong";
  }

}}else{
  echo "asfd";
}
 ?>
