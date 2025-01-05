<?php
include('connection.php'); 

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

        <title>Zoben - Job Board & Career Portal HTML Template</title>
        <link rel="icon" type="image/png" href="assets/images/favicon.png">
        <style>
        .profile-square {
            width: 160px;
            height: 160px;
            background-color:white;
            cursor: pointer;
            overflow: hidden;
            position: relative;
            border: 2px solid #ddd;
        }
        .profile-square img.profile-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .profileButton-input {
            display: none; 
        }
         .floating-message {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            z-index: 9999;
            color: white; 
            display: none; 
        }

   
        .floating-message:not(.error) {
            background-color: #4CAF50; 
        }


        .floating-message.error {
            background-color: #4CAF50; 
        }
        .inserted_date {
            font-size: 14px;
            color: #666;
            margin-top: 10px;
        }
        .profile-container {
            width: 80%;
            max-width: 1000px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-header h2 {
            font-size: 30px;
            color: #333;
        }

        .completion-bar-container {
            margin-bottom: 20px;
        }

        .completion-bar {
            width: 100%;
            background-color: #e0e0e0;
            border-radius: 5px;
            height: 20px;
            position: relative;
        }

        .completion-bar .progress {
            height: 100%;
            background-color: #4CAF50;
            border-radius: 5px;
        }

        .completion-bar .progress-text {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            color: black;
            
        }
        .profile-img-container-square {
        position: relative;
        display: inline-block;
        width: 150px; 
        height: 140px;
        
        overflow: hidden;
}

.profile-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.completion-bar-wrapper {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border-radius: 10px; 
    box-sizing: border-box;
}

.progress-bar {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: transparent;
    border: 3px solid transparent; 
    border-radius: 10px; 
}

.progress-bar:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 3px solid transparent;
    border-top-color: #4CAF50; 
    border-radius: 10px;
    box-sizing: border-box;
    transform: scaleX(0);
    transform-origin: left center;
    animation: progress-animation 2s forwards;
}

@keyframes progress-animation {
    0% {
        transform: scaleX(0);
    }
    100% {
        transform: scaleX(1);
    }
}

</style>
    </head>
    <body>
    <?php if (isset($_SESSION['message']) && !empty($_SESSION['message'])): ?>
    <div class="floating-message <?= strpos($_SESSION['message'], 'successfully') !== false ? '' : 'error' ?>" id="floatingMessage">
        <?php echo htmlspecialchars($_SESSION['message']); ?>
    </div>
    <?php unset($_SESSION['message']); ?> <!-- yash Clear message after it's shown -->
