<?php
session_start();
if(!isset($_SESSION['user'])&& !isset($_SESSION['pass'])){

  if(isset($_COOKIE['num'])) {
  $num=$_COOKIE['num'];
  $num=$num+1;
}else{
  $num=0;

}
$package=$_GET['package'];
setcookie('num', $num, time() + (86400 ), "/");
setcookie('package'.$num, $package, time() + (86400 ), "/");
 header("Location:cart/");
}else{




 $package=$_GET['package'];
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
         $username=$_SESSION['user'];
         $userid=$_SESSION['id_'];
           $conn = mysqli_connect('localhost','root','Skaushik8@','hostpots');
           if(!$conn) {
               die("Connection failed: " . mysqli_connect_error());
               echo "fadf";
           }else{

             $sql = "SELECT package FROM cart WHERE username='$username' AND user_id = '$userid'";
             $result = mysqli_query( $conn, $sql );
             if (mysqli_num_rows($result) > 0)
                                  {
                                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
               $storeArray[] =  $row['package'];
               if(isset($_COOKIE['num'])) {
               $num=$_COOKIE['num'];
               $num=$num+1;
             }else{
               $num=0;

             }
             $package=$_GET['package'];
             setcookie('num', $num, time() + (86400 ), "/");
             setcookie('package'.$num, $package, time() + (86400 ), "/");
              header("Location:cart/");
            }


  }}}else{
    echo $package;
  }


}

 ?>
