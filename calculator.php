<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>计算器</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="calculator">
        <h2>欢迎 <?= htmlspecialchars($_SESSION['user']) ?>!</h2>
        <input type="text" id="display" readonly>
        <div class="calc-buttons">
            <!-- 按钮通过JavaScript生成 -->
        </div>
        <p><a href="logout.php">退出登录</a></p>
    </div>
    <script src="calc.js"></script>
</body>
</html>
