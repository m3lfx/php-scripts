<?php
session_start();
include('include/header.php');
include('include/config.php');

?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Shopping Cart</title>
    <link href="include/style/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <h1 align="center">Products </h1>
    <h2>Your Shopping Cart</h2>
    <?php
if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"]) > 0) {
    echo '<div class="cart-view-table-front" id="view-cart">';
    echo '<h3>Your Shopping Cart</h3>';
    echo '<form method="POST" action="cart_update.php">';
    echo '<table width="100%"  cellpadding="6" cellspacing="0">';
    echo '<tbody>';
    $total =0;
    $b = 0;
    foreach ($_SESSION["cart_products"] as $cart_itm) {
        $product_name = $cart_itm["item_name"];
        $product_qty = $cart_itm["item_qty"];
        $product_price = $cart_itm["item_price"];
        
        $product_code = $cart_itm["item_id"];
        $bg_color = ($b++%2==1) ? 'odd' : 'even'; //zebra stripe
        echo '<tr class="'.$bg_color.'">';
        echo '<td>Qty <input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
        echo '<td>'.$product_name.'</td>';
        echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /> Remove</td>';
        echo '</tr>';
        $subtotal = ($product_price * $product_qty);
        $total += $subtotal;
    }
    echo '<td colspan="4">';
    echo '<button type="submit">Update</button><a href="view_cart.php" class="button">Checkout</a>';
    echo '</td>';
    echo '</tbody>';
    echo '</table>';
    $current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
    echo '</form>';
    echo '</div>';
}
?>
    </div>
<?php
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$sql = "SELECT item_id, description, img_path, sell_price FROM item ORDER BY item_id ASC";

$results = mysqli_query($conn,$sql);
if($results) { 
$products_item = '<ul class="products">';

//fetch results set as object and output HTML
 while ($row = mysqli_fetch_array($results)) {
    $products_item .= <<<EOT
     <li class="product">
    <form method="POST" action="cart_update.php">
    <div class="product-content"><h3>{$row['description']}</h3>
    <div class="product-thumb"><img src="./upload/item/{$row['img_path']}" width="50px" height="50px"></div>
    <div class="product-info">
    Price {$row['sell_price']} 
    <fieldset>
    
    <label>
        <span>Quantity</span>
        <input type="text" size="2" maxlength="2" name="item_qty" value="1" />
    </label>
    </fieldset>
    <input type="hidden" name="item_id" value="{$row['item_id']}" />
    <input type="hidden" name="type" value="add" />
    <input type="hidden" name="return_url" value="{$current_url}" />
    <div align="center"><button type="submit" class="add_to_cart">Add</button></div>
    </div></div>
    </form>
    </li>
EOT;

}

$products_item .= '</ul>';
echo $products_item;
}

?>



</body>

</html>