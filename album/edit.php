<?php
include('../include/header.php');
?>
<body>
<?php
include('../include/config.php');
$id = $_GET['id'];
$query = "SELECT * FROM albums WHERE album_id = {$id} LIMIT 1";
// echo $query;
$result = mysqli_query($conn, $query);
$album = mysqli_fetch_assoc($result);

$artist_query = "SELECT *  FROM artists  WHERE artist_id <> {$album['artists_artist_id']} ORDER BY name DESC";
$artists = mysqli_query($conn, $artist_query);

$artist_select = "SELECT *  FROM artists WHERE artist_id =  {$album['artists_artist_id']}";

$artist = mysqli_query($conn, $artist_select);
$artist_name = mysqli_fetch_assoc($artist);

?>
<div class="container">
<form method="POST" action="update.php">
  <div class="form-group">
    <label for="name">Album Name</label>
    <input type="text" class="form-control" id="name"  placeholder="Enter artist name" name="title" value="<?php echo $album['title']; ?>">

    <label for="genre">Genre</label>
    <input type="text" class="form-control" id="genre"  placeholder="Enter album genre" name="genre" value="<?php echo $album['genre']; ?>" >

    <label for="date_released">date released</label>
    <input type="date" class="form-control" id="date_released"  placeholder="Enter album date" name="date_released" value="<?php echo $album['date_released']; ?>" >

    <label for="artists">artists</label>
    <select name="artist_id" id="artists" class="form-control">
    <?php
     echo "<option value={$artist_name['artist_id']} selected>{$artist_name['name']}</option>";
  while ($row = mysqli_fetch_assoc($artists)) {
   
       echo "<option value={$row['artist_id']}>{$row['name']}</option>";
  }
  ?>
    </select>
  </div>
  <input type="hidden" name="album_id" class="form-control"  value="<?php echo $album['album_id'] ; 
?>" />
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</body>
</html>
