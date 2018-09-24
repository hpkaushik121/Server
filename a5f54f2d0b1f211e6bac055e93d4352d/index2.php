<?php
session_start();
if(!isset($_SESSION['username']) ||!isset($_SESSION['password'])||!isset($_SESSION['password'])){
  header("Location:/cpanel");
}
$db_user=$_SESSION['db_user'];
$db_pass=$_SESSION['db_pass'];
$file_user=$_SESSION['file_user'];
$file_pass = $_SESSION['file_pass'];
if(isset($_GET['msg'])){
if($mailbox=='inb'){$ml='INBOX';}
elseif($mailbox=='snt'){$ml='SENT';}}else{$ml='INBOX';}
$hostname = '{mail.ipuniversity.tk:143/novalidate-cert}'.$ml;
$username = base64_decode(base64_decode(base64_decode(base64_decode($_SESSION['created_email']))));
$password = base64_decode(base64_decode(base64_decode(base64_decode($_SESSION['created_email_pass']))));
$bool=0;
/* try to connect */
if($inbox = @imap_open($hostname,$username,$password) ){

/* grab emails */
$emails = imap_search($inbox,'ALL');

/* if emails are returned, cycle through each... */
if($emails) {

  /* begin output var */
  $output = '';

  /* put the newest emails on top */
  rsort($emails);

/* for every email... */
  foreach($emails as $email_number) {


    /* get information specific to this email */
    $overview = imap_fetch_overview($inbox,$email_number,0);
    $message = imap_fetchbody($inbox,$email_number,2);

    /* output the email header information */
    $seen = $overview[0]->seen ? 'read' : 'unread';

    $subject= $overview[0]->subject;
    $from= $overview[0]->from;
    $date= $overview[0]->date;


    /* output the email body */
    $output.= '<div class="body">'.$message.'</div>';


if($seen === 'unread'){
  $bool=$bool+1;
  imap_clearflag_full($inbox, $email_number, "\\Seen \\Recent");
imap_expunge($inbox);
}

  }




}

/* close the connection */
imap_close($inbox);}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>cPanel</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a href="index2.php"><img class="brand"  src="cpanel-logo.svg" style="width:6.5%;"/> </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav nav-icons">
                            <li class="active"><a href="#"><i class="icon-envelope"></i></a></li>
                            <li><a href="#"><i class="icon-eye-open"></i></a></li>
                            <li><a href="#"><i class="icon-bar-chart"></i></a></li>
                        </ul>
                        <form class="navbar-search pull-left input-append" action="#">
                        <input type="text" class="span3">
                        <button class="btn" type="button">
                            <i class="icon-search"></i>
                        </button>
                        </form>
                        <ul class="nav pull-right">
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Item No. 1</a></li>
                                    <li><a href="#">Don't Click</a></li>
                                    <li class="divider"></li>
                                    <li class="nav-header">Example Header</li>
                                    <li><a href="#">A Separated link</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Support </a></li>
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="images/user.png" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">

                                    <li><a href="#">Edit Profile</a></li>
                                    <li><a href="#">Account Settings</a></li>

                                    <li><a href="logout/">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="index2.php"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>

                                <li><a href="message.php"><i class="menu-icon icon-inbox"></i>Inbox <b class="label green pull-right">
                                    <?php echo $bool;?></b> </a></li>
                                <li><a href="#"><i class="icon-arrow-up"></i>Sent <b class="label orange pull-right">
                                    19</b> </a></li>
                            </ul>
                            <!--/.widget-nav-->



                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">

                                <li><a href="logout/"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                            <div class="btn-controls">
                                <div class="btn-box-row row-fluid">
                                    <a href="/hidepma/auth.php?user=<?php echo $db_user;?>&pass=<?php echo $db_pass;?>" type="submit" target="blank" class="btn-box big span4"><img src="favicon.ico"/>
                                        <p class="text-muted">
                                            phpMyAdmin</p>
                                    </a><a href="nn/lg.php?user=<?php echo $file_user;?>&pass=<?php echo $file_pass;?>" target="blank"  class="btn-box big span4"><i  class="icon-tasks"></i>

                                        <p class="text-muted">
                                            File Manager</p>
                                    </a><a href="#" class="btn-box big span4"><img src="backup.ico"></img>
                                        <p class="text-muted">
                                            Backup
                                          </p>
                                    </a>
                                </div>
                                <div class="btn-box-row row-fluid">
                                    <div class="span8">
                                        <div class="row-fluid">
                                            <div class="span12">
                                                <a href="#" class="btn-box small span4"><img src="db.png"></img><b>Create database</b>
                                                </a><a href="mail/" target="blank"class="btn-box small span4"><img src="email.png"></img><b>Create Emails</b>
                                                </a><a href="setdomain.php" class="btn-box small span4"><img src="domain.png"></img></i><b>Link domains</b>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span12">
                                                <a href="#" class="btn-box small span4"><img src="wp.png"></img><b>Wordpress</b>
                                                </a><a href="#" class="btn-box small span4"><img src="joomla.png"></img><b>Joomla</b>
                                                </a><a href="#" class="btn-box small span4"><img src="drupal.png"></img><b>Drupal
                                                  </b> </a>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="widget widget-usage unstyled span4">
                                        <li>
                                          <?php

                                          $f = 'C:\xampp\a5f54f2d0b1f211e6bac055e93d4352d';
                                          $size= folderSize($f);
                                          $gb =$size/(1024*1024*1024);

                                          $perc = number_format((float)$gb, 3, '.', '');
                                          function folderSize ($dir)
                                          {
                                          $size = 0;
                                          foreach (glob(rtrim($dir, '/').'/*', GLOB_NOSORT) as $each) {
                                              $size += is_file($each) ? filesize($each) : folderSize($each);
                                          }
                                          return $size;
                                          }
                                          ?>

                                            <p>
                                                <strong>Windows 8</strong> <span class="pull-right small muted"><?php echo $perc;?>%</span>
                                            </p>
                                            <div class="progress tight">
                                                <?php echo '<div class="bar" style="width:'; echo $perc; echo '%">';?>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <p>
                                                <strong>Mac</strong> <span class="pull-right small muted">56%</span>
                                            </p>
                                            <div class="progress tight">
                                                <div class="bar bar-success" style="width: 56%;">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <p>
                                                <strong>Linux</strong> <span class="pull-right small muted">44%</span>
                                            </p>
                                            <div class="progress tight">
                                                <div class="bar bar-warning" style="width: 44%;">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <p>
                                                <strong>iPhone</strong> <span class="pull-right small muted">67%</span>
                                            </p>
                                            <div class="progress tight">
                                                <div class="bar bar-danger" style="width: 67%;">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--/#btn-controls-->

                            <!--/.module-->


                            <!--/.module-->
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->

        <div class="footer">
            <div class="container">
                <b class="copyright">&copy; 2014 cPanel - hostpots.com </b>All rights reserved.
            </div>
        </div>


        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>

    </body>
