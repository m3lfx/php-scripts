<?php
include('../include/header.php');
include('../include/config.php');
$query = "SELECT *  FROM artists ORDER BY name DESC";
$result = mysqli_query($conn, $query);
?>
<body>
    <div class="container">
<form method="POST" action="store.php">
  <div class="form-group">
    <label for="name">Album Name</label>
    <input type="text" class="form-control" id="name"  placeholder="Enter artist name" name="title">

    <label for="genre">Genre</label>

    <input type="text" class="form-control" id="genre"  placeholder="Enter album genre" name="genre">

    <label for="date_released">date released</label>

    <input type="date" class="form-control" id="date_released"  placeholder="Enter album date" name="date_released" >

    <label for="artists">artists</label>

    <select name="artist_id" id="artists" class="form-control">
        
    <?php
        while ($row = mysqli_fetch_assoc($result)) {
       echo "<option value={$row['artist_id']}>{$row['name']}</option>";
  }
  ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</body>
</html>