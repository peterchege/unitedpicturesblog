<?php
    require_once('../inc/db.php');
    require_once('../inc/sessions.php');
    require_once('../inc/functions.php');

    if(isset($_POST['submit'])){
        $usernameEmail=test_input($_POST['usernameEmail']);
        $password=test_input($_POST['password']);
        $password=md5($password);
        
        if(empty($usernameEmail) || empty($password)){
            $_SESSION['ErrorMessage']="All fields required";
            //redirect_to("categories.php");
        }elseif(strlen($usernameEmail)<4){
            $_SESSION['ErrorMessage']="The name of the admin you entered is too short. At least 4 characters required";
            //redirect_to("categories.php");
        }elseif(strlen($usernameEmail)<4){
            $_SESSION['ErrorMessage']="The name of the admin you entered is too short. At least 4 characters required";
            //redirect_to("categories.php");
        }else{
            $found_account=login_attempt($usernameEmail,$password);
            if($found_account){
                $_SESSION['SuccessMessage']="Login successful";
                $_SESSION['username']=$found_account['username'];
                $_SESSION['user_id']=$found_account['id'];
                $_SESSION['email']=$found_account['email'];
                echo "<script>
                        alert('Login successful. Welcome.');
                    </script>";
                echo "<script>
                        window.open('index.php', '_SELF');
                        </script>";
                }else{
                    $_SESSION['ErrorMessage']="Email or password doesn't match database records. Please Try again.";
                }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="au theme template" />
    <meta name="author" content="Hau Nguyen" />
    <meta name="keywords" content="au theme template" />

    <!-- Title Page-->
    <title>Login</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all" />
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all" />
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all" />
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all" />

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all" />

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all" />
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all" />
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all" />
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all" />
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all" />
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all" />
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all" />

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all" />
</head>

<body class="animsition bg-back">
    <div class="page-wrapper">
        <div class="page-content--bge1">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img class="logo1" src="images/logo1.png" alt="United Pictures" />
                            </a>
                        </div>
                        <div class="login-form">
                            <?php
                                echo Message();
                                echo SuccessMessage();
                            ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Email Address/Username</label>
                                    <input class="au-input au-input--full" type="text" name="usernameEmail" placeholder="Email/Username" />
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password" />
                                </div>
                                <br />
                                <div class="login-checkbox">
                                    <!--
                                    <label>
                                        <input type="checkbox" name="remember" />Remember Me
                                    </label>
-->
                                    <label>
                                        <a href="#">Forgotten Password?</a>
                                    </label>
                                </div>
                                <br />
                                <br />
                                <button name="submit" class="au-btn au-btn--block au-btn--green m-b-20" type="submit">
                                    sign in
                                </button>
                            </form>
                            <div class="register-link">
                                <p>
                                    Don't you have account?
                                    <a href="#">Contact admin</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js"></script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js"></script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
</body>

</html>
<!-- end document-->
