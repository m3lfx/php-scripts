<?php
include('../include/header.php');
?>
<body>
<?php
include('../includes/config.php');
$id = $_GET['id'];
$query = "SELECT * FROM songs WHERE song_id = {$id} LIMIT 1";
// echo $query;
$result = mysqli_query($conn, $query);
$song = mysqli_fetch_assoc($result);

$album_query = "SELECT *  FROM albums  WHERE album_id <> {$song['albums_album_id']} ORDER BY title DESC";
$albums = mysqli_query($conn, $album_query);

$album_select = "SELECT *  FROM albums WHERE album_id =  {$song['albums_album_id']}";

$album = mysqli_query($conn, $album_select);
$album_name = mysqli_fetch_assoc($album);

?>
<div class="container">
<form method="POST" action="update.php">
  <div class="form-group">
    <label for="name">Song Title</label>
    <input type="text" class="form-control" id="name"  placeholder="Enter artist name" name="title" value="<?php echo $song['title']; ?>">

    <label for="desc">Description</label>
    <input type="text" class="form-control" id="desc"  placeholder="Enter description" name="description" value="<?php echo $song['description']; ?>" >

  
    <label for="albums">Albums</label>
    <select name="album_id" id="albums" class="form-control">
    <?php
     echo "<option value={$album_name['album_id']} selected>{$album_name['title']}</option>";
  while ($row = mysqli_fetch_assoc($albums)) {
   
       echo "<option value={$row['album_id']}>{$row['title']}</option>";
  }
  ?>
    </select>
  </div>
  <input type="hidden" name="song_id" class="form-control"  value="<?php echo $song['song_id'] ; 
?>" />
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</body>
</html>
