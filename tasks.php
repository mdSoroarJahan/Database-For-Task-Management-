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
// $title = "Task 2";
// $description = "Description 2";
// $priority = "high";

// if(validateTask($title)){
//     $addTaskSql = "INSERT INTO tasks(title, description, priority) VALUES ('$title', '$description', '$priority')";

//     if($conn->query($addTaskSql)){
//         echo "Task added successfully.<br>";
//     }else{
//         echo "Error cannot add tasks.<br>";
//     }
// }

// //get a single task by id
// $singleTaskId = 2;
// $singleTaskSql = "SELECT * FROM tasks WHERE id = $singleTaskId";
// $singleTaskResult = $conn->query($singleTaskSql);

// echo "Reading Single Task.<br>";
// if($singleTaskResult->num_rows > 0){
//     $row = $singleTaskResult->fetch_assoc();
//     echo "ID: {$row['id']}, Title: {$row['title']}, Description: {$row['description']}, Priority: {$row['priority']} <br>";
// }else{
//     echo "Task not found <br>";
// }


// //Read all tasks
// $readTasksSql = "SELECT * FROM tasks";
// $result = $conn->query($readTasksSql);

// echo "Reading all tasks<br>";
// if($result->num_rows > 0){
//     while($row = $result->fetch_assoc()){
//         echo "ID: {$row['id']}, Title: {$row['title']}, Description: {$row['description']}, Priority: {$row['priority']}, Created At: {$row['created_at']}<br>";
//     }
// }else{
//     echo "No tasks found <br>";
// }


// //edit a task by ID
// $updateTaskID = 2;
// $newTitle = "Updated Task 2";
// $newDescription = "Updated Description 2";
// $newPriority = "medium";
// $isCompleted = 1;

// if(validateTask($newTitle)){
//     $editTaskSql = "UPDATE tasks SET title = '$newTitle', description = '$newDescription', priority = '$newPriority', is_completed = '$isCompleted' WHERE id = $updateTaskID";

//     if($conn->query($editTaskSql)){
//         echo "Task updated successfully.<br>";
//     }else{
//         echo "Error updating Task.<br>";
//     }
// }


// //Delete a task by ID
// $deleteTaskId = 2;
// $deleteTaskSql = "DELETE FROM tasks WHERE id = $deleteTaskId";

// if($conn->query($deleteTaskSql)){
//     echo "Task deleted successfully!<br>";
// }else{
//     echo "Error deleting Task.<br>";
// }

// //Filtering Task based on priority
// $priorityFilter = "high";
// $priorityFilterSql = "SELECT * FROM tasks WHERE priority = '$priorityFilter'";
// $filteredResult = $conn->query($priorityFilterSql);

// echo "Reading Task Based on Priority.<br>";
// if($filteredResult->num_rows > 0){
//     while($row = $filteredResult->fetch_assoc()){
//         echo "ID: {$row['id']}, Title: {$row['title']}, Description: {$row['description']}, Priority: {$row['priority']}.<br>";
//     }
// }else{
//     echo "No Task Found!<br>";
// }


//Get Task by Date Range
$startRange = "2025-01-02";
$endRange = "2025-01-08";
$dataRangeSql = "SELECT * FROM tasks WHERE created_at BETWEEN '$startRange' AND '$endRange'";
$dataRangeResult = $conn->query($dataRangeSql);

echo "Reading Tasks Based on Data Range.<br>";
if($dataRangeResult->num_rows > 0){
    while($row = $dataRangeResult->fetch_assoc()){
        echo "ID: {$row['id']}, Title: {$row['title']}, Description: {$row['description']}, Created At: {$row['created_at']}.<br>";
    }
}else{
    echo "There is no tasks between this data range.<br>";
}

$conn->close();

?>