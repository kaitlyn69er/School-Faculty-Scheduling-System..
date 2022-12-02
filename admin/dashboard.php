<?php

    session_start();

    if (!isset($_SESSION['logged-in'])){
        header('location: ../login/login.php');
    }

    require_once '../tools/variables.php';
    $page_title = 'School Faculty Scheduling System';
    $dashboard = 'active';

    require_once '../includes/header.php';
    require_once '../includes/sidebar.php';
    require_once '../includes/topnav.php';
    
?>
    
    
    <div class="home-content">
        <div class="overview-boxes">
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Course List</div>
                    <div class="number">69</div>
                    <div class="indicator">
                        
                        <span class="text">As of <?php echo ' ' . date("m-d-Y h:i:s A"); ?></span>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Subject List</div>
                    <div class="number">52</div>
                    <div class="indicator">
                        
                        <span class="text">As of <?php echo ' ' . date("m-d-Y h:i:s A"); ?></span>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Faculty List</div>
                    <div class="number">120</div>
                    <div class="indicator">
                        
                        <span class="text">As of <?php echo ' ' . date("m-d-Y h:i:s A"); ?></span>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Users</div>
                    <div class="number">69</div>
                    <div class="indicator">
                        
                        <span class="text">As of <?php echo ' ' . date("m-d-Y h:i:s A"); ?></span>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php
    require_once '../includes/bottomnav.php';
    require_once '../includes/footer.php';
?>