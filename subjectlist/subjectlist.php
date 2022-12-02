<?php

    session_start();

    if (!isset($_SESSION['logged-in'])){
        header('location: ../login/login.php');
    }

    require_once '../tools/variables.php';
    $page_title = 'School Faculty Scheduling System';
    $subject_list = 'active';

    require_once '../includes/header.php';
    require_once '../includes/sidebar.php';
    require_once '../includes/topnav.php';
    
?>
    
    <div class="home-content">
        <div class="table-container">
            <div class="table-heading">
                <h3 class="table-title">Subject</h3>
                <?php
                    if($_SESSION['user_type'] == 'admin'){
                ?>
                    <a href="addsubjectlist.php" class="button">Add New Subject</a>
                <?php
                    }
                ?>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Subject</th>
                        <th>Description</th>
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
                        require_once '../classes/subjectlist.class.php';

                        $subjects = new Subjects();
                        //We will now fetch all the records in the array using loop
                        //use as a counter, not required but suggested for the table
                        $i = 1;
                        //loop for each record found in the array
                        foreach ($subjects->show() as $value){ //start of loop
                    ?>
                        <tr>
                            <!-- always use echo to output PHP values -->
                            <td><?php echo $i ?></td>
                            <td><?php echo $value['subject'] ?></td>
                            <td><?php echo $value['description'] ?></td>
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