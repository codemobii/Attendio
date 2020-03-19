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

        <title>Welcome Admin</title>

    </head>

    <body>

        <div class="m_app">

            <!-- Mobile App Search  -->
            <?php include 'includes/logo.nav.php'; ?>

            <!-- Mobile App Menu -->
            <?php include 'includes/menu.inc.php'; ?>

            <!-- Sujects -->

            <div class="m_container">

                <span class="sectionTitle">Courses</span>

                <ul class="subjectList">
                    <?php getCourses(); ?>
                </ul>

                <a href="add_course.php" class="moreBtn">Add a course</a>

            </div>

        </div>

        <?php include 'includes/foot.inc.php'; ?>

    </body>

</html>

<?php } ?>
