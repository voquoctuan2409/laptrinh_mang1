<?php
session_start();
if ($_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit;
}
include '../includes/header.php';
?>

<h2>Admin Dashboard</h2>
<nav>
    <a href="manage_products.php">Manage Products</a>
    <a href="manage_categories.php">Manage Categories</a>
    <a href="manage_orders.php">Manage Orders</a>
    <a href="manage_reviews.php">Manage Reviews</a>
</nav>

<?php include '../includes/footer.php'; ?>
