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

if (isset($_POST['delete_student'])) {
    $id = $_GET['id']; 

    $query = "DELETE FROM students WHERE id = $id";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connection));
    } else {
        header('Location: index.php?delete_msg=Successfully Deleted');
        exit(); 
    }
}
?>

<form action="delete_page_1.php?id=<?php echo $id; ?>" method="post">
    <div class="mb-3">
        <label for="firstName" class="form-label">First Name</label>
        <input type="text" class="form-control" id="firstName" name="first_name" value="<?php echo $row['first_name']; ?>" readonly>
    </div>
    <div class="mb-3">
        <label for="lastName" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="lastName" name="last_name" value="<?php echo $row['last_name']; ?>" readonly>
    </div>
    <div class="mb-3">
        <label for="age" class="form-label">Age</label>
        <input type="number" class="form-control" id="age" name="age" value="<?php echo $row['age']; ?>" readonly>
    </div>
    <input type="submit" class="btn btn-danger" name="delete_student" value="Delete">
</form>

<?php include('footer.php'); ?>
