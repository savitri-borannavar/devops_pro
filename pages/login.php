<?php include('../includes/header.php'); ?>
<h2>Login</h2>
<form method="post">
  <input type="text" name="username" placeholder="Username" required><br><br>
  <input type="password" name="password" placeholder="Password" required><br><br>
  <button type="submit" name="login">Login</button>
</form>
<?php
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($user = $result->fetch_assoc()) {
    if (password_verify($password, $user['password'])) {
      $_SESSION['user'] = $user['id'];
      header("Location: menu.php");
    } else {
      echo "<p>Wrong password.</p>";
    }
  } else {
    echo "<p>User not found.</p>";
  }
}
include('../includes/footer.php');
?>
