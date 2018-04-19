<html>
<head>
<title>Arduino Controlled Based PHP</title>
</head>
<body>

<?php
echo "<p>Control Page</p><p>";
$port = fopen("COM4", "w+"); 
sleep(2);
?>
<br>

<form action="index.php" method="POST">
<input type="hidden" name="turn" value="on" />
<input type="Submit" value="on">
</form>

<form action="index.php" method="POST">
<input type="hidden" name="turn" value="off" />
<input type="Submit" value="off">

</form>

<?php

if ($_POST['turn']=="on")
{
	echo "Turned on";
	fwrite($port, "n");
}

if ($_POST['turn']=="off")
{
	echo "Turned off";
	fwrite($port, "f");
}

fclose($port);
?>

</body>
</html>
