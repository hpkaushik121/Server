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
        <title>Edmin</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
              <link rel="stylesheet" href="modal.css">
    </head>
    <style>
    .loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('images/loader.gif') 50% 50% no-repeat rgb(249,249,249);
    opacity: .8;
}
  </style>
    <body>
      <div class="loader"></div>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                  <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                      <i class="icon-reorder shaded"></i></a><a href="index2.php"><img class="brand"  src="cpanel-logo.svg" style="width:10%;"/> </a>
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
        <?php
         if(isset($_GET["del"])){
        $del=$_GET['del'];
        if($del=='true'){
      echo '  <div style="margin: 0 auto;width:25%"class="alert alert-success">';
   echo '<strong><b>Success!</b></strong> Emails has been successfully deleted.';
 echo '</div><script>setTimeout();</script>';}}?>
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="index2.php"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
                              <!--  <li><a href="activity.html"><i class="menu-icon icon-bullhorn"></i>News Feed </a>
                              </li>-->
                                <li><a href="message.php"><i class="menu-icon icon-inbox"></i>Inbox <b class="label green pull-right">
                                    <?php echo $bool;?></b> </a></li>
                                    <li><a href="#"><i class="icon-arrow-up"></i>Sent <b class="label orange pull-right">
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

                                <li><a href="logout/"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                            <div class="module message">
                                <div class="module-head">
                                    <h3>
                                        Message</h3>
                                </div>
                                <div class="module-option clearfix">
                                    <div class="pull-left">
                                        <div class="btn-group">
                                            <button class="btn">
                                              <?php
                                              if(isset($_GET['msg'])){
                                              $mailbox=$_GET['msg'];
                                              if($mailbox=='inb'){echo 'Inbox';}
                                              elseif($mailbox=='snt'){echo 'Sent';}else{echo 'Inbox';}}else{echo 'Inbox';}?>
                                                </button>
                                            <button class="btn dropdown-toggle" data-toggle="dropdown">
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="?msg=inb">Inbox(11)</a></li>
                                                <li><a href="?msg=snt">Sent</a></li>

                                            </ul>
                                        </div>
                                    </div>

                                    <div class="pull-right">

                                        <input type="submit"value="Compose" class="toggleModal"></input>
                                    </div>
                                    <div class="pull-right">
<p>  &nbsp; &nbsp;</p>
                                    </div>

                                    <div class="pull-right" >


                                    <div id="dvPassport" style="display: none">

                                        <img style="width:40px;"src="delete.png" type="submit"  class=" btn btn-primary " onclick="btn();"id="txtPassportNumber" />
                                    </div> </div>
                                </div>
                                <div class="module-body table">
                                    <table id="tab" class="table table-message">
                                        <tbody>
                                            <tr class="heading">
                                                <td class="cell-check">

                                                    <input type="checkbox" id="chkPassport" onchange="ShowHideDiv(this)" class="selectall">
                                                </td>
                                                <td class="cell-icon">
                                                </td>
                                                <td class="cell-author hidden-phone hidden-tablet">
                                                    Sender
                                                </td>
                                                <td class="cell-title">
                                                    Subject
                                                </td>
                                                <td class="cell-icon hidden-phone hidden-tablet">
                                                </td>
                                                <td class="cell-time align-right">
                                                    Date
                                                </td>
                                            </tr>
																						<?php

                                            if(isset($_GET['msg'])){
                                            if($mailbox=='inb'){$ml='INBOX';}
                                            elseif($mailbox=='snt'){$ml='SENT';}}else{$ml='INBOX';}
																						$hostname = '{mail.ipuniversity.tk:143/novalidate-cert}'.$ml;
                                            $username = base64_decode(base64_decode(base64_decode(base64_decode($_SESSION['created_email']))));
                                            $password = base64_decode(base64_decode(base64_decode(base64_decode($_SESSION['created_email_pass']))));

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
																							foreach ($emails as $email_number ) {


																								/* get information specific to this email */
																								$overview = imap_fetch_overview($inbox,$email_number,0);
																								$message = imap_fetchbody($inbox,$email_number,2);

																								/* output the email header information */
																								$seen = $overview[0]->seen ? 'read' : 'unread';

																								$subject= $overview[0]->subject;
																								$from= $overview[0]->from;
																								$date= $overview[0]->date;

$bool='';
																								/* output the email body */
																								$output.= '<div class="body">'.$message.'</div>';
                                                $structure = imap_fetchstructure($inbox, $email_number);
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
                                                                                                         {$message = imap_fetchbody($inbox,$email_number,1.2);
                                                                                                           $bool ='true';
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
                                                                                                             $attachments[$i]['attachment'] = imap_fetchbody($inbox, $email_number, $i+1);

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
                                                                                                         }else{$bool ='false';$message = imap_fetchbody($inbox,$email_number,2);}
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



                                                                                                     }
                                                 //if($count++ >= $max_emails) break;


                                                                                                 }



																						if($seen === 'read'){
																							echo '<tr class="read" onclick="Redirect(';echo $email_number ; echo ');" id="';echo $email_number ; echo '" >';
																							echo '<td class="cell-check">';
																							echo '  <input type="checkbox" id="chkPassport" onchange="ShowHideDiv(this)" class="inbox-checkbox">';
																							echo '</td>';
																							echo '<td class="cell-icon">';
																							echo '<i class="icon-star"></i>';
																							echo '</td>';
																							echo '<td class="cell-author hidden-phone hidden-tablet">';
																							echo $from;
																							echo '</td>';
																							echo '<td class="cell-title" >';
																							echo $subject;
																							echo '</td>';

																							echo '<td class="cell-icon hidden-phone hidden-tablet">';
                                                if($bool =='true'){
																							echo  '		<i class="icon-paper-clip"></i>';}
																							echo '</td>';
																							echo '<td class="cell-time align-right" style="width:30%;">';
																									echo $date;
																							echo '</td>';
																							echo '</tr>';
																						}
																						if($seen === 'unread'){
                                              imap_clearflag_full($inbox, $email_number, "\\Seen \\Recent");
                                            imap_expunge($inbox);
																							echo '<tr class="unread" onclick="Redirect(';echo $email_number ; echo');" id="';echo $email_number ; echo '" >';
																							echo '<td class="cell-check">';
																							echo '  <input type="checkbox" id="chkPassport" onchange="ShowHideDiv(this)" class="inbox-checkbox">';
																							echo '</td>';
																							echo '<td class="cell-icon">';
																							echo '<i class="icon-star"></i>';
																							echo '</td>';
																							echo '<td class="cell-author hidden-phone hidden-tablet">';
																							echo $from;
																							echo '</td>';
																							echo '<td class="cell-title" >';
																							echo $subject;
																							echo '</td>';

																							echo '<td class="cell-icon hidden-phone hidden-tablet">';
                                                if($bool =='true'){
																							echo '		<i class="icon-paper-clip"></i>';}
																							echo '</td>';
																							echo '<td class="cell-time align-right" style="width:30%;">';
																									echo $date;
																							echo '</td>';
																							echo '</tr>';
																						}
																							}




																						}

																						/* close the connection */
																						imap_close($inbox);
