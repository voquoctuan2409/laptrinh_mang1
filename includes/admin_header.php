<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
<header>
    <h1>Admin Panel</h1>
    <nav>
        <a href="admin_dashboard.php">Dashboard</a>
        <a href="manage_products.php">Manage Products</a>
        <a href="manage_categories.php">Manage Categories</a>
        <a href="manage_orders.php">Manage Orders</a>
        <a href="manage_reviews.php">Manage Reviews</a>
        <a href="manage_shipping.php">Manage Shipping</a>
        <a href="../logout.php">Logout</a>
    </nav>
</header>
<main>


<div class="content">
    <h1>Dashboard Quản Trị</h1>
    <!-- Nội dung khác sẽ được thêm vào đây -->
</div>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        background-color: #f7f9fc;
    }
    .sidebar {
        width: 250px;
        background-color: #2c3e50;
        color: white;
        height: 100vh;
        position: fixed;
        padding: 20px;
        overflow-y: auto;
    }
    .sidebar h2 {
        text-align: center;
    }
    .sidebar ul {
        list-style-type: none;
        padding: 0;
    }
    .sidebar ul li {
        margin: 20px 0;
    }
    .sidebar ul li a {
        color: white;
        text-decoration: none;
        font-size: 18px;
        display: block;
        padding: 10px;
        border-radius: 4px;
    }
    .sidebar ul li a:hover {
        background-color: #34495e;
    }
    .content {
        margin-left: 275px;
        padding: 20px;
        width: calc(100% - 250px);
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }
    .content h1 {
        margin-bottom: 20px;
        font-size: 24px;
        font-weight: bold;
    }
    .card-container {
        display: flex;
        justify-content: space-between;
        margin-bottom: 40px;
    }
    .card {
        flex: 1;
        margin: 0 10px;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        text-align: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .card h3 {
        margin-bottom: 15px;
    }
    .table-container {
        margin-top: 40px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid #ddd;
    }
    th, td {
        padding: 12px;
        text-align: center;
    }
    th {
        background-color: #34495e;
        color: white;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>
</body>
</html>
