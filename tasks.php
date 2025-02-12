<?php

//Database Configuration
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "task_app";

//Database Connection
$conn = new mysqli($serverName, $userName, $password, $dbName);

if($conn){
    echo "Connected Successfully";
}else{
    echo "Connection Failed";
}



?>