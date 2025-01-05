<?php
include('connection.php'); 
include('profile.php'); 
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

        <title>View Profile</title>
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
       
            width: 200%;
            height: 100%;
            object-fit: contain;
        }
        .profileButton-input {
            display: none; 
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
    object-fit: contain;
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

.progress-bar:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 3px solid transparent;
    border-top-color: #4CAF50; 
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
.modaldelete {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.4);
    justify-content: center;
    align-items: center;
}

.modaldelete-content {
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    text-align: center;
    position: relative;
    width: 300px;
}

.close-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 24px;
    cursor: pointer;
}

.btn {
    padding: 10px 20px;
    margin: 10px;
    font-size: 14px;
    cursor: pointer;
    border-radius: 5px;
}

.btn-danger {
    background-color: red;
    color: white;
    border: none;
}

.btn-secondary {
    background-color: gray;
    color: white;
    border: none;
}
</style>
    </head>
    <body>
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
                        <a href="candidates-dashboard-my-profile.php" class="nav-link">
                            <span class="icon"><i class="ri-home-line"></i></span>
                            <span class="menu-title">Candidate Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="Candidate_View.php" class="nav-link">
                            <span class="icon"><i class="ri-eye-line"></i></span>
                            <span class="menu-title">View Profile</span>
                        </a>
                    </li>

                    
                    <li class="nav-item">
                        <a href="userlogout.php" class="nav-link">
                            <span class="icon"><i class="ri-logout-circle-r-line"></i></span>
                            <span class="menu-title">Logout</span>
                        </a>
                    </li>

                    <div id="deleteModal" class="modaldelete">
                        <div class="modaldelete-content">
                            <span class="close-btn" onclick="closeModal()">&times;</span>
                            <p>Are you sure you want to delete your profile? This action cannot be undone.</p>
                            <button id="confirmDelete" class="btn btn-danger">OK</button>
                            <button onclick="closeModal()" class="btn btn-secondary">Cancel</button>
                        </div>
                    </div>


                    <li class="nav-item">
                        <form id="deleteForm" method="POST" action="deleteprofile.php" style="margin: 0;">
                            <button type="button" class="nav-link" onclick="openModal()">
                                <span class="icon"><i class="ri-delete-bin-line"></i></span>
                                <span class="menu-title">Delete Profile</span>
                            </button>
                        </form>
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
                            <li class="nav-item ">
                        <a href="candidates-dashboard-my-profile.php" class="nav-link">
                            <span class="icon"><i class="ri-home-line"></i></span>
                            <span class="menu-title">Candidate Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="Candidate_View.php" class="nav-link">
                            <span class="icon"><i class="ri-eye-line"></i></span>
                            <span class="menu-title">View Profile</span>
                        </a>
                    </li>


                    
                    <li class="nav-item">
                        <a href="userlogout.php" class="nav-link">
                            <span class="icon"><i class="ri-logout-circle-r-line"></i></span>
                            <span class="menu-title">Logout</span>
                        </a>
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
            <div class="breadcrumb-area">
                <h1>View Profile</h1>
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
    <img 
        id="profilePreview" 
        src="<?= !empty($user['profile_picture']) ? $user['profile_picture'] : 'assets/images/user-img/user.png' ?>" 
        alt="Profile Preview" 
        class="profile-img" 
        style="width: 150px; height: 150px; object-fit: cover;" 
    />
