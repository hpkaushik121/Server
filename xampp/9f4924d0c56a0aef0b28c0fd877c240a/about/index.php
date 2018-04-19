<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>iserv-about</title>
<meta name="description" content="">
<meta name="author" content="">

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="/assets/css/fonticons.css">
    <link rel="stylesheet" href="/assets/css/responsive.css" />
<!-- Stylesheet
    ================================================== -->
<link rel="stylesheet" type="text/css"  href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/prettyPhoto.css">

<!--        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">-->


<!--For Plugins external css-->

<!--Theme custom css -->

<!--Theme Responsive css-->


<script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

<script type="text/javascript" src="js/modernizr.custom.js"></script>


</head>
<style>
.main_menu_bg{
  background-color: #3d3325;
	margin-top:0px;
}
.main_menu_bg .navbar-default {
    background-color: transparent;
    border-color: transparent;
	transition:.6s;
}
.navbar-default .navbar-nav>li>a:hover, .navbar-default .navbar-nav>li>a:focus{
	color:#e84c3d;
}
.main_menu_bg .navbar {
    margin-bottom: 0px;
    border-bottom: 1px solid #686868;
	min-height: 90px;
}
.main_menu_bg .container-fluid {
    margin-top: 20px;
}
.main_menu_bg .navbar-nav>li>a {
    padding-top: 15px;
    padding-bottom: 33px;
	text-transform:uppercase;
}
.main_menu_bg .navbar-default .navbar-nav>.active>a{
    color: #e84c3d;
    background-color: transparent;
    border-bottom: 1px solid #FFF;
    margin-bottom: -1px;
    padding-bottom: 33px;

}
</style>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<div id="preloader">
  <div id="status"> <img src="img/preloader.gif" height="64" width="64" alt=""> </div>
</div>
<!-- Navigation -->

  <header id="main_menu" class="header">
      <div class="main_menu_bg navbar-fixed-top">
          <div  style="margin-top:-30px;"class="container">
              <div class="row">
                  <div class="nave_menu wow fadeInUp" data-wow-duration="1s">
                      <nav class="navbar navbar-default" id="navmenu">
                          <div class="container-fluid">
                              <!-- Brand and toggle get grouped for better mobile display -->
                              <div class="navbar-header">
<a  href="#"><img src="/assets/images/sitelogo.png" alt=""/></a>
                                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                      <span class="sr-only">Toggle navigation</span>
                                      <span class="icon-bar"></span>
                                      <span class="icon-bar"></span>
                                      <span class="icon-bar"></span>
                                  </button>

                              </div>

                              <!-- Collect the nav links, forms, and other content for toggling -->
                              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                                  <ul class="nav navbar-nav navbar-right">

                                      <li class="active"><a href="/" class="page-scroll">Home</a></li>

<li><a href="/cart/" class="page-scroll">Cart</a></li>

                                      <li><a href="#about" class="page-scroll">About Us</a></li>
                                      <li><a href="#services" class="page-scroll">Our Services</a></li>
                                      <li><a href="#team" class="page-scroll">Team</a></li>
                                      <li><a href="#testimonials" class="page-scroll">Testimonials</a></li>
                                      <li><a href="#contact" class="page-scroll">Contact Us</a></li>
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


<!-- Header -->
<div id="intro">
  <div class="intro-body">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <h1><span class="brand-heading">iserv</span></h1>
          <p class="intro-text">A full-service digital agency that loves what we do</p>
          <a href="#about" class="btn btn-default page-scroll">Learn More</a> </div>
      </div>
    </div>
  </div>
</div>
<!-- About Section -->
<div id="about">
  <div class="container">
    <div class="section-title text-center center">
      <h2>About us</h2>
      <hr>
    </div>
    <div class="row">
      <div class="col-md-4"><img src="img/about.jpg" class="img-responsive"></div>
      <div class="col-md-4">
        <div class="about-text">
          <h4>Who We Are</h4>
          <p>iserv is  engaged in providing high end enterprise solution in the field of hosting servers. The company was co-founded by four liked minded professionals in the year 2017 with a very small team. Today, the company’s success in terms of steadfast growth and excellent customer base has come out powered by the shared vision of iserv's Team focused on values, innovation, transparency and integrity.</p>
          </div>
      </div>
      <div class="col-md-4">
        <div class="about-text">
          <h4>What We Do</h4>
          <p>We focus on our customers and quality and know when an extra effort is needed. We involve ourselves in and offer challenging work tasks to enable us to attract and develop committed and adaptable employees. We create job satisfaction and motivation in an innovative environment, with a focus on reaching good solutions.</p>
          <ul>
            <li>24/7 customer support</li>
            <li>faster data transfer speed</li>
            <li>cheaper hosting space </li>
            <li>smarter working methodology</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Services Section -->
