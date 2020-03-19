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

        <title>Mark attendance</title>

    </head>

    <body>

        <div class="m_app">

            <!-- Mobile App Search  -->
            <?php include 'includes/breadNav.php'; ?>

            <!-- Mobile App Menu -->
            <?php include 'includes/menu.inc.php'; ?>

            <!-- Attendance -->

            <div class="m_container">
                <form action="mark.php" method="post" enctype="multipart/form-data" class="appForm">

                    <div class="input_grp">
                        <span class="input_icon img">
                            <img src="assets/images/icons8_document_32px.png">
                        </span>
                        <select name="att_course" id="">
                            <option value="">Select course</option>
                            <?php
                                $get_cors = "select * from courses";
                                $run_cors = mysqli_query($con, $get_cors);
                                while($row_cors = mysqli_fetch_array($run_cors)){
                                    $course_id = $row_cors['course_id'];
                                    $course_title = $row_cors['course_title'];
                                    echo "<option value='$course_id'>$course_title</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <div class="input_grp inputHalf">
                        <span class="input_icon img">
                            <img src="assets/images/icons8_document_32px.png">
                        </span>
                        <select name="att_day" id="">
                            <option value="">Select day</option>
                            <?php
                                $get_days = "select * from days";
                                $run_days = mysqli_query($con, $get_days);
                                while($row_days = mysqli_fetch_array($run_days)){
                                    $day_id = $row_days['day_id'];
                                    $day_title = $row_days['day_title'];
                                    echo "<option value='$day_id'>$day_title</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <div class="input_grp inputHalf">
                        <span class="input_icon img">
                            <img src="assets/images/icons8_document_32px.png">
                        </span>
                        <select name="att_month" id="">
                            <option value="">Select month</option>
                            <?php
                                $get_mon = "select * from months";
                                $run_mon = mysqli_query($con, $get_mon);
                                while($row_mon = mysqli_fetch_array($run_mon)){
                                    $month_id = $row_mon['month_id'];
                                    $month_title = $row_mon['month_title'];
                                    echo "<option value='$month_id'>$month_title</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <div class="input_grp inputHalf">
                        <span class="input_icon img">
                            <img src="assets/images/icons8_document_32px.png">
                        </span>
                        <input type="number" name="a_male" class="att_m" placeholder="Male">
                    </div>

                    <div class="input_grp inputHalf">
                        <span class="input_icon img">
                            <img src="assets/images/icons8_document_32px.png">
                        </span>
                        <input type="number" name="a_female" class="att_f" placeholder="Female">
                    </div>

                    <div class="input_grp">
                        <span class="input_icon img">
                            <img src="assets/images/icons8_document_32px.png">
                        </span>
                        <input type="number" name="a_total" class="att_t" placeholder="Total">
                    </div>

                    <button type="submit" name="mark" class="loginBtn">Mark attendance</button>

                </form>

                <?php
                if(isset($_POST['mark'])){
                    //getting the text data from the fields
                    $att_course = $_POST['att_course'];
                    $att_day = $_POST['att_day'];
                    $att_month = $_POST['att_month'];
                    $a_male = $_POST['a_male'];
                    $a_female = $_POST['a_female'];
                    $a_total = $_POST['a_total'];

                    $mark = "insert into attendance (att_course,att_day,att_month,a_male,a_female,a_total) values ('$att_course','$att_day','$att_month','$a_male','$a_female','$a_total')";

                    $mark_att = mysqli_query($con, $mark);
                    if($mark_att){
                        echo "<script>alert('Attendance successfully mark')</script>";
                        echo "<script>window.open('attendance.php','_self')</script>";
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
