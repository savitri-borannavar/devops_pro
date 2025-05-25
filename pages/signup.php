<?php include('../includes/header.php'); ?>
<h2>Signup</h2>
<h2>user can create account here</h2>
<form method="post">
  <input type="text" name="username" placeholder="Username" required><br><br>
  <input type="password" name="password" placeholder="Password" required><br><br>
  <button type="submit" name="register">Register</button>
</form>
<?php
if (isset($_POST['register'])) {
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
  $stmt->bind_param("ss", $username, $password);
  if ($stmt->execute()) {
    echo "<p>Registered successfully. <a href='login.php'>Login</a></p>";
  } else {
    echo "<p>Error: " . $stmt->error . "</p>";
  }
}
include('../includes/footer.php');
?>
