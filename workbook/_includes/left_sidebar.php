<!-- Left Sidebar -->
            <!-- In the PHP version you can set the following options from the config file -->
            <!-- Add the class .sticky for a sticky sidebar -->
            <aside id="page-sidebar" class="nav-collapse collapse">
                <!--
                Wrapper for scrolling functionality
                Used only if the .sticky class added above. You can remove it and you will have a sticky sidebar
                without scrolling enabled when you set the sidebar to be sticky
                -->
                <div class="side-scrollable">
                    <?php include('_includes/mini_profile.php'); ?>

                    <!-- Sidebar Tabs -->
                    <div class="sidebar-tabs-con">
                        <ul class="sidebar-tabs" data-toggle="tabs">
                            <li class="active">
                                <a href="#side-tab-menu"><i class="glyphicon-list"></i></a>
                            </li>
                            <li>
                                <a href="#side-tab-extra"><i class="glyphicon-charts"></i></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="side-tab-menu">
                                <!-- Primary Navigation -->
                                <nav id="primary-nav">
                                    <ul>
                                        <li>
                                            <a href="content.php?page=dashboard" class=" <?php if(($_GET['page'] == "dashboard")||($_GET['page'] == NULL)) { echo "active"; } ?>"><i class="glyphicon-display"></i>Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="content.php?page=active_clients" class=" <?php if($_GET['page'] == "active_clients") { echo "active"; } ?>"><i class="glyphicon-nameplate_alt"></i>Active Clients</a>
                                        </li>
                                        <li>
                                            <a href="content.php?page=client_check" class=" <?php if($_GET['page'] == "client_check") { echo "active"; } ?>"><i class="icon-check"></i>Client Evaluation</a>
                                        </li>
                                        <li>
                                            <a href="content.php?page=client_history" class=" <?php if($_GET['page'] == "client_history") { echo "active"; } ?>"><i class="glyphicon-history"></i>Client History</a>
                                        </li>
                                        <li>
                                            <a href="content.php?page=run_history" class=" <?php if($_GET['page'] == "run_history") { echo "active"; } ?>"><i class="glyphicon-restart"></i>Run History</a>
                                        </li>
                                        <li>
                                            <a href="content.php?page=referral_program" class=" <?php if($_GET['page'] == "referral_program") { echo "active"; } ?>"><i class="glyphicon-group"></i>Referral Program</a>
                                        </li>
                                        <li>
                                            <a href="content.php?page=schedule_tool" class=" <?php if($_GET['page'] == "schedule_tool") { echo "active"; } ?>"><i class="icon-time"></i>Schedule Tool</a>
                                        </li>                                   
                                        <li>
                                            <a href="content.php?page=staff" class=" <?php if ($_GET['page'] == "staff") { echo "active"; } ?>"><i class="glyphicon-parents"></i>Staff</a>
                                        </li>
										<li>
                                            <a href="content.php?page=discounts" class=" <?php if($_GET['page'] == "discounts") { echo "active"; } ?>"><i class="glyphicon-coins"></i>Discounts</a>
                                        </li>
										<li>
                                            <a href="content.php?page=applicants" class=" <?php if($_GET['page'] == "applicants") { echo "active"; } ?>"><i class="glyphicon-folder_open"></i>Applicants</a>
                                        </li>
                                        <li>
                                            <a href="content.php?page=add" class=" <?php if($_GET['page'] == "add") { echo "active"; } ?>"><i class="glyphicon-plus"></i>Add</a>
                                        </li>
                                        <li>
                                            <a href="content.php?page=analytics" class=" <?php if($_GET['page'] == "analytics") { echo "active"; } ?>"><i class="glyphicon-charts"></i>Analytics</a>
                                        </li>
										<li>
                                            <a href="content.php?page=attendance" class=" <?php if($_GET['page'] == "attendance") { echo "active"; } ?>"><i class="glyphicon-keyboard-wired"></i>Attendance</a>
                                        </li>
										<hr>
										<li>
                                            <a href="content.php?page=blog" class=" <?php if($_GET['page'] == "blog") { echo "active"; } ?>"><i class="glyphicon-pencil"></i>Blog</a>
                                        </li>
										<li>
                                            <a href="content.php?page=tickets&status=open" class=" <?php if($_GET['page'] == "tickets") { echo "active"; } ?>"><i class="glyphicon-message_flag"></i>Tickets <span><?php $pending_tickets = mysql_num_rows(mysql_query("SELECT id FROM messages WHERE status = 'open'")); if ($pending_tickets > 0) { echo $pending_tickets; ?> Open <?php } ?></span></a>
                                        </li>
										<li>
                                            <a href="content.php?page=reviews" class=" <?php if($_GET['page'] == "reviews") { echo "active"; } ?>"><i class="glyphicon-thumbs_up"></i>Reviews <span><?php $pending_reviews = mysql_num_rows(mysql_query("SELECT id FROM reviews WHERE approval = 'unapproved'")); if ($pending_reviews > 0) { echo $pending_reviews; ?> Pending <?php } ?></span></a>
                                        </li>
										<hr>
										<li>
                                            <a href="content.php?page=greenfire" class=" <?php if($_GET['page'] == "greenfire") { echo "active"; } ?>"><i class="glyphicon-fire"></i>Green Fire</a>
                                        </li>
                                </nav>
                                <!-- END Primary Navigation -->
                            </div>
                            <?php
                                $now_time = strtotime("now");
                                $next_time = strtotime("next month");
                                $last_time = strtotime("last month");

                                $get_this_month = date("F", $now_time); 
                                $get_next_month = date("F", $next_time);
                                $get_last_month = date("F", $last_time);

                                $get_this_year = date("Y", $now_time);
                                $get_last_year = date ("Y", $last_time);
								
								$cal_2014 = strtotime("January 1st 2014");

                                $yesterday = strtotime("midnight today"); 
                                $this_week = strtotime("last monday"); 
                                $this_month = strtotime("".$get_this_month." 1 ".$get_this_year.""); 
                                $last_month = strtotime("".$get_last_month." 1 ".$get_last_year."");

                                ?>
                            <div class="tab-pane tab-pane-side" id="side-tab-extra">
                                <h5><i class="icon-briefcase pull-right"></i><a href="javascript:void(0)" class="side-link">Balance</a></h5>
                                <div>
                                    <?php $get_total_earned = mysql_query("SELECT SUM(payment_amount) FROM buyerlist WHERE run_status='incomplete' AND payment_status='paid' AND payment_method='USD'"); 
                                    while ($get_earned = mysql_fetch_array($get_total_earned)) {
                                        $earned = $get_earned['SUM(payment_amount)'];
                                    }
                                    ?>
                                    $<?php echo number_format($earned, 2); ?> USD
                                </div>

                                <h5><i class="icon-dollar pull-right"></i><a href="javascript:void(0)" class="side-link">Earnings (today)</a></h5>
                                <div>
                                    <?php $get_total_earned = mysql_query("SELECT SUM(payment_amount) FROM buyerlist WHERE date_added > '$yesterday'"); 
                                    while ($get_earned = mysql_fetch_array($get_total_earned)) {
                                        $earned = $get_earned['SUM(payment_amount)'];
                                    }
                                    ?>
                                    $<?php echo number_format($earned, 2); ?> USD
                                </div>

                                <h5><i class="icon-dollar pull-right"></i><a href="javascript:void(0)" class="side-link">Earnings (this week)</a></h5>
                                <div>
                                <?php $get_total_earned = mysql_query("SELECT SUM(payment_amount) FROM buyerlist WHERE date_added > '$this_week'"); 
                                    while ($get_earned = mysql_fetch_array($get_total_earned)) {
                                        $earned = $get_earned['SUM(payment_amount)'];
                                    }
                                    ?>
                                    $<?php echo number_format($earned, 2); ?> USD
                                </div>

                                <h5><i class="icon-dollar pull-right"></i><a href="javascript:void(0)" class="side-link">Earnings (this month)</a></h5>
                                <div>
                                <?php $get_total_earned = mysql_query("SELECT SUM(payment_amount) FROM buyerlist WHERE date_added > '$this_month'"); 
                                    while ($get_earned = mysql_fetch_array($get_total_earned)) {
                                        $earned = $get_earned['SUM(payment_amount)'];
                                    }
                                    ?>
                                    $<?php echo number_format($earned, 2); ?> USD
                                </div>
								
								<h5><i class="icon-dollar pull-right"></i><a href="javascript:void(0)" class="side-link">Earnings (year-to-date)</a></h5>
                                <div>
                                <?php $get_total_earned = mysql_query("SELECT SUM(payment_amount) FROM buyerlist WHERE date_added > '$cal_2014'"); 
                                    while ($get_earned = mysql_fetch_array($get_total_earned)) {
                                        $earned = $get_earned['SUM(payment_amount)'];
                                    }
                                    ?>
                                    $<?php echo number_format($earned, 2); ?> USD
                                </div>

                                <h5><i class="icon-shopping-cart pull-right"></i><a href="javascript:void(0)" class="side-link">Sales (today)</a></h5>
                                <div>
                                    <?php $get_sales_today = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE payment_status='paid' AND payment_method='USD' AND date_added > '$yesterday'")); 
                                    echo $get_sales_today;
                                    ?>
                                </div>

                                <h5><i class="icon-shopping-cart pull-right"></i><a href="javascript:void(0)" class="side-link">Sales (this week)</a></h5>
                                <div>
                                    <?php $get_sales_week = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE date_added > '$this_week'")); 
                                    echo $get_sales_week;
                                    ?>
                                </div>
								
								<h5><i class="icon-shopping-cart pull-right"></i><a href="javascript:void(0)" class="side-link">Sales (last month)</a></h5>
                                <div>
                                    <?php $get_sales_last_month = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE payment_status='paid' AND payment_method='USD' AND (date_added < '$this_month' AND date_added > '$last_month')")); 
                                    echo $get_sales_last_month;
                                    ?>
                                </div>

                                <h5><i class="icon-shopping-cart pull-right"></i><a href="javascript:void(0)" class="side-link">Sales (this month)</a></h5>
                                <div>
                                    <?php $get_sales_month = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE date_added > '$this_month'")); 
                                    echo $get_sales_month;
                                    ?>
									<?php $change_num = number_format((($get_sales_month / $get_sales_last_month) * 100), 2); ?>
									<?php if ($get_sales_month > $get_sales_last_month) { $surpassed = TRUE; } else { $surpassed = FALSE; } ?>
									<?php $final_change = (100 - $change_num); ?>
									 <font size="-2px">(<i><?php if ($surpassed == TRUE) { echo "+"; } else { echo "-"; } ?><?php echo $final_change; ?>% <?php if ($surpassed == TRUE) { echo "surplus"; } else { echo "deficit"; } ?> vs <?php echo $get_last_month; ?></i>)</font>
                                </div>

                                <h5><i class="icon-shopping-cart pull-right"></i><a href="javascript:void(0)" class="side-link">Sales (year-to-date)</a></h5>
                                <div>
                                    <?php $get_sales_month = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE date_added > '$cal_2014'")); 
                                    echo $get_sales_month;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Sidebar Tabs -->
                </div>
                <!-- END Wrapper for scrolling functionality -->
            </aside>
            <!-- END Left Sidebar -->