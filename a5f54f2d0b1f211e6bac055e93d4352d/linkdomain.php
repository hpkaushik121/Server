<?php
session_start();
if(!isset($_SESSION['username']) ||!isset($_SESSION['password'])||!isset($_SESSION['password'])){
  header("Location:/cpanel");
}
$user=$_SESSION['username'];
$pass=$_SESSION['password'];
$id= $_SESSION['id'];
$domain=$_GET['addr'];
?>