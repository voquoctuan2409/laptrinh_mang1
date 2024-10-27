<?php
include 'db_connection.php';

// Kiểm tra xem có trường 'username' nào trong $_POST không
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        echo "Đăng nhập thành công!";
        // Lưu thông tin phiên đăng nhập ở đây
    } else {
        echo "Tên người dùng hoặc mật khẩu không hợp lệ.";
    }
}
?>

<form method="POST">
    Tên người dùng: <input type="text" name="username" required><br>
    Mật khẩu: <input type="password" name="password" required><br>
    <button type="submit">Đăng nhập</button>
</form>
