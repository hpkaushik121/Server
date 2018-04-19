<?php
session_start();
 ?>


<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Iserv</title>
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

    </head>
    <body data-spy="scroll" data-target="#navmenu">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		<div class='preloader'><div class='loaded'>&nbsp;</div></div>
        <!--Home page style-->
        <header id="main_menu" class="header">
            <div class="main_menu_bg navbar-fixed-top">
                <div class="container">
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
<a  href="#"><img src="assets/images/sitelogo.png" alt=""/></a>
                                    </div>

                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                                        <ul class="nav navbar-nav navbar-right">

                                            <li class="active"><a href="#">Home</a></li>

<li><a href="cart/">Cart</a></li>

                                            <li><a href="about/">About Us</a></li>
                                            <?php if(isset($_SESSION['fullname_'])){echo '  <li> <a href="logout/"> Logout</a></li>';}?>
                                        </ul>

                                    </div>

                                </div>
                            </nav>
                        </div>
                    </div>

                </div>

            </div>
        </header> <!--End of header -->




        <section id="home" class="home">
            <div class="home-overlay-fluid">
                <div class="container">
                    <div class="row">
                        <div class="main_slider_area">
                            <div class="slider">
                                <div class="single_slider wow fadeIn" data-wow-duration="2s">
                                    <?php

                                    if(isset($_SESSION['fullname_'])){
                                      echo "<p>HELLO!</p><p>".base64_decode(base64_decode(base64_decode(base64_decode($_SESSION['fullname_']))))."</p>";
                                    }else{echo "   <p>If opprtunities doesn't knock </p>
                                    <p>build a door</p>";}

                                    ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End of Banner Section -->
        <?php if(!isset($_SESSION['fullname_'])){ echo '
        <section id="register" class="register">
            <div class="container-fullwidth">
                <div class="row text-center">
                    <div class="col-sm-6 col-xs-6 no-padding">
                        <div class="single_register single_login">
                            <a href="login/">Login</a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-6 no-padding">
                        <div class="single_register">
                            <a href="register/">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>';}?>

</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>





        <section id="pricing" class="pricing">
            <div class="container">
                <div class="row">
                    <div class="main_pricing">

                        <div class="pricing_content">
                            <div class="col-md-3 col-sm-6">
                                <div class="single_pricing pricing_color_one wow fadeIn" data-wow-duration=".6s">
                                    <div class="pricing_head text-center">
                                       <div class="icon_area p_icon_one">
                                              <img src="assets/images/bronze.png"></img>
                                        </div>
                                        <h3>BASIC PACKAGE</h3>
                                         <div class="separator"></div>
                                    </div>
                                    <figure class="single_pricing_figure">
                                        <ul>
                                            <li><span class="princing_name">Disk Space (GB)</span> <span class="princing_price princing_price_one">100</span></li>
                                              <li><span class="princing_name">Data bases</span> <span class="princing_price princing_price_one">1</span></li>
                                            <li><span class="princing_name">Professional emails</span> <span class="princing_price princing_price_one"> ∞</span></li>

                                            <li><span class="princing_name">metered Bandwidth</span> <span class="princing_price princing_price_one"></span></li>
  <li><span class="princing_name"> Wordpress and others</span></li>
                                            <li><span class="princing_name">Dashboards</span> <span class="princing_price princing_price_one"></span></li>
                                            <li><span class="princing_name">Control Panel & FTP</span> <span class="princing_price princing_price_one"></span></li>
                                            <li><span class="princing_name">Free Support</span> <span class="princing_price princing_price_one"></span></li>

                                        </ul>
                                        <div class="separator"></div>
                                    </figure>

                                    <footer class="pricing_footer text-center">
                                        <h3><span class="dolor"> ₹</span> 150 <span class="month">/Mo </span></h3>
                                        <div class="smallseparator separetor_one"></div>
                                        <a href="addcart.php?package=basic">SELECT PLAN</a>
                                    </footer>

                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <div class="single_pricing pricing_color_two wow fadeIn" data-wow-duration="1.2s">
                                    <div class="pricing_head text-center">
                                        <div class="icon_area p_icon_two">
                                            <img src="assets/images/gold.png"></img>
                                        </div>
                                        <h3>NORMAL PACKAGE</h3>
                                         <div class="separator"></div>
                                    </div>
                                    <figure class="single_pricing_figure">
                                        <ul>
                                            <li><span class="princing_name">Disk Space (GB)</span> <span class="princing_price princing_price_two">150</span></li>
                                            <li><span class="princing_name">Data bases</span> <span class="princing_price princing_price_two">10</span></li>
                                              <li><span class="princing_name">Professional emails</span> <span class="princing_price princing_price_two"> ∞</span></li>
                                              <li><span class="princing_name">Unmetered Bandwidth</span> <span class="princing_price princing_price_two"></span></li>

                                            <li><span class="princing_name">Dashboards</span> <span class="princing_price princing_price_two"></span></li>
                                            <li><span class="princing_name">Wordpress and others</span> <span class="princing_price princing_price_two"></span></li>
                                            <li><span class="princing_name">Control Panel & FTP</span> <span class="princing_price princing_price_two"></span></li>
                                            <li><span class="princing_name">Free Support</span> <span class="princing_price princing_price_two"></span></li>

                                        </ul>
                                        <div class="separator"></div>
                                    </figure>

                                    <footer class="pricing_footer text-center">
                                        <h3><span class="dolor">₹</span> 250 <span class="month">/Mo </span></h3>
                                        <div class="smallseparator separetor_two"></div>
                                        <a href="addcart.php?package=normal">SELECT PLAN</a>
                                    </footer>

                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <div class="single_pricing pricing_color_three wow fadeIn" data-wow-duration="1.8s">
                                    <div class="pricing_head text-center">
                                        <div class="icon_area p_icon_three">
                                            <img src="assets/images/silver.png"></img>
                                        </div>
                                        <h3>BIG PACKAGE</h3>
                                         <div class="separator"></div>
                                    </div>
                                    <figure class="single_pricing_figure">
                                        <ul>
                                            <li><span class="princing_name">Unlimited Disk Space</span> <span class="princing_price princing_price_three"> ∞</span></li>
                                              <li><span class="princing_name">Data bases</span> <span class="princing_price princing_price_three">30</span></li>
                                                <li><span class="princing_name">Professional emails</span> <span class="princing_price princing_price_three"> ∞</span></li>
                                                  <li><span class="princing_name">Domains</span> <span class="princing_price princing_price_three">5</span></li>
                                            <li><span class="princing_name">Unmetered Bandwidth</span> <span class="princing_price princing_price_three"></span></li>
                                            <li><span class="princing_name">Dashboards</span> <span class="princing_price princing_price_three"></span></li>
                                            <li><span class="princing_name">wordpress and others</span> <span class="princing_price princing_price_three"></span></li>
                                            <li><span class="princing_name">Control Panel & FTP</span> <span class="princing_price princing_price_three"></span></li>
                                            <li><span class="princing_name">Free Support</span> <span class="princing_price princing_price_three"></span></li>

                                        </ul>
                                        <div class="separator"></div>
                                    </figure>

                                    <footer class="pricing_footer text-center">
                                        <h3><span class="dolor">₹</span> 400 <span class="month">/Mo </span></h3>
                                        <div class="smallseparator separetor_three"></div>
                                        <a href="addcart.php?package=big">SELECT PLAN</a>
                                    </footer>

                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <div class="single_pricing pricing_color_four wow fadeIn" data-wow-duration="2.3s">
                                    <div class="pricing_head text-center">
                                        <div class="icon_area p_icon_four">
                                            <img src="assets/images/platinum.jpg"></img>
                                        </div>
                                        <h3>BIGGEST PACKAGE</h3>
                                        <div class="separator"></div>
                                    </div>

                                    <figure class="single_pricing_figure">
                                        <ul>
                                           <li><span class="princing_name">Unlimited Disk space</span> <span class="princing_price princing_price_four"> ∞</span></li>

                                            <li><span class="princing_name">Data bases</span> <span class="princing_price princing_price_four"> ∞</span></li>
                                            <li><span class="princing_name">Professional emails</span> <span class="princing_price princing_price_four"> ∞</span></li>
                                              <li><span class="princing_name">Domains</span> <span class="princing_price princing_price_four"> ∞</span></li>
                                            <li><span class="princing_name">Unmetered Bandwidth</span> <span class="princing_price princing_price_four"></span></li>
                                            <li><span class="princing_name">Dashboards</span> <span class="princing_price princing_price_four"></span></li>
                                              <li><span class="princing_name">wordpress and others</span> <span class="princing_price princing_price_four"></span></li>

                                            <li><span class="princing_name">Control Panel & FTP</span> <span class="princing_price princing_price_four"></span></li>
                                            <li><span class="princing_name">Free Support</span> <span class="princing_price princing_price_four"></span></li>
                                        </ul>
                                        <div class="separator"></div>
                                    </figure>

                                    <footer class="pricing_footer text-center">
                                        <h3><span class="dolor">₹</span> 1000 <span class="month">/Mo </span></h3>
                                        <div class="smallseparator separetor_four"></div>
                                        <a href="addcart.php?package=biggest">SELECT PLAN</a>
                                    </footer>
                                </div>
                            </div>

                        </div><!-- End of pcining section -->



                    </div>
                </div>
            </div>
        </section><!-- End of Pricing Section -->

      </br>
    </br>


        <section id="clients" class="comments">
            <div class="overlay-fluid-block">
                <div class="container">
                    <div class="row">
                        <div class="main_comments wow fadeInUp" data-wow-duration="1.5s">
                            <div class="main_comments_content">
                                <div class="single_comments text-center">
                                  <p>“The biggest risk is not taking any risk”  </p>
                                  <a >-Mark Zuckerberg</a>

                                </div>
                                <div class="single_comments text-center">
                                  <p>“What a computer to me is the most remarkable tool that we have ever come up with. It's equivalent of a bicycle for our mind.”  </p>
                                  <a >-Steve Jobs</a>
                                </div>
                                <div class="single_comments text-center">
                                    <p>“If you born poor it's not your mistake, but if you die poor then it's your mistake”  </p>
                                    <a >-Bill Gates</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="service" class="service">
            <div class="container">
                <div class="row">
                    <div class="main_service text-center">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="single_service wow fadeIn" data-wow-duration=".6s">
                                <div class="single_service_icon icon_one">
                                    <a ><i class="fa fa-flash"></i></a>
                                </div>
                                <div class="single_service_deatels">
                                    <h4>Fast Servers</h4>
                                    <p>We have the fastest web servers as fast fast as 50ms</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="single_service wow fadeIn" data-wow-duration="1.2s">
                                <div class="single_service_icon icon_two">
                                    <a ><i class="fa fa-skype"></i></a>
                                </div>
                                <div class="single_service_deatels">
                                    <h4>Cloud Servers</h4>
                                    <p>This service will be available soon</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="single_service wow fadeIn" data-wow-duration="1.7s">
                                <div class="single_service_icon icon_three">
                                    <a ><img src="assets/images/up.png"></img></a>
                                </div>
                                <div class="single_service_deatels">
                                    <h4>Max. UP Time</h4>
                                    <p>We provide 99.9% of server uptime</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="single_service wow fadeIn" data-wow-duration="2s">
                                <div class="single_service_icon icon_four">
                                    <a ><i class="fa fa-comments"></i></a>
                                </div>
                                <div class="single_service_deatels">
                                    <h4>Live Support</h4>
                                    <p>We provide 24x7x365 live support ask us any query we will answer you weather it is related to your codes or our servers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End of service Section -->



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

        <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="assets/js/vendor/bootstrap.min.js"></script>
        <script src="assets/js/jquery.easypiechart.min.js"></script>

        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>

    </body>
</html>
