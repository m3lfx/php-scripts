<?php
session_start();
include('include/header.php');
include('include/config.php');
// echo "<pre>";
//     print_r($_POST);
//     //print_r($new_product);
//     echo "</pre>";
//add product to session or create new one
if(isset($_POST["type"]) && $_POST["type"]=='add' && $_POST["item_qty"] > 0) {

    foreach($_POST as $key => $value){ //add all post vars to new_product array
    $new_product[$key] = $value;
    print_r($new_product);
    }
//remove unecessary vars
unset($new_product['type']);
unset($new_product['return_url']); 

  //we need to get product name and price from database.
    $sql = "SELECT * FROM item where item_id = ". $new_product['item_id'];
    $result = mysqli_query( $conn, $sql);

 //echo $result;

 $num_rows = mysqli_num_rows( $result );
echo "There are currently $num_rows rows in the table<P>";
 echo "<table border=1>\n";
  while ($row = mysqli_fetch_array($result)) {  
//fetch product name, price from db and add to new_product array
        $new_product["item_name"] = $row['description']; 
        $new_product["item_price"] = $row['sell_price'];

        if(isset($_SESSION["cart_products"])){  //if session var already exist
            if(isset($_SESSION["cart_products"][$new_product['item_id']])) //check item exist in products array

            {

                unset($_SESSION["cart_products"][$new_product['item_id']]); //unset old array item

            }           

        }

        $_SESSION["cart_products"][$new_product['item_id']] = $new_product; //update or create product session with new item  

    } 



}

//update or remove items 

if(isset($_POST["product_qty"]) || isset($_POST["remove_code"])) {

//update item quantity in product session

if(isset($_POST["product_qty"]) && is_array($_POST["product_qty"])){

/*echo "<pre>";

     print_r($_POST);

     //print_r($new_product);

     echo "</pre>";*/

foreach($_POST["product_qty"] as $key => $value){

if(is_numeric($value)){
// var_dump( $key, $value);
$_SESSION["cart_products"][$key]["item_qty"] = $value ;

}

}

}

//remove an item from product session

if(isset($_POST["remove_code"]) && is_array($_POST["remove_code"])){

foreach($_POST["remove_code"] as $key){

unset($_SESSION["cart_products"][$key]);

}

}

}

echo "<pre>";

     print_r($_SESSION);

     //print_r($new_product);

     echo "</pre>";

//back to return url

$return_url = (isset($_POST["return_url"]))?urldecode($_POST["return_url"]):''; //return url

//header('Location:'.$return_url);
?>