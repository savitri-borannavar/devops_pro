<?php
include('../includes/header.php');
if (isset($_POST['place_order']) && isset($_SESSION['cart']) && isset($_SESSION['user'])) {
  $items = json_encode($_SESSION['cart']);
  $total = array_sum(array_column($_SESSION['cart'], 'price'));
  $stmt = $conn->prepare("INSERT INTO orders (user_id, items, total) VALUES (?, ?, ?)");
  $stmt->bind_param("isi", $_SESSION['user'], $items, $total);
  if ($stmt->execute()) {
    echo "<h2>Order Placed Successfully!</h2>";
    unset($_SESSION['cart']);
  } else {
    echo "<p>Error: " . $stmt->error . "</p>";
  }
}
include('../includes/footer.php');
?>
