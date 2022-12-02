<div class="side-bar">
    <div class="logo-details" title="Forecast">
        <i class='bx bx-calendar'></i>
        <span class="logo-name"> School Faculty Scheduling System</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="../admin/dashboard.php" class="<?php echo $dashboard; ?>" title="Dashboard">
                <i class='bx bx-grid-alt' ></i>
                <span class="links-name">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="../courselist/courselist.php" class="<?php echo $course_list; ?>" title="Course List">
                <i class='bx bx-note'></i>
                <span class="links-name">Course List</span>
            </a>
        </li>
        <li>
            <a href="../subjectlist/subjectlist.php" class="<?php echo $subject_list; ?>" title="Subject List">
                <i class='bx bx-book'></i>
                <span class="links-name">Subject List</span>
            </a>
        </li>
        <li>
        <a href="../faculty/faculty.php" class="<?php echo $faculty_list; ?>" title="Faculty List">
                <i class='bx bx-group'></i>
                <span class="links-name">Faculty List</span>
            </a>
        </li>
        <li>
            <a href="../schedule/schedule.php" class="<?php echo $schedule; ?>" title="Schedule">
                <i class='bx bx-calendar-edit'></i>
                <span class="links-name">Schedule</span>
            </a>
        </li>
        <li>
            <a href="../users/users.php" class="<?php echo $users; ?>" title="Users">
                <i class='bx bx-user details' ></i>
                <span class="links-name">Users</span>
            </a>
        </li>
        <li>
            <a href="#" class="<?php echo $settings; ?>" title="Settings">
                <i class='bx bx-cog'></i>
                <span class="links-name">Settings</span>
            </a>
        </li>
        <hr class="line">
        <li id="logout-link">
            <a class="logout-link" href="../login/logout.php" title="Logout">
                <i class='bx bx-log-out'></i>
                <span class="links-name">Logout</span>
            </a>
        </li>
    </ul>
</div>

<div id="logout-dialog" class="dialog" title="Logout">
    <p><span>Are you sure you want to logout?</span></p>
</div>

<script>
    $(document).ready(function() {
        $("#logout-dialog").dialog({
            resizable: false,
            draggable: false,
            height: "auto",
            width: 400,
            modal: true,
            autoOpen: false
        });
        $(".logout-link").on('click', function(e) {
            e.preventDefault();
            var theHREF = $(this).attr("href");

            $("#logout-dialog").dialog('option', 'buttons', {
                "Yes" : function() {
                    window.location.href = theHREF;
                },
                "No" : function() {
                    $(this).dialog("close");
                }
            });

            $("#logout-dialog").dialog("open");
        });
    });
</script>