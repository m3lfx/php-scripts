<?php

include('../include/config.php');

$title = $_POST['title'];
$description = $_POST['description'];

$album_id = $_POST['album_id'];

$query = "INSERT INTO songs(title, description, albums_album_id) VALUES('{$title}', '{$description}', $album_id)";
$result = mysqli_query($conn, $query);
    if($result > 0) {
        header("Location: index.php");
    }
    else
       echo mysqli_error();
?>