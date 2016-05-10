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

<!-- Default Navbar -->
                        <div class="block-section">
                            <h4 class="sub-header">Filter by Region and Faction below.</h4>
                            <!-- Navbar -->
                            <div class="navbar">
                                <!-- Navbar Inner -->
                                <div class="navbar-inner">
                                    <!-- div.container -->
                                    <div class="container">
                                        <!-- Mobile Nav for Tablets and Phones -->
                                        <ul class="nav pull-right hidden-desktop">
                                            <li class="divider-vertical"></li>
                                            <li>
                                                <a href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-responsive-collapse-1">
                                                    <i class="icon-reorder"></i>
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- END Mobile Nav for Tablets and Phones -->

                                        <!-- Brand -->

                                        <!-- Links, Dropdowns and Search -->
                                        <div class="nav-collapse collapse navbar-responsive-collapse-1">
                                            <ul class="nav">
                                                <li <?php if ($_GET['region']=="US"&&$_GET['faction']=="Horde") { echo 'class="active"'; } ?>><a href="?page=schedule_tool&region=US&faction=Horde">US-Horde</a></li>
                                                <li <?php if ($_GET['region']=="US"&&$_GET['faction']=="Alliance") { echo 'class="active"'; } ?>><a href="?page=schedule_tool&region=US&faction=Alliance">US-Alliance</a></li>
                                                <li <?php if ($_GET['region']=="EU"&&$_GET['faction']=="Horde") { echo 'class="active"'; } ?>><a href="?page=schedule_tool&region=EU&faction=Horde">EU-Horde</a></li>
                                                <li <?php if ($_GET['region']=="EU"&&$_GET['faction']=="Alliance") { echo 'class="active"'; } ?>><a href="?page=schedule_tool&region=EU&faction=Alliance">EU-Alliance</a></li>
                                            </ul>
                                        </div>
                                        <!-- END Links, Dropdowns and Search -->
                                    </div>
                                    <!-- END div.container -->
                                </div>
                                <!-- END Navbar Inner -->
                            </div>
                            <!-- END Navbar -->
                        </div>
                        <!-- END Default Navbar -->
 <style type="text/css">
        table.finalgroup td {
            padding: 3px 8px;
        }
        table.finalgroup td.givespace {
            min-width: 150px;
        }

        div.dps {
            
        }

        div.healer {
            
        }

        div.customer, div.remove {
            cursor: pointer;
        }
        div.customer {
            width:250px;
        }
        table.mainwrap td {
            border: 0px;
            vertical-align: top;
            width:250px;
        }
        table.iwrap td {
            border: 1px solid black;
            padding: 3px 8px;
            vertical-align: top;
        }
        table.mainwrap th {
            background-color:#2980b9;
            color:#FFFFFF;
            border: 1px solid black;
            width:270px;
        }
        td.staff-spot {
            min-width: 150px;
        }
        div.coloring {
            width:20px;
        }
    </style>

<!-- Left Aligned Tabs Block -->
<?php if (($_GET['region']==NULL)&&($_GET['faction']==NULL)) { ?> 
<div class="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h4>Select a Region and Faction</h4> Then start building your run!
</div>

<?php } else { include('st_buyers.php'); } ?>


<!-- END Left Aligned Tabs Block -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="_pages/globalST.js"></script>

<hr>
<form action="_actions/build_run.php" method="post">
    <input type="hidden" name="region" value="<?php echo $_GET['region']; ?>">
    <input type="hidden" name="faction" value="<?php echo $_GET['faction']; ?>">
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

