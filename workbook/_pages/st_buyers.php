<?php

$tank_specs = array('Blood', 'Brewmaster', 'Feral (Tank)', 'Protection');
$healer_specs = array('Restoration', 'Mistweaver', 'Holy', 'Discipline');
$dps_specs = array('Frost', 'Unholy', 'Balance', 'Feral (DPS)', 'Beast Mastery', 'Marksmanship', 'Survival', 'Arcane', 'Fire', 'Windwalker', 'Retribution', 'Shadow', 'Assassination', 'Combat', 'Subtlety', 'Elemental', 'Enhancement', 'Affliction', 'Demonology', 'Destruction', 'Arms', 'Fury');

$current_geo = $_GET['region'];
$current_fact = $_GET['faction'];

function classColor($var) {
    if ($var == "Death Knight") { echo "#C41F3B"; }
    if ($var == "Druid") { echo "#FF7D0A"; }
    if ($var == "Hunter") { echo "#ABD473"; }
    if ($var == "Mage") { echo "#69CCF0"; }
    if ($var == "Monk") { echo "#67EBA7"; }
    if ($var == "Paladin") { echo "#F58CBA"; }
    if ($var == "Priest") { echo "#000000"; }
    if ($var == "Rogue") { echo "#CBC51B"; }
    if ($var == "Shaman") { echo "#0070DE"; }
    if ($var == "Warlock") { echo "#9482C9"; }
    if ($var == "Warrior") { echo "#C79C6E"; }
}

function packageType($var) {
    if ($var == "selfplay") { echo "Self"; }
    if ($var == "pilot") { echo "Pilot"; }
}

function time_elapsed_string($ptime)
{
    $etime = time() - $ptime;
 
    if ($etime < 1)
    {
        return '0 seconds';
    }
 
    $a = array( 12 * 30 * 24 * 60 * 60  =>  'yr',
                30 * 24 * 60 * 60       =>  'mnth',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hr',
                60                      =>  'min',
                1                       =>  'sec'
                );
 
    foreach ($a as $secs => $str)
    {
        $d = $etime / $secs;
        if ($d >= 1)
        {
            $r = round($d);
            return $r . ' ' . $str . ($r > 1 ? 's' : '') . '';
        }
    }
}

?>

<head>
   
    
</head>

<div id="paid-customers">

<?php $get_schedule_status = mysql_query("SELECT tank_id, healer_id, dps1_id, dps2_id, dps3_id FROM schedule WHERE finalized = ''"); $schedule_status = mysql_fetch_array($get_schedule_status); ?>

<table class="mainwrap" width="50%" border="0">
    <thead>
        <tr><th width="270px">Tanks (Main)</th><th width="270px">Healers (Main)</th><th width="270px">DPS (Main)</th></tr>
    </thead>
    <tr>
        <td>

<table class="iwrap">
    <?php
    $get_buyers = mysql_query("SELECT * FROM buyerlist WHERE character_spec IN('".implode("', '", $tank_specs)."') AND payment_method='USD' AND run_status='incomplete' AND payment_status='paid' AND geography='$current_geo' AND faction='$current_fact'");
            while ($buyerlist = mysql_fetch_array($get_buyers)) {
    ?>
    <tr <?php $sql = mysql_query("SELECT * FROM schedule WHERE tank_id LIKE '%".$buyerlist['id']."%' OR healer_id LIKE '%".$buyerlist['id']."%' OR dps1_id LIKE '%".$buyerlist['id']."%' OR dps2_id LIKE '%".$buyerlist['id']."%' OR dps3_id LIKE '%".$buyerlist['id']."%'"); if (mysql_num_rows($sql) > 0) { ?> style="opacity:0.4;" <?php } ?>>
        <td style="width:20px;background-color:<?php classColor($buyerlist['character_class']); ?>;"><div class="coloring"><a href="http://<?php echo strtolower($buyerlist['geography']); ?>.battle.net/wow/en/character/<?php echo strtolower($buyerlist['character_realm']); ?>/<?php echo $buyerlist['character_name']; ?>/advanced" target="_blank"><img width="16px" height="16px" src="img/wow.png"></a></div></td>
        <td><div class="customer tank" data-position="tank"><a href="skype:<?php echo $buyerlist['skype_username']; ?>?chat" data-toggle="tooltip" data-placement="left" title="<?php echo $buyerlist['skype_display_name']; ?> (<?php echo $buyerlist['skype_username']; ?>)"><i class="icon-skype"></i></a> <?php echo $buyerlist['character_name']; ?> <font size="-3" style="color:<?php classColor($buyerlist['character_class']); ?>;">(<?php echo $buyerlist['character_spec']; ?>)</font> <br><font size="-3"><?php packageType($buyerlist['playtype']); ?> $<?php echo $buyerlist['payment_amount'] ?> USD</font> <font size="-3">(<?php echo time_elapsed_string($buyerlist['date_added']); ?>)</font> <input type="hidden" name="tank-userID" value="<?php echo $buyerlist['id']; ?>"></div></td>
    </tr>
    <?php  } ?>
