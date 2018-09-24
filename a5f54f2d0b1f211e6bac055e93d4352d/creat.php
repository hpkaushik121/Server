<?php
// create user
$servername = "localhost";
$username = "root";
$password = "Skaushik8@";

// Create connection
$link = mysqli_connect($servername, $username, $password);
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
		echo "fadf";
}else{
echo "Connected successfully";}
$dbName='asdf';
$privilege_passwd='asdf';
//CREATE USER 'username'@'localhost' IDENTIFIED BY 'password'
			$sql = "CREATE USER '" . $dbName . "_user'@'localhost' IDENTIFIED BY '" . $privilege_passwd."'";
			$result = mysqli_query($link, $sql);
			if (!$result)
			{
				$error = 'Error in creating new user.';
				echo $error;
				exit();
			}
			$sql = "CREATE DATABASE ".$dbName;
			$result = mysqli_query($link,$sql);
			if (!$result)
			{
				$error = 'Error ';
				echo $error;
				exit();
			}
		// grant privileges
			$sql = "GRANT ALL PRIVILEGES ON ".$dbName.".* TO '".$dbName."_user'@'localhost'";
			$result = mysqli_query($link, $sql);
			if (!$result)
			{
				$error = 'Error in granting privileges to new user.';
				echo $error;
				exit();
			}
      ?>