<?php endif; ?>


        <!-- Pre Loader -->
        <div class="preloader">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="spinner"></div>
                </div>
            </div>
        </div>
        <!-- End Pre Loader -->

        <!-- Start Sidemenu Area -->
        <div class="sidemenu-area">
            <div class="sidemenu-header">
                <a href="candidates-dashboard.html" class="navbar-brand d-flex align-items-center">
                    <img src="assets/images/logo.png" class="logo-one" alt="Logo">
                    <img src="assets/images/logo-2.png" class="logo-two" alt="Logo">
                </a>

                <div class="responsive-burger-menu d-block d-lg-none">
                    <span class="top-bar"></span>
                    <span class="middle-bar"></span>
                    <span class="bottom-bar"></span>
                </div>
            </div>

            <div class="sidemenu-body">
                <ul class="sidemenu-nav metisMenu h-100" id="sidemenu-nav" data-simplebar>
                    <li class="nav-item ">
                        <a href="candidates-dashboard.php" class="nav-link">
                            <span class="icon"><i class="ri-home-line"></i></span>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item active">
                        <a href="candidates-dashboard-my-profile.html" class="nav-link">
                            <span class="icon"><i class="ri-user-line"></i></span>
                            <span class="menu-title">My Profile</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="candidates-dashboard-my-resume.php" class="nav-link">
                            <span class="icon"><i class="ri-file-list-line"></i></span>
                            <span class="menu-title">My Resume</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="candidates-dashboard-applied-job.html" class="nav-link">
                            <span class="icon"><i class="ri-briefcase-line"></i></span>
                            <span class="menu-title">Applied Jobs</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="candidates-dashboard-job-alerts.html" class="nav-link">
                            <span class="icon"><i class="ri-notification-3-line"></i></span>
                            <span class="menu-title">Job Alerts</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="candidates-dashboard-shortlisted-job.html" class="nav-link">
                            <span class="icon"><i class="ri-bookmark-line"></i></span>
                            <span class="menu-title">Shortlisted Jobs</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="candidates-dashboard-cv-manager.html" class="nav-link">
                            <span class="icon"><i class="ri-book-line"></i></span>
                            <span class="menu-title">CV Manager</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="dashboard-packages.html" class="nav-link">
                            <span class="icon"><i class="ri-stack-fill"></i></span>
                            <span class="menu-title">Packages</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="dashboard-messages.html" class="nav-link">
                            <span class="icon"><i class="ri-chat-1-line"></i></span>
                            <span class="menu-title">Messages</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="dashboard-invoice.html" class="nav-link">
                            <span class="icon"><i class="ri-price-tag-line"></i></span>
                            <span class="menu-title">Invoice</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="dashboard-change-password.php" class="nav-link">
                            <span class="icon"><i class="ri-lock-line"></i></span>
                            <span class="menu-title">Change Password</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="dashboard-my-profile.html" class="nav-link">
                            <span class="icon"><i class="ri-user-line"></i></span>
                            <span class="menu-title">View Profile</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="userlogout.php" class="nav-link">
                            <span class="icon"><i class="ri-logout-circle-r-line"></i></span>
                            <span class="menu-title">Logout</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="index.html" class="nav-link">
                            <span class="icon"><i class="ri-delete-bin-line"></i></span>
                            <span class="menu-title">Delete Profile</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- End Sidemenu Area -->

        <!-- Start Main Dashboard Content Wrapper Area -->
        <div class="main-dashboard-content d-flex flex-column">
            
            <!-- Start Navbar Area -->
            <div class="navbar-area">
                <div class="main-responsive-nav">
                    <div class="main-responsive-menu">
                        <div class="responsive-burger-menu d-lg-none d-block">
                            <span class="top-bar"></span>
                            <span class="middle-bar"></span>
                            <span class="bottom-bar"></span>
                        </div>
                    </div>
                </div>

                <div class="mobile-responsive-nav">
                    <div class="mobile-responsive-menu">
                    </div>
                </div>

                <!-- Menu For Desktop Device -->
                <div class="desktop-nav desktop-nav-one nav-area">
                    <nav class="navbar navbar-expand-md navbar-light ">
                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Home 
                                        <i class="ri-arrow-down-s-line"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="index.html" class="nav-link">
                                                Home One  
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="index-2.html" class="nav-link">
                                                Home Two
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="index-3.html" class="nav-link">
                                                Home Three
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Jobs
                                        <i class="ri-arrow-down-s-line"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="job-listing.html" class="nav-link">Job Listing</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="post-job.html" class="nav-link">Post A Job</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="job-details.html" class="nav-link">Job Details</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Employers
                                        <i class="ri-arrow-down-s-line"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="employers-listing.html" class="nav-link">
                                                Employers Listing
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="employers-details.html" class="nav-link">
                                                Employers Details
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="dashboard.html" class="nav-link">
                                                Employers Dashboard
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Candidates
                                        <i class="ri-arrow-down-s-line"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="candidates-listing.html" class="nav-link">
                                                Candidates Listing
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="candidates-details.html" class="nav-link">
                                                Candidates Details
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="candidates-dashboard.html" class="nav-link">
                                                Candidates Dashboard
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Blog
                                        <i class="ri-arrow-down-s-line"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="blog-1.html" class="nav-link">
                                                Blog Grid
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="blog-2.html" class="nav-link">
                                                Blog Left Sidebar 
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="blog-3.html" class="nav-link">
                                                Blog Right Sidebar 
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="blog-details.html" class="nav-link">
                                                Blog Details 
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="categories.html" class="nav-link">
                                                Categories
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="tags.html" class="nav-link">
                                                Tags
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Pages 
                                        <i class="ri-arrow-down-s-line"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="about.html" class="nav-link">
                                                About Us
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="contact.html" class="nav-link">
                                                Contact Us
                                            </a>
                                        </li>
    
                                        <li class="nav-item">
                                            <a href="testimonials.html" class="nav-link">
                                                Testimonials
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                Freelancer
                                                <i class="ri-arrow-down-s-line"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class="nav-item">
                                                    <a href="freelancer.html" class="nav-link">
                                                        Freelancer
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="freelancer-details.html" class="nav-link">
                                                        Freelancer Details 
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
    
                                        <li class="nav-item">
                                            <a href="dashboard-invoice.html" class="nav-link">
                                                Invoice
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                Company
                                                <i class="ri-arrow-down-s-line"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class="nav-item">
                                                    <a href="company.html" class="nav-link">
                                                        Company Listing
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="company-details.html" class="nav-link">
                                                        Company Details 
                                                    </a>
                                                </li>

                                                <li class="nav-item">
                                                    <a href="search-job.html" class="nav-link">
                                                        Search Job
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
    
                                        <li class="nav-item">
                                            <a href="pricing.html" class="nav-link">
                                                Pricing Plan
                                            </a>
                                        </li>
    
                                        <li class="nav-item">
                                            <a href="faq.html" class="nav-link">
                                                FAQ
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="log-in-register.html" class="nav-link">
                                                Log In / Register
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="forgot-password.html" class="nav-link">
                                                Forgot Password
                                            </a>
                                        </li>
    
                                        <li class="nav-item">
                                            <a href="terms-condition.html" class="nav-link">
                                                Terms & Conditions
                                            </a>
                                        </li>
    
                                        <li class="nav-item">
                                            <a href="privacy-policy.html" class="nav-link">
                                                Privacy Policy
                                            </a>
                                        </li>
    
                                        <li class="nav-item">
                                            <a href="404.html" class="nav-link">
                                                404 Page
                                            </a>
                                        </li>
                                        
                                        <li class="nav-item">
                                            <a href="coming-soon.html" class="nav-link">
                                                Coming Soon
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                            <div class="others-options d-flex align-items-center">
                                <div class="optional-item">
                                    <div class="dropdown profile-nav-item">
                                        <a href="#" class="dropdown-bs-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <div class="menu-profile">
                                            
                                            <img src="<?= !empty($user['profile_picture']) ? $user['profile_picture'] : 'assets/images/user-img/user.png' ?>" alt="Profile Preview" class="profile-img" style="width:50px;" />

                                                <span class="name"><?= htmlspecialchars($user['full_name']) ?></span>
                                            </div>
                                        </a>
            
                                        <div class="dropdown-menu">
                                            <div class="dropdown-header d-flex flex-column align-items-center">
                                                <div class="figure mb-3">
                                                <img src="<?= !empty($user['profile_picture']) ? $user['profile_picture'] : 'assets/images/user-img/user.png' ?>" alt="Profile Preview" class="profile-img" style="width:100px;" />
                                                </div>
            
                                                <div class="info text-center">
                                                    <span class="name"><?= htmlspecialchars($user['full_name']) ?></span>
                                                    
                                                    <p class="mb-3 email"><?= htmlspecialchars($user['email']) ?></p>
                                                </div>

                                                <?php if (!empty($user['inserted_date'])): ?>
                                                    <p class="inserted_date" style="font-size:15px">last updated: 
                                                <?php echo date("F j, Y", strtotime($user['inserted_date'])); ?>
                                                     </p>
                                                <?php else: ?>
                                                        <p class="inserted_date">Profile has not been updated yet.</p>
                                                <?php endif; ?>
                                            </div>
            
                                            <div class="dropdown-body">
                                                <ul class="profile-nav p-0 pt-3">
                                                    <li class="nav-item active">
                                                        <a href="candidates-dashboard.php" class="nav-link">
                                                            <span class="icon"><i class="ri-home-line"></i></span>
                                                            <span class="menu-title">Dashboard</span>
                                                        </a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a href="dashboard-applicants.html" class="nav-link">
                                                            <span class="icon"><i class="ri-file-list-line"></i></span>
                                                            <span class="menu-title">All Applicants</span>
                                                        </a>
                                                    </li>
                                
                                                    <li class="nav-item">
                                                        <a href="candidates-dashboard-my-resume.php" class="nav-link">
                                                            <span class="icon"><i class="ri-close-line"></i></span>
                                                            <span class="menu-title">View Resumes</span>
                                                        </a>
                                                    </li>
                                
                                                    <li class="nav-item">
                                                        <a href="dashboard-packages.html" class="nav-link">
                                                            <span class="icon"><i class="ri-stack-fill"></i></span>
                                                            <span class="menu-title">Packages</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
            
                                            <div class="dropdown-footer">
                                                <ul class="profile-nav">
                                                    <li class="nav-item">
                                                        <a href="userlogout.php" class="nav-link"><i class="ri-logout-box-r-line"></i> <span>Logout</span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </nav>
                </div>

                <div class="side-nav-responsive">
                    <div class="container-max">
                        <div class="dot-menu">
                            <div class="circle-inner">
                                <div class="circle circle-one"></div>
                                <div class="circle circle-two"></div>
                                <div class="circle circle-three"></div>
                            </div>
                        </div>
                        
                        <div class="container">
                            <div class="side-nav-inner">
                                <div class="side-nav justify-content-center align-items-center">
                                    <div class="option-item">
                                        <div class="dropdown profile-nav-item">
                                            <a href="#" class="dropdown-bs-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <div class="menu-profile">
                                                    <img src="assets/images/user-img/user-img2.jpg" class="rounded-circle" alt="image">
                                                    <span class="name">My Account</span>
                                                </div>
                                            </a>
                
                                            <div class="dropdown-menu">
                                                <div class="dropdown-header d-flex flex-column align-items-center">
                                                    <div class="figure mb-3">
                                                        <img src="assets/images/user-img/user-img2.jpg" class="rounded-circle" alt="image">
                                                    </div>
                
                                                    <div class="info text-center">
                                                        <span class="name">Andy Smith</span>
                                                        <p class="mb-3 email"><a href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="2149444d4d4e61404f45534e524c4855490f424e4c">[email&#160;protected]</a></p>
                                                    </div>
                                                </div>
                
                                                <div class="dropdown-body">
                                                    <ul class="profile-nav p-0 pt-3">
                                                        <li class="nav-item active">
                                                            <a href="dashboard.html" class="nav-link">
                                                                <span class="icon"><i class="ri-home-line"></i></span>
                                                                <span class="menu-title">Dashboard</span>
                                                            </a>
                                                        </li>
    
                                                        <li class="nav-item">
                                                            <a href="dashboard-applicants.html" class="nav-link">
                                                                <span class="icon"><i class="ri-file-list-line"></i></span>
                                                                <span class="menu-title">All Applicants</span>
                                                            </a>
                                                        </li>
                                    
                                                        <li class="nav-item">
                                                            <a href="dashboard-submit-resume.html" class="nav-link">
                                                                <span class="icon"><i class="ri-close-line"></i></span>
                                                                <span class="menu-title">Submit Resumes</span>
                                                            </a>
                                                        </li>
                                    
                                                        <li class="nav-item">
                                                            <a href="dashboard-packages.html" class="nav-link">
                                                                <span class="icon"><i class="ri-stack-fill"></i></span>
                                                                <span class="menu-title">Packages</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                
                                                <div class="dropdown-footer">
                                                    <ul class="profile-nav">
                                                        <li class="nav-item">
                                                            <a href="index.html" class="nav-link"><i class="ri-logout-box-r-line"></i> <span>Logout</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="dashboard-fun-fact-area">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="stats-fun-fact-box">
                            <div class="icon-box">
                                <i class="ri-briefcase-line"></i>
                            </div>
                            <span class="sub-title">Posted Jobs</span>
                            <h3>100</h3>
                        </div>
                    </div>
    
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="stats-fun-fact-box">
                            <div class="icon-box">
                                <i class="ri-file-list-line"></i>
                            </div>
                            <span class="sub-title">Application</span>
                            <h3>6382</h3>
                        </div>
                    </div>
    
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="stats-fun-fact-box">
                            <div class="icon-box">
                                <i class="ri-chat-2-line"></i>
                            </div>
                            <span class="sub-title">Mesages</span>
                            <h3>85</h3>
                        </div>
                    </div>
    
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="stats-fun-fact-box">
                            <div class="icon-box">
                                <i class="ri-close-line"></i>
                            </div>
                            <span class="sub-title">Shortlist</span>
                            <h3>57</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumb-area">
                <h1>My Profile</h1>
                <ol class="breadcrumb">
                    <li class="item"><a href="dashboard.html">Home</a></li>
                    <li class="item">My Profile</li>
                </ol>
            </div>
    <?php if (!empty($user['inserted_date'])): ?>
        <p class="inserted_date">Profile last updated on: 
            <?php echo date("F j, Y, g:i a", strtotime($user['inserted_date'])); ?>
        </p>
    <?php else: ?>
        <p class="inserted_date">Profile has not been updated yet.</p>
    <?php endif; ?>
    <div class="completion-bar-container">
            <div class="completion-bar">
                <div class="progress" style="width: <?= $completion_percentage ?>%;">
                    <span class="progress-text">Profile <?= round($completion_percentage) ?>% Completed</span>
                </div>
            </div>
        </div>

        <!-- Incomplete Fields Message -->
        <?php if ($message): ?>
            <div class="alert-info"><?= $message ?></div>
        <?php endif; ?>
            <!-- Breadcrumb Area -->
            <div class="my-profile-box">
    <h3>Profile Details</h3>
    <div class="bar"></div>
    <form method="POST" enctype="multipart/form-data">
        <div class="profile-outer-area-two">
            <div class="profile-outer">
            <div class="profileButton">
                
        <div class="d-flex justify-content-center align-items-center profile-square" onclick="document.getElementById('uploadProfile').click();">
            
         
            <div class="completion-bar-wrapper">
                    <div class="progress-bar" style="width: <?= $completion_percentage ?>%;"></div>
                </div>
            <div class="profile-img-container-square">
                
                <img id="profilePreview" src="<?= !empty($user['profile_picture']) ? $user['profile_picture'] : 'assets/images/user-img/user.png' ?>" alt="Profile Preview" class="profile-img" />
                
       
                
            </div>
        
        </div>
        
        <input class="profileButton-input" type="file" name="profile_picture" accept="assets/image/user-img/*" id="uploadProfile" value="<?= htmlspecialchars($user['profile_picture']) ?>" />
    </div>
                <div class="text-title">
                <textarea cols="90" rows="6" name="description" class="form-control"><?= htmlspecialchars($user['description']) ?></textarea>
                </div>
            </div>
             </div>
                    <div class="row align-items-center">
                        
                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>">
                            </div>
                        </div>
                        
                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="mobile" class="form-control" value="<?= htmlspecialchars($user['mobile']) ?>">
                            </div>
                        </div>
                        
                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" name="dob" class="form-control" value="<?= htmlspecialchars($user['dob']) ?>">
                            </div>
                        </div>
                        
                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>gender</label>
                                <select name="gender" class="form-control">
                                    <option></option>
                                    <option value="Male" <?= $user['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
                                    <option value="Female" <?= $user['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
                                    <option value="Other" <?= $user['gender'] == 'Other' ? 'selected' : '' ?>>Other</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group select-group">
                                <label>Current Address</label>
                                <textarea name="correspondent_address" class="form-control"><?= htmlspecialchars($user['correspondent_address']) ?></textarea>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group select-group">
                                <label>Permament Address</label>
                                <textarea name="permanent_address" class="form-control"><?= htmlspecialchars($user['permanent_address']) ?></textarea>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group select-group">
                                <label>Qualification</label>
                                <input type="text" name="qualification" class="form-control" value="<?= htmlspecialchars($user['qualification']) ?>">
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group select-group">
                                <label>Skills</label>
                                <input type="text" name="skills" class="form-control" value="<?= htmlspecialchars($user['skills']) ?>">
                            </div>
                        </div>
                        
                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>Experience</label>
                                <select name="experience" class="form-control">
                                    <option value="less than 1 year" <?= $user['experience'] == 'less than 1 year' ? 'selected' : '' ?>>less than 1 year</option>
                                    <option value="1 to 5 years" <?= $user['experience'] == '1 to 5 years' ? 'selected' : '' ?>>1 to 5 years</option>
                                    <option value="5 to 10 years" <?= $user['experience'] == '5 to 10 years' ? 'selected' : '' ?>>5 to 10 years</option>
                                    <option value="greater than 10 years" <?= $user['experience'] == 'greater than 10 years' ? 'selected' : '' ?>>greater than 10 years</option>
                                </select>
                            </div>
                        </div>

                        
                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group select-group">
                                <label for="resume_path">Resume</label>

                                <input 
                                    type="file" 
                                    id="resume_path" 
                                    name="resume_path" 
                                    class="form-control" 
                                    accept=".pdf,.doc,.docx"
                                    onchange="updateResumeName(this)"
                                >
                                
                                <?php if (!empty($user['resume_path'])): ?>
                                    <small>
                                        <span id="currentResumeName">
                                            Uploaded Resume: <?= htmlspecialchars(basename($user['resume_path'])) ?>
                                        </span>
                                    </small>

                                    <input 
                                        type="hidden" 
                                        name="current_resume" 
                                        value="<?= htmlspecialchars($user['resume_path']) ?>">
                                <?php else: ?>
                                    <small id="currentResumeName">No resume uploaded yet.</small>
                                <?php endif; ?>
                            </div>
                        </div>


                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group select-group">
                                <label>Reference</label>
                                <input type="text" name="reference" class="form-control" value="<?= htmlspecialchars($user['reference']) ?>">
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group select-group">
                                <label>Country</label>
                                <input type="text" name="country" class="form-control" value="<?= htmlspecialchars($user['country']) ?>">
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>State</label>
                                <input type="text" name="state" class="form-control" value="<?= htmlspecialchars($user['state']) ?>">
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" name="city" class="form-control" value="<?= htmlspecialchars($user['city']) ?>">
                            </div>
                        </div>


                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>Facebook URL</label>
                                <input type="text" name="fac_url" class="form-control" placeholder="https://www.facebook.com/" value="<?= htmlspecialchars($user['fac_url']) ?>">
                            </div>
                        </div>
                        
                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>Twitter URL</label>
                                <input type="text" name="twitter_url" class="form-control" placeholder="https://twitter.com/" value="<?= htmlspecialchars($user['twitter_url']) ?>">
                            </div>
                        </div>
                        
                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>Linkedin URL</label>
                                <input type="text" name="linkedin_url" class="form-control" placeholder="https://www.linkedin.com/" value="<?= htmlspecialchars($user['linkedin_url']) ?>">
                            </div>
                        </div>
                        
                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>Instagram URL</label>
                                <input type="text" name="insta_url" class="form-control" placeholder="https://instagram.com/" value="<?= htmlspecialchars($user['insta_url']) ?>">
                            </div>
                        </div>
    
                        <div class="col-lg-12 col-md-12">
                            <button type="submit" class="default-btn">Update Profile <i class="flaticon-send"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- End Company Profile Area -->

            <!-- Start Copyright Area -->
            <div class="copyrights-area">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-sm-6 col-md-6">
                        <p><i class="ri-copyright-line"></i>  <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear())</script>  <a href="index.html">Zoben</a>. All Rights Reserved </p>
                    </div>

                    <div class="col-lg-6 col-sm-6 col-md-6 text-end">
                        <p>Designed by  <a href="https://hibootstrap.com/" target="_blank">HiBootstrap</a> 
                    </div>
                </div>
            </div>
            <!-- End Copyright Area -->
        </div>
       

        <script src="assets/js/jquery.min.js"></script>
       
        <script src="assets/js/bootstrap.bundle.min.js"></script>
       
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
      
        <script src="assets/js/odometer.min.js"></script>
       
        <script src="assets/js/jquery.appear.min.js"></script>
       
        <script src="assets/js/meanmenu.min.js"></script>
       
        <script src="assets/js/metismenu.min.js"></script>
        
        <script src="assets/js/simplebar.min.js"></script>
       
        <script src="assets/js/dropzone.min.js"></script>
       
        <script src="assets/js/sticky-sidebar.min.js"></script>
        
        <script src="assets/js/tweenMax.min.js"></script>
       
        <script src="assets/js/owl.carousel.min.js"></script>
        
        <script src="assets/js/wow.min.js"></script>
        
        <script src="assets/js/jquery.ajaxchimp.min.js"></script>
        
        <script src="assets/js/form-validator.min.js"></script>
        
        <script src="assets/js/contact-form-script.js"></script>
        
        <script src="assets/js/custom.js"></script>

<script>
    
    document.getElementById("uploadProfile").addEventListener("change", function(event) {
        const file = event.target.files[0];
        
        if (file && file.type.startsWith("image/")) {
            const reader = new FileReader();

            reader.onload = function(e) {
                
                const profilePreview = document.getElementById("profilePreview");
                profilePreview.src = e.target.result;  

                document.getElementById("profileFileName").textContent = file.name;
            };

            reader.readAsDataURL(file);  
        } else {
            /
            document.getElementById("profilePreview").src = "assets/images/user-img/user.png"; 
            document.getElementById("profileFileName").textContent = "Please select an image.";
        }
    });
    window.onload = function() {
            var messageElement = document.getElementById('floatingMessage');
            if (messageElement) {
                
                messageElement.style.display = 'block';
             
                setTimeout(function() {
                    messageElement.style.display = 'none';
                }, 3000);
            }
        };
        
        function updateResumeName(inputElement) {
    var fileName = inputElement.files[0].name;
    document.getElementById('currentResumeName').innerHTML = 'New Resume: ' + fileName;
}    
</script>
</body>
</html>