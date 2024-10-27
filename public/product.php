<?php
include 'db_connection.php';
include 'includes/header.php';

$category_id = $_GET['category_id'] ?? null;
$sql = "SELECT * FROM products";
if ($category_id) {
    $sql .= " WHERE category_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$category_id]);
} else {
    $stmt = $pdo->query($sql);
}
$products = $stmt->fetchAll();
?>

<h2>Products</h2>
<?php foreach ($products as $product): ?>
    <div>
        <h4><?= htmlspecialchars($product['name']) ?></h4>
        <p>$<?= htmlspecialchars($product['price']) ?></p>
    </div>
<?php endforeach; ?>

<?php include 'includes/footer.php'; ?>
