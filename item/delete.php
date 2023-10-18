<?php
include('../include/config.php');
$artist_id = $_GET['id'];
$sql = "DELETE FROM artists WHERE artist_id = $artist_id"; 
// echo $sql;
$result = mysqli_query($conn, $sql);
if($result) {
    header("Location: index.php");
 }
?>