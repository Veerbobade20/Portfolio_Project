<?php
include 'connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']); // Trim spaces from input
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Check if email already exists
    $stmt = $conn->prepare("SELECT * FROM admin WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Email already registered
        echo "Email is already registered. Please use a different email.";
        exit();
    }

    // Secure password hashing
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert query
    $stmt = $conn->prepare("INSERT INTO admin (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $hashed_password);

    if ($stmt->execute()) {
        // Redirect to login page
        header("Location: Adminlogin.php");
        exit(); // Ensure no further code is executed
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
