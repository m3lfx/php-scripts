<?php
session_start();
include('../include/config.php');
$_SESSION['cost'] = $_POST['cost_price'];
$_SESSION['sell'] = $_POST['sell_price'];
$_SESSION['desc'] = $_POST['description'];
$_SESSION['qty'] = $_POST['quantity'];
if(empty($_POST['description']) || $_POST['description'] === '' || !isset($_POST['description']) ) {
    $_SESSION['message'] = 'Please input a Product description';
    // echo "error";
    header("Location: create.php" );
   

}
else {
    $description = trim($_POST['description']);
    $cost = $_POST['cost_price'];
    $sell = $_POST['sell_price'];
    $qty = $_POST['quantity'];
    
if ( isset( $_FILES['img_path'] ) ) {
    if ( $_FILES['img_path']['type'] == "image/jpeg" || $_FILES['img_path']['type'] == "image/jpg" || $_FILES['img_path']['type'] == "image/png") {
        $source = $_FILES['img_path']['tmp_name'];
        $target = $_FILES['img_path']['name'];
        move_uploaded_file( $source, $target ) or die ("Couldn't copy");
    }
    else {
        $_SESSION['message'] = "wrong file type";
        // header("Location: create.php" );
    }
}
else {
    print "no file uploaded";
}

$sql = "INSERT INTO item(description, cost_price, sell_price, img_path) VALUES('{$description}', '{$cost}', '{$sell}','{$target}')";

$result = mysqli_query($conn, $sql);

$q_stock = "INSERT INTO stock(item_id, quantity) VALUES(LAST_INSERT_ID(), '{$qty}')";
$result2 = mysqli_query($conn, $q_stock);

if($result && $result2) {
    header("Location: index.php");
 }
}


?>