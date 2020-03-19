<?php
session_start();
include("functions/functions.php");
if(!isset($_SESSION['user_email'])){
    echo "<script>window.open('login.php?not_admin=You are not an admin... prove me wrong','_self')</script>";
}else{

?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <?php include 'includes/head.inc.php'; ?>

        <title>Attendance record</title>

    </head>

    <body>

        <div class="m_app">

            <!-- Mobile App Search  -->
            <?php include 'includes/logo.nav.php'; ?>

            <!-- Mobile App Menu -->
            <?php include 'includes/menu.inc.php'; ?>

            <!-- Attendance -->

            <div class="m_container">

                <a href="mark.php" class="moreBtn">Mark attendance</a>
                <ul class="attendanceList">
                    <?php getAttendance(); ?>
                </ul>

            </div>

        </div>

        <?php include 'includes/foot.inc.php'; ?>

    </body>

</html>
<?php } ?>
