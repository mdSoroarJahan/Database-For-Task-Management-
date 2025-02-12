<?php

//Database Configuration
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "task_app";

//Database Connection
$conn = new mysqli($serverName, $userName, $password, $dbName);

if(!$conn){
    die($conn->connect_error);
}

//Task Validation
function validateTask($title){
    //if the task is empty
    if(empty($title)){
        echo "Task cannot be empty.<br>";
        return false;
    }

    //if task already exists
    global $conn;
    $sql = "SELECT COUNT(*) as count FROM tasks WHERE title = '$title'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if($row['count'] > 0 ){
        echo "Task already exists<br>";
        return false;
    }
    return true;
}


//1. Add a Task with validation
$title = "Task 2";
$description = "Description 2";
$priority = "high";

if(validateTask($title)){
    $addTaskSql = "INSERT INTO tasks(title, description, priority) VALUES ('$title', '$description', '$priority')";

    if($conn->query($addTaskSql)){
        echo "Task added successfully.<br>";
    }else{
        echo "Error cannot add tasks.<br>";
    }
}




?>