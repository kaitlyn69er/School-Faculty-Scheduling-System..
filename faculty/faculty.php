<?php

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
    //if the above code is false then html below will be displayed

    require_once '../tools/variables.php';
    $page_title = 'SFSS | Show Users';
    $faculty_list = 'active';

    require_once '../includes/header.php';
    require_once '../includes/sidebar.php';
    require_once '../includes/topnav.php';
?>
    <div class="home-content">
        <div class="table-container">
            <div class="table-heading">
                <h3 class="table-title">Faculty</h3>
                <?php
                    if($_SESSION['user_type'] == 'admin'){
                ?>
                    <a href="addfaculty.php" class="button">Add New Faculty</a>
                <?php
                    }
                ?>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID #</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Sex</th>
                        <th>Address</th>
                        <th>Email</th>
                        <?php
                            if($_SESSION['user_type'] == 'admin'){
                        ?>
                            <th class="action">Action</th>
                        <?php
                            }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require_once '../classes/faculty.class.php';

                        $faculty = new Faculty();
                        //We will now fetch all the records in the array using loop
                        //use as a counter, not required but suggested for the table
                        $i = 1;
                        //loop for each record found in the array
                        foreach ($faculty->show() as $value){ //start of loop
                    ?>
                        <tr>
                            <!-- always use echo to output PHP values -->
                            <td><?php echo $value['id'] ?></td>
                            <td><?php echo $value['id_no'] ?></td>
                            <td><?php echo $value['lastname'] . ', ' . $value['firstname'] . ' ' . $value['middlename'] ?></td>
                            <td><?php echo $value['contact'] ?></td>
                            <td><?php echo $value['gender'] ?></td>
                            <td><?php echo $value['address'] ?></td>
                            <td><?php echo $value['email'] ?></td>
                            <?php
                                if($_SESSION['user_type'] == 'admin'){
                            ?>
                                <td>
                                    <div class="action">
                                        <a class="action-edit" href="#">Edit</a>
                                        <a class="action-delete" href="#">Delete</a>
                                    </div>
                                </td>
                            <?php
                                }
                            ?>
                        </tr>
                    <?php
                        $i++;
                    //end of loop
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

<?php
    require_once '../includes/bottomnav.php';
    require_once '../includes/footer.php';
?>
