$(document).ready(function () {
    //----- TOGGLING SEARCH BAR

    $('.toggleSearch').click(function() {
        $('.hiddenSearch').addClass('showSearch');
        $('body').addClass('shade');
    });

    //----- TOGGLING LOGOUT Container

    $('.logoCont').click(function() {
        $('.logoutCont').addClass('showLogout');
        $('body').addClass('shade');
    });


    //----- FOCUSING INPUTS

    $("form").delegate('.input_grp', 'click', function(e) {
        $(this).addClass(focusInput()).siblings().removeClass('focused_input');
        e.stopPropagation();
        e.preventDefault();
    });

    function focusInput() {
        return "focused_input"
    }


    //----- REMOVING CLASSES

    $('.cancelSearch').click(function(){
        $('.hiddenSearch').removeClass('showSearch');
        $('body').removeClass('shade');
    });

    $('.cancel').click(function(){
        $('.logoutCont').removeClass('showLogout');
        $('body').removeClass('shade');
    });

    $("html").click(function() {
            $(".input_grp").removeClass("focused_input");
    });

    //----- GO BACK TO PREVIOUS PAGE
    $('.goBack').click(function(){
        parent.history.back();
        return false;
    });

    //----- SHOW PASSWORD
    $('.showPassword').click(function() {
        if('password' == $('#passwordInput').attr('type')){
            $('#passwordInput').prop('type', 'text');
        } else {
            $('#passwordInput').prop('type', 'password');
        }
        $(this).toggleClass('shown');
    });

    //------ SUMMING TOTAL STUDENTS

    $("input").on("keyup", function(){
        var a = parseInt($('.att_m').val());
        var b = parseInt($('.att_f').val());
        var sum = a + b;
        $('.att_t').val(sum);
    });

    //----- LINK ATTRIBUTES

    $(".menuLinks li:nth-child(1) a").attr({
        "href" : "index.php",
        "title" : "Dashboard"
    });

    $(".menuLinks li:nth-child(2) a").attr({
        "href" : "courses.php",
        "title" : "Courses"
    });

    $(".menuLinks li:nth-child(3) a").attr({
        "href" : "students.php",
        "title" : "Students"
    });

    $(".menuLinks li:nth-child(4) a").attr({
        "href" : "attendance.php",
        "title" : "Attendance"
    });

    $("a.logout").attr({
        "href" : "logout.php",
        "title" : "Logout"
    });

});
