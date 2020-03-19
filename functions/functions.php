<?php
$con = mysqli_connect("localhost","root","","attendio");
if(mysqli_connect_errno()){
    echo "The Connection was not established: " . mysqli_connect_error();
}


//Getting random courses
function getRanCourses(){
    global $con;
    $get_cors = "select * from courses order by RAND() LIMIT 0,4";
    $run_cors = mysqli_query($con, $get_cors);
    while($row_cors = mysqli_fetch_array($run_cors)){
        $course_id = $row_cors['course_id'];
        $course_code = $row_cors['course_code'];
        $course_title = $row_cors['course_title'];
        $course_image = $row_cors['course_image'];
        echo "
        <li class='subject'>
            <img src='./db_images/courses/$course_image' alt='$course_title' class='subImg'>
            <span class='subTitle'>$course_code - $course_title</span>
        </li>
        ";
    }
}

//Getting all Courses
function getCourses(){
    global $con;
    $get_cors = "select * from courses";
    $run_cors = mysqli_query($con, $get_cors);
    while($row_cors = mysqli_fetch_array($run_cors)){
        $course_id = $row_cors['course_id'];
        $course_code = $row_cors['course_code'];
        $course_title = $row_cors['course_title'];
        $course_image = $row_cors['course_image'];
        echo "
        <li class='subject'>
            <img src='./db_images/courses/$course_image' alt='$course_title' class='subImg'>
            <span class='subTitle'>$course_code - $course_title</span>
        </li>
        ";
    }
}

//Getting random students
function getRanStudents(){
    global $con;
    $get_stu = "select * from students order by RAND() LIMIT 0,6";
    $run_stu = mysqli_query($con, $get_stu);
    while($row_stu = mysqli_fetch_array($run_stu)){
        $student_id = $row_stu['student_id'];
        $student_name = $row_stu['student_name'];
        $matric_number = $row_stu['matric_number'];
        $student_image = $row_stu['student_image'];
        echo "
        <li class='student'>
            <span class='stuImg'>
                <img src='./db_images/students/$student_image' alt='$student_name'>
            </span>
            <div class='stuInfo'>
                <span class='stuName'>$student_name</span>
                <span class='userName'>@$matric_number</span>
            </div>
        </li>
        ";
    }
}

//Getting all students
function getStudents(){
    global $con;
    $get_stu = "select * from students";
    $run_stu = mysqli_query($con, $get_stu);
    while($row_stu = mysqli_fetch_array($run_stu)){
        $student_id = $row_stu['student_id'];
        $student_name = $row_stu['student_name'];
        $matric_number = $row_stu['matric_number'];
        $student_image = $row_stu['student_image'];
        echo "
        <li class='student'>
            <span class='stuImg'>
                <img src='./db_images/students/$student_image' alt='$student_name'>
            </span>
            <div class='stuInfo'>
                <span class='stuName'>$student_name</span>
                <span class='userName'>@$matric_number</span>
            </div>
        </li>
        ";
    }
}

//Getting all attendance
function getAttendance(){
    global $con;
    $get_att = "select * from attendance";
    $run_att = mysqli_query($con, $get_att);
    while($row_att = mysqli_fetch_array($run_att)){
        $attendance_id = $row_att['attendance_id'];
        $att_course = $row_att['att_course'];
        $att_day = $row_att['att_day'];
        $att_month = $row_att['att_month'];
        $a_male = $row_att['a_male'];
        $a_female = $row_att['a_female'];
        $a_total = $row_att['a_total'];

        $get_days = "select * from Days where day_id='$attendance_id'";
        $run_days = mysqli_query($con, $get_days);
        $row_days = mysqli_fetch_array($run_days);
        $day_title = $row_days['day_title'];

        $get_mon = "select * from months where month_id='$attendance_id'";
        $run_mon = mysqli_query($con, $get_mon);
        $row_mon = mysqli_fetch_array($run_mon);
        $month_title = $row_mon['month_title'];

        $get_cors = "select * from courses where course_id='$attendance_id'";
        $run_cors = mysqli_query($con, $get_cors);
        $row_cors = mysqli_fetch_array($run_cors);
        $course_title = $row_cors['course_title'];

        echo "
        <li class='attendance'>
            <span class='attDate'>$day_title - $month_title</span>
            <p class='attRecord'>$a_male boy and $a_female girls making total of $a_total students attended for $course_title class</p>
            <a href='details.php?attendance_id=$attendance_id' class='moreLink'>more info</a>
        </li>
        ";
    }
}

?>
