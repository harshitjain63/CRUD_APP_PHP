<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<?php

if (isset($_GET['id'])) {
    $id = ($_GET['id']); 

    $query = "SELECT * FROM students WHERE id = $id";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connection));
    } else {
        $row = mysqli_fetch_assoc($result);
    }
}


if (isset($_POST['update_students'])) {
    $id = $_GET['id']; 
    $fname =  $_POST["first_name"];
    $lname =  $_POST["last_name"];
    $age = $_POST["age"]; 

 
    $query = "UPDATE students SET first_name = '$fname', last_name = '$lname', age = $age WHERE id = $id";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connection));
    } else {
        header('Location: index.php?update_msg=Successfully Updated');
        exit(); 
    }
}
?>

<form action="update_page_1.php?id=<?php echo $id; ?>" method="post">
    <div class="mb-3">
        <label for="firstName" class="form-label">First Name</label>
        <input type="text" class="form-control" id="firstName" name="first_name" placeholder="Enter first name" value="<?php echo $row['first_name']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="lastName" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Enter last name" value="<?php echo $row['last_name']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="age" class="form-label">Age</label>
        <input type="number" class="form-control" id="age" name="age" placeholder="Enter age" value="<?php echo $row['age']; ?>" required>
    </div>
    <input type="submit" class="btn btn-success" name="update_students" value="UPDATE">
</form>

<?php include('footer.php'); ?>
