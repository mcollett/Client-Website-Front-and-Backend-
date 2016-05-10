<?php ini_set("display_errors", 0); ?>
<?php session_start(); if (($_COOKIE['username']!==NULL)||($_SESSION['username']!==NULL)) { ?>
<?php include('_sql/connect.php'); ?>
<?php include('_includes/meta_header.php'); ?>

    <!-- Body -->
    <!-- In the PHP version you can set the following options from the config file -->
    <!-- Add the class .hide-side-content to <body> to hide side content by default -->
    <body>
        <!-- Page Container -->
        <!-- In the PHP version you can set the following options from the config file -->
        <!-- Add the class .full-width for a full width page -->
        <div id="page-container" class="full-width">
            <!-- Header -->
            <!-- In the PHP version you can set the following options from the config file -->
            <!-- Add the class .navbar-fixed-top or .navbar-fixed-bottom for a fixed header on top or bottom respectively -->
            <!-- If you add the class .navbar-fixed-top remember to add the class .header-fixed-top to <body> element! -->
            <!-- If you add the class .navbar-fixed-bottom remember to add the class .header-fixed-bottom to <body> element! -->
            <!-- <header class="navbar navbar-inverse navbar-fixed-top"> -->
            <!-- <header class="navbar navbar-inverse navbar-fixed-bottom"> -->
<?php include('_includes/header.php'); ?>

            <?php include('_includes/left_sidebar.php'); ?>

            <!-- Pre Page Content -->
            <?php include('_includes/prepage.php'); ?>
            <!-- END Pre Page Content -->

            <!-- Page Content -->
            <div id="page-content">
                <?php include('_includes/breadcrumb.php'); ?>

                <!-- PHP CONTENT IF STATEMENTS BEGIN HERE -->
                <?php

                    // ROOT MENU
                    if ($_GET['page'] == NULL) { include('_pages/dashboard.php'); }
                    if ($_GET['page'] == "dashboard") { include('_pages/dashboard.php'); }
                    if ($_GET['page'] == "active_clients") { include('_pages/active_clients.php'); }
                    if ($_GET['page'] == "client_check") { include('_pages/client_check.php'); }
                    if ($_GET['page'] == "client_history") { include('_pages/client_history.php'); }
                    if ($_GET['page'] == "run_history") { include('_pages/run_history.php'); }
                    if ($_GET['page'] == "referral_program") { include('_pages/referral_program.php'); }
                    if ($_GET['page'] == "referral_program_data") { include('_pages/referral_program_data.php'); }
                    if ($_GET['page'] == "schedule_tool") { include('_pages/schedule_tool.php'); }
                    if ($_GET['page'] == "staff") { include('_pages/staff.php'); }
                    if ($_GET['page'] == "add") { include('_pages/add.php'); }
					if ($_GET['page'] == "applicants") { include('_pages/applicants.php'); }
                    if ($_GET['page'] == "analytics") { include('_pages/analytics.php'); }
                    if ($_GET['page'] == "settings") { include('_pages/settings.php'); }
					if ($_GET['page'] == "greenfire") { include('_pages/greenfire.php'); }
					if ($_GET['page'] == "blog") { include('_pages/blog.php'); }
					if ($_GET['page'] == "tickets") { include('_pages/tickets.php'); }
					if ($_GET['page'] == "reviews") { include('_pages/reviews.php'); }
					if ($_GET['page'] == "attendance") { include('_pages/attendance.php'); }

                    //SECONDARY PAGES
                    if ($_GET['page'] == "view_run") { include('_pages/view_run.php'); }
                    if ($_GET['page'] == "edit_client") { include('_pages/edit_client.php'); }
                    if ($_GET['page'] == "edit_staff") { include('_pages/edit_staff.php'); }
					if ($_GET['page'] == "edit_run") { include('_pages/edit_run.php'); }
					if ($_GET['page'] == "client_reach") { include('_pages/client_reach.php'); }
					if ($_GET['page'] == "discounts") { include('_pages/discounts.php'); }

                ?>
                <!-- PHP CONTENT IF STATEMENTS END HERE -->

                    
            </div>
            <!-- END Page Content -->

            <?php include ('_includes/footer.php'); ?>
        </div>
        <!-- END Page Container -->

        <!-- Scroll to top link, check main.js - scrollToTop() -->
        <a href="#" id="to-top"><i class="icon-chevron-up"></i></a>

 

<?php include ('_includes/meta_footer.php'); ?>
<?php } else { header("Location: login.php"); } ?>