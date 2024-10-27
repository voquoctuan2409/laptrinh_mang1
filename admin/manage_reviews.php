<?php
session_start();
include '../db_connection.php';

if ($_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}

// Lấy danh sách đánh giá
$stmt = $pdo->query("SELECT reviews.*, users.username, products.name AS product_name FROM reviews JOIN users ON reviews.user_id = users.user_id JOIN products ON reviews.product_id = products.product_id");
$reviews = $stmt->fetchAll();

include '../includes/admin_header.php';
?>

<h2>Manage Reviews</h2>
<table>
    <tr><th>Review ID</th><th>Username</th><th>Product</th><th>Rating</th><th>Comment</th><th>Actions</th></tr>
    <?php foreach ($reviews as $review): ?>
        <tr>
            <td><?= htmlspecialchars($review['review_id']) ?></td>
            <td><?= htmlspecialchars($review['username']) ?></td>
            <td><?= htmlspecialchars($review['product_name']) ?></td>
            <td><?= htmlspecialchars($review['rating']) ?>/5</td>
            <td><?= htmlspecialchars($review['comment']) ?></td>
            <td><a href="delete_review.php?review_id=<?= $review['review_id'] ?>" onclick="return confirm('Are you sure?')">Delete</a></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include '../includes/admin_footer.php'; ?>
