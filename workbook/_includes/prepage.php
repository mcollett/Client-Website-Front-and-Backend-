<div id="pre-page-content">
                <h1><i class="<?php if ($_GET['page'] == NULL) { echo "glyphicon-home themed-color"; }
                    if ($_GET['page'] == "dashboard") { echo "glyphicon-home themed-color"; }
                    if ($_GET['page'] == "active_clients") { echo "glyphicon-nameplate_alt themed-color"; }
                    if ($_GET['page'] == "client_check") { echo "icon-check themed-color"; }
                    if ($_GET['page'] == "client_history") { echo "glyphicon-history themed-color"; }
                    if ($_GET['page'] == "run_history") { echo "glyphicon-restart themed-color"; }
                    if ($_GET['page'] == "referral_program") { echo "glyphicon-group themed-color"; }
                    if ($_GET['page'] == "schedule_tool") { echo "icon-time themed-color"; }
                    if ($_GET['page'] == "staff") { echo "glyphicon-parents themed-color"; }
                    if ($_GET['page'] == "add") { echo "glyphicon-plus themed-color"; }
					if ($_GET['page'] == "applicants") { echo "glyphicon-folder_open themed-color"; }
                    if ($_GET['page'] == "analytics") { echo "glyphicon-charts themed-color"; }
                    if ($_GET['page'] == "settings") { echo "glyphicon-show_thumbnails themed-color"; }
                    if ($_GET['page'] == "view_run") { echo "glyphicon-search themed-color"; } 
                    if ($_GET['page'] == "edit_client") { echo "glyphicon-edit themed-color"; }
                    if ($_GET['page'] == "edit_staff") { echo "glyphicon-edit themed-color"; }
					if ($_GET['page'] == "edit_run") { echo "glyphicon-transfer themed-color"; }
					if ($_GET['page'] == "client_reach") { echo "glyphicon-magic themed-color"; }
					if ($_GET['page'] == "greenfire") { echo "glyphicon-fire themed-color"; }
					if ($_GET['page'] == "discounts") { echo "glyphicon-coins themed-color"; }
					if ($_GET['page'] == "blog") { echo "glyphicon-pencil themed-color"; }
					if ($_GET['page'] == "tickets") { echo "glyphicon-message_flag themed-color"; }
					if ($_GET['page'] == "reviews") { echo "glyphicon-thumbs_up themed-color"; }
					if ($_GET['page'] == "attendance") { echo "glyphicon-keyboard-wired themed-color"; }?>"></i>
					
                	<?php if ($_GET['page'] == NULL) { echo "Dashboard"; }
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
					if ($_GET['page'] == "discounts") { echo "Discounts"; }
					if ($_GET['page'] == "blog") { echo "Blog"; }
					if ($_GET['page'] == "tickets") { echo "Tickets"; }
					if ($_GET['page'] == "reviews") { echo "Reviews"; }
					if ($_GET['page'] == "attendance") { echo "Attendance"; }?>
					
					<br>
                    <small><?php if ($_GET['page'] == NULL) { echo "Welcome to the workbook. Do something productive!"; }
                    if ($_GET['page'] == "dashboard") { echo "Welcome to the workbook. Do something productive!"; }
                    if ($_GET['page'] == "active_clients") { echo "You are viewing all active clients."; }
                    if ($_GET['page'] == "client_check") { echo "Automatically detects if clients have completed all heroic dungeons."; }
                    if ($_GET['page'] == "client_history") { echo "You are viewing all past clients. Active clients are not displayed."; }
                    if ($_GET['page'] == "run_history") { echo "You are viewing run history."; }
                    if ($_GET['page'] == "referral_program") { echo "You are viewing the Referral Program information."; }
                    if ($_GET['page'] == "schedule_tool") { echo "Time is money, friend."; }
                    if ($_GET['page'] == "staff") { echo "View and manage your staff."; }
                    if ($_GET['page'] == "add") { echo "Add anything to the workbook."; }
					if ($_GET['page'] == "applicants") { echo "Applicants applying to work for our company."; }
                    if ($_GET['page'] == "analytics") { echo "Business analytics."; }
                    if ($_GET['page'] == "settings") { echo "Manage various settings."; }
                    if ($_GET['page'] == "view_run") { echo "View and inspect run summary."; }
                    if ($_GET['page'] == "edit_client") { echo "Modify an existing client."; }
                    if ($_GET['page'] == "edit_staff") { echo "Modify an existing staff member."; }
					if ($_GET['page'] == "edit_run") { echo "Modify an existing scheduled run."; }
					if ($_GET['page'] == "client_reach") { echo "Use the information here to e-mail a client, or just copy and paste the text to Skype."; }
					if ($_GET['page'] == "greenfire") { echo "The ever elusive green fire implementation."; }
					if ($_GET['page'] == "discounts") { echo "Coupon codes to take a portion off of the existing price. (Add codes via the 'Add' option.)"; }
					if ($_GET['page'] == "blog") { echo "Create a blog post."; }
					if ($_GET['page'] == "tickets") { echo "Respond to support tickets or inquiries."; }
					if ($_GET['page'] == "reviews") { echo "Manage customer reviews."; }
					if ($_GET['page'] == "attendance") { echo "Attendance."; }?>
                </small></h1>
            </div>