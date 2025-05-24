<?php include('../includes/header.php'); ?>
<h2>Your Cart</h2>
<?php
$total = 0;
if (!empty($_SESSION['cart'])) {
  foreach ($_SESSION['cart'] as $item) {
    echo "<p>{$item['item']} - ₹{$item['price']}</p>";
    $total += $item['price'];
  }
  echo "<p><strong>Total: ₹$total</strong></p>";
?>
<form method="post" action="order.php">
  <button type="submit" name="place_order">Place Order</button>
</form>
<?php
} else {
  echo "<p>Cart is empty.</p>";
}
include('../includes/footer.php');
?>
