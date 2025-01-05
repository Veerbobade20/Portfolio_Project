<?php
session_start();
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'login') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $remember_me = isset($_POST['remember_me']);

    if (!empty($email) && !empty($password)) {
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

             
                if ($remember_me) {
               
                    setcookie("user_email", $email, time() + (30 * 24 * 60 * 60), "/");
                    setcookie("user_password", $password, time() + (30 * 24 * 60 * 60), "/");
                } else {
                
                    setcookie("user_email", "", time() - 3600, "/");
                    setcookie("user_password", "", time() - 3600, "/");
                }
                $_SESSION['message'] = "Login successful!";
                
               
                header("Location: candidates-dashboard-my-profile.php");
                exit;
            } else {
                $_SESSION['message'] = "Invalid password. Please try again.";
            }
        } else {
            $_SESSION['message'] = "No account found with that email address.";
        }

        $stmt->close();
    } else {
        $_SESSION['message'] = "Please fill in all fields.";
    }
}

  
$conn->close();
$message = "";
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}

?>

<!DOCTYPE html>
<html lang="zxx">
    
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
        
    </head>
    <body>
        
        <!-- Inner Banner -->
        <div class="inner-banner">
            <div class="container">
                <div class="inner-title text-center">
                    <h3>Log In</h3>
                    <ul>
                        <li>
                            <a href="Home.php">Home</a>
                        </li>
                        <li><a href="Registeruser.php">Register</a></li></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Inner Banner End -->

        <!-- User Area -->
        <div class="user-area pt-10 pb-70">
        <div class="container" >
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="user-all-form">
                        <div class="contact-form">
                            <h3>Log In Now</h3>
                            <div class="bar"></div>
                            <?php if (!empty($message)): ?>
                            <div class="alert alert-danger text-center">
                                <?php echo htmlspecialchars($message); ?>
                            </div>
                        <?php endif; ?>
                            <form method="POST" action="loginuser.php">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input 
                                                type="email" 
                                                name="email" 
                                                class="form-control" 
                                                value="<?php echo isset($_COOKIE['user_email']) ? $_COOKIE['user_email'] : ''; ?>" 
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input 
                                                type="password" 
                                                name="password" 
                                                class="form-control" 
                                                value="<?php echo isset($_COOKIE['user_password']) ? $_COOKIE['user_password'] : ''; ?>" 
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 form-condition">
                                        <div class="agree-label">
                                        <input 
                                                type="checkbox" 
                                                id="chb1" 
                                                name="remember_me" 
                                                <?php echo isset($_COOKIE['user_email']) ? 'checked' : ''; ?> 
                                                onclick="toggleRememberMe(this)">
                                            <label for="chb1">
                                                Remember Me <a class="forget" href="forgot-password.php">Forgot My Password?</a>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 text-center">
                                        <button type="submit" name="action" value="login" class="default-btn">Log In Now</button>
                                    </div>
                                    <br><br>
                                    <br>
                                    <label for="chb1">
                                        Don't have an account? <a href="Registeruser.php">Register Now!</a>
                                    </label>

                                    <div class="col-12">
                                        <div class="sub-title">
                                            <span>Or</span>
                                        </div>
                                    </div>

                                    <div class="login-with-account">
                                        <ul>
                                            <li>
                                                <a href="https://www.facebook.com/" target="_blank">
                                                    <i class="ri-facebook-line"></i>
                                                    Login with Facebook
                                                </a>
                                            </li>

                                            <li>
                                                <a href="https://www.google.com/" target="_blank">
                                                    <i class="ri-google-line"></i>
                                                    Login with Google
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
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

        <script>
        // JavaScript to handle dynamic checkbox and cookie-clearing logic
        function toggleRememberMe(checkbox) {
            if (!checkbox.checked) {
                // Clear cookies if checkbox is unchecked
                document.cookie = "user_email=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                document.cookie = "user_password=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                // Clear email and password fields
                document.getElementById("email").value = "";
                document.getElementById("password").value = "";
            }
        }
    </script>
        
    </body>

<!-- Mirrored from templates.hibootstrap.com/zoben/default/log-in-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 10:02:50 GMT -->
</html>