</table>

    </td><td>

<table class="iwrap">
    <?php
    $get_buyers = mysql_query("SELECT * FROM buyerlist WHERE character_spec IN('".implode("', '", $healer_specs)."') AND payment_method='USD' AND run_status='incomplete' AND payment_status='paid' AND geography='$current_geo' AND faction='$current_fact'");
            while ($buyerlist = mysql_fetch_array($get_buyers)) {
    ?>
    <tr <?php $sql = mysql_query("SELECT * FROM schedule WHERE tank_id LIKE '%".$buyerlist['id']."%' OR healer_id LIKE '%".$buyerlist['id']."%' OR dps1_id LIKE '%".$buyerlist['id']."%' OR dps2_id LIKE '%".$buyerlist['id']."%' OR dps3_id LIKE '%".$buyerlist['id']."%'"); if (mysql_num_rows($sql) > 0) { ?> style="opacity:0.4;" <?php } ?>>
        <td style="width:20px;background-color:<?php classColor($buyerlist['character_class']); ?>;"><div class="coloring"><a href="http://<?php echo strtolower($buyerlist['geography']); ?>.battle.net/wow/en/character/<?php echo strtolower($buyerlist['character_realm']); ?>/<?php echo $buyerlist['character_name']; ?>/advanced" target="_blank"><img width="16px" height="16px" src="img/wow.png"></a></div></td>
        <td><div class="customer healer" data-position="healer"><a href="skype:<?php echo $buyerlist['skype_username']; ?>?chat" data-toggle="tooltip" data-placement="left" title="<?php echo $buyerlist['skype_display_name']; ?> (<?php echo $buyerlist['skype_username']; ?>)"><i class="icon-skype"></i></a> <?php echo $buyerlist['character_name']; ?> <font size="-3" style="color:<?php classColor($buyerlist['character_class']); ?>;">(<?php echo $buyerlist['character_spec']; ?>)</font> <br><font size="-3"><?php packageType($buyerlist['playtype']); ?> $<?php echo $buyerlist['payment_amount'] ?> USD</font> <font size="-3">(<?php echo time_elapsed_string($buyerlist['date_added']); ?>)</font> <input type="hidden" name="healer-userID" value="<?php echo $buyerlist['id']; ?>"></div></td>
    </tr>
    <?php  } ?>
</table>

    </td><td>

<table class="iwrap">
    <?php
    $get_buyers = mysql_query("SELECT * FROM buyerlist WHERE character_spec IN('".implode("', '", $dps_specs)."') AND payment_method='USD' AND run_status='incomplete' AND payment_status='paid' AND geography='$current_geo' AND faction='$current_fact'");
            while ($buyerlist = mysql_fetch_array($get_buyers)) {
    ?>
    <tr <?php $sql = mysql_query("SELECT * FROM schedule WHERE tank_id LIKE '%".$buyerlist['id']."%' OR healer_id LIKE '%".$buyerlist['id']."%' OR dps1_id LIKE '%".$buyerlist['id']."%' OR dps2_id LIKE '%".$buyerlist['id']."%' OR dps3_id LIKE '%".$buyerlist['id']."%'"); if (mysql_num_rows($sql) > 0) { ?> style="opacity:0.4;" <?php } ?>>
        <td style="width:20px;background-color:<?php classColor($buyerlist['character_class']); ?>;"><div class="coloring"><a href="http://<?php echo strtolower($buyerlist['geography']); ?>.battle.net/wow/en/character/<?php echo strtolower($buyerlist['character_realm']); ?>/<?php echo $buyerlist['character_name']; ?>/advanced" target="_blank"><img width="16px" height="16px" src="img/wow.png"></a></div></td>
        <td><div class="customer dps" data-position="dps"><a href="skype:<?php echo $buyerlist['skype_username']; ?>?chat" data-toggle="tooltip" data-placement="left" title="<?php echo $buyerlist['skype_display_name']; ?> (<?php echo $buyerlist['skype_username']; ?>)"><i class="icon-skype"></i></a> <?php echo $buyerlist['character_name']; ?> <font size="-3" style="color:<?php classColor($buyerlist['character_class']); ?>;">(<?php echo $buyerlist['character_spec']; ?>)</font> <br><font size="-3"><?php packageType($buyerlist['playtype']); ?> $<?php echo $buyerlist['payment_amount'] ?> USD</font> <font size="-3">(<?php echo time_elapsed_string($buyerlist['date_added']); ?>)</font> <input type="hidden" name="dps-userID[]" value="<?php echo $buyerlist['id']; ?>"></div></td>
    </tr>
    <?php  } ?>
