<!-- Breadcrumb -->
                <ul class="breadcrumb breadcrumb-top">
                    <li>
                        <a href="content.php"><i class="glyphicon-display"></i></a> <span class="divider"><i class="icon-angle-right"></i></span>
                    </li>
                    <li><a href=""><?php if ($_GET['page'] == NULL) { echo "Dashboard"; }
                    if ($_GET['page'] == "dashboard") { echo "Dashboard"; }
                    if ($_GET['page'] == "active_clients") { echo "Active Clients"; }
                    if ($_GET['page'] == "client_check") { echo "Client Evaluation"; }
                    if ($_GET['page'] == "client_history") { echo "Client History"; }
                    if ($_GET['page'] == "run_history") { echo "Run History"; }
                    if ($_GET['page'] == "referral_program") { echo "Referral Program"; }
                    if ($_GET['page'] == "schedule_tool") { echo "Schedule Tool"; }
                    if ($_GET['page'] == "staff") { echo "Staff"; }
                    if ($_GET['page'] == "add") { echo "Add"; }
					if ($_GET['page'] == "applicants") { echo "Applicants"; }
                    if ($_GET['page'] == "analytics") { echo "Analytics"; }
                    if ($_GET['page'] == "settings") { echo "Settings"; }
                    if ($_GET['page'] == "view_run") { echo "View Run"; }
                    if ($_GET['page'] == "edit_client") { echo "Edit Client"; }
                    if ($_GET['page'] == "edit_staff") { echo "Edit Staff"; }
					if ($_GET['page'] == "edit_run") { echo "Edit Run"; }
					if ($_GET['page'] == "client_reach") { echo "Client Reach"; }
					if ($_GET['page'] == "greenfire") { echo "Green Fire"; }
					if ($_GET['page'] == "discounts") { echo "Discounts / Coupon Codes"; }
					if ($_GET['page'] == "blog") { echo "Blog"; }
					if ($_GET['page'] == "tickets") { echo "Support Tickets"; }
					if ($_GET['page'] == "reviews") { echo "Customer Reviews"; }
					if ($_GET['page'] == "attendance") { echo "Staff Attendance"; }
                     ?></a></li>
                </ul>
                <!-- END Breadcrumb -->