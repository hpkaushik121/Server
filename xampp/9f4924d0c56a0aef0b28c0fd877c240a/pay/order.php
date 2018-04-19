<?php

if(isset($_POST['name'])){

    $prd_name = "Jeans Mens #100";


	$prd_price = $_POST['name'];


 }


 ?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Payment Mojo</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>

  <body>
    <div class="container">

      <div class="page-header">
        <h1><a href="index.php">Instamojo Payment</a></h1>
        <p class="lead">A test payment integration for instamojo payment gateway. Written in PHP</p>
      </div>



		<h3>Your Payment Details </h3>
		<hr>
		<form action="pay.php" method="POST" accept-charset="utf-8">

		<input type="hidden" name="product_name" value="<?php echo $prd_name; ?>" >
		<input type="hidden" name="product_price" value="<?php echo $prd_price; ?>" >

		<div class="form-group">
    	<label>Your Name</label>
   		<input type="text" class="form-control" name="name" placeholder="Enter your name" required>	 <br/>
		</div>

		<div class="form-group">
    	<label>Your Phone</label>
   		<input type="text" class="form-control" name="phone" placeholder="Enter your phone number" required> <br/>
		</div>


		<div class="form-group">
    	<label>Your Email</label>
   		<input type="email" class="form-control" name="email" placeholder="Enter you email" required> <br/>
		</div>


		<input type="submit" class="btn btn-success btn-lg" value="Click here to Pay Rs:<?php echo $prd_price; ?> ">

		 </form>
 <br/>
  <br/>
    </div> <!-- /container -->


  </body>
</html>
