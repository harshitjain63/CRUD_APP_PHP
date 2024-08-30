<?php include('header.php'); ?>
<?php include('dbcon.php');

$statusMessage = '';
if (isset($_GET['status']) && $_GET['status'] == 'success') {
    $statusMessage = 'Data successfully added!';
}elseif(isset($_GET['update_msg']) && $_GET['update_msg'] == 'Successfully Updated') {
    $statusMessage = 'Successfully Updated!';
}else{
    $statusMessage = 'Successfully Deleted!';
}
?>

<div class="container mt-5"> 
    <div class="box1 clearfix"> 
        <h2>All Students</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Student</button>
    </div>
    
    
    <?php if ($statusMessage): ?>
        <div class="alert alert-success" role="alert">
            <?php echo $statusMessage; ?>
        </div>
    <?php endif; ?>
    
    <table class="table table-striped table-hover table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Update</th>
                <th>Delete</th>

            </tr>
        </thead>              
        <tbody>
        <?php
        $query = "SELECT * FROM students";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query Failed: " . mysqli_error($connection));
        } else {
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><a href="update_page_1.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</a></td>
                    <td><a href="delete_page_1.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>

                </tr>
            <?php
            }
        }
        ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <form action="insert_data.php" method="post">
          <div class="mb-3">
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstName" name="first_name" placeholder="Enter first name" required>
          </div>
          <div class="mb-3">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Enter last name" required>
          </div>
          <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" class="form-control" id="age" name="age" placeholder="Enter age" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Student</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>
