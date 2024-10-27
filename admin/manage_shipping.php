<?php
session_start();
include '../db_connection.php';

if ($_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}

// Cập nhật tình trạng giao hàng
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_shipping'])) {
    $shipping_id = $_POST['shipping_id'];
    $shipping_status = $_POST['shipping_status'];

    $stmt = $pdo->prepare("UPDATE shipping SET shipping_status = ? WHERE shipping_id = ?");
    $stmt->execute([$shipping_status, $shipping_id]);
    header("Location: manage_shipping.php");
    exit;
}

// Lấy danh sách giao hàng
$stmt = $pdo->query("SELECT * FROM shipping");
$shippingList = $stmt->fetchAll();

include '../includes/admin_header.php';
?>

<h2>Manage Shipping</h2>
<table>
    <tr><th>Shipping ID</th><th>Order ID</th><th>Method</th><th>Cost</th><th>Status</th><th>Actions</th></tr>
    <?php foreach ($shippingList as $shipping): ?>
        <tr>
            <td><?= htmlspecialchars($shipping['shipping_id']) ?></td>
            <td><?= htmlspecialchars($shipping['order_id']) ?></td>
            <td><?= htmlspecialchars($shipping['shipping_method']) ?></td>
            <td>$<?= htmlspecialchars($shipping['shipping_cost']) ?></td>
            <td><?= htmlspecialchars($shipping['shipping_status']) ?></td>
            <td>
                <form action="manage_shipping.php" method="post">
                    <input type="hidden" name="shipping_id" value="<?= $shipping['shipping_id'] ?>">
                    <select name="shipping_status">
                        <option value="Pending" <?= $shipping['shipping_status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                        <option value="Shipped" <?= $shipping['shipping_status'] == 'Shipped' ? 'selected' : '' ?>>Shipped</option>
                        <option value="Delivered" <?= $shipping['shipping_status'] == 'Delivered' ? 'selected' : '' ?>>Delivered</option>
                    </select>
                    <button type="submit" name="update_shipping">Update</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include '../includes/admin_footer.php'; ?>