<div id="services" class="text-center">
  <div class="container">
    <div class="section-title center">
      <h2>Our Services</h2>
      <hr>
    </div>
    <div class="space"></div>
    <div class="row">
      <div class="col-md-3 col-sm-6">
        <div class="service"> <i class="fa fa-desktop"></i>
          <h3>Web Design</h3>
          <p>Easier and convinient web designs no extra annoying/confusing  options</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="service"> <i class="fa fa-cogs"></i>
          <h3>Web Development</h3>
          <p>we provide full developed websites as per the customers need</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="service"> <i class="fa fa-tablet"></i>
          <h3>App Design</h3>
          <p>Our apps is built to last, but as with everything else, it needs care to perform best in market</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="service"><i class="fa fa-html5"></i>
          <h3>PSD to HTML5</h3>
          <p>we can make your photoshoped photos to html5</p>
        </div>
      </div>
    </div>
    <div class="space"></div>
    <div class="row">
      <div class="col-md-3 col-sm-6">
        <div class="service"><i class="fa fa-wordpress"></i>
          <h3>WordPress</h3>
          <p>WordPress is open source software you can use to create a beautiful website, blog, or app.</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="service"><i class="fa fa-bullhorn"></i>
          <h3>Marketing</h3>
          <p>we provide marketing for your company/starup.</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="service"><i class="fa fa-rocket"></i>
          <h3>File hosting</h3>
          <p>Looking for a hosting server to create something which is not created yet then we are here for you.</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="service"><i class="fa fa-envelope"></i>
          <h3>Buisness Mails</h3>
          <p>Look more professional by using email address of your domain </p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Portfolio Section -->

<!-- Team Section -->
<div id="team" class="text-center">
  <div class="container">
    <div class="section-title center">
      <h2>Meet the team</h2>
      <hr>
      <p>The most dedicates, motivated and inspired team for their work we are always here for you</p>
    </div>
    <div id="row">
      <div class="col-xs-6 col-md-3 col-sm-6">
        <div class="thumbnail"> <img src="img/team/04.jpg" alt="..." class="img-thumbnail team-img">
          <div class="caption">
            <h3>Hari Prakash Kaushik</h3>
            <p>Founder / CEO</p>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-3 col-sm-6">
        <div class="thumbnail"> <img src="img/team/01.jpg" alt="..." class="img-thumbnail team-img">
          <div class="caption">
            <h3>Sourabh Kaushik</h3>
            <p>Head Programmer</p>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-3 col-sm-6">
        <div class="thumbnail"> <img src="img/team/02.jpeg" alt="..." class="img-thumbnail team-img">
          <div class="caption">
            <h3>Parikshit Shakla</h3>
            <p>Marketing Head</p>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-3 col-sm-6">
        <div class="thumbnail"> <img src="img/team/03.jpg" alt="..." class="img-thumbnail team-img">
          <div class="caption">
            <h3>Sourabh Goel</h3>
            <p>Head Designer</p>
          </div>
        </div>
      </div>
      <!--<div class="col-xs-6 col-md-3 col-sm-6">
        <div class="thumbnail"> <img src="img/team/02.jpg" alt="..." class="img-thumbnail team-img">
          <div class="caption">
            <h3>Mike Doe</h3>
            <p>Web Designer</p>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-3 col-sm-6">
        <div class="thumbnail"> <img src="img/team/03.jpg" alt="..." class="img-thumbnail team-img">
          <div class="caption">
            <h3>Jane Doe</h3>
            <p>Creative Director</p>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-3 col-sm-6">
        <div class="thumbnail"> <img src="img/team/04.jpg" alt="..." class="img-thumbnail team-img">
          <div class="caption">
            <h3>Larry Show</h3>
            <p>Project Manager</p>
          </div>
        </div>
      </div>
    </div>-->
  </div>
