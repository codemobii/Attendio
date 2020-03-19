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

        <title>Add a student</title>

    </head>

    <body>

        <div class="m_app">

            <!-- Mobile App Search  -->
            <?php include 'includes/breadNav.php'; ?>

            <!-- Mobile App Menu -->
            <?php include 'includes/menu.inc.php'; ?>

            <!-- Attendance -->

            <div class="m_container">

                <form action="add_student.php" method="post" enctype="multipart/form-data" class="appForm">

                    <div class="input_grp">
                        <span class="input_icon img">
                            <img src="assets/images/icons8_document_32px.png">
                        </span>
                        <input type="email" name="student_email" placeholder="Email address">
                    </div>

                    <div class="input_grp">
                        <span class="input_icon img">
                            <img src="assets/images/icons8_document_32px.png">
                        </span>
                        <input type="text" name="student_name" placeholder="Full name">
                    </div>

                    <div class="input_grp">
                        <span class="input_icon img">
                            <img src="assets/images/icons8_document_32px.png">
                        </span>
                        <input type="text" name="matric_number" value="FPA/ND/2019/00" placeholder="Matric number">
                    </div>

                    <label for="">Profile pic</label>
                    <input type="file" name="student_image" >

                    <button type="submit" name="add_student" class="loginBtn">Add student</button>

                </form>

                <?php
                if(isset($_POST['add_student'])){
                    //getting the text data from the fields
                    $student_email = $_POST['student_email'];
                    $student_name = $_POST['student_name'];
                    $matric_number = $_POST['matric_number'];

                    //getting the image from the field
                    $student_image = $_FILES["student_image"]["name"];
            		$student_image_tmp = $_FILES["student_image"]["tmp_name"];
                    $filepath ="db_images/students/".$student_image;

                	move_uploaded_file($student_image_tmp,$filepath);

                    $add_student = "insert into students (student_email,student_name,matric_number,student_image) values ('$student_email','$student_name','$matric_number','$student_image')";

                    $add_stu = mysqli_query($con, $add_student);
                    if($add_stu){
                        echo "<script>alert('Student added successfully')</script>";
                        echo "<script>window.open('add_student.php','_self')</script>";
                    }
                }
                ?>


            </div>

        </div>

        <?php include 'includes/foot.inc.php'; ?>

        <script type="text/javascript">
            $(document).ready(function() {
                $('.pageTitle').append('Add a student')
            });

        </script>

    </body>

</html>
<?php } ?>
