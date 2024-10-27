<?php
session_start();
include '../db_connection.php';

if ($_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}

// Thêm danh mục mới
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_category'])) {
    $category_name = $_POST['category_name'];

    $stmt = $pdo->prepare("INSERT INTO categories (category_name) VALUES (?)");
    $stmt->execute([$category_name]);
    header("Location: manage_categories.php");
    exit;
}

// Lấy danh sách danh mục
$stmt = $pdo->query("SELECT * FROM categories");
$categories = $stmt->fetchAll();

include '../includes/admin_header.php';
?>

<h2>Manage Categories</h2>
<form action="manage_categories.php" method="post">
    <input type="text" name="category_name" placeholder="New Category Name" required>
    <button type="submit" name="add_category">Add Category</button>
</form>

<table>
    <tr><th>ID</th><th>Name</th><th>Actions</th></tr>
    <?php foreach ($categories as $category): ?>
        <tr>
            <td><?= htmlspecialchars($category['category_id']) ?></td>
            <td><?= htmlspecialchars($category['category_name']) ?></td>
            <td><a href="delete_category.php?category_id=<?= $category['category_id'] ?>" onclick="return confirm('Are you sure?')">Delete</a></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include '../includes/admin_footer.php'; ?>
