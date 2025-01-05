<?php
include('connection.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: loginuser.php");
    exit;
}

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("DELETE FROM users WHERE user_id = ?");
$stmt->bind_param("i", $user_id);

if ($stmt->execute()) {
    session_destroy();
    header("Location: loginuser.php?message=profile_deleted");
    exit;
} else {
    $error_message = "Error: Unable to delete profile. Please try again later.";
}

$stmt->close();
$conn->close();
?>