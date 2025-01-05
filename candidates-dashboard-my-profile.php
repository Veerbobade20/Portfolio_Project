<?php
include('connection.php'); 
include('profile.php'); 
?>
<!DOCTYPE html>
<html lang="zxx">
    
<head>
     
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

       
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        
        <link rel="stylesheet" href="assets/css/animate.min.css">
      
        <link rel="stylesheet" href="assets/fonts/remixicon.css">
        
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
     
        <link rel="stylesheet" href="assets/css/metismenu.min.css">
       
        <link rel="stylesheet" href="assets/css/simplebar.min.css">
        
        <link rel="stylesheet" href="assets/css/dropzone.min.css">
        
        <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
       
        <link rel="stylesheet" href="assets/css/odometer.min.css">
       
        <link rel="stylesheet" href="assets/css/meanmenu.min.css">
        
        <link rel="stylesheet" href="assets/css/style.css">
      
        <link rel="stylesheet" href="assets/css/responsive.css">
      
        <link rel="stylesheet" href="assets/css/theme-dark.css">

        <title>Candidate Dashboard</title>
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
        .floating-message {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            padding: 15px 20px;
            background-color: #28a745;
            color: #fff;
            border-radius: 5px;
            font-size: 14px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.5s, fadeOut 0.5s 4.5s;
        }

.floating-message.error {
    background-color: #dc3545; 
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeOut {
    from {
        opacity: 1;
        transform: translateY(0);
    }
    to {
        opacity: 0;
        transform: translateY(-20px);
    }
}

        .inserted_date {
            font-size: 14px;
            color: #666;
            margin-top: 10px;
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


.modal {
    display: none;
    position: fixed;
    margin-top: 30%;
    left: 50%;
    transform: translate(-50%, -50%); 
    width: 50%;
    max-width: 500px;
    z-index: 9999;
    justify-content: center;
    align-items: center;
}

.modal-content {
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    text-align: center;
    position: relative;
}

.close-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 24px;
    cursor: pointer;
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
    <?php if (isset($_SESSION['message'])): ?>
    <div id="floating-message" class="floating-message <?php echo htmlspecialchars($_SESSION['message']); ?>">
        <?php echo htmlspecialchars($_SESSION['message']); ?>
    </div>
    <?php unset($_SESSION['message'], $_SESSION['message_type']); ?>
<?php endif; ?>


      
        <div class="preloader">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="spinner"></div>
                </div>
            </div>
        </div>
        
        <div class="sidemenu-area">
            <div class="sidemenu-header">
                <a class="navbar-brand d-flex align-items-center">
                    <img src="assets/images/download.png" class="logo-one" alt="Logo">
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
     

   
        <div class="main-dashboard-content d-flex flex-column">
            
       
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
                                        
                                    </div>
                                </div>
                            </div>
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
            <div class="my-profile-box">
    <h3>Profile Details</h3>
    <div class="bar"></div>
    <form method="POST" enctype="multipart/form-data">
        <div class="profile-outer-area-two">
            <div class="profile-outer">
            <div class="profileButton">
                
        <div class="d-flex justify-content-center align-items-center profile-square" onclick="document.getElementById('uploadProfile').click();">
            
         
            <div class="completion-bar-container">
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
                                <label>Date Of Birth</label>
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
                                <textarea name="correspondent_address" Placeholder="Enter Current Address" class="form-control"><?= htmlspecialchars($user['correspondent_address']) ?></textarea>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group select-group">
                                <label>Permanent Address</label>
                                <textarea name="permanent_address" Placeholder="Enter Permanent Address" class="form-control"><?= htmlspecialchars($user['permanent_address']) ?></textarea>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group select-group">
                                <label>Qualification</label>
                                <input type="text" name="qualification" placeholder="Enter qualification" class="form-control" value="<?= htmlspecialchars($user['qualification']) ?>">
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group select-group">
                                <label>Skills</label>
                                <input type="text" name="skills" Placeholder="Enter skills" class="form-control" value="<?= htmlspecialchars($user['skills']) ?>">
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
                                <br>
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
                                <label>Languages</label>
                                <label id="add-language" class="form-control" style="cursor: pointer;">
                                    Add Language
                                </label>
                            </div>
                        </div>
                        

                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group select-group">
                                <label>Country</label>
                                <input type="text" name="country" class="form-control" Placeholder="Enter country" value="<?= htmlspecialchars($user['country']) ?>">
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>State</label>
                                <input type="text" name="state" class="form-control" Placeholder="Enter state" value="<?= htmlspecialchars($user['state']) ?>">
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" name="city" Placeholder="Enter city" class="form-control" value="<?= htmlspecialchars($user['city']) ?>">
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>Potfolio Link</label>
                                <input type="text" name="Portfolio_link" class="form-control" placeholder="If Not Mention N/A" value="<?= htmlspecialchars($user['Portfolio_link']) ?>" >
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
                            <div class="form-group select-group">
                                <label>Instagram URL</label>
                                <input type="text" name="insta_url" class="form-control" placeholder="https://instagram.com/" value="<?= htmlspecialchars($user['insta_url']) ?>">
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12" style="margin-bottom:90px;">
                            <div class="form-group">
                                <label>GitHub Link</label>
                                <input type="text" name="GitHub_link" placeholder="https://Github.com/" class="form-control" value="<?= htmlspecialchars($user['GitHub_link']) ?>" >
                            </div>
                        </div>
                        
                        
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <button type="submit" class="default-btn">Update Profile <i class="flaticon-send"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            
          
       
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
            
            document.getElementById("profilePreview").src = "assets/images/user-img/user.png"; 
            document.getElementById("profileFileName").textContent = "Please select an image.";
            
        }
    });
    
        
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
    
}    
</script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
    const message = document.getElementById('floating-message');
    if (message) {
        setTimeout(() => {
            message.style.display = 'none';
        }, 3000); 
    }
});
</script>

