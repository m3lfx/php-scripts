<?php

include('../include/config.php');

$album = $_POST['title'];
$genre = $_POST['genre'];
$date_released = $_POST['date_released'];
$artist_id = $_POST['artist_id'];

$query = "INSERT INTO albums(title, genre, date_released, artists_artist_id) VALUES('{$album}', '{$genre}', '{$date_released}', $artist_id)";
$result = mysqli_query($conn, $query);
    if($result > 0) {
        header("Location: index.php");
    }
    else
       echo mysqli_error();


?>