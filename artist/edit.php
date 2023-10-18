<?php
include('../include/header.php');
include('../include/config.php');
$item_id = $_GET['id'];
$sql = "SELECT * FROM item WHERE item_id = {$item_id} LIMIT 1";
// echo $sql;
$result = mysqli_query($conn, $sql);
$item = mysqli_fetch_assoc($result);
// var_dump($artist);
?>


<form action="update.php" method="POST">
<p>artist name: <input type="text" name="artist_name" class="form-control"  value="<?php echo $artist['name'] ; 
?>" /></p>
<p>country<input type="text" name="country" class="form-control" value="<?php echo $artist['country'] ; 
?>" /></p>
<p>image<input type="text" name="img_path" class="form-control"  value="<?php echo $artist['img_path'] ; 
?>" /></p>

<input type="hidden" name="artist_id" class="form-control"  value="<?php echo $artist['artist_id'] ; 
?>" />
<p><input type="submit" value="update"  class="btn btn-primary" /><a href="index.php" class="btn btn-light btn-lg " role="button" aria-disabled="true">Cancel</a></p>

</form>
</div>
</body>
</html>