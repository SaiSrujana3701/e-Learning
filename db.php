<?php

$serverName="localhost:3307";
$userName="root";
$password="";
$dbName="mini-project";

$con=mysqli_connect($serverName,$userName,$password,$dbName);

if(mysqli_connect_errno()){
    echo "Failed to connect";
    exit();
}
echo "Connection success!";

?>