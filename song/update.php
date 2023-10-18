<?php
include('../include/config.php');
$id = $_POST['song_id'];
$song = $_POST['title'];
$description = $_POST['description'];
$album_id = $_POST['album_id'];
$query = "UPDATE songs SET title = '{$song}', description = '{$description}',albums_album_id = {$album_id} WHERE song_id = {$id}";

echo $query;
$result = mysqli_query($conn, $query);
    if($result > 0) {
        header("Location: index.php");
    }
    else 
       echo mysqli_error();
?>