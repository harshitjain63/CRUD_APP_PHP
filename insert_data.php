<?php
include('dbcon.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];

  
    $query = "INSERT INTO students (first_name, last_name, age) VALUES ('$first_name', '$last_name', '$age')";

    
    if (mysqli_query($connection, $query)) {
       
        header('Location: index.php?status=success');  
        exit();
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}
?>
