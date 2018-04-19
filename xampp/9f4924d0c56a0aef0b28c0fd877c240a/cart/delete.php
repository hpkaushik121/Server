<?php
session_start();
if(isset($_GET['id']) && isset($_SESSION['user']) ){
$id=$_GET['id'];
$servername = "localhost";
$username = "root";
$password = "Skaushik8@";
$dbname = "hostpots";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$sql = "DELETE FROM cart WHERE id='$id'";

if ($conn->query($sql) === TRUE) {

    header("Location: /cart/");
} else {
    echo "Error deleting record: " . $conn->error;
}
}
elseif(isset($_GET['id']) && !isset($_SESSION['user'])){
  echo $_COOKIE['num'];
  setcookie('package'.$_GET['id'], null, -1, '/');


    for($i=$_GET['id'];$i<$_COOKIE['num'];$i++){

      $j=$i+1;

    setcookie('package'.$i, $_COOKIE['package'.$j], time() + (86400 ), "/");

    }


  $_COOKIE['num']=$_COOKIE['num']-1;
echo "</br>";

  setcookie('num', $_COOKIE['num'],time() + (86400 ), "/");



    header("Location: /cart/");
}

 ?>
