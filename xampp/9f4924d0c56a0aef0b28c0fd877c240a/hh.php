<?php
$db = mysqli_connect("localhost", "root", "Skaushik8@", "user");
if(isset($_POST['fname'])){
       $fnam = mysqli_real_escape_string($db,$_POST['fname']);
       $lnam  = mysqli_real_escape_string($db,$_POST['lname']);
       $emai  = mysqli_real_escape_string($db,$_POST['email']);
       $phon   = mysqli_real_escape_string($db,$_POST['phone']);
       $countr = mysqli_real_escape_string($db,$_POST['country']);
       $pas  = mysqli_real_escape_string($db,$_POST['pass']);
$sql = "INSERT INTO users(fname, lname, email_id, password, phone, country) VALUES('$fnam', '$lnam', '$emai', '$pas', '$phon', '$countr')";

        if($db->query($sql) === TRUE){

       print " ==== POST DATA =====
       fName  : $fnam
       Email : $emai
       phone  : $phon
       country  : $countr
       lname  : $lnam
       Pass  : $pas";
		}else{
		echo'fail3';
		}
}else{
	echo 'fail';
}
?>
