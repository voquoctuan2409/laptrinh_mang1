<?php
include 'db_connection.php';

if (isset($_POST['username'])) { // Kiểm tra xem biểu mẫu có được gửi không
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $role = 'user';

    $stmt = $pdo->prepare("INSERT INTO users (username, password, email, phone, address, role) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$username, $password, $email, $phone, $address, $role]);

    echo "Đăng ký thành công!";
}
?>

<form method="POST">
    Tên người dùng: <input type="text" name="username" required><br>
    Mật khẩu: <input type="password" name="password" required><br>
    Email: <input type="email" name="email" required><br>
    Số điện thoại: <input type="text" name="phone" required><br>
    Địa chỉ: <input type="text" name="address" required><br>
    <button type="submit">Đăng ký</button>
</form>
