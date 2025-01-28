<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: calculator.php");
    exit();
}

$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "login_system");
    
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];
    
    $result = $conn->query("SELECT * FROM users WHERE username = '$username'");
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $username;
            header("Location: calculator.php");
            exit();
        }
    }
    $error = "用户名或密码错误";
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>登录</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-box">
        <h2>用户登录</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="用户名" required>
            <input type="password" name="password" placeholder="密码" required>
            <button type="submit">登录</button>
            <?php if ($error): ?>
                <p style="color:red;"><?= $error ?></p>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
