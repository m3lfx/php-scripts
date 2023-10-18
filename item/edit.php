<?php
include('../include/header.php');
include('../include/config.php');
$item_id = $_GET['id'];
$sql = "SELECT i.description as description, i.item_id AS id, i.sell_price as sell_price, i.cost_price as cost_price, s.quantity as quantity, i.img_path as img_path FROM item i INNER JOIN stock s on (i.item_id = s.item_id) WHERE i.item_id = {$item_id} LIMIT 1";
echo $sql;
$result = mysqli_query($conn, $sql);
$item = mysqli_fetch_assoc($result);
// var_dump($item);
?>
<form method="POST" action="update.php" enctype="multipart/form-data">
  <div class="form-group">
    <label for="name">Item Name</label>
    <input type="text" class="form-control" id="name"  placeholder="Enter item name" name="description" value="<?php echo $item['description'] ; ?>" />

    <label for="cost">Cost Price</label>

    <input type="text" class="form-control" id="cost"  placeholder="Enter item cost price" name="cost_price" required value="<?php echo $item['cost_price'] ; ?>" />

    <label for="sell">sell price</label>

    <input type="text" class="form-control" id="sell"  placeholder="Enter sell price" name="sell_price" required value="<?php echo $item['sell_price'] ; ?>" />

    <label for="qty">quantity</label>

<input type="number" class="form-control" id="qty"  placeholder="1" name="quantity"  value="<?php echo $item['quantity'] ; ?>"/>

    <label for="image">image</label>
   <p><img src="<?php echo $item['img_path'] ?>" width='150' height='150' /> </p>";
    <input id="image" class="form-control" type="file" name="img_path" /><br/>
  </div>
  <input type="hidden" name="item_id" class="form-control"  value="<?php echo $item['id'] ; ?>" />
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="index.php" role="button" class="btn btn-secondary">Cancel</a>
</form>


</div>
</body>
</html>