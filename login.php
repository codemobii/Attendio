<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <?php include 'includes/head.inc.php'; ?>

        <title>Attendio App</title>

    </head>

    <body>

        <!-- Designs -->
        <div class="circle_one"></div>
        <div class="circle_two"></div>
        <div class="circle_three"></div>
        <div class="circle_four"></div>

        <div class="m_app">

            <div class="form_holder login_form">

                <span class="login_info"><?php echo @$_GET['not_admin']; ?></span>
                <span style="color: #4C6C34;" class="login_info"><?php echo @$_GET['logged_out']; ?></span>
                <span style="color: red;" class="login_info"><?php echo @$_GET['wrong_email_pass']; ?></span>

                <form method="post" action="login.php">

                    <div class="logo_cont_lg login_logo">

                        <img src="assets/images/icons8_mortarboard_96px.png" alt="Attendio" class="loginLogo">

                    </div>

                    <div class="input_grp">
                        <span class="input_icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path fill="none" d="M0 0h24v24H0z"/><path d="M4 22a8 8 0 1 1 16 0h-2a6 6 0 1 0-12 0H4zm8-9c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4z"/></svg>
                        </span>
                        <input type="email" name="user_email" placeholder="Email address">
                    </div>

                    <div class="input_grp">
                        <span class="input_icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path fill="none" d="M0 0h24v24H0z"/><path d="M19 10h1a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V11a1 1 0 0 1 1-1h1V9a7 7 0 1 1 14 0v1zM5 12v8h14v-8H5zm6 2h2v4h-2v-4zm6-4V9A5 5 0 0 0 7 9v1h10z"/></svg>
                        </span>
                        <input type="password" name="user_pass" placeholder="Password" id="passwordInput">
                        <span class="showPassword">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="svgLight"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 3c5.392 0 9.878 3.88 10.819 9-.94 5.12-5.427 9-10.819 9-5.392 0-9.878-3.88-10.819-9C2.121 6.88 6.608 3 12 3zm0 16a9.005 9.005 0 0 0 8.777-7 9.005 9.005 0 0 0-17.554 0A9.005 9.005 0 0 0 12 19zm0-2.5a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9zm0-2a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/></svg>
                        </span>
                    </div>

                    <button type="submit" name="login" class="loginBtn">Login</button>

                </form>

                <?php
                        include("includes/db.php");
                    	if(isset($_POST['login'])){
                    		$email = mysqli_real_escape_string($con, $_POST['user_email']);
                    		$pass = mysqli_real_escape_string($con, $_POST['user_pass']);
                            $sel_user = "select * from admin where user_email='$email' AND user_pass='$pass'";
                            $run_user = mysqli_query($con, $sel_user);
                            $check_user = mysqli_num_rows($run_user);
                            if($check_user==1){
                                $_SESSION['user_email']=$email;
                                echo "<script>window.open('index.php?logged_in=You have successfully Logged in!','_self')</script>";
                            }
                            else {
                                echo "<script>window.open('login.php?wrong_email_pass=I said it, you are not admin... you can try again','_self')</script>";
                            }
                    	}
                    ?>

            </div>

        </div>

        <span class="loginFootNote">Made with ❤ by <a href="http://facebook.com/john.chimaobi.10" target="_blank" rel="noopener noreferrer">chimaobi</a></span>

        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/main.js"></script>

    </body>

</html>
