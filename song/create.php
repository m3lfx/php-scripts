<?php
include('../include/header.php');
include('../include/config.php');
$query = "SELECT *  FROM albums ORDER BY title DESC";
$result = mysqli_query($conn, $query);
?>
<body>
    <div class="container">
<form method="POST" action="store.php">
  <div class="form-group">
    <label for="name">Song Title</label>
    <input type="text" class="form-control" id="name"  placeholder="Enter song title" name="title">
    <label for="description">Description</label>

    <input type="text" class="form-control" id="description"  placeholder="Enter description" name="description">

    <label for="albums">Albums</label>

    <select name="album_id" id="albums" class="form-control">
        
    <?php
        while ($row = mysqli_fetch_assoc($result)) {
       echo "<option value={$row['album_id']}>{$row['title']}</option>";
  }
  ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</body>
</html>