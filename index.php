<?php
    
    session_start();

    if (isset($_SESSION['user_type']) == 'admin'){
        header('location: admin/dashboard.php');
    }
    else if (isset($_SESSION['user_type']) == 'staff'){
        header('location: faculty/faculty.php');
    }
    else{
        header('location: login/login.php');
    }

?>