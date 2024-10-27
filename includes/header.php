<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Furniture Store</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <h1>Furniture Store</h1>
    <nav>
        <a href="index.php">Home</a>
        <a href="products.php">Products</a>
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="cart.php">Cart</a>
            <a href="logout.php">Logout (<?= htmlspecialchars($_SESSION['username']) ?>)</a>
        <?php else: ?>
            <a href="login.php">Login</a>
        <?php endif; ?>
    </nav>
</header>
<main>