</div>
<!-- Testimonials Section -->
<div id="testimonials" class="text-center">
  <div class="container">
    <div class="section-title center">
      <h2>What our clients say</h2>
      <hr>
    </div>
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="row testimonials">
          <div class="col-sm-4">
            <blockquote><i class="fa fa-quote-left"></i>
              <p>I have been consuming services from iserv and i feel that this firm provides best services weather in case of file hosting or support.</p>
              <div class="clients-name">
                <p><strong>Parkshit Shakla</strong><br>
                  <em>Student, Maharaja agresen institute of technology</em></p>
              </div>
            </blockquote>
          </div>
          <div class="col-sm-4">
            <blockquote><i class="fa fa-quote-left"></i>
              <p>This company is really great we can't even imagine hosting server in this pricing</p>
              <div class="clients-name">
                <p><strong>Saurabh Goel</strong><br>
                  <em>Student, Mahaveer swami institute of technology</em></p>
              </div>
            </blockquote>
          </div>
          <div class="col-sm-4">
            <blockquote><i class="fa fa-quote-left"></i>
              <p>Really good in communication and behavior of this company's employees.</p>
              <div class="clients-name">
                <p><strong>Devesh Shukla</strong><br>
                  <em>Student,Maharaja surajmal institute of technology</em></p>
              </div>
            </blockquote>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Contact Section -->
<div id="contact" class="text-center">
  <div class="container">
    <div class="section-title center">
      <h2>Contact us</h2>
      <hr>
      <p>We are here for you, you can ask whatever weather it is related to our service or you are hacing any kind of problem do not hesitate to call</p>
    </div>
    <div class="col-md-8 col-md-offset-2">
      <div class="col-md-4">
        <div class="contact-item"> <i class="fa fa-map-marker fa-2x"></i>
          <p>J/4A Krishan Vihar,<br>
            Delhi 110086, India </p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="contact-item"> <i class="fa fa-envelope-o fa-2x"></i>
          <p>master@iserv.tech</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="contact-item"> <i class="fa fa-phone fa-2x"></i>
          <p> +917838941249<br>
            +918585944452</p>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="col-md-8 col-md-offset-2">
      <h3>Leave us a message</h3>
      <form name="sentMessage" method="post"  id="contactForm" novalidate>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" id="name" name="name" class="form-control" placeholder="Name" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="email" id="email" name="email"class="form-control" placeholder="Email" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
        </div>
        <div class="form-group">
          <textarea name="message" id="message" class="form-control" rows="4" placeholder="Message" required></textarea>
          <p class="help-block text-danger"></p>
        </div>
        <div id="success"></div>
        <button type="submit" class="btn btn-default">Send Message</button>
      </form>
      <div class="social">
        <h3>Follow us</h3>
        <ul>
          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
          <li><a href="#"><i class="fa fa-github"></i></a></li>
          <li><a href="#"><i class="fa fa-instagram"></i></a></li>
          <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
  <section  id="footer" class="footer sections">
      <div class="container">


          <div class="row">
              <div  class="footer_bottom_area">
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
                                      <ul style="float:left;">
                                          <li><a style="float:left;" href=""><i class="lnr lnr-chevron-right"></i> Support</a></li>
                                          <li><a style="float:left;" href=""><i class="lnr lnr-chevron-right"></i> Account</a></li>
                                          <li><a style="float:left;" href=""><i class="lnr lnr-chevron-right"></i> Product Catalog</a></li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-3 col-xs-12">
                      <div class="fo_bottom_socail wow fadeIn" data-wow-duration="2.3s">
                          <a style="float:left;" href="#"><i class="fa fa-phone">+917838941249</i></a>
                        </br>
                          <a style="float:left;" href="mailto:master@iserv.tech"><i class="fa fa-envelope"></i>master@iserv.tech</a>
                        </br>
                          <p style="float:left;" >We are here for you all the time</p>
                      </div>
                  </div>
              </div>
          </div>





      </div>
  </section><!-- End of footer3 section -->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script type="text/javascript" src="js/jquery.1.11.1.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/SmoothScroll.js"></script>
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="js/jquery.isotope.js"></script>
<script type="text/javascript" src="js/jquery.parallax.js"></script>
<script type="text/javascript" src="js/jqBootstrapValidation.js"></script>
<script type="text/javascript" src="js/contact_me.js"></script>

<!-- Javascripts
    ================================================== -->
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
