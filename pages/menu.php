<?php include('../includes/header.php'); ?>
<h2>Menu</h2>
<?php
$res = $conn->query("SELECT * FROM menu");
while ($row = $res->fetch_assoc()):
?>
<div class="menu-item">
  <p><?= $row['item_name'] ?> - ₹<?= $row['price'] ?></p>
  <form method="post">
    <input type="hidden" name="item" value="<?= $row['item_name'] ?>">
    <input type="hidden" name="price" value="<?= $row['price'] ?>">
    <button name="add_to_cart">Add to Cart</button>
  </form>
</div>
<?php endwhile; ?>

<?php
if (isset($_POST['add_to_cart'])) {
  $_SESSION['cart'][] = [
    'item' => $_POST['item'],
    'price' => $_POST['price']
  ];
  echo "<p>Added to cart.</p>";
}
include('../includes/footer.php');
?>
