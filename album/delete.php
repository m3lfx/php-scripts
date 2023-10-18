<?php
include('../include/config.php');
$id = $_GET['id'];
$query = "DELETE FROM albums WHERE album_id = $id";
$result = mysqli_query($conn, $query);
    if($result > 0) {
        header("Location: index.php");
    }
    else 
       echo mysqli_error();
?>