<?php

    require_once '../tools/functions.php';
    require_once '../classes/courselist.class.php';

    //resume session here to fetch session values
    session_start();
    /*
        if user is not login then redirect to login page,
        this is to prevent users from accessing pages that requires
        authentication such as the dashboard
    */
    if (!isset($_SESSION['logged-in'])){
        header('location: ../login/login.php');
    }
    //if the above code is false then code and html below will be executed

    //if add faculty is submitted
    if(isset($_POST['save'])){

        $courses = new Courses();
        //sanitize user inputs
        $courses->course = htmlentities($_POST['fn']);
        $courses->description = htmlentities($_POST['ln']);
            if($courses->add()){  
                //redirect user to faculty page after saving
                header('location: courselist.php');
            }
        }

    require_once '../tools/variables.php';
    $page_title = 'SFSS | Add Course';
    $course_list= 'active';

    require_once '../includes/header.php';
    require_once '../includes/sidebar.php';
    require_once '../includes/topnav.php';

?>
    <div class="home-content">
        <div class="table-container">
            <div class="table-heading form-size">
                <h3 class="table-title">Add New Course</h3>
                <a class="back" href="courselist.php"><i class='bx bx-caret-left'></i>Back</a>
            </div>
            <div class="add-form-container">
                <form class="add-form" action="addcourselist.php" method="post">
                    <label for="fn">Course</label>
                    <input type="text" id="fn" name="fn" required placeholder="Enter Course" value="<?php if(isset($_POST['fn'])) { echo $_POST['fn']; } ?>">
                    <?php
                        if(isset($_POST['save']) && !validate_first_name($_POST)){
                    ?>
                                <p class="error">Invalid Input. Trailing spaces will be ignored.</p>
                    <?php
                        }
                    ?>
                    <label for="ln">Description</label>
                    <input type="text" id="ln" name="ln" required placeholder="Enter Description" value="<?php if(isset($_POST['ln'])) { echo $_POST['ln']; } ?>">
                    <?php
                        if(isset($_POST['save']) && !validate_add_courses($_POST)){
                    ?>
                                <p class="error">Invalid Input. Trailing spaces will be ignored.</p>
                    <?php
                        }
                    ?>
                    <input type="submit" class="button" value="Save Course" name="save" id="save">
                </form>
            </div>
        </div>
    </div>

<?php
    require_once '../includes/bottomnav.php';
    require_once '../includes/footer.php';
?>