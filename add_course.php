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

        <title>Add a new course</title>

    </head>

    <body>

        <div class="m_app">

            <!-- Mobile App Search  -->
            <?php include 'includes/breadNav.php'; ?>

            <!-- Mobile App Menu -->
            <?php include 'includes/menu.inc.php'; ?>

            <!-- Attendance -->

            <div class="m_container">

                <form action="add_course.php" method="post" enctype="multipart/form-data" class="appForm">

                    <div class="input_grp">
                        <span class="input_icon img">
                            <img src="assets/images/icons8_document_32px.png">
                        </span>
                        <input type="text" name="course_title" placeholder="Course title">
                    </div>

                    <div class="input_grp">
                        <span class="input_icon img">
                            <img src="assets/images/icons8_document_32px.png">
                        </span>
                        <input type="text" name="course_code" placeholder="Course code">
                    </div>

                    <label for="">Course image</label>
                    <input type="file" name="course_image" >

                    <button type="submit" name="add_course" class="loginBtn">Add course</button>

                </form>

                <?php
                if(isset($_POST['add_course'])){
                    //getting the text data from the fields
                    $course_title = $_POST['course_title'];
                    $course_code = $_POST['course_code'];

                    //getting the image from the field
                    $course_image = $_FILES["course_image"]["name"];
            		$course_image_tmp = $_FILES["course_image"]["tmp_name"];
                    $filepath ="db_images/courses/".$course_image;

                	move_uploaded_file($course_image_tmp,$filepath);

                    $add_course = "insert into courses (course_title,course_code,course_image) values ('$course_title','$course_code','$course_image')";

                    $add_cors = mysqli_query($con, $add_course);
                    if($add_cors){
                        echo "<script>alert('Course added successfully')</script>";
                        echo "<script>window.open('add_course.php','_self')</script>";
                    }
                }
                ?>


            </div>

        </div>

        <?php include 'includes/foot.inc.php'; ?>

        <script type="text/javascript">
            $(document).ready(function() {
                $('.pageTitle').append('Add a course')
            });

        </script>

    </body>

</html>
<?php } ?>
