<?php
include('../include/config.php');
var_dump($_POST);
$name = trim($_POST['artist_name']);
$country = $_POST['country'];
$image = $_POST['img_path'];
$id = $_POST['artist_id'];

$sql = "UPDATE artists SET name = '{$name}', country = '{$country}', img_path = '{$image}' WHERE artist_id = $id ";
// echo $sql;
$result = mysqli_query($conn, $sql);
if($result) {
    header("Location: index.php");
}
?>