</div>

                <div style="margin-left:10px;">
                <?= htmlspecialchars($user['description']) ?>
                </div>
            </div>
             </div>
                    <div class="row align-items-center">
                        
                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>Email address</label>
                               <?= htmlspecialchars($user['email']) ?>
                            </div>
                        </div>
                        
                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>Phone</label>
                                <?= htmlspecialchars($user['mobile']) ?>
                            </div>
                        </div>
                        
                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>Date Of Birth</label>
                                <?= htmlspecialchars($user['dob']) ?>
                            </div>
                        </div>
                        
                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>gender</label>
                                    <?= $user['gender'] == 'Male' ? 'Male' : '' ?>
                                    <?= $user['gender'] == 'Female' ? 'Female' : '' ?>
                                    <?= $user['gender'] == 'Other' ? 'Other' : '' ?>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group select-group">
                                <label>Current Address</label>
                             <?= htmlspecialchars($user['correspondent_address']) ?>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group select-group">
                                <label>Permament Address</label>
                               <?= htmlspecialchars($user['permanent_address']) ?>
                            </div>
                        </div>
                
                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group select-group">
                                <label>Qualification</label>
                                <?= htmlspecialchars($user['qualification']) ?>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group select-group">
                                <label>Skills</label>
                                <?= htmlspecialchars($user['skills']) ?>
                            </div>
                        </div>
                        
                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>Experience</label>
                               
                                    <?= $user['experience'] == 'less than 1 year' ? 'less than 1 year' : '' ?>
                                     <?= $user['experience'] == '1 to 5 years' ? '1 to 5 years' : '' ?>
                                     <?= $user['experience'] == '5 to 10 years' ? '5 to 10 years' : '' ?>
                                    <?= $user['experience'] == 'greater than 10 years' ? 'greater than 10 years' : '' ?>
                             
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group select-group">
                                <label>Reference</label>
                               <?= htmlspecialchars($user['reference']) ?>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group select-group">
                                <label>Language</label>
                               <?= htmlspecialchars($user['languages']) ?>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group select-group">
                                <label>Country</label>
                                <?= htmlspecialchars($user['country']) ?>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>State</label>
                               <?= htmlspecialchars($user['state']) ?>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>City</label>
                               <?= htmlspecialchars($user['city']) ?>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>Portfolio Link</label>
                                <?= htmlspecialchars($user['Portfolio_link']) ?>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>Facebook URL</label>
                                <?= htmlspecialchars($user['fac_url']) ?>
                            </div>
                        </div>
                        
                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>Twitter URL</label>
                                <?= htmlspecialchars($user['twitter_url']) ?>
                            </div>
                        </div>
                        
                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>Linkedin URL</label>
                                <?= htmlspecialchars($user['linkedin_url']) ?>
                            </div>
                        </div>
                        
                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>Instagram URL</label>
                                <?= htmlspecialchars($user['insta_url']) ?>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>GitHub URL</label>
                                <?= htmlspecialchars($user['GitHub_link']) ?>
                            </div>
                        </div>
                        
                       
                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group select-group">
                            <div class="resume-container">
                                <br>
                            <label for="intro_video_path">Your Resume</label>
                                <div class="resume-preview">
                                    <?php if (isset($resume_name)): ?>
                                    
                                        <p>Below is your uploaded resume:</p>
                                        <?php

                                        $file_extension = pathinfo($resume_path, PATHINFO_EXTENSION);
                                        if ($file_extension === 'pdf' && file_exists($resume_path)): ?>
                                            <iframe src="<?= htmlspecialchars($resume_path) ?>" title="Resume"></iframe><br>
                                    
                                        <?php else: ?>
                                            <p>Your resume is not a PDF or the file is missing.</p>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <p>No resume uploaded yet. Please upload your resume from your profile page.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            </div>
                        </div>
                        <label> If You Wan't to Update Your Profile <a href="candidates-dashboard-my-profile.php">Click here</a></label>
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

    

    function previewVideo(input) {
        const videoPreview = document.getElementById('videoPreview');
        const videoSource = document.getElementById('videoSource');
        
        if (input.files && input.files[0]) {
            const file = input.files[0];

           
            if (!file.type.startsWith('video/')) {
                alert('Please upload a valid video file.');
                input.value = ""; 
                videoPreview.style.display = 'none';
                return;
            }

            const videoURL = URL.createObjectURL(file);
            videoSource.src = videoURL;
            videoPreview.load(); 
            videoPreview.style.display = 'block';
        } else {
            videoPreview.style.display = 'none';
        }
    }
    window.addEventListener('load', function () {
            var iframe = document.querySelector('iframe');
            if (iframe) {
                iframe.style.height = (window.innerHeight - 100) + 'px'; 
            }
        });
}    
</script>
<script>
    // Get the modal
    var modal = document.getElementById("deleteModal");

    // Open the modal
    function openModal() {
        modal.style.display = "block";
    }

    // Close the modal
    function closeModal() {
        modal.style.display = "none";
    }

    // Confirm deletion
    document.getElementById("confirmDelete").onclick = function() {
        document.getElementById("deleteForm").submit();  // Submit the form
    };

    // Close the modal when clicking outside
    window.onclick = function(event) {
        if (event.target == modal) {
            closeModal();
        }
    }
</script>
</body>
</html>