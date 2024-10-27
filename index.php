<?php
error_reporting(E_ALL); // Báo cáo tất cả lỗi
ini_set('display_errors', 1); // Hiện lỗi trên trình duyệt

include 'db_connection.php'; // Kết nối cơ sở dữ liệu
session_start(); // Bắt đầu phiên
$isAdmin = isset($_SESSION['role']) && $_SESSION['role'] == 'admin'; // Kiểm tra vai trò
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="styles.css" />
    <title>Nội Thất Nhà Đẹp</title>
</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="inner-wrap">
            <div class="inner-logo">
                <a href="#">
                    <img src="uploads/logo.png" alt="logo" />
                    <span>Nội Thất Nhà Đẹp</span>
                </a>
            </div>
            <div class="inner-menu">
                <ul>
                    <li>
                        <a href="#">Trang Chủ</a>
                    </li>
                    <li>
                        <a href="#">Sản Phẩm</a>
                    </li>
                    <li>
                        <a href="#">Khuyến Mãi</a>
                    </li>
                    <li>
                        <a href="#">Liên hệ</a>
                    </li>
                    <!-- admin_dashboard -->
                    <?php if ($isAdmin): ?>
                        <li><a href="admin_dashboard.php">Quản Trị</a></li>
                    <?php endif; ?>
                </ul>
            </div>

            <div class="inner-social">
                <ul>
                    <li>
                        <a href="#" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <!-- Header -->
    <!-- section-one -->
    <div class="section-one">
        <div class="container">
            <div class="inner-wrap">
                <h2 class="inner-sub-title">Cùng nhau mua sắm</h2>
                <h1 class="inner-title">BỘ SƯU TẬP</h1>
                <p class="inner-desc">
                    Hãy sắm cho gia đình bạn những sản phẩm nội thất đẹp và mang phong cách hiện đại
                </p>
                <div class="inner-buttons">
                    <a href="#" class="button">Khám phá ngay</a>
                </div>
            </div>
        </div>
    </div>
    <!-- section-one -->
    <div class="product">
        <h1>Sản Phẩm Nổi Bật</h1>
    </div>
    <!-- section-two -->
    <div class="section-two">
        <div class="main-left">SOFA</div>
        <div class="main-right">
            <div class="main1">BÀN GHẾ ĂN</div>
            <div class="main2">GIƯỜNG</div>
            <div class="main3">TỦ QUẦN ÁO</div>
            <div class="main4">BÀN TRANG ĐIỂM</div>
        </div>
    </div>
    <!-- section-two -->
</body>
</html>
