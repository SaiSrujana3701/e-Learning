<?php
if(!isset($_SESSION['faculty']))
{
$_SESSION['no-login-messege']="please login";
header('location:'.SITEURL.'student/home.php');
}
?>