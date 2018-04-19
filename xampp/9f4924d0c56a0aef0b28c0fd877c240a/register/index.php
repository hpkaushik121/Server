<?php
session_start();
if(isset($_SESSION['user']) &&isset($_SESSION['fullname_'])){
  header("Location: /");
}
$token =$_SESSION['token']= md5(uniqid(mt_rand(),true));
 ?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>ibuiltinfra</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <!--<link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,600,700' rel='stylesheet' type='text/css'>-->
        <link rel="stylesheet" href="assets/css/fonticons.css">
        <link rel="stylesheet" href="assets/fonts/stylesheet.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!--        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">-->


        <!--For Plugins external css-->
        <link rel="stylesheet" href="assets/css/plugins.css" />

        <!--Theme custom css -->
        <link rel="stylesheet" href="assets/css/style.css">

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="assets/css/responsive.css" />

        <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

        <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <script src="js/jquery.min.js"></script>
        <script type="text/javascript">
                $(document).ready(function() {
                    $(".dropdown img.flag").addClass("flagvisibility");

                    $(".dropdown dt a").click(function() {
                        $(".dropdown dd ul").toggle();
                    });

                    $(".dropdown dd ul li a").click(function() {
                        var text = $(this).html();
                        $(".dropdown dt a span").html(text);
                        $(".dropdown dd ul").hide();
                        $("#result").html("Selected value is: " + getSelectedValue("sample"));
                    });

                    function getSelectedValue(id) {
                        return $("#" + id).find("dt a span.value").html();
                    }

                    $(document).bind('click', function(e) {
                        var $clicked = $(e.target);
                        if (! $clicked.parents().hasClass("dropdown"))
                            $(".dropdown dd ul").hide();
                    });


                    $("#flagSwitcher").click(function() {
                        $(".dropdown img.flag").toggleClass("flagvisibility");
                    });
                });
             </script>

    </head>
    <style>
    .error {
      background-color:#FFDFDF;
      color:red;
    }
    .alert {
    padding: 20px;
    background-color: #f44336;
    color: white;
}

.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.closebtn:hover {
    color: black;
}
    </style>
    <body >
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

		<div class='preloader'><div class='loaded'>&nbsp;</div></div>
        <!--Home page style-->
        <header id="main_menu" class="header">
            <div class="main_menu_bg navbar-fixed-top" style="background-color:#3d3325;">
                <div style="margin-top:-30px;" class="container">
                    <div class="row">
                        <div class="nave_menu wow fadeInUp" data-wow-duration="1s">
                            <nav class="navbar navbar-default" id="navmenu">
                                <div class="container-fluid">
                                    <!-- Brand and toggle get grouped for better mobile display -->
                                    <div class="navbar-header">

                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
    <a  href="/"><img src="assets/images/sitelogo.png" alt=""/></a>
                                    </div>

                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                                        <ul class="nav navbar-nav navbar-right">

                                            <li ><a href="/">Home</a></li>
    <li ><a href="/cart/">Cart</a></li>


                                            <li><a href="#">About Us</a></li>
                                        </ul>

                                    </div>

                                </div>
                            </nav>
                        </div>
                    </div>

                </div>

            </div>
        </header> <!--End of header -->

</br>

</br>
</br>
<?php
$j= md5('username');
$m= md5('already exists');
if(isset($_GET[$j])){
  if($_GET[$j]==$m){
    echo '<div class="alert">
<span class="closebtn" onclick="this.parentElement.style.display=';echo "none"; echo ';">&times;</span>
<strong>Error!</strong>Username already exists.
</div>';
  }
}
 ?>


        <div class="main" >
         <div class="shop_top">
   	     <div class="container">
   						<form id="frm"  method="post">
   								<div class="register-top-grid">
   										<h3>PERSONAL INFORMATION</h3>
   										<div>
   											<span>username<label>*</label> &nbsp &nbsp<ps style="color:red;"id="error_u"></p></span>
   											<input name="username" id="username" type="text" >
   										</div>
                      <div>
                        <span>fullname<label>*</label> &nbsp &nbsp<ps style="color:red;"id="error_f"></p></span>
                        <input name ="fullname" id="fullname" type="text">
                      </div>
   										<div>
   											<span >Phone No.<label>*</label> &nbsp &nbsp<ps style="color:red;"id="error_p"></p></span>
   											<input name="phone"  id="phone" type="text" >
   										</div>
   										<div>
   											<span>Email Address<label>*</label> &nbsp &nbsp<ps style="color:red;"id="error_e"></p></span>
   											<input name ="email" id="email" style="width:96%; padding:1.3%;  border-width:.3px;" type="email">
   										</div>
                      <input type="hidden" id="token" name="token" value="<?php echo $token;?>"/>
   										<div class="clear"> </div>

   										<div class="clear"> </div>
   								</div>
   								<div class="clear"> </div>
   								<div class="register-bottom-grid">
   										<h3>LOGIN INFORMATION</h3>
   										<div>
   											<span>Password<label>*</label>&nbsp &nbsp<ps style="color:red;"id="error_p1"></p></span>
   											<input type="text" id="password1" name="password" >
   										</div>
   										<div>
   											<span>Confirm Password<label>*</label>&nbsp &nbsp<ps style="color:red;"id="error_p2"></p></span>
   											<input type="text" id="password2">
   										</div>
   										<div class="clear"> </div>
   								</div>
   								<div class="clear"> </div>
   								<input type="button" onclick="validat();"  class="button" value="submit">
   						</form>
   					</div>
   		   </div>
   	  </div>


        <section id="footer" class="footer sections">
            <div class="container">


                <div class="row">
                    <div class="footer_bottom_area">
                        <div class="col-sm-9 col-xs-12">
                            <div class="fo_bottom_right">
                                <div class="row">
                                    <div class="col-sm-6 col-xs-12">
                                        <div class="single_right_footer wow fadeIn" data-wow-duration="1s">
                                            <p>Lorem ipsum dolor sit amet, consecteteeseurı adipiscing elit. Donec mollis commodoeesene que, non commodo risus volutpat vel.</p>
                                            <a href="">Design by : <strong>Sourabh kaushik</strong></a>

                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-xs-6">
                                        <div class="single_right_footer wow fadeIn" data-wow-duration="1.5s">

                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-xs-6">
                                        <div class="single_right_footer wow fadeIn" data-wow-duration="2s">
                                            <ul>
                                                <li><a href=""><i class="lnr lnr-chevron-right"></i> Support</a></li>
                                                <li><a href=""><i class="lnr lnr-chevron-right"></i> Account</a></li>
                                                <li><a href=""><i class="lnr lnr-chevron-right"></i> Product Catalog</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-12">
                            <div class="fo_bottom_socail wow fadeIn" data-wow-duration="2.3s">
                                <a href="#"><i class="fa fa-phone">+917838941249</i></a>
                                <a href=""><i class="fa fa-envelope"></i>sk@ipuniversity.tk</a>
                                <p>We are here for you all the time</p>
                            </div>
                        </div>
                    </div>
                </div>





            </div>
        </section><!-- End of footer3 section -->








        <!-- STRAT SCROLL TO TOP -->

        <div class="scrollup">
            <a href="#"><i class="fa fa-chevron-up"></i></a>
        </div>
<script src="js/r.js"></script>
        <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="assets/js/vendor/bootstrap.min.js"></script>
        <script src="assets/js/jquery.easypiechart.min.js"></script>

        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>

    </body>
</html>
