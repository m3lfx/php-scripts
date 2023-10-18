<?php
session_start();
include('../include/config.php');
// $item_id = $_POST['item_id'];
$_SESSION['cost'] = $_POST['cost_price'];
$_SESSION['sell'] = $_POST['sell_price'];
$_SESSION['desc'] = $_POST['description'];
$_SESSION['qty'] = $_POST['quantity'];
if(empty($_POST['description']) || $_POST['description'] === '' || !isset($_POST['description']) ) {
    $_SESSION['message'] = 'Please input a Product description';
    // echo "error";
    header("Location: edit.php" );
   

}
else {
    $description = trim($_POST['description']);
    $cost = $_POST['cost_price'];
    $sell = $_POST['sell_price'];
    $qty = $_POST['quantity'];
    $item_id = $_POST['item_id'];
    
if ( isset( $_FILES['img_path'] ) ) {
    if ( $_FILES['img_path']['type'] == "image/jpeg" || $_FILES['img_path']['type'] == "image/jpg" || $_FILES['img_path']['type'] == "image/png") {
        $source = $_FILES['img_path']['tmp_name'];
        $target = "../upload/item/".$_FILES['img_path']['name'];
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

$sql = "UPDATE item SET description = '{$description}', cost_price = '{$cost}' , sell_price =  '{$sell}' , img_path = '{$target}' WHERE item_id = $item_id";
echo $sql;
$result = mysqli_query($conn, $sql);

$q_stock = "UPDATE stock SET quantity = {$qty} WHERE item_id = $item_id";
$result2 = mysqli_query($conn, $q_stock);

if($result && $result2) {
    header("Location: index.php");
 }
}


?>