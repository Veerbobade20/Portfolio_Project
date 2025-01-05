<?php
include('loginlogic.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <div class="form-container">
        <h2>Login</h2>
        <form action="loginlogic.php" method="POST">
    <input type="email" name="email" placeholder="Enter your email" required>
    <input type="password" name="password" placeholder="Enter your password" required>
            <div class="remember-forgot">
                <label><input type="checkbox"> Remember Me</label>
                <a href="#">Forgot Password?</a>
            </div>
            <button type="submit">Login</button>
            <button type="button" class="google-login">Login with Google</button>
        </form>
        <p style="text-align: center; margin-top: 15px;">Don't have an account? <a href="register.php">Register</a></p>
    </div>
</body>
</html>
