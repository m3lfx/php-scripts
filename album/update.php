<?php
include('../include/config.php');
$id = $_POST['album_id'];
$album = $_POST['title'];
$genre = $_POST['genre'];
$date_released = $_POST['date_released'];
$artist_id = $_POST['artist_id'];

$query = "UPDATE albums SET title = '{$album}', genre = '{$genre}', date_released = '{$date_released}', artists_artist_id = {$artist_id} WHERE album_id = {$id}";

echo $query;
$result = mysqli_query($conn, $query);
    if($result > 0) {
        header("Location: index.php");
    }
    else 
       echo mysqli_error();
?>