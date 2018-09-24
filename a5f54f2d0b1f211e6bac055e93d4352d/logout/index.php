<?php
session_start();
session_destroy();

$session_name = 'SignonSession';
session_name($session_name);
@session_start();

@session_destroy();


header("Location: /cpanel/");

 ?>
