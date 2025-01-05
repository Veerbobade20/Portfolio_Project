<?php
session_start();
include('connection.php');

$user_id = null;
$user_full_name = null;
$user_email = null;
$message='';
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $user_full_name = $_SESSION['user_full_name'];
    $user_email = $_SESSION['user_email'];
} elseif (isset($_COOKIE['user_email']) && isset($_COOKIE['user_password'])) {
    $email = $_COOKIE['user_email'];
    $password = $_COOKIE['user_password'];

    $sql = "SELECT user_id, full_name, email, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_full_name'] = $user['full_name'];
            $_SESSION['user_email'] = $user['email'];

            $user_id = $user['user_id'];
            $user_full_name = $user['full_name'];
            $user_email = $user['email'];

          
            $_SESSION['message'] = "Login successful!";
            $_SESSION['message_type'] = "success";  
        } else {
            $_SESSION['message'] = "Invalid credentials from cookies.";
            $_SESSION['message_type'] = "error";  
            header("Location: loginuser.php");
            exit;
        }
    } else {
        $_SESSION['message'] = "No user found.";
        $_SESSION['message_type'] = "error"; 
        header("Location: loginuser.php");
        exit;
    }
} else {
    header("Location: loginuser.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = $_POST['full_name'] ?? $user_full_name;
    $email = $_POST['email'] ?? $user_email;
    $mobile = $_POST['mobile'] ?? null;
    $dob = $_POST['dob'] ?? null;
    $gender = $_POST['gender'] ?? null;
    $correspondent_address = $_POST['correspondent_address'] ?? null;
    $permanent_address = $_POST['permanent_address'] ?? null;
    $qualification = $_POST['qualification'] ?? null;
    $skills = $_POST['skills'] ?? null;
    $experience = $_POST['experience'] ?? null;
    $reference = $_POST['reference'] ?? null;
    $country = $_POST['country'] ?? null;
    $state = $_POST['state'] ?? null;
    $city = $_POST['city'] ?? null;
    $fac_url = $_POST['fac_url'] ?? null;
    $linkedin_url = $_POST['linkedin_url'] ?? null;
    $twitter_url = $_POST['twitter_url'] ?? null;
    $insta_url = $_POST['insta_url'] ?? null;
    $description = $_POST['description'] ?? null;
    $GitHub_link = $_POST['GitHub_link'] ?? null;

    $profile_picture = null;
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
        $profile_picture = 'assets/images/user-img/' . basename($_FILES['profile_picture']['name']);
        move_uploaded_file($_FILES['profile_picture']['tmp_name'], $profile_picture);
    }

    $resume_path = $user['resume_path']; // Get the current resume path from the database

    // Check if a new resume file was uploaded
    if (isset($_FILES['resume_path']) && $_FILES['resume_path']['error'] == 0) {
        // Move the new uploaded file
        $resume_path = 'assets/resumes/' . basename($_FILES['resume_path']['name']);
        move_uploaded_file($_FILES['resume_path']['tmp_name'], $resume_path);

        // If there's an existing resume, delete the old file
        if (!empty($user['resume_path']) && file_exists($user['resume_path'])) {
            unlink($user['resume_path']); // Delete old resume
        }
    } elseif (isset($_POST['current_resume']) && !empty($_POST['current_resume'])) {
        // If no new file is uploaded, use the existing resume path
        $resume_path = $_POST['current_resume'];
    }

    $sql = "UPDATE users SET 
                full_name = ?, 
                email = ?, 
                description = ?,
                mobile = ?, 
                dob = ?, 
                gender = ?, 
                correspondent_address = ?, 
                permanent_address = ?, 
                qualification = ?, 
                skills = ?, 
                experience = ?, 
                reference = ?, 
                country = ?, 
                state = ?, 
                city = ?, 
                fac_url = ?,
                linkedin_url = ?, 
                twitter_url = ?, 
                insta_url = ?, 
                GitHub_link = ?,
                profile_picture = IFNULL(?, profile_picture), 
                resume_path = IFNULL(?, resume_path) 
            WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "ssssssssssssssssssssssi",
        $full_name,
        $email,
        $description,
        $mobile,
        $dob,
        $gender,
        $correspondent_address,
        $permanent_address,
        $qualification,
        $skills,
        $experience,
        $reference,
        $country,
        $state,
        $city,
        $fac_url,
        $linkedin_url,
        $twitter_url,
        $insta_url,
        $GitHub_link,
        $profile_picture,
        $resume_path,
        $user_id
    );

    if ($stmt->execute()) {
        $_SESSION['message'] = "Profile updated successfully.";
        $_SESSION['message_type'] = "success";  
        header("Location: candidates-dashboard-my-profile.php");
        exit;
    } else {
        $_SESSION['message'] = "Failed to update profile. Please try again.";
        $_SESSION['message_type'] = "error";
        header("Location: candidates-dashboard-my-profile.php");
        exit;
    }
    $stmt->close();
}

$sql = "SELECT *, inserted_date FROM users WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$resume_path = $user['resume_path'];
if ($resume_path && file_exists($resume_path)) {
    $resume_name = basename($resume_path);
} else {
    $resume_name = null;
}

$stmt->close();
$conn->close();

$fields = [
    'profile_picture', 'resume_path', 'full_name', 'email', 'mobile', 
    'dob', 'gender', 'correspondent_address', 'permanent_address', 
    'qualification', 'skills', 'experience', 'reference', 'country', 
    'state', 'city', 'fac_url', 'linkedin_url', 'twitter_url', 'insta_url', 'description'
];

$completed_fields = 0;
foreach ($fields as $field) {
    if (!empty($user[$field])) {
        $completed_fields++;
    }
}

$total_fields = count($fields);
$completion_percentage = ($completed_fields / $total_fields) * 100;
?>