<div id="deleteModal" class="modal">
    <div class="modal-content">
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

<script>

    var modal = document.getElementById("deleteModal");

 
    function openModal() {
        modal.style.display = "block";
    }

    function closeModal() {
        modal.style.display = "none";
    }


    document.getElementById("confirmDelete").onclick = function() {
        document.getElementById("deleteForm").submit();
    };

    window.onclick = function(event) {
        if (event.target == modal) {
            closeModal();
        }
    }
</script>

<script>
    let tempLanguages = [];


    document.getElementById('add-language').addEventListener('click', () => {
        document.getElementById('language-modal').style.display = 'block';
    });


    document.querySelector('.close-btn').addEventListener('click', () => {
        document.getElementById('language-modal').style.display = 'none';
    });

    document.getElementById('next-language').addEventListener('click', () => {
        const language = document.getElementById('language-select').value;
        const level = document.getElementById('level-select').value;
        const skills = [];
        if (document.getElementById('read-skill').checked) skills.push('Read');
        if (document.getElementById('write-skill').checked) skills.push('Write');
        if (document.getElementById('speak-skill').checked) skills.push('Speak');

        if (!language || !level || skills.length === 0) {
            alert('Please complete all fields before proceeding.');
            return; 
        }

        tempLanguages.push({ language, level, skills });
        alert(`Language added: ${language} (${level}) - ${skills.join(', ')}`);

 
        document.getElementById('language-select').value = '';
        document.getElementById('level-select').value = '';
        document.querySelectorAll('#skills input').forEach(el => el.checked = false);
    });


    document.getElementById('save-language').addEventListener('click', () => {
        console.log("zdhsgcsd");
        if (tempLanguages.length === 0) {
            alert('Please add at least one language before saving.');
            return;
            console.log(tempLanguages);
        }

        fetch('save_languages.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                userId: <?= $user_id ?>,
                languages: tempLanguages,
            }),
        })        
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Languages saved successfully!');
                    document.getElementById('language-modal').style.display = 'none';
                    tempLanguages = []; 
                } else {
                    alert('Error saving languages: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            });
    });
</script>
</body>
</html>