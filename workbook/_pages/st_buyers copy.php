<?php

$tank_specs = array('Blood', 'Brewmaster', 'Feral (Tank)', 'Protection');
$healer_specs = array('Restoration', 'Mistweaver', 'Holy', 'Discipline');
$dps_specs = array('Frost', 'Unholy', 'Balance', 'Feral (DPS)', 'Beast Mastery', 'Marksmanship', 'Survival', 'Arcane', 'Fire', 'Windwalker', 'Retribution', 'Shadow', 'Assassination', 'Combat', 'Subtlety', 'Elemental', 'Enhancement', 'Affliction', 'Demonology', 'Destruction', 'Arms', 'Fury');

$current_geo = "*";
$current_fact = "*";

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

?>

<head>
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
            min-width: 150px;
        }
        table.mainwrap td {
            border: 0px;
            vertical-align: top;
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
        }
        td.staff-spot {
            min-width: 150px;
        }
    </style>
    
</head>

<div id="paid-customers">

<table class="mainwrap" width="50%" border="0">
    <thead>
        <tr><th>Tanks (Main)</th><th>Healers (Main)</th><th>DPS (Main)</th></tr>
    </thead>
    <tr>
        <td>

<table class="iwrap">
    <?php
    $get_buyers = mysql_query("SELECT * FROM buyerlist WHERE character_spec IN('".implode("', '", $tank_specs)."') AND payment_method='USD' AND run_status='incomplete' AND payment_status='paid'");
            while ($buyerlist = mysql_fetch_array($get_buyers)) {
    ?>
    <tr>
        <td style="background-color:<?php classColor($buyerlist['character_class']); ?>;"></td>
        <td><div class="customer tank" data-position="tank"><?php echo $buyerlist['character_name']; ?> <font size="-3" style="color:<?php classColor($buyerlist['character_class']); ?>;">(<?php echo $buyerlist['character_spec']; ?>)</font> <input type="hidden" name="tank-userID" value="<?php echo $buyerlist['id']; ?>"></div></td>
    </tr>
    <?php  } ?>
</table>

    </td><td>

<table class="iwrap">
    <?php
    $get_buyers = mysql_query("SELECT * FROM buyerlist WHERE character_spec IN('".implode("', '", $healer_specs)."') AND payment_method='USD' AND run_status='incomplete' AND payment_status='paid'");
            while ($buyerlist = mysql_fetch_array($get_buyers)) {
    ?>
    <tr>
        <td style="background-color:<?php classColor($buyerlist['character_class']); ?>;"></td>
        <td><div class="customer healer" data-position="healer"><?php echo $buyerlist['character_name']; ?> <font size="-3" style="color:<?php classColor($buyerlist['character_class']); ?>;">(<?php echo $buyerlist['character_spec']; ?>)</font> <input type="hidden" name="healer-userID" value="<?php echo $buyerlist['id']; ?>"></div></td>
    </tr>
    <?php  } ?>
</table>

    </td><td>

<table class="iwrap">
    <?php
    $get_buyers = mysql_query("SELECT * FROM buyerlist WHERE character_spec IN('".implode("', '", $dps_specs)."') AND payment_method='USD' AND run_status='incomplete' AND payment_status='paid'");
            while ($buyerlist = mysql_fetch_array($get_buyers)) {
    ?>
    <tr>
        <td style="background-color:<?php classColor($buyerlist['character_class']); ?>;"></td>
        <td><div class="customer dps" data-position="dps"><?php echo $buyerlist['character_name']; ?> <font size="-3" style="color:<?php classColor($buyerlist['character_class']); ?>;">(<?php echo $buyerlist['character_spec']; ?>)</font> <input type="hidden" name="dps-userID[]" value="<?php echo $buyerlist['id']; ?>"></div></td>
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
    $get_buyers = mysql_query("SELECT * FROM buyerlist WHERE payment_method='USD' AND run_status='incomplete' AND payment_status='paid' AND (alternative_spec IN('".implode("', '", $tank_specs)."') OR second_alternative_spec IN('".implode("', '", $tank_specs)."'))");
            while ($buyerlist = mysql_fetch_array($get_buyers)) {
    ?>
    <tr>
        <td style="background-color:<?php classColor($buyerlist['character_class']); ?>;"></td>
        <td><div class="customer tank" data-position="tank"><?php echo $buyerlist['character_name']; ?> <font size="-3" style="color:<?php classColor($buyerlist['character_class']); ?>;">(<?php echo $buyerlist['character_spec']; ?>)</font> <input type="hidden" name="tank-userID" value="<?php echo $buyerlist['id']; ?>"></div></td>
    </tr>
    <?php  } ?>
</table>

    </td><td>

<table class="iwrap">
    <?php
    $get_buyers = mysql_query("SELECT * FROM buyerlist WHERE payment_method='USD' AND run_status='incomplete' AND payment_status='paid' AND (alternative_spec IN('".implode("', '", $healer_specs)."') OR second_alternative_spec IN('".implode("', '", $healer_specs)."'))");
            while ($buyerlist = mysql_fetch_array($get_buyers)) {
    ?>
    <tr>
        <td style="background-color:<?php classColor($buyerlist['character_class']); ?>;"></td>
        <td><div class="customer healer" data-position="healer"><?php echo $buyerlist['character_name']; ?> <font size="-3" style="color:<?php classColor($buyerlist['character_class']); ?>;">(<?php echo $buyerlist['character_spec']; ?>)</font> <input type="hidden" name="healer-userID" value="<?php echo $buyerlist['id']; ?>"></div></td>
    </tr>
    <?php  } ?>
</table>

    </td><td>

<table class="iwrap">
    <?php
    $get_buyers = mysql_query("SELECT * FROM buyerlist WHERE payment_method='USD' AND run_status='incomplete' AND payment_status='paid' AND (alternative_spec IN('".implode("', '", $dps_specs)."') OR second_alternative_spec IN('".implode("', '", $dps_specs)."'))");
            while ($buyerlist = mysql_fetch_array($get_buyers)) {
    ?>
    <tr>
        <td style="background-color:<?php classColor($buyerlist['character_class']); ?>;"></td>
        <td><div class="customer dps" data-position="dps"><?php echo $buyerlist['character_name']; ?> <font size="-3" style="color:<?php classColor($buyerlist['character_class']); ?>;">(<?php echo $buyerlist['character_spec']; ?>)</font> <input type="hidden" name="dps-userID[]" value="<?php echo $buyerlist['id']; ?>"></div></td>
    </tr>
    <?php  } ?>
</table>

        </td>
    </tr>
</table><br><br><br><br>


</div>