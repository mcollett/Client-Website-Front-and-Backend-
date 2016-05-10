<style>
#tankbox {
	border: 1px solid black;
	width: 150px;
	padding: 2px;
	text-align: center;
	margin-bottom: 5px;
}
#healerbox {
	border: 1px solid black;
	width: 150px;
	padding: 2px;
	text-align: center;
	margin-bottom: 5px;
}
#dps1box {
	border: 1px solid black;
	width: 150px;
	padding: 2px;
	text-align: center;
	margin-bottom: 5px;
}
#dps2box {
	border: 1px solid black;
	width: 150px;
	padding: 2px;
	text-align: center;
	margin-bottom: 5px;
}
#dps3box {
	border: 1px solid black;
	width: 150px;
	padding: 2px;
	text-align: center;
	margin-bottom: 5px;
}
#stafftankbox {
	border: 1px solid black;
	width: 150px;
	padding: 2px;
	text-align: center;
	margin-bottom: 5px;
}
#staffhealerbox {
	border: 1px solid black;
	width: 150px;
	padding: 2px;
	text-align: center;
	margin-bottom: 5px;
}
#staffdps1box {
	border: 1px solid black;
	width: 150px;
	padding: 2px;
	text-align: center;
	margin-bottom: 5px;
}
#staffdps2box {
	border: 1px solid black;
	width: 150px;
	padding: 2px;
	text-align: center;
	margin-bottom: 5px;
}
#staffdps3box {
	border: 1px solid black;
	width: 150px;
	padding: 2px;
	text-align: center;
	margin-bottom: 5px;
}
#leftbox {
	width: 175px;
	float: left;
}
#rightbox {
	width: 175px;
	float:right;
}
#assign {
	width:360px;
	height:175px;
}
td {
	border: 1px solid black;
}
</style>

<!-- Left Aligned Tabs Block -->
<div class="block block-themed">
    <!-- Left Aligned Tabs Title -->
    <div class="block-title">
        <h4>Clients</h4>
    </div>
    <!-- END Left Aligned Tabs Title -->

    <!-- Left Aligned Tabs Content -->
    <div class="block-content">
        <div class="tabs-left clearfix">
            <ul class="nav nav-tabs" data-toggle="tabs">
                <li class="active"><a href="#instructions">Instructions</a></li>
                <li><a href="#us-h">US-Horde</a></li>
                <li><a href="#us-a">US-Alliance</a></li>
                <li><a href="#eu-h">EU-Horde</a></li>
                <li><a href="#eu-a">EU-Alliance</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="instructions"><?php include('st_buyers.php'); ?></div>
                <div class="tab-pane" id="us-h">...</div>
                <div class="tab-pane" id="us-a">...</div>
                <div class="tab-pane" id="eu-h">...</div>
                <div class="tab-pane" id="eu-a">....</div>
            </div>
        </div>
    </div>
    <!-- END Left Aligned Tabs Content -->
</div>
<!-- END Left Aligned Tabs Block -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="_pages/globalST.js"></script>

<hr>
<form action="_actions/build_run.php" method="post">
<label class="control-label" for="input-timepicker">Time (PST)</label>
<div class="input-append bootstrap-timepicker">
    <input type="text" id="input-timepicker" name="input-timepicker" class="input-mini input-timepicker">
    <span class="add-on"><i class="icon-time"></i></span>
</div>

<label class="control-label" for="input-datepicker">Date</label>
<div class="controls">
    <input type="text" id="input-datepicker" name="input-datepicker" class="input-small input-datepicker">
</div>

<hr>

<div id="assign">
<div id="leftbox">
    <?php $get_staff = mysql_query("SELECT * FROM staff ORDER BY id ASC"); ?>
    <?php $get_staff2 = mysql_query("SELECT * FROM staff ORDER BY id ASC"); ?>
    <?php $get_staff3 = mysql_query("SELECT * FROM staff ORDER BY id ASC"); ?>
    <?php $get_staff4 = mysql_query("SELECT * FROM staff ORDER BY id ASC"); ?>
    <?php $get_staff5 = mysql_query("SELECT * FROM staff ORDER BY id ASC"); ?>
    <table class="finalgroup" id="group">
    	<tr>
    		<td><b>Role</b></td>
    		<td><b>Client</b></td>
    		<td></td>
    		<td><b>Played by</b></td>
    	</tr>
        <tr>
            <td>Tank:</td>
            <td class="givespace tank-spot"></td>
            <td><div class="remove">x</div></td>
            <td>
                <select name="tank-staff-spot" class="select-chosen">
                    <option value=""></option>
                    <?php  while ($staff = mysql_fetch_array($get_staff)) { ?>
                    <option value="<?php echo $staff['id']; ?>"><?php echo $staff['name']; ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Healer:</td>
            <td class="givespace healer-spot"></td>
            <td><div class="remove">x</div></td>
            <td>
                <select name="healer-staff-spot" class="select-chosen">
                    <option value=""></option>
                    <?php  while ($staff = mysql_fetch_array($get_staff2)) { ?>
                    <option value="<?php echo $staff['id']; ?>"><?php echo $staff['name']; ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>DPS:</td>
            <td class="givespace dps-spot"></td>
            <td><div class="remove">x</div></td>
            <td>
                <select name="dps1-staff-spot" class="select-chosen">
                    <option value=""></option>
                    <option value="self">* Account Owner</option>
                    <?php  while ($staff = mysql_fetch_array($get_staff3)) { ?>
                    <option value="<?php echo $staff['id']; ?>"><?php echo $staff['name']; ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>DPS:</td>
            <td class="givespace dps-spot"></td>
            <td><div class="remove">x</div></td>
            <td>
                <select name="dps2-staff-spot" class="select-chosen">
                    <option value=""></option>
                    <option value="self">* Account Owner</option>
                    <?php  while ($staff = mysql_fetch_array($get_staff4)) { ?>
                    <option value="<?php echo $staff['id']; ?>"><?php echo $staff['name']; ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>DPS:</td>
            <td class="givespace dps-spot"></td>
            <td><div class="remove">x</div></td>
            <td>
                <select name="dps3-staff-spot" class="select-chosen">
                    <option value=""></option>
                    <option value="self">* Account Owner</option>
                    <?php  while ($staff = mysql_fetch_array($get_staff5)) { ?>
                    <option value="<?php echo $staff['id']; ?>"><?php echo $staff['name']; ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
    </table>
</div>
<div id="rightbox">

</div>
</div>

<br><br><br><br><br><br>

<button type="submit" class="btn btn-success"><i class="icon-ok"></i> Submit</button>
</form>

