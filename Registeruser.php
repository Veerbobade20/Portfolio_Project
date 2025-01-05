<?php

session_start();

include('connection.php');

$error_message = "";


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'register') {
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    if ($password !== $confirm_password) {
        $error_message = "Passwords & Conform Password Not Match!";
    } else {

        $hashed_password = password_hash($password, PASSWORD_BCRYPT);


        $sql = "INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $full_name, $email, $hashed_password);

        if ($stmt->execute()) {

            header("Location: loginuser.php");
            exit;
        } else {
            $error_message = "Error: Could not register. " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="zxx">
    
<!-- Mirrored from templates.hibootstrap.com/zoben/default/log-in-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 10:02:50 GMT -->
<head>
        <!-- Required Meta Tags -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--=== Bootstrap Min CSS ===-->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!-- Animate Min CSS -->
        <link rel="stylesheet" href="assets/css/animate.min.css">
        <!--=== remixIcon CSS ===-->
        <link rel="stylesheet" href="assets/fonts/remixicon.css">
        <!-- Owl Carousel Min CSS --> 
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
        <!--=== metisMenu Min CSS ===-->
        <link rel="stylesheet" href="assets/css/metismenu.min.css">
        <!--=== simpleBar Min CSS ===--> 
        <link rel="stylesheet" href="assets/css/simplebar.min.css">
        <!-- Dropzone CSS --> 
        <link rel="stylesheet" href="assets/css/dropzone.min.css">
        <!-- Magnific Popup CSS --> 
        <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
        <!-- Odometer CSS -->
        <link rel="stylesheet" href="assets/css/odometer.min.css">
        <!--=== meanMenu Min CSS ===-->
        <link rel="stylesheet" href="assets/css/meanmenu.min.css">
        <!-- Style CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="assets/css/responsive.css">
        <!-- Theme Dark CSS -->
        <link rel="stylesheet" href="assets/css/theme-dark.css">

        <!--=== Title & Favicon ===-->
        <title>Zoben - Job Board & Career Portal HTML Template</title>
        <link rel="icon" type="image/png" href="assets/images/favicon.png">
        <style>
        .error { color: red; font-size: 0.9em; margin-top: 5px; }
    </style>
    </head>
    <body>
             
        <!-- End Navbar Area -->

        <!-- Inner Banner -->
        <div class="inner-banner pb-50" >
            <div class="container">
                <div class="inner-title text-center">
                    <h3>Register</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                        <a href="loginuser.php">Log In</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Inner Banner End -->

        <!-- User Area -->
        <div class="user-area pt-10 pb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="user-all-form">
                        <div class="contact-form">
                            <h3>Create Account</h3>
                            <div class="bar"></div>
                            <form method="POST" action="">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input type="text" name="full_name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" name="confirm_password" class="form-control" required>
                                            <?php if (!empty($error_message)): ?>
                                                <div class="error"><?php echo $error_message; ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 text-center">
                                        <button type="submit" name="action" value="register" class="default-btn">Register Now</button>
                                    </div>
                                    <br><br>
                                    <br>
                                    <label for="chb1">
                                        Already Registered? <a href="loginuser.php">Login Now!</a>
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- Jquery Min JS -->
        <script src="assets/js/jquery.min.js"></script>
        <!-- Bootstrap Bundle Min JS -->
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <!--=== Magnific Popup Min JS ===-->
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <!--=== Odometer Min JS ===-->
        <script src="assets/js/odometer.min.js"></script>
        <!-- Appear Min JS -->
        <script src="assets/js/jquery.appear.min.js"></script>
        <!--=== meanMenu Min JS ===-->
        <script src="assets/js/meanmenu.min.js"></script>
        <!--=== metisMenu Min JS ===-->
        <script src="assets/js/metismenu.min.js"></script>
        <!--=== simpleBar Min JS ===-->
        <script src="assets/js/simplebar.min.js"></script>
        <!-- Dropzone JS -->
        <script src="assets/js/dropzone.min.js"></script>
        <!-- Sticky Sidebar JS -->
        <script src="assets/js/sticky-sidebar.min.js"></script>
        <!-- TweenMax JS -->
        <script src="assets/js/tweenMax.min.js"></script>
        <!-- Owl Carousel JS -->
        <script src="assets/js/owl.carousel.min.js"></script>
        <!-- Wow Min JS -->
        <script src="assets/js/wow.min.js"></script>
        <!--=== ajaxChimp Min JS ===-->
        <script src="assets/js/jquery.ajaxchimp.min.js"></script>
        <!-- Form Validator Min JS -->
        <script src="assets/js/form-validator.min.js"></script>
        <!-- Contact Form JS -->
        <script src="assets/js/contact-form-script.js"></script>
        <!--=== Custom JS ===-->
        <script src="assets/js/custom.js"></script>
        
    </body>

<!-- Mirrored from templates.hibootstrap.com/zoben/default/log-in-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 10:02:50 GMT -->
</html>