//echo '<script>setInterval(function(){location.reload();},10000)</script>';

																						?>


                                        </tbody>

                                    </table>

                                </div>

                                <div class="module-foot">


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
        <div class="modal ">
          <a href="#" style="margin-left:92% ;margin-top:2%;"class="toggleModal">X</a>
          <div class="modal__header">
            <div class="inner">
<h2><?php echo $username;?></h2>
              <div class="close"></div>
            </div>
          </div>
          <form action="send.php">
          <div class="modal__content">
            <div class="inner">

                        <div id="input_container">
                    <input type="email" id="input" name="to" placeholder="  Send To:" required>
                    <img src="mail.png" id="input_img">
                </div>
              </br>
                <div id="input_container">
              <input type="text" placeholder="  Subject" name ="subject" id= "input" required>
              <img src="pencil.png" id="input_img">
          </div>
        </br>
        <textarea id='r' name="r" required style="resize:none;width:100%;
      	height:200px;" >
        </textarea>


            </div>
          </div>
          <div class="modal__footer">
            <div class="inner">
              <button type="submit" style="background-color: transparent;
            	border-color: #fff"type="submit">
      <svg version="1.1" class="send-icn" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100px" height="36px" viewBox="0 0 100 36" enable-background="new 0 0 100 36" xml:space="preserve">
        <path d="M100,0L100,0 M23.8,7.1L100,0L40.9,36l-4.7-7.5L22,34.8l-4-11L0,30.5L16.4,8.7l5.4,15L23,7L23.8,7.1z M16.8,20.4l-1.5-4.3
	l-5.1,6.7L16.8,20.4z M34.4,25.4l-8.1-13.1L25,29.6L34.4,25.4z M35.2,13.2l8.1,13.1L70,9.9L35.2,13.2z" />
      </svg>
      </form>
    </button>
            </div>
          </div>
        </div>
        <div class="footer">
            <div class="container">
                <b class="copyright">&copy; 2017 Sourabh Kaushik </b>All rights reserved.
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script type="text/javascript">
$(window).load(function() {
    $(".loader").fadeOut("slow");
});
</script>
        <?php echo '<script> var s="';echo $ml;echo '";</script>'?>
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
				<script type="text/javascript"></script>

        <script>
        setTimeout(function() {
            $('.alert-success').fadeOut('fast');

        }, 1000);

        $('.toggleModal').on('click', function (event) {
          event.preventDefault();

          $('.modal').toggleClass('is-active');
          $('body').toggleClass('is-blurred');
        });
        $('.selectall').change(function () {
    $('tbody tr td input[type="checkbox"]').prop('checked', $(this).prop('checked'));
});

        </script>
        <script>
        var checkboxes = document.querySelectorAll("tr input");

    for (var i = 0, l = checkboxes.length; i < l; i++) {
        checkboxes[i].onclick = function(e) {
            e.stopPropagation();
        }
    }
    function btn( )
    {
      var tableControl= document.getElementById('tab');
   var arrayOfValues = [];
   $('input:checkbox:checked', tableControl).each(function() {
            arrayOfValues.push($(this).closest('tr').attr('id'));
        }).get();
        window.location.href = "mail.php?id=" + arrayOfValues+"&msg="+s;

    }
       function Redirect( o)
       {
				 var Row = document.getElementById(o);
var Cells = Row.getElementsByTagName("td");

//alert(Cells[2].innerText);

      location.href= "inbox2.php?id="+o+"&msg="+s;
       }
    </script>
    <script>
    function ShowHideDiv(chkPassport) {
         var dvPassport = document.getElementById("dvPassport");
         dvPassport.style.display = chkPassport.checked ? "block" : "none";
     }
   </script>

    </body>
