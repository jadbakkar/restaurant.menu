<?php
session_start();
include "db.php";

if(isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Fetch admin from DB
    $result = mysqli_query($conn, "SELECT * FROM admins WHERE username='$user'");
    $admin = mysqli_fetch_assoc($result);

    if($admin && password_verify($pass, $admin['password'])) {
        $_SESSION['admin'] = true;
        header("Location: menu.php");
        exit;
    } else {
        $error = "Invalid credentials!";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Login</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<form method="post" style="max-width:300px;margin:50px auto;text-align:center;">
    <h2>Admin Login</h2>
    <input type="text" name="username" placeholder="Username" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button name="login" class="btn">Login</button>
    <?php if(!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
</form>

</body>
</html>
