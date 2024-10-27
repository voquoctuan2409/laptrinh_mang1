<?php
session_start();
include '../db_connection.php';

if ($_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}

// Thêm sản phẩm mới
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $category_id = $_POST['category_id'];

    $stmt = $pdo->prepare("INSERT INTO products (name, description, price, stock, category_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$name, $description, $price, $stock, $category_id]);
    header("Location: manage_products.php");
    exit;
}

// Lấy danh sách sản phẩm
$stmt = $pdo->query("SELECT * FROM products");
$products = $stmt->fetchAll();

include '../includes/admin_header.php';
?>

<h2>Manage Products</h2>
<a href="add_product.php">Add New Product</a>

<table>
    <tr><th>ID</th><th>Name</th><th>Price</th><th>Stock</th><th>Actions</th></tr>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?= htmlspecialchars($product['product_id']) ?></td>
            <td><?= htmlspecialchars($product['name']) ?></td>
            <td>$<?= htmlspecialchars($product['price']) ?></td>
            <td><?= htmlspecialchars($product['stock']) ?></td>
            <td>
                <a href="edit_product.php?product_id=<?= $product['product_id'] ?>">Edit</a> |
                <a href="delete_product.php?product_id=<?= $product['product_id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include '../includes/admin_footer.php'; ?>
