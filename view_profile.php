<?php
include('connection.php');
session_start();

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Fetch user details
    $sql = "SELECT * FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        echo "No user found.";
        exit;
    }

    $stmt->close();
} else {
    echo "User ID not provided.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Details</title>
    <!-- Include Bootstrap for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-container {
            margin-top: 20px;
        }
        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .profile-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 10%;
        }
        .profile-info p {
            font-size: 1.1rem;
            margin-bottom: 10px;
        }
        .profile-info strong {
            color: #007bff;
        }
        .resume-preview {
            margin-top: 20px;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 5px;
        }
        .resume-preview a {
            text-decoration: none;
            color: #007bff;
        }
        .btn-back {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .btn-back:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container profile-container">
        <div class="profile-header">
            <h2>Profile Details</h2>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="text-center">
                    <strong>Profile Photo:</strong><br>
                    <?php if (!empty($user['profile_picture']) && file_exists($user['profile_picture'])): ?>
                        <img src="<?= htmlspecialchars($user['profile_picture']) ?>" alt="Profile Picture" class="profile-img">
                    <?php else: ?>
                        <img src="assets/images/user-img/default.png" alt="Default Profile Picture" class="profile-img">
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-md-8 profile-info">
                <p><strong>Full Name:</strong> <?= htmlspecialchars($user['full_name']) ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
                <p><strong>Mobile:</strong> <?= htmlspecialchars($user['mobile'] ?? 'N/A') ?></p>
                <p><strong>DOB:</strong> <?= htmlspecialchars($user['dob'] ?? 'N/A') ?></p>
                <p><strong>Gender:</strong> <?= htmlspecialchars($user['gender'] ?? 'N/A') ?></p>
                <p><strong>Qualification:</strong> <?= htmlspecialchars($user['qualification'] ?? 'N/A') ?></p>
                <p><strong>Skills:</strong> <?= htmlspecialchars($user['skills'] ?? 'N/A') ?></p>
                <p><strong>Experience:</strong> <?= htmlspecialchars($user['experience'] ?? 'N/A') ?></p>
                <p><strong>Reference:</strong> <?= htmlspecialchars($user['reference'] ?? 'N/A') ?></p>
                <p><strong>Country:</strong> <?= htmlspecialchars($user['country'] ?? 'N/A') ?></p>
                <p><strong>State:</strong> <?= htmlspecialchars($user['state'] ?? 'N/A') ?></p>
                <p><strong>City:</strong> <?= htmlspecialchars($user['city'] ?? 'N/A') ?></p>
                <p><strong>Facebook URL:</strong> <?= htmlspecialchars($user['fac_url'] ?? 'N/A') ?></p>
                <p><strong>Instagram URL:</strong> <?= htmlspecialchars($user['insta_url'] ?? 'N/A') ?></p>
                <p><strong>LinkedIn URL:</strong> <?= htmlspecialchars($user['linkedin_url'] ?? 'N/A') ?></p>
                <p><strong>Twitter URL:</strong> <?= htmlspecialchars($user['twitter_url'] ?? 'N/A') ?></p>
                <p><strong>GitHub URL:</strong> <?= htmlspecialchars($user['GitHub_link'] ?? 'N/A') ?></p>
            </div>
        </div>

        <div class="resume-preview">
            <strong>Resume:</strong><br>
            <?php if (!empty($user['resume_path']) && file_exists($user['resume_path'])): ?>
                <!-- Display embedded preview for PDF resumes -->
                <?php if (pathinfo($user['resume_path'], PATHINFO_EXTENSION) === 'pdf'): ?>
                    <embed src="<?= htmlspecialchars($user['resume_path']) ?>" type="application/pdf" width="100%" height="500px">
                    <br>
                <?php endif; ?>
                <!-- Download link -->
                <a href="<?= htmlspecialchars($user['resume_path']) ?>" target="_blank" download>Download Resume</a>
            <?php else: ?>
                <span>No resume uploaded.</span>
            <?php endif; ?>
        </div>

        <a href="AdminDashboard.php" class="btn-back">Back to User List</a>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
