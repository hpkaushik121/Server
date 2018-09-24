<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edmin</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>

    </head>
    <style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);
    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Open Sans', sans-serif;
    }

    .clr {
      clear: both;
    }

    a {
      text-decoration: none;
    }

    .btn {
      border-radius: 4px;
      padding: 6px 10px;
      text-align: center;
      text-shadow: none;
      color: #fff;
      background: #fff;
    }
    .btn.btn-primary {
      background: #44c4e7;
    }



    .sidebar {
      width: 250px;
      background: #34393d;
      order: 1;
      flex-flow: column;
      color: #fff;
    }
    .sidebar a {
      color: #fff;
    }
    .sidebar h1 {
      font-weight: 400;
      background: #19a0c5;
      line-height: 80px;
      margin: 0;
      padding: 0 30px;
    }
    .sidebar .main-nav {
      margin: 30px 0;
    }
    .sidebar .main-nav > ul {
      list-style: none;
      margin: 0;
      padding: 0;
    }
    .sidebar .main-nav > ul > li {
      transition: background-color .3s ease;
    }
    .sidebar .main-nav > ul > li.active, .sidebar .main-nav > ul > li:hover {
      background: #40464b;
    }
    .sidebar .main-nav > ul > li > a {
      padding: 20px 30px;
      display: block;
      color: #999;
      font-weight: 700;
      text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
    }
    .sidebar .main-nav > ul > li > .btn {
      display: block;
      color: #fff;
      text-shadow: none;
      margin: 10px 30px;
      padding: 10px;
      font-weight: 400;
    }
    .sidebar .main-nav > ul > li > ul {
      list-style: none;
      margin: 0;
      padding: 10px 0;
    }
    .sidebar .main-nav > ul > li > ul.labels {
      border-top: 1px solid #555;
      margin-top: 20px;
    }
    .sidebar .main-nav > ul > li > ul > li {
      transition: background-color .3s ease;
      padding: 10px 30px;
    }
    .sidebar .main-nav > ul > li > ul > li.active, .sidebar .main-nav > ul > li > ul > li:hover {
      background: #4b5359;
    }
    .sidebar .main-nav > ul > li > ul > li .btn {
      font-size: .875rem;
      padding: 5px;
      float: right;
      position: relative;
      top: -4px;
    }
    .sidebar .main-nav > ul > li > ul > li .label {
      width: 20px;
      height: 20px;
      display: inline-block;
      top: 0;
    }
    .sidebar .main-nav > ul > li > ul > li a {
      color: #999;
    }

    .main {
      -webkit-flex: 1;
      order: 2;
      background: #f5f5f5;
    }
    .main .header {
      background: #44c4e7;
      min-height: 80px;
    }
    .main .header form {
      padding: 20px;
      display: inline-block;
    }
    .main .header form input[type="search"] {
      background: #19a0c5;
      border: none;
      border-radius: 3px;
      line-height: 40px;
      width: 500px;
      padding: 0 10px;
      outline: none;
    }
    .main .header form input[type="search"]::-webkit-input-placeholder {
      color: #fff;
    }
    .main .header ul {
      list-style: none;
      margin: 0;
      padding: 0;
    }
    .main .header .nav-settings {
      float: right;
      line-height: 80px;
      border-left: 1px solid #1cb3dc;
    }
    .main .header .nav-settings li {
      display: inline-block;
    }
    .main .header .nav-settings li:hover {
      background: #2dbde4;
    }
    .main .header .nav-settings li a {
      padding: 0 20px;
      color: #fff;
      display: inline-block;
    }

    .messages {
      order: 1;
      width: 400px;
      background: #fff;
      border-right: 1px solid #DDD;
    }
    .messages h1 {
      margin: 0;
      padding: 20px;
      font-weight: 400;
      color: #777;
      border-bottom: 1px solid #DDD;
    }
    .messages form {
      padding: 20px;
      background: #FCFCFC;
    }
    .messages form input[type="search"] {
      width: 100%;
      border-radius: 4px;
      border: 1px solid #ddd;
      padding: 10px;
      box-sizing: border-box;
      outline: none;
    }
    .messages .message-list {
      padding: 0;
      margin: 0;
      list-style: none;
      border-bottom: 1px solid #ddd;
    }
    .messages .message-list li {
      background: #F8F6F4;
      transition: background-color .3s ease;
      border-top: 1px solid rgba(0, 0, 0, 0.1);
      border-right: 3px solid #1cb3dc;
      padding: 10px 20px;
      display: flex;
      cursor: pointer;
    }
    .messages .message-list li input[type="checkbox"] {
      appearance: none;
      cursor: pointer;
      margin: 5px 10px 0 0;
      order: 1;
      width: 15px;
      height: 15px;
      background: #fff;
      border: 1px solid #ddd;
      border-radius: 3px;
    }
    .messages .message-list li input[type="checkbox"]:checked {
      background: #EFEFEF;
    }
    .messages .message-list li .preview {
      flex: 1;
      order: 2;
    }
    .messages .message-list li .preview h3 {
      margin: 0;
      font-weight: 400;
      color: #333;
    }
    .messages .message-list li .preview h3 small {
      float: right;
      color: #AAA;
      font-size: .8125rem;
    }
    .messages .message-list li .preview p {
      color: #888;
      margin: 5px 0;
    }
    .messages .message-list li:hover {
      background: #fff;
    }
    .messages .message-list li.active {
      background: #fd9162;
      border-right: 3px solid rgba(0, 0, 0, 0.1);
    }
    .messages .message-list li.active .preview h3, .messages .message-list li.active .preview h3 small, .messages .message-list li.active .preview p {
      color: #fff;
    }
    .messages .message-list li.new {
      background: #fff;
      border-right: 3px solid #44c4e7;
    }

    .message {
      -webkit-flex: 1;
      order: 2;
      background: #fff;
    }
    .message h2 {
      margin: 0;
      padding: 20px 30px;
      font-weight: 400;
    }
    .message .meta-data {
      margin: 10px 30px;
      border-top: 1px solid #ddd;
      border-bottom: 1px solid #ddd;
      line-height: 50px;
      color: #888;
    }
    .message .meta-data .user {
      color: #fd9162;
    }
    .message .meta-data img {
      display: inline;
      vertical-align: middle;
      margin-right: 20px;
      border-radius: 3px;
    }
    .message .meta-data .date {
      float: right;
      color: #aaa;
    }
    .message .body {
      padding: 20px 30px;
    }
    .message .action {
      background: #fcfcfc;
      border-top: 1px solid #ddd;
      border-bottom: 1px solid #ddd;
      padding: 20px 30px;
    }
    .message .action .options {
      list-style: none;
      margin: 0;
      padding: 0;
    }
    .message .action .options li {
      float: left;
    }
    .message .action .options li:first-child {
      border-right: 1px solid #ddd;
    }
    .message .action .options li:first-child a {
      padding-left: 0;
    }
    .message .action .options li a {
      color: #888;
      padding: 0 10px;
    }
    .message .action .options li a.active {
      color: #333;
    }
    .message .action .textarea {
      background: #fff;
      padding: 10px;
      border: 1px solid #ddd;
      position: relative;
      margin: 20px 0;
    }
    .message .action .textarea:before {
      content: '';
      display: block;
      border: 10px solid transparent;
      border-bottom: 10px solid #FFF;
      position: absolute;
      top: -19px;
      left: 25px;
      -webkit-filter: drop-shadow(0 -1px 0 #ddd);
    }
    .message .action .textarea textarea {
      width: 100%;
      min-height: 300px;
      appearance: none;
      border: none;
      resize: none;
      outline: none;
      margin-bottom: 50px;
    }
    .message .action .textarea .fileupload {
      background: #FCFCFC;
      border: 1px solid #ddd;
      padding: 10px;
      color: #888;
      justify-content: space-between;
    }
    .message .action .textarea .fileupload .fileinfo {
      flex: 1;
    }
    .message .action .textarea .fileupload .progress {
      width: 80%;
      border: 1px solid #ddd;
      background: #fff;
      padding: 2px;
    }
    .message .action .textarea .fileupload .progress .bar {
      background: #44c4e7;
      width: 65%;
      text-align: right;
      color: #fff;
      padding: 3px;
      font-size: .75rem;
    }
    div.gallery {
        border: 1px solid #ccc;
    }

    div.gallery:hover {
        border: 1px solid #777;
    }

    div.gallery img {
        width: 100%;
        height: auto;
    }

    div.desc {
        padding: 15px;
        text-align: center;
    }

    * {
        box-sizing: border-box;
    }

    .responsive {
        padding: 0 0px;
        display: inline-block;
          position: relative;
          width: 100%;
        width: 24.99999%;

    }

    @media only screen and (max-width: 700px){
        .responsive {
            width: 49.99999%;
            margin: 0px 0;
        }
    }

    @media only screen and (max-width: 500px){
        .responsive {
            width: 100%;
        }
    }

    .clearfix:after {
        content: "";
        display: table;
        clear: both;
    }
    .name{
    display:inline-block;
    width:180px;
    white-space: nowrap;
    overflow:hidden !important;
    text-overflow: ellipsis;
}

    </style>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="index2.html">Edmin </a>
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
                        <ul class="nav pull-right" >
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
                                    <li><a href="#">Your Profile</a></li>
                                    <li><a href="#">Edit Profile</a></li>
                                    <li><a href="#">Account Settings</a></li>
                                    <li class="divider"></li>
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
                    <div class="span3" >
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="index2.php"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
                              <!--  <li><a href="activity.html"><i class="menu-icon icon-bullhorn"></i>News Feed </a>
                              </li>-->
                                <li><a href="message.php"><i class="menu-icon icon-inbox"></i>Inbox <b class="label green pull-right">
                                    11</b> </a></li>
                                <li><a href="#"><i class="menu-icon icon-tasks"></i>Tasks <b class="label orange pull-right">
                                    19</b> </a></li>
                            </ul>
                            <!--/.widget-nav-->
                            <!--<ul class="widget widget-menu unstyled">
                                <li><a href="ui-button-icon.html"><i class="menu-icon icon-bold"></i> Buttons </a></li>
                                <li><a href="ui-typography.html"><i class="menu-icon icon-book"></i>Typography </a></li>
                                <li><a href="form.html"><i class="menu-icon icon-paste"></i>Forms </a></li>
                                <li><a href="table.html"><i class="menu-icon icon-table"></i>Tables </a></li>
                                <li><a href="charts.html"><i class="menu-icon icon-bar-chart"></i>Charts </a></li>
                            </ul>-->
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                                <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon icon-cog">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>More Pages </a>
                                    <ul id="togglePages" class="collapse unstyled">
                                        <li><a  href="#"><i style="color:#000000;" class="icon-inbox"></i><font style="color:#000000;">Login</font> </a></li>
                                        <li><a href="#"><i style="color:#000000;" class="icon-inbox"></i><font style="color:#000000;">Profile </font></a></li>
                                        <li><a href="#"><i style="color:#000000;" class="icon-inbox"></i><font style="color:#000000;">All Users</font> </a></li>
                                    </ul>
                                </li>
                                <li><a href="logout/"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <div class="span9" >
                        <div class="content">
                            <div class="module message" style="width:100%">
                              <div class="container app" style="width:100%">

                                <div class="main"style="width:100%">

                                  <div class="container" style="width:100%">
                                    <?php

if(isset($_GET['msg'])){$mail=$_GET['msg'];}else{$mail='INBOX';}
                                      $hostname = '{mail.iserv.tech:143/novalidate-cert}'.$mail;
                                      $username = base64_decode(base64_decode(base64_decode(base64_decode($_SESSION['created_email']))));
                                      $password = base64_decode(base64_decode(base64_decode(base64_decode($_SESSION['created_email_pass']))));

                                      $num = $_GET['id'];


                                      /* try to connect */
                                      $inbox = imap_open($hostname,$username,$password) or die('Cannot connect to server: ' . imap_last_error());

                                      /* grab emails */
                                      $emails = imap_search($inbox,'ALL');
$fromaddr='';
                                      /* if emails are returned, cycle through each... */
                                      if($emails) {

                                        /* begin output var */
                                        $output = '';

                                        /* put the newest emails on top */
                                        rsort($emails);

                                        /* for every email... */

                                      $overview = imap_fetch_overview($inbox,$num,0);
                                          /* get information specific to this email */
                                          $message = imap_fetchbody($inbox,$num,1.2);

                                          $seen = $overview[0]->seen ? 'read' : 'unread';

                                          $subject= $overview[0]->subject;
                                          $from= $overview[0]->from;
                                          $date= $overview[0]->date;
                                          if($mail =='SENT'){$to = $overview[0]->to;}
                                          $header = imap_headerinfo($inbox, $num);
$fromaddr = $header->from[0]->mailbox . "@" . $header->from[0]->host;

                                          /* output the email body */
 $structure = imap_fetchstructure($inbox, $num);
                                          $attachments = array();

                                                  /* if any attachments found... */
                                                  if(isset($structure->parts) && count($structure->parts))
                                                  {
                                                      for($i = 0; $i < count($structure->parts); $i++)
                                                      {
                                                          $attachments[$i] = array(
                                                              'is_attachment' => false,
                                                              'filename' => '',
                                                              'name' => '',
                                                              'attachment' => ''
                                                          );

                                                          if($structure->parts[$i]->ifdparameters)
                                                          {
                                                              foreach($structure->parts[$i]->dparameters as $object)
                                                              {
                                                                  if(strtolower($object->attribute) == 'filename')
                                                                  {
                                                                      $attachments[$i]['is_attachment'] = true;
                                                                      $attachments[$i]['filename'] = $object->value;
                                                                  }
                                                              }
                                                          }

                                                          if($structure->parts[$i]->ifparameters)
                                                          {$message = imap_fetchbody($inbox,$num,1.2);
                                                              foreach($structure->parts[$i]->parameters as $object)
                                                              {
                                                                  if(strtolower($object->attribute) == 'name')
                                                                  {
                                                                      $attachments[$i]['is_attachment'] = true;
                                                                      $attachments[$i]['name'] = $object->value;
                                                                  }
                                                              }
                                                          }

                                                          if($attachments[$i]['is_attachment'])
                                                          {
                                                              $attachments[$i]['attachment'] = imap_fetchbody($inbox, $num, $i+1);

                                                              /* 3 = BASE64 encoding */
                                                              if($structure->parts[$i]->encoding == 3)
                                                              {
                                                                  $attachments[$i]['attachment'] = base64_decode($attachments[$i]['attachment']);
                                                              }
                                                              /* 4 = QUOTED-PRINTABLE encoding */
                                                              elseif($structure->parts[$i]->encoding == 4)
                                                              {
                                                                  $attachments[$i]['attachment'] = quoted_printable_decode($attachments[$i]['attachment']);
                                                              }
                                                          }else{$message = imap_fetchbody($inbox,$num,2);}
                                                      }
                                                  }

                                                  /* iterate through each attachment and save it */
                                                  foreach($attachments as $attachment)
                                                  {
                                                      if($attachment['is_attachment'] == 1)
                                                      {
                                                          $filename = $attachment['name'];
                                                          if(empty($filename)) $filename = $attachment['filename'];

                                                          if(empty($filename)) $filename = time() . ".dat";

                                                          /* prefix the email number to the filename in case two emails
                                                           * have the attachment with the same file name.
                                                           */
                                                           if (strpos($filename, '.php') !== true && strpos($filename, '.html') !== true && strpos($filename, '.exe') !== true && strpos($filename, '.rar') !== true && strpos($filename, '.PIF') !== true
                                                         && strpos($filename, '.application') !== true && strpos($filename, '.gadget') !== true && strpos($filename, '.msi') !== true && strpos($filename, '.msp') !== true && strpos($filename, '.com') !== true
                                                       && strpos($filename, '.scr') !== true && strpos($filename, '.hta') !== true && strpos($filename, '.cpl') !== true && strpos($filename, '.msc') !== true && strpos($filename, '.jar') !== true
                                                       && strpos($filename, '.dll') !== true &&  strpos($filename, '.vbs') !== true){
                                                          $fp = fopen("files/" . $filename, "w+");
                                                          fwrite($fp, $attachment['attachment']);
                                                          fclose($fp);}


                                                      }
  //if($count++ >= $max_emails) break;


                                                  }


                                              }







                                      /* close the connection */
                                      imap_close($inbox);

                                     ?>
                                    <section class="message">
                                      <h2 id="subject"><span class="icon icon-star-large"></span> <?php echo $subject;?><span class="icon icon-reply-large"></span><span class="icon icon-delete-large"></span></h2>
                                      <div class="meta-data">
                                        <p>
                                          <img src="http://placehold.it/40x40" class="avatar" alt="" />
                                          <?php echo $fromaddr?> to <span class="user">me</span>
                                          <span class="date"><?php echo $date;?></span>
                                        </p>
                                      </div>
                                      <div class="body">
                                        <p><?php if($mail =='SENT'){echo $to;}else{if (base64_decode($message, true)){
    echo base64_decode($message);
}else{echo $message;}}

?></p>


                                        <?php

                                        $hostname = '{mail.iserv.tech:143/novalidate-cert}'.$mail;
                                        $username = base64_decode(base64_decode(base64_decode(base64_decode($_SESSION['created_email']))));
                                        $password = base64_decode(base64_decode(base64_decode(base64_decode($_SESSION['created_email_pass']))));
                                        $num = $_GET['id'];

                                        /* try to connect */
                                        $inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());

                                        /* grab emails */
                                        $emails = imap_search($inbox,'ALL');

                                        /* if emails are returned, cycle through each... */
                                        if($emails) {

                                          /* begin output var */
                                          $output = '';

                                          /* put the newest emails on top */
                                          rsort($emails);

                                          /* for every email... */

                                        $overview = imap_fetch_overview($inbox,$num,0);
                                            /* get information specific to this email */
                                            $message = imap_fetchbody($inbox,$num,1.2);



                                                                                  /* output the email body */
                                         $structure = imap_fetchstructure($inbox, $num);
                                                                                  $attachments = array();

                                                                                          /* if any attachments found... */
                                                                                          if(isset($structure->parts) && count($structure->parts))
                                                                                          {
                                                                                              for($i = 0; $i < count($structure->parts); $i++)
                                                                                              {
                                                                                                  $attachments[$i] = array(
                                                                                                      'is_attachment' => false,
                                                                                                      'filename' => '',
                                                                                                      'name' => '',
                                                                                                      'attachment' => ''
                                                                                                  );

                                                                                                  if($structure->parts[$i]->ifdparameters)
                                                                                                  {
                                                                                                      foreach($structure->parts[$i]->dparameters as $object)
                                                                                                      {
                                                                                                          if(strtolower($object->attribute) == 'filename')
                                                                                                          {
                                                                                                              $attachments[$i]['is_attachment'] = true;
                                                                                                              $attachments[$i]['filename'] = $object->value;
                                                                                                          }
                                                                                                      }
                                                                                                  }

                                                                                                  if($structure->parts[$i]->ifparameters)
                                                                                                  {$message = imap_fetchbody($inbox,$num,1.1);
                                                                                                      foreach($structure->parts[$i]->parameters as $object)
                                                                                                      {
                                                                                                          if(strtolower($object->attribute) == 'name')
                                                                                                          {
                                                                                                              $attachments[$i]['is_attachment'] = true;
                                                                                                              $attachments[$i]['name'] = $object->value;
                                                                                                          }
                                                                                                      }
                                                                                                  }

                                                                                                  if($attachments[$i]['is_attachment'])
                                                                                                  {
                                                                                                      $attachments[$i]['attachment'] = imap_fetchbody($inbox, $num, $i+1);

                                                                                                      /* 3 = BASE64 encoding */
                                                                                                      if($structure->parts[$i]->encoding == 3)
                                                                                                      {
                                                                                                          $attachments[$i]['attachment'] = base64_decode($attachments[$i]['attachment']);
                                                                                                      }
                                                                                                      /* 4 = QUOTED-PRINTABLE encoding */
                                                                                                      elseif($structure->parts[$i]->encoding == 4)
                                                                                                      {
                                                                                                          $attachments[$i]['attachment'] = quoted_printable_decode($attachments[$i]['attachment']);
                                                                                                      }
                                                                                                  }else{$message = imap_fetchbody($inbox,$num,2);}
                                                                                              }
                                                                                          }

                                                                                          /* iterate through each attachment and save it */
                                                                                          foreach($attachments as $attachment)
                                                                                          {
                                                                                              if($attachment['is_attachment'] == 1)
                                                                                              {
                                                                                                  $filename = $attachment['name'];
                                                                                                  if(empty($filename)) $filename = $attachment['filename'];

                                                                                                  if(empty($filename)) $filename = time() . ".dat";



                                                                                                  if (strpos($filename, '.png') !== false||strpos($filename, '.jpg') !== false||strpos($filename, '.jpeg') !== false||strpos($filename, '.bmp') !== false) {
                                                                                                  echo' <div  class="responsive"> ';
                                                                                                  echo'<div class="gallery">';
                                                                                                    echo '<a target="_blank" href="files/';echo $filename; echo '"download>';
                                                                                                    echo '  <img  src="';echo 'files/'.$filename;echo '"  width="300" height="200" >';
                                                                                                  echo ' </a>';
                                                                                                    echo '<div class="desc"><p class="name">';echo $filename; echo'</p></div>';
                                                                                                  echo '</div>';
                                                                                                echo '</div>';
                                        }    elseif (strpos($filename, '.txt') !== false) {
                                                echo' <div  class="responsive"> ';
                                                echo'<div class="gallery">';
                                                  echo '<a target="_blank" href="files/';echo $filename; echo '"download>';
                                                  echo '  <img src="';echo 'text.ico';echo '"  width="300" height="200">';
                                                echo ' </a>';
                                                  echo '<div class="desc"><p class="name">';echo $filename; echo'</p></div>';
                                                echo '</div>';
                                              echo '</div>';
} elseif (strpos($filename, '.ppt') !== false||strpos($filename, '.pptx') !== false) {
        echo' <div  class="responsive"> ';
        echo'<div class="gallery">';
          echo '<a target="_blank" href="files/';echo $filename; echo '"download>';
          echo '  <img src="';echo 'ppt.jpeg';echo '"  width="300" height="200">';
        echo ' </a>';
          echo '<div class="desc"><p class="name">';echo $filename; echo'</p></div>';
        echo '</div>';
      echo '</div>';
}elseif (strpos($filename, '.xls') !== false||strpos($filename, '.xlsx') !== false) {
        echo' <div  class="responsive"> ';
        echo'<div class="gallery">';
          echo '<a target="_blank" href="files/';echo $filename; echo '"download>';
          echo '  <img src="';echo 'xls.png';echo '"  width="300" height="200">';
        echo ' </a>';
          echo '<div class="desc"><p class="name">';echo $filename; echo'</p></div>';
        echo '</div>';
      echo '</div>';
}elseif (strpos($filename, '.pdf') !== false) {
        echo' <div  class="responsive"> ';
        echo'<div class="gallery">';
          echo '<a target="_blank" href="files/';echo $filename; echo '"download>';
          echo '  <img src="';echo 'pdf.jpg';echo '"  width="300" height="200">';
        echo ' </a>';
          echo '<div class="desc"><p class="name">';echo $filename; echo'</p></div>';
        echo '</div>';
      echo '</div>';
}else{
        echo' <div  class="responsive"> ';
        echo'<div class="gallery">';
          echo '<a target="_blank" href="files/';echo $filename; echo '"download>';
          echo '  <img src="';echo 'other.png';echo '"  width="300" height="200">';
        echo ' </a>';
          echo '<div class="desc"><p class="name">';echo $filename; echo'</p></div>';
        echo '</div>';
      echo '</div>';
}

                                                                                              }
                                          //if($count++ >= $max_emails) break;


                                                                                          }


}

  imap_close($inbox);






                                         ?>
                                      </div>
                                      <div class="action">
                                        <ul class="options">
                                          <li><a href="#" class="active">Answering</a></li>
                                          <li><a href="#">Forward</a></li>
                                          <div class="clr"></div>
                                        </ul>


                                        <div class="textarea">
                                          <textarea id="r" required></textarea>

                                        </div>
                                          <input class="btn" onclick="rs('<?php echo $fromaddr;?>','<?php echo $subject;?>');" style="margin-left:94%;" type="submit"value="send"/>

                                      </div>

                                    </section>
                                  </div>
                                </div>
                              </div>

                            </div>
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
                <b class="copyright">&copy; 2014 Sourabh Kaushik </b>All rights reserved.
            </div>
        </div>
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>


				<script type="text/javascript">

function rs(email,subject){

   window.location.href="send.php?to="+email+"&subject="+subject+"&r="+document.getElementById('r').value;
 }
       function Redirect( o)
       {

document.getElementById(o).classList.remove('new');

         var els = document.querySelectorAll('.active')

         for (var i = 0; i < els.length; i++) {
           els[i].classList.remove('active')

         }


       }
    </script>
    </body>
