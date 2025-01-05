<?php
include('connection.php');
session_start();

// Fetch user data
$sql = "SELECT user_id, full_name, email, profile_picture FROM users";
$result = $conn->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

header('Content-Type: application/json');
echo json_encode($data);

$conn->close();
?>
