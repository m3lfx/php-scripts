<?php
    include("../include/header.php");
    include("../include/config.php");

    $result = mysqli_query($conn, "SELECT max(user_id) as id FROM users");
    $row = mysqli_fetch_assoc($result);
    var_dump($row['id']);
    
?>
<div class="container-fluid container-lg">
<form action="store.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="listenerName">
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">address</label>
        <input type="text" class="form-control" id="address" name="address">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" id="image" name="listenerImage">
    </div>
    <input type="hidden" id="userId" name="userId" value="<?php echo $row['id']; ?>">
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
