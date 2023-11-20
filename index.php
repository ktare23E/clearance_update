<?php
    session_start();
    if(isset( $_SESSION['isloggedin'])){
        header("location: admin/index.php");
    }elseif(isset( $_SESSION['isOffice'])){
        header("location: office_admin/office_admin_index.php");
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration Form</title>

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="assets/css/login.css">

    
</head>
<body>
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Login</span>

                <form action="verify-login.php" method="POST">
                    <div class="input-field">
                        <input type="text" name="admin_username" placeholder="Enter your username" required> <!-- INPUT FIELD FOR USERNAME -->
                        <i class="uil uil-user icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" name="admin_password" class="password" placeholder="Enter your password" required> <!-- INPUT FIELD FOR PASSWORD -->
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <!-- <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text">Remember me</label>
                        </div> -->
                        
                        <a href="student_login.php" class="text">Go to Student Login</a>
                    </div>

                    <div class="input-field button">
                        <input type="submit" value="Login"> <!-- LOGIN BUTTON -->
                    </div>
                    <?php if (isset($_GET['a']) && $_GET['a'] == 'error'): ?>
                            <div class="danger">
                                Incorrect username or password.
                            </div>        
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        window.history.forward();
        // function noBack() {
        //     window.history.forward();
        // }
    </script>

    <!--<script src="script.js"></script>-->

    <script src="assets/js/login.js"></script>

    
    
</body>
</html>