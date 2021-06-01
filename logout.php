<?php
    include('mysqlconnection.php');
    session_destroy();
    header("location:".SITEURL."student/home.php");
?>