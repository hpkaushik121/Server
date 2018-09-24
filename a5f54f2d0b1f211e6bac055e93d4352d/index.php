<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['password']) ){
	$token =$_SESSION['token']= md5(uniqid(mt_rand(),true));
	header("Location:cpanellogin.php?");
}

$token =$_SESSION['token']= md5(uniqid(mt_rand(),true));

 ?>
<!DOCTYPE HTML>
<html>
<head>
<title>cPanel</title>
<!-- Mete tag keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Career Appeal Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //Mete tag keywords -->
<!-- Stylesheet -->
<link href="css2/font-awesome.css" rel="stylesheet">
<link href="css2/style.css" rel='stylesheet' type='text/css' />
<!-- //Stylesheet -->
<!--fonts-->
<link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">
<!--//fonts-->
</head>

<body>
<div class="video" data-vide-bg="video/laptop">
<div class="center-container">
<!--background-->
<!-- form -->
<img src="cpanel-logo.svg" style="width:40%;
display: block;
	 margin: auto;"/>
 </br>
			<div class="login-form" >
				</br>
				</br>
				<form action="cpanellogin.php" method="post">
					<div class="inputs-w3ls">
						<p>Username</p>
						<i class="fa fa-user" aria-hidden="true"></i>
						<input type="text" name="username"  autocomplete="off" placeholder="Username" required=""/>
					</div>
				</br>
<input type="hidden"  name="token" value="<?php echo $token;?>"/>
					<div class="clear"></div>
					<div class="inputs-w3ls">
						</br>
						<p>Password</p>
						<i class="fa fa-envelope" aria-hidden="true"></i>
						<input type="text" autocomplete="off"style="-webkit-text-security: disc ;font-size:14px;" name="password" placeholder="Password" required=""/>
					</div>


					<input type="submit" style="  background: #20b1aa;
				    color: #fff;
				    font-size: 18px;
				    border: none;
				    text-transform: capitalize;
				    border: 2px solid #20b1aa;
				    width: 92%;
				    outline: none;
				    cursor: pointer;
				    -webkit-appearance: none;
				    padding: 13px 0;
				    letter-spacing: 1px;
				    margin-top: 15px;
				    transition: 0.5s all;
				    -webkit-transition: 0.5s all;
				    -moz-transition: 0.5s all;
				    -o-transition: 0.5s all;
				    font-family: 'Montserrat', sans-serif;" value="Submit">

				</form>
			</div>
			<!-- //form -->
			<!--copyright-->
				<div class="clear"></div>
			<div class="footer-agileits">
			<p>© 2017 cPanel. All Rights Reserved </p>
			</div>
			<!--//copyright-->
			</div>
			</div>
<!--js-->
		<script src="js2/jquery-2.2.3.min.js"></script>
		<script src="js2/jquery.vide.min.js"></script>
<!--//js-->
</body>
</html>
