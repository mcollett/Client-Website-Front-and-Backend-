<div class="row-fluid">
<div class="span6">
    <div class="block block-themed">
        <div class="block-title"><h4><strong>Upcoming</strong> Runs</h4></div>
        <div class="block-content full">

            <?php $get_run_schedule = mysql_query("SELECT * FROM schedule WHERE finalized = '' ORDER BY timestamp ASC");
            if (mysql_num_rows($get_run_schedule) == 0) { ?>

            <div class="alert">
                 <i class="icon-warning-sign"></i> There are currently no runs scheduled.
            </div>

             <?php } else { ?>

             <?php while ($run_schedule = mysql_fetch_array($get_run_schedule)) { 



                ?>

            <div class="alert <?php if ($run_schedule['faction'] == "Alliance") { echo "alert-info"; } if ($run_schedule['faction'] == "Horde") { echo "alert-error"; } ?>">
                <i class="icon-bullhorn"></i> &nbsp;<strong><?php echo $run_schedule['region']; ?>-<?php echo $run_schedule['faction']; ?> - <?php echo date("l, F jS - h:i A", $run_schedule['timestamp']); ?> PST</strong> <font size="-3">(<a href="content.php?page=view_run&id=<?php echo $run_schedule['id']; ?>">View Run Details</a>)</font>
            </div>


            <?php } ?>

            <?php } ?>

        </div>
    </div>
</div>
<div class="span6">
    <div class="block block-themed">
        <div class="block-title"><h4>Recently <strong>Completed</strong> Runs</h4></div>
        <div class="block-content full">

            <?php $get_run_schedule = mysql_query("SELECT * FROM schedule WHERE finalized != '' ORDER BY finalized DESC LIMIT 5");
            if (mysql_num_rows($get_run_schedule) == 0) { ?>

            <div class="alert">
                 <i class="icon-warning-sign"></i> No runs have been completed.
            </div>

             <?php } else { ?>

             <?php while ($run_schedule = mysql_fetch_array($get_run_schedule)) { 



                ?>

            <div class="alert <?php if ($run_schedule['faction'] == "Alliance") { echo "alert-info"; } if ($run_schedule['faction'] == "Horde") { echo "alert-error"; } ?>">
                <i class="icon-ok"></i> &nbsp;<strong><?php echo $run_schedule['region']; ?>-<?php echo $run_schedule['faction']; ?> - <?php echo date("l, F jS - h:i A", $run_schedule['finalized']); ?> PST</strong> <font size="-3">(<a href="content.php?page=view_run&id=<?php echo $run_schedule['id']; ?>">View Run Details</a>)</font>
            </div>


            <?php } ?>

            <?php } ?>

        </div>
    </div>
</div>
</div>

<!-- Coloring
    red:
    <div class="alert alert-error">
    blue:
    <div class="alert alert-info">
    green:
    <div class="alert alert-success">
    yellow:
    <div class="alert">
-->