</table>

        </td>
    </tr>
</table>

<hr>

<!-- OFFSPECS -->

<table class="mainwrap" width="50%" border="0">
    <thead>
        <tr><th>Tanks (Offspec)</th><th>Healers (Offspec)</th><th>DPS (Offspec)</th></tr>
    </thead>
    <tr>
        <td>

<table class="iwrap">
    <?php
    $get_buyers = mysql_query("SELECT * FROM buyerlist WHERE payment_method='USD' AND run_status='incomplete' AND payment_status='paid' AND geography='$current_geo' AND faction='$current_fact' AND (alternative_spec IN('".implode("', '", $tank_specs)."') OR second_alternative_spec IN('".implode("', '", $tank_specs)."'))");
            while ($buyerlist = mysql_fetch_array($get_buyers)) {
    ?>
    <tr <?php $sql = mysql_query("SELECT * FROM schedule WHERE tank_id LIKE '%".$buyerlist['id']."%' OR healer_id LIKE '%".$buyerlist['id']."%' OR dps1_id LIKE '%".$buyerlist['id']."%' OR dps2_id LIKE '%".$buyerlist['id']."%' OR dps3_id LIKE '%".$buyerlist['id']."%'"); if (mysql_num_rows($sql) > 0) { ?> style="opacity:0.4;" <?php } ?>>
        <td style="width:20px;background-color:<?php classColor($buyerlist['character_class']); ?>;"><div class="coloring"><a href="http://<?php echo strtolower($buyerlist['geography']); ?>.battle.net/wow/en/character/<?php echo strtolower($buyerlist['character_realm']); ?>/<?php echo $buyerlist['character_name']; ?>/advanced" target="_blank"><img width="16px" height="16px" src="img/wow.png"></a></div></td>
        <td><div class="customer tank" data-position="tank"><a href="skype:<?php echo $buyerlist['skype_username']; ?>?chat" data-toggle="tooltip" data-placement="left" title="<?php echo $buyerlist['skype_display_name']; ?> (<?php echo $buyerlist['skype_username']; ?>)"><i class="icon-skype"></i></a> <?php echo $buyerlist['character_name']; ?> <font size="-3" style="color:<?php classColor($buyerlist['character_class']); ?>;">(<?php echo $buyerlist['character_spec']; ?>)</font> <br><font size="-3"><?php packageType($buyerlist['playtype']); ?> $<?php echo $buyerlist['payment_amount'] ?> USD</font> <font size="-3">(<?php echo time_elapsed_string($buyerlist['date_added']); ?>)</font> <input type="hidden" name="tank-userID" value="<?php echo $buyerlist['id']; ?>"></div></td>
    </tr>
    <?php  } ?>
</table>

    </td><td>

