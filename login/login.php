<?php
    $page_title = 'Forecast - Login';

    session_start();

    $accounts = array(
        "user1" => array(
            "firstname" => 'Margarita',
            "lastname" => 'Empanada',
            "type" => 'admin',
            "username" => 'margie',
            "password" => 'margie'
        ),
        "user2" => array(
            "firstname" => 'Root',
            "lastname" => 'Root',
            "type" => 'admin',
            "username" => 'root',
            "password" => 'root'
        ),
        "user3" => array(
            "firstname" => 'Natsu',
            "lastname" => 'Dragneel',
            "type" => 'staff',
            "username" => 'natsu',
            "password" => 'natsu'
        ),
        "user4" => array(
            "firstname" => 'Erza',
            "lastname" => 'Scarlet',
            "type" => 'staff',
            "username" => 'erza',
            "password" => 'erza'
        ),
        "user5" => array(
            "firstname" => 'Lucy',
            "lastname" => 'Felix',
            "type" => 'staff',
            "username" => 'lucy',
            "password" => 'lucy'
        )
    );
    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = htmlentities($_POST['username']);
        $password = htmlentities($_POST['password']);
        foreach($accounts as $keys => $value){
            if($username == $value['username'] && $password == $value['password']){
                $_SESSION['logged-in'] = $value['username'];
                $_SESSION['fullname'] = $value['firstname'] . ' ' . $value['lastname'];
                $_SESSION['user_type'] = $value['type'];
                if($value['type'] == 'admin'){
                    header('location: ../admin/dashboard.php');
                }else{
                    header('location: ../faculty/faculty.php');
                }
            }
        }
        $error = 'Invalid username/password. Try again.';
    }

    require_once '../includes/header.php';

?>

    <div class="login-container">
        <form class="login-form" action="login.php" method="post">
            <div class="logo-details">
                <i class='bx bx-calendar'></i>
                <span class="logo-name">School Faculty Scheduling System</span>
            </div>
            <hr class="divider">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter username" required tabindex="1">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter password" required tabindex="2">
            <input class="button" type="submit" value="Login" name="login" tabindex="3">
            <?php
                if(isset($error)){
                    echo '<div><p class="error">'.$error.'</p></div>';
                }
            ?>
        </form>
    </div>

<?php
    require_once '../includes/footer.php';
?>