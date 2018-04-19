<?php
define( '_VALID_MOS', 1 );
define( '_VALID_EXT', 1 );
require_once( dirname(__FILE__).'/libraries/standalone.php');
//ob_start();
include( dirname(__FILE__).'/admin.extplorer.php' );
require_once( 'libraries/PasswordHash.php');


 $data=array('sourabh',extEncodePassword(stripslashes('sourabh')),
    stripslashes('C:/xampp/htdocs/kaushik'),stripslashes('http://localhost'),
    '0','',
    '3',1);
   if(!ext_add_user($data)) {
    ext_Result::sendResult('adduser', false, "sourabh:error ");
   }
   ext_Result::sendResult('adduser', true, "sourabh: The user has been added");
   return;
 ?>