<table class="iwrap">
    <?php
    $get_buyers = mysql_query("SELECT * FROM buyerlist WHERE payment_method='USD' AND run_status='incomplete' AND payment_status='paid' AND geography='$current_geo' AND faction='$current_fact' AND (alternative_spec IN('".implode("', '", $healer_specs)."') OR second_alternative_spec IN('".implode("', '", $healer_specs)."'))");
            while ($buyerlist = mysql_fetch_array($get_buyers)) {
    ?>
    <tr <?php $sql = mysql_query("SELECT * FROM schedule WHERE tank_id LIKE '%".$buyerlist['id']."%' OR healer_id LIKE '%".$buyerlist['id']."%' OR dps1_id LIKE '%".$buyerlist['id']."%' OR dps2_id LIKE '%".$buyerlist['id']."%' OR dps3_id LIKE '%".$buyerlist['id']."%'"); if (mysql_num_rows($sql) > 0) { ?> style="opacity:0.4;" <?php } ?>>
        <td style="width:20px;background-color:<?php classColor($buyerlist['character_class']); ?>;"><div class="coloring"><a href="http://<?php echo strtolower($buyerlist['geography']); ?>.battle.net/wow/en/character/<?php echo strtolower($buyerlist['character_realm']); ?>/<?php echo $buyerlist['character_name']; ?>/advanced" target="_blank"><img width="16px" height="16px" src="img/wow.png"></a></div></td>
        <td><div class="customer healer" data-position="healer"><a href="skype:<?php echo $buyerlist['skype_username']; ?>?chat" data-toggle="tooltip" data-placement="left" title="<?php echo $buyerlist['skype_display_name']; ?> (<?php echo $buyerlist['skype_username']; ?>)"><i class="icon-skype"></i></a> <?php echo $buyerlist['character_name']; ?> <font size="-3" style="color:<?php classColor($buyerlist['character_class']); ?>;">(<?php echo $buyerlist['character_spec']; ?>)</font> <br><font size="-3"><?php packageType($buyerlist['playtype']); ?> $<?php echo $buyerlist['payment_amount'] ?> USD</font> <font size="-3">(<?php echo time_elapsed_string($buyerlist['date_added']); ?>)</font> <input type="hidden" name="healer-userID" value="<?php echo $buyerlist['id']; ?>"></div></td>
    </tr>
    <?php  } ?>
</table>

    </td><td>

<table class="iwrap">
    <?php
    $get_buyers = mysql_query("SELECT * FROM buyerlist WHERE payment_method='USD' AND run_status='incomplete' AND payment_status='paid' AND geography='$current_geo' AND faction='$current_fact' AND (alternative_spec IN('".implode("', '", $dps_specs)."') OR second_alternative_spec IN('".implode("', '", $dps_specs)."'))");
            while ($buyerlist = mysql_fetch_array($get_buyers)) {
    ?>
    <tr <?php $sql = mysql_query("SELECT * FROM schedule WHERE tank_id LIKE '%".$buyerlist['id']."%' OR healer_id LIKE '%".$buyerlist['id']."%' OR dps1_id LIKE '%".$buyerlist['id']."%' OR dps2_id LIKE '%".$buyerlist['id']."%' OR dps3_id LIKE '%".$buyerlist['id']."%'"); if (mysql_num_rows($sql) > 0) { ?> style="opacity:0.4;" <?php } ?>>
        <td style="width:20px;background-color:<?php classColor($buyerlist['character_class']); ?>;"><div class="coloring"><a href="http://<?php echo strtolower($buyerlist['geography']); ?>.battle.net/wow/en/character/<?php echo strtolower($buyerlist['character_realm']); ?>/<?php echo $buyerlist['character_name']; ?>/advanced" target="_blank"><img width="16px" height="16px" src="img/wow.png"></a></div></td>
        <td><div class="customer dps" data-position="dps"><a href="skype:<?php echo $buyerlist['skype_username']; ?>?chat" data-toggle="tooltip" data-placement="left" title="<?php echo $buyerlist['skype_display_name']; ?> (<?php echo $buyerlist['skype_username']; ?>)"><i class="icon-skype"></i></a> <?php echo $buyerlist['character_name']; ?> <font size="-3" style="color:<?php classColor($buyerlist['character_class']); ?>;">(<?php echo $buyerlist['character_spec']; ?>)</font> <br><font size="-3"><?php packageType($buyerlist['playtype']); ?> $<?php echo $buyerlist['payment_amount'] ?> USD</font> <font size="-3">(<?php echo time_elapsed_string($buyerlist['date_added']); ?>)</font> <input type="hidden" name="dps-userID[]" value="<?php echo $buyerlist['id']; ?>"></div></td>
    </tr>
    <?php  } ?>
</table>

        </td>
    </tr>
</table><br><br><br><br>


</div>