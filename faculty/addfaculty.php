<?php

    require_once '../tools/functions.php';
    require_once '../classes/faculty.class.php';

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

        $faculty = new Faculty();
        //sanitize user inputs
        $faculty->id = htmlentities($_POST['fn']);
        $faculty->id_no = htmlentities($_POST['ln']);
        $faculty->email = htmlentities($_POST['email']);
        $faculty->middlename = htmlentities($_POST['mn']);
        $faculty->lastname = htmlentities($_POST['name']);
        $faculty->contact = htmlentities($_POST['contact']);
        $faculty->address = htmlentities($_POST['add']);
        $faculty->firstname = htmlentities($_POST['dep']);
        if(isset($_POST['role'])){
            $faculty->gender = $_POST['role'];
        }
        if(validate_add_faculty($_POST)){
            if($faculty->add()){  
                //redirect user to faculty page after saving
                header('location: faculty.php');
            }
        }
    }

    require_once '../tools/variables.php';
    $page_title = 'SFSS| Add Faculty';
    $faculty = 'active';

    require_once '../includes/header.php';
    require_once '../includes/sidebar.php';
    require_once '../includes/topnav.php';

?>
    <div class="home-content">
        <div class="table-container">
            <div class="table-heading form-size">
                <h3 class="table-title">Add New Faculty</h3>
                <a class="back" href="faculty.php"><i class='bx bx-caret-left'></i>Back</a>
            </div>
            <div class="add-form-container">
                <form class="add-form" action="addfaculty.php" method="post">
                    <label for="fn">ID Number</label>
                    <input type="text" id="fn" name="fn" required placeholder="Enter ID Number" value="<?php if(isset($_POST['ln'])) { echo $_POST['ln']; } ?>">
                    <?php
                        if(isset($_POST['save']) && !validate_first_name($_POST)){
                    ?>
                                <p class="error">Invalid Input. Trailing spaces will be ignored.</p>
                    <?php
                        }
                    ?>
                    <label for="ln">First Name</label>
                    <input type="text" id="ln" name="ln" required placeholder="Enter first name" value="<?php if(isset($_POST['dep'])) { echo $_POST['dep']; } ?>">
                    <?php
                        if(isset($_POST['save']) && !validate_last_name($_POST)){
                    ?>
                                <p class="error">Invalid Input. Trailing spaces will be ignored.</p>
                    <?php
                        }
                    ?>
                    <label for="ln">Middle Initial</label>
                    <input type="text" id="ln" name="ln" required placeholder="Enter middle initial" value="<?php if(isset($_POST['mn'])) { echo $_POST['mn']; } ?>">
                    <?php
                        if(isset($_POST['save']) && !validate_last_name($_POST)){
                    ?>
                                <p class="error">Invalid Input. Trailing spaces will be ignored.</p>
                    <?php
                        }
                    ?>
                    <label for="ln">Last Name</label>
                    <input type="text" id="ln" name="ln" required placeholder="Enter last name" value="<?php if(isset($_POST['name'])) { echo $_POST['name']; } ?>">
                    <?php
                        if(isset($_POST['save']) && !validate_last_name($_POST)){
                    ?>
                                <p class="error">Invalid Input. Trailing spaces will be ignored.</p>
                    <?php
                        }
                    ?>
                    <label for="ln">Contact Number</label>
                    <input type="text" id="ln" name="ln" required placeholder="Enter contact number" value="<?php if(isset($_POST['contact'])) { echo $_POST['contact']; } ?>">
                    <?php
                        if(isset($_POST['save']) && !validate_last_name($_POST)){
                    ?>
                                <p class="error">Invalid Input. Trailing spaces will be ignored.</p>
                    <?php
                        }
                    ?>
                    <label for="ln">Address</label>
                    <input type="text" id="ln" name="ln" required placeholder="Enter address" value="<?php if(isset($_POST['add'])) { echo $_POST['add']; } ?>">
                    <?php
                        if(isset($_POST['save']) && !validate_last_name($_POST)){
                    ?>
                                <p class="error">Invalid Input. Trailing spaces will be ignored.</p>
                    <?php
                        }
                    ?>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required placeholder="Enter email" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>">
                    <?php
                        if(isset($_POST['save']) && !validate_email($_POST)){
                    ?>
                                <p class="error">Email is invalid. Use only @wmsu.edu.ph</p>
                    <?php
                        }
                    ?>
                    <div>
                        <label for="role">Sex</label><br>
                        <label class="container" for="admin">Female
                            <input type="radio" name="role" id="admin" value="Admission Officer" <?php if(isset($_POST['role'])) { if ($_POST['role'] == 'Admission Officer') echo ' checked'; } ?>>
                            <span class="checkmark"></span>
                        </label>
                        <label class="container" for="interviewer">Male
                            <input type="radio" name="role" id="interviewer" value="Interviewer" <?php if(isset($_POST['role'])) { if ($_POST['role'] == 'Interviewer') echo ' checked'; } ?>>
                            <span class="checkmark"></span>
                        </label>
                        
                    </div>
                    <?php
                        if(isset($_POST['save']) && !validate_role($_POST)){
                    ?>
                                <p class="error">Please make a choice.</p>
                    <?php
                        }
                    ?>
                    <input type="submit" class="button" value="Save Faculty" name="save" id="save">
                </form>
            </div>
        </div>
    </div>

<?php
    require_once '../includes/bottomnav.php';
    require_once '../includes/footer.php';
?>