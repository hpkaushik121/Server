<?php

session_start();
if(isset($_SESSION['username']) && $_SESSION['password']){
  $user= base64_decode(base64_decode(base64_decode(base64_decode($_SESSION['username']))));
  $pass=base64_decode(base64_decode(base64_decode(base64_decode($_SESSION['password']))));
  $conn = mysqli_connect('localhost','root','Skaushik8@','root');
  if(!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  		echo "fadf";
  }else{

    $sql = "SELECT * FROM user WHERE username='$user' AND password = '$pass'";
    $result = mysqli_query( $conn, $sql );
    if (mysqli_num_rows($result) > 0)
                         {
    $row = mysqli_fetch_assoc($result);
      $_SESSION['id']=base64_encode(base64_encode(base64_encode(base64_encode($row['id']))));
      $_SESSION['username']=base64_encode(base64_encode(base64_encode(base64_encode($row['username']))));
      $_SESSION['password']=base64_encode(base64_encode(base64_encode(base64_encode($row['password']))));
      $_SESSION['created_email']=base64_encode(base64_encode(base64_encode(base64_encode($row['created_email']))));
      $_SESSION['created_email_pass']=base64_encode(base64_encode(base64_encode(base64_encode($row['created_email_pass']))));
      $_SESSION['file_user']=base64_encode(base64_encode(base64_encode(base64_encode($row['file_user']))));
      $_SESSION['file_pass']=base64_encode(base64_encode(base64_encode(base64_encode($row['file_pass']))));
      $_SESSION['db_user']=base64_encode(base64_encode(base64_encode(base64_encode($row['db_user']))));
      $_SESSION['db_pass']=base64_encode(base64_encode(base64_encode(base64_encode($row['db_pass']))));
//echo "<script>alert(";echo $row['id'];  echo $row['file_user']; echo $row['db_user'];echo ")</script>";

header("Location:index2.php");

  }else{
    echo "username of password is wrong";
  }

}

}
elseif(isset($_POST['username']) && $_POST['token']==$_SESSION['token']){
  $username = $_POST['username'];
  $password = $_POST['password'];

  $conn = mysqli_connect('localhost','root','Skaushik8@','root');
  if(!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  		echo "fadf";
  }else{

    $sql = "SELECT * FROM user WHERE username='$username' AND password = '$password'";
    $result = mysqli_query( $conn, $sql );
    if (mysqli_num_rows($result) > 0)
                         {
    $row = mysqli_fetch_assoc($result);
      $_SESSION['id']=base64_encode(base64_encode(base64_encode(base64_encode($row['id']))));
      $_SESSION['username']=base64_encode(base64_encode(base64_encode(base64_encode($row['username']))));
      $_SESSION['password']=base64_encode(base64_encode(base64_encode(base64_encode($row['password']))));
      $_SESSION['created_email']=base64_encode(base64_encode(base64_encode(base64_encode($row['created_email']))));
      $_SESSION['created_email_pass']=base64_encode(base64_encode(base64_encode(base64_encode($row['created_email_pass']))));
      $_SESSION['file_user']=base64_encode(base64_encode(base64_encode(base64_encode($row['file_user']))));
      $_SESSION['file_pass']=base64_encode(base64_encode(base64_encode(base64_encode($row['file_pass']))));
      $_SESSION['db_user']=base64_encode(base64_encode(base64_encode(base64_encode($row['db_user']))));
      $_SESSION['db_pass']=base64_encode(base64_encode(base64_encode(base64_encode($row['db_pass']))));


echo "<script>alert(";echo $row['id']; echo "\n"; echo $row['file_user']; echo "\n";echo $row['db_user'];echo ")</script>";
   header("Location:index2.php");
  }else{
    echo "username of password is wrong";
  }

}}else{
  echo "asfd";
}
 ?>
