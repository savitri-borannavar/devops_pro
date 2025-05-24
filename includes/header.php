<?php include("config.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Food Ordering System</title>
  <link rel="stylesheet" href="/food_ordering_app/css/style.css">
</head>
<body>
<header>
  <h1>Food Ordering System</h1>
  <nav>
    <a href="/food_ordering_app/index.php">Home</a>
    <a href="/food_ordering_app/pages/menu.php">Menu</a>
    <?php if (!isset($_SESSION['user'])): ?>
      <a href="/food_ordering_app/pages/signup.php">Signup</a>
      <a href="/food_ordering_app/pages/login.php">Login</a>
    <?php else: ?>
      <a href="/food_ordering_app/pages/cart.php">Cart</a>
      <a href="/food_ordering_app/logout.php">Logout</a>
    <?php endif; ?>
  </nav>
</header>
<div class="container">
