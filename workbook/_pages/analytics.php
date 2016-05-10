<?php 

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

$total_complete = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE run_status='complete'"));
?>

<!-- Left Aligned Tabs Title -->
<div class="block-title">
    <h4>Visual Analytics</h4>
</div>
<!-- END Left Aligned Tabs Title -->

<!-- Left Aligned Tabs Content -->
<div class="block-content">
    <div class="tabs-left clearfix">
        <ul class="nav nav-tabs" data-toggle="tabs">
            <li class="active"><a href="#packages">Packages</a></li>
            <li><a href="#geofact">Geo-Faction</a></li>
            <li><a href="#acq">Acquisition</a></li>
            <li><a href="#class">Class</a></li>
            <li><a href="#talents">Talents</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="packages">

            	<?php

$total_pilot = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE run_status='complete' AND playtype='pilot'"));
$total_self = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE run_status='complete' AND playtype='selfplay'"));

$pilot = ($total_pilot / $total_complete) * 100;
$self = ($total_self / $total_complete) * 100;

?>
<h4 class="sub-header">Packages <small>Pilot versus Self</small></h4>
<div class="progress progress-striped progress-warning active">
    <div class="bar" style="width: <?php echo round($pilot, 0); ?>%">Pilot (<?php echo round($pilot, 0); ?>%)</div>
</div>
<div class="progress progress-striped progress-success active">
    <div class="bar" style="width: <?php echo round($self, 0); ?>%">Self (<?php echo round($self, 0); ?>%)</div>
</div>

            </div>
            <div class="tab-pane" id="geofact">

<?php
$ush_complete = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE run_status='complete' AND geography='US' AND faction='Horde'"));
$usa_complete = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE run_status='complete' AND geography='US' AND faction='Alliance'"));
$euh_complete = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE run_status='complete' AND geography='EU' AND faction='Horde'"));
$eua_complete = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE run_status='complete' AND geography='EU' AND faction='Alliance'"));

$ush = ($ush_complete / $total_complete) * 100;
$usa = ($usa_complete / $total_complete) * 100;
$euh = ($euh_complete / $total_complete) * 100;
$eua = ($eua_complete / $total_complete) * 100;

?>

<!-- Striped Animated -->
<h4 class="sub-header">Clients <small>Region / Faction</small></h4>
<div class="progress progress-striped progress-danger active">
    <div class="bar" style="width: <?php echo round($ush, 0); ?>%">US-Horde (<?php echo round($ush, 0); ?>%)</div>
</div>
<div class="progress progress-striped progress-info active">
    <div class="bar" style="width: <?php echo round($usa, 0); ?>%">US-Alliance (<?php echo round($usa, 0); ?>%)</div>
</div>
<div class="progress progress-striped progress-danger active">
    <div class="bar" style="width: <?php echo round($euh, 0); ?>%">EU-Horde (<?php echo round($euh, 0); ?>%)</div>
</div>
<div class="progress progress-striped progress-info active">
    <div class="bar" style="width: <?php echo round($eua, 0); ?>%">EU-Alliance (<?php echo round($eua, 0); ?>%)</div>
</div>
<!-- END Striped Animated -->

            </div>
            <div class="tab-pane" id="acq">

<?php

$total_organic = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE run_status='complete' AND rafcode=''"));
$total_referred = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE run_status='complete' AND rafcode!=''"));

$organic = ($total_organic / $total_complete) * 100;
$referred = ($total_referred / $total_complete) * 100;

?>
<h4 class="sub-header">Acquisition <small>Organic versus Referred</small></h4>
Organic
<div class="progress progress-striped progress-warning active">
    <div class="bar" style="width: <?php echo round($organic, 0); ?>%"><?php echo round($organic, 0); ?>%</div>
</div>
Referred
<div class="progress progress-striped progress-success active">
    <div class="bar" style="width: <?php echo round($referred, 0); ?>%"><?php echo round($referred, 0); ?>%</div>
</div>

            </div>
            <div class="tab-pane" id="class">

<!-- Striped Animated -->
<?php

$dk = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE run_status='complete' AND character_class='Death Knight'"));
$druid = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE run_status='complete' AND character_class='Druid'"));
$hunter = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE run_status='complete' AND character_class='Hunter'"));
$mage = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE run_status='complete' AND character_class='Mage'"));
$monk = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE run_status='complete' AND character_class='Monk'"));
$paladin = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE run_status='complete' AND character_class='Paladin'"));
$priest = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE run_status='complete' AND character_class='Priest'"));
$rogue = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE run_status='complete' AND character_class='Rogue'"));
$shaman = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE run_status='complete' AND character_class='Shaman'"));
$warlock = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE run_status='complete' AND character_class='Warlock'"));
$warrior = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE run_status='complete' AND character_class='Warrior'"));

$dk_total = ($dk / $total_complete) * 100;
$druid_total = ($druid / $total_complete) * 100;
$hunter_total = ($hunter / $total_complete) * 100;
$mage_total = ($mage / $total_complete) * 100;
$monk_total = ($monk / $total_complete) * 100;
$paladin_total = ($paladin / $total_complete) * 100;
$priest_total = ($priest / $total_complete) * 100;
$rogue_total = ($rogue / $total_complete) * 100;
$shaman_total = ($shaman / $total_complete) * 100;
$warlock_total = ($warlock / $total_complete) * 100;
$warrior_total = ($warrior / $total_complete) * 100;

?>

<h4 class="sub-header">Clients <small>Class</small></h4>
Death Knight
<div class="progress progress-striped active">
    <div class="bar" style="background-color:<?php classColor("Death Knight"); ?>;width: <?php echo round($dk_total, 0); ?>%"><?php echo round($dk_total, 0); ?>%</div>
</div>
Druid
<div class="progress progress-striped active">
    <div class="bar" style="background-color:<?php classColor("Druid"); ?>;width: <?php echo round($druid_total, 0); ?>%"><?php echo round($druid_total, 0); ?>%</div>
</div>
Hunter
<div class="progress progress-striped active">
    <div class="bar" style="background-color:<?php classColor("Hunter"); ?>;width: <?php echo round($hunter_total, 0); ?>%"><?php echo round($hunter_total, 0); ?>%</div>
</div>
Mage
<div class="progress progress-striped active">
    <div class="bar" style="background-color:<?php classColor("Mage"); ?>;width: <?php echo round($mage_total, 0); ?>%"><?php echo round($mage_total, 0); ?>%</div>
</div>
Monk
<div class="progress progress-striped active">
    <div class="bar" style="background-color:<?php classColor("Monk"); ?>;width: <?php echo round($monk_total, 0); ?>%"><?php echo round($monk_total, 0); ?>%</div>
</div>
Paladin
<div class="progress progress-striped active">
    <div class="bar" style="background-color:<?php classColor("Paladin"); ?>;width: <?php echo round($paladin_total, 0); ?>%"><?php echo round($paladin_total, 0); ?>%</div>
</div>
Priest
<div class="progress progress-striped active">
    <div class="bar" style="background-color:<?php classColor("Priest"); ?>;width: <?php echo round($priest_total, 0); ?>%"><?php echo round($priest_total, 0); ?>%</div>
</div>
Rogue
<div class="progress progress-striped active">
    <div class="bar" style="background-color:<?php classColor("Rogue"); ?>;width: <?php echo round($rogue_total, 0); ?>%"><?php echo round($rogue_total, 0); ?>%</div>
</div>
Shaman
<div class="progress progress-striped active">
    <div class="bar" style="background-color:<?php classColor("Shaman"); ?>;width: <?php echo round($shaman_total, 0); ?>%"><?php echo round($shaman_total, 0); ?>%</div>
</div>
Warlock
<div class="progress progress-striped active">
    <div class="bar" style="background-color:<?php classColor("Warlock"); ?>;width: <?php echo round($warlock_total, 0); ?>%"><?php echo round($warlock_total, 0); ?>%</div>
</div>
Warrior
<div class="progress progress-striped active">
    <div class="bar" style="background-color:<?php classColor("Warrior"); ?>;width: <?php echo round($warrior_total, 0); ?>%"><?php echo round($warrior_total, 0); ?>%</div>
</div><br><br><br><br>
<!-- END Striped Animated -->

            </div>
            <div class="tab-pane" id="talents">

<!-- Stacked -->
<?php

//mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='' AND character_spec=''"));

$get_dk_total = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Death Knight'"));
$get_druid_total = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Druid'"));
$get_hunter_total = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Hunter'"));
$get_mage_total = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Mage'"));
$get_monk_total = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Monk'"));
$get_paladin_total = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Paladin'"));
$get_priest_total = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Priest'"));
$get_rogue_total = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Rogue'"));
$get_shaman_total = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Shaman'"));
$get_warlock_total = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Warlock'"));
$get_warrior_total = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Warrior'"));

$dk_spec_blood = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Death Knight' AND character_spec='Blood'"));
$dk_spec_frost = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Death Knight' AND character_spec='Frost'"));
$dk_spec_unholy = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Death Knight' AND character_spec='Unholy'"));

$druid_spec_balance = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Druid' AND character_spec='Balance'"));
$druid_spec_resto = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Druid' AND character_spec='Restoration'"));
$druid_spec_feral = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Druid' AND character_spec='Feral (DPS)'"));
$druid_spec_guardian = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Druid' AND character_spec='Feral (Tank)'"));

$hunter_spec_bm = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Hunter' AND character_spec='Beast Mastery'"));
$hunter_spec_marks = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Hunter' AND character_spec='Marksmanship'"));
$hunter_spec_survival = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Hunter' AND character_spec='Survival'"));

$mage_spec_arcane = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Mage' AND character_spec='Arcane'"));
$mage_spec_fire = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Mage' AND character_spec='Fire'"));
$mage_spec_frost = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Mage' AND character_spec='Frost'"));

$monk_spec_brewmaster = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Monk' AND character_spec='Brewmaster'"));
$monk_spec_mistweaver = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Monk' AND character_spec='Mistweaver'"));
$monk_spec_windwalker = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Monk' AND character_spec='Windwalker'"));

$paladin_spec_holy = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Paladin' AND character_spec='Holy'"));
$paladin_spec_prot = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Paladin' AND character_spec='Protection'"));
$paladin_spec_ret = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Paladin' AND character_spec='Retribution'"));

$priest_spec_disc = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Priest' AND character_spec='Discipline'"));
$priest_spec_holy = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Priest' AND character_spec='Holy'"));
$priest_spec_shadow = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Priest' AND character_spec='Shadow'"));

$rogue_spec_assassination = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Rogue' AND character_spec='Assassination'"));
$rogue_spec_combat = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Rogue' AND character_spec='Combat'"));
$rogue_spec_subtlety = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Rogue' AND character_spec='Subtlety'"));

$shaman_spec_ele = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Shaman' AND character_spec='Elemental'"));
$shaman_spec_enhance = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Shaman' AND character_spec='Enhancement'"));
$shaman_spec_resto = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Shaman' AND character_spec='Restoration'"));

$warlock_spec_affliction = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Warlock' AND character_spec='Affliction'"));
$warlock_spec_demo = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Warlock' AND character_spec='Demonology'"));
$warlock_spec_destro = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Warlock' AND character_spec='Destruction'"));

$warrior_spec_arms = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Warrior' AND character_spec='Arms'"));
$warrior_spec_fury = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Warrior' AND character_spec='Fury'"));
$warrior_spec_prot = mysql_num_rows(mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND character_class='Warrior' AND character_spec='Protection'"));

$dk_blood = ($dk_spec_blood / $get_dk_total) * 100;
$dk_frost = ($dk_spec_frost / $get_dk_total) * 100;
$dk_unholy = ($dk_spec_unholy / $get_dk_total) * 100;

$druid_balance = ($druid_spec_balance / $get_druid_total) * 100;
$druid_resto = ($druid_spec_resto / $get_druid_total) * 100;
$druid_feral = ($druid_spec_feral / $get_druid_total) * 100;
$druid_guardian = ($druid_spec_guardian / $get_druid_total) * 100;

$hunter_bm = ($hunter_spec_bm / $get_hunter_total) * 100;
$hunter_marks = ($hunter_spec_marks / $get_hunter_total) * 100;
$hunter_survival = ($hunter_spec_survival / $get_hunter_total) * 100;

$mage_arcane = ($mage_spec_arcane / $get_mage_total) * 100;
$mage_fire = ($mage_spec_fire / $get_mage_total) * 100;
$mage_frost = ($mage_spec_frost / $get_mage_total) * 100;

$monk_brewmaster = ($monk_spec_brewmaster / $get_monk_total) * 100;
$monk_mistweaver = ($monk_spec_mistweaver / $get_monk_total) * 100;
$monk_windwalker = ($monk_spec_windwalker / $get_monk_total) * 100;

$paladin_holy = ($paladin_spec_holy / $get_paladin_total) * 100;
$paladin_prot = ($paladin_spec_prot / $get_paladin_total) * 100;
$paladin_ret = ($paladin_spec_ret / $get_paladin_total) * 100;

$priest_disc = ($priest_spec_disc / $get_priest_total) * 100;
$priest_holy = ($priest_spec_holy / $get_priest_total) * 100;
$priest_shadow = ($priest_spec_shadow / $get_priest_total) * 100;

$rogue_assassination = ($rogue_spec_assassination / $get_rogue_total) * 100;
$rogue_combat = ($rogue_spec_combat / $get_rogue_total) * 100;
$rogue_subtlety = ($rogue_spec_subtlety / $get_rogue_total) * 100;

$shaman_ele = ($shaman_spec_ele / $get_shaman_total) * 100;
$shaman_enhance = ($shaman_spec_enhance / $get_shaman_total) * 100;
$shaman_resto = ($shaman_spec_resto / $get_shaman_total) * 100;

$warlock_affliction = ($warlock_spec_affliction / $get_warlock_total) * 100;
$warlock_demo = ($warlock_spec_demo / $get_warlock_total) * 100;
$warlock_destro = ($warlock_spec_destro / $get_warlock_total) * 100;

$warrior_arms = ($warrior_spec_arms / $get_warrior_total) * 100;
$warrior_fury = ($warrior_spec_fury / $get_warrior_total) * 100;
$warrior_prot = ($warrior_spec_prot / $get_warrior_total) * 100;


?>

<h4 class="sub-header">Classes <small>Talent Breakdown</small></h4>
Death Knight
<div class="progress progress-striped active">
	<div class="bar bar-info" style="background-color:#C41F3B;width: <?php echo $dk_blood; ?>%;">Blood <?php echo round($dk_blood, 0); ?>%</div>
	<div class="bar bar-info" style="background-color:#DC4760;width: <?php echo $dk_frost; ?>%;">Frost <?php echo round($dk_frost, 0); ?>%</div>
	<div class="bar bar-info" style="background-color:#EE6D82;width: <?php echo $dk_unholy; ?>%;">Unholy <?php echo round($dk_unholy, 0); ?>%</div>
</div>
Druid
<div class="progress progress-striped active">
	<div class="bar bar-info" style="background-color:#FF7D0A;width: <?php echo $druid_balance; ?>%;">Balance <?php echo round($druid_balance, 0); ?>%</div>
	<div class="bar bar-info" style="background-color:#FBA050;width: <?php echo $druid_feral; ?>%;">Feral <?php echo round($druid_feral, 0); ?>%</div>
	<div class="bar bar-info" style="background-color:#FAB273;width: <?php echo $druid_guardian; ?>%;">Guardian <?php echo round($druid_guardian, 0); ?>%</div>
	<div class="bar bar-info" style="background-color:#F9BD89;width: <?php echo $druid_resto; ?>%;">Restoration <?php echo round($druid_resto, 0); ?>%</div>
</div>
Hunter
<div class="progress progress-striped active">
	<div class="bar bar-info" style="background-color:#ABD473;width: <?php echo $hunter_bm; ?>%;">Beast Mastery <?php echo round($hunter_bm, 0); ?>%</div>
	<div class="bar bar-info" style="background-color:#C1E48F;width: <?php echo $hunter_marks; ?>%;">Marksmanship <?php echo round($hunter_marks, 0); ?>%</div>
	<div class="bar bar-info" style="background-color:#D3F2A8;width: <?php echo $hunter_survival; ?>%;">Survival <?php echo round($hunter_survival, 0); ?>%</div>
</div>
Mage
<div class="progress progress-striped active">
	<div class="bar bar-info" style="background-color:#69CCF0;width: <?php echo $mage_arcane; ?>%;">Arcane <?php echo round($mage_arcane, 0); ?>%</div>
	<div class="bar bar-info" style="background-color:#78CDEC;width: <?php echo $mage_fire; ?>%;">Fire <?php echo round($mage_fire, 0); ?>%</div>
	<div class="bar bar-info" style="background-color:#8ECDE4;width: <?php echo $mage_frost; ?>%;">Frost <?php echo round($mage_frost, 0); ?>%</div>
</div>
Monk
<div class="progress progress-striped active">
	<div class="bar bar-info" style="background-color:#67EBA7;width: <?php echo $monk_brewmaster; ?>%;">Brewmaster <?php echo round($monk_brewmaster, 0); ?>%</div>
	<div class="bar bar-info" style="background-color:#88EEB9;width: <?php echo $monk_mistweaver; ?>%;">Mistweaver <?php echo round($monk_mistweaver, 0); ?>%</div>
	<div class="bar bar-info" style="background-color:#9AF5C6;width: <?php echo $monk_windwalker; ?>%;">Windwalker <?php echo round($monk_windwalker, 0); ?>%</div>
</div>
Paladin
<div class="progress progress-striped active">
	<div class="bar bar-info" style="background-color:#F58CBA;width: <?php echo $paladin_holy; ?>%;">Holy <?php echo round($paladin_holy, 0); ?>%</div>
	<div class="bar bar-info" style="background-color:#F9A1C7;width: <?php echo $paladin_prot; ?>%;">Protection <?php echo round($paladin_prot, 0); ?>%</div>
	<div class="bar bar-info" style="background-color:#F9BDD7;width: <?php echo $paladin_ret; ?>%;">Retribution <?php echo round($paladin_ret, 0); ?>%</div>
</div>
Priest
<div class="progress progress-striped active">
	<div class="bar bar-info" style="background-color:#000000;width: <?php echo $priest_disc; ?>%;">Discipline <?php echo round($priest_disc, 0); ?>%</div>
	<div class="bar bar-info" style="background-color:#696969;width: <?php echo $priest_holy; ?>%;">Holy <?php echo round($priest_holy, 0); ?>%</div>
	<div class="bar bar-info" style="background-color:#858484;width: <?php echo $priest_shadow; ?>%;">Shadow <?php echo round($priest_shadow, 0); ?>%</div>
</div>
Rogue
<div class="progress progress-striped active">
	<div class="bar bar-info" style="background-color:#CBC51B;width: <?php echo $rogue_assassination; ?>%;">Assassination <?php echo round($rogue_assassination, 0); ?>%</div>
	<div class="bar bar-info" style="background-color:#E3DD39;width: <?php echo $rogue_combat; ?>%;">Combat <?php echo round($rogue_combat, 0); ?>%</div>
	<div class="bar bar-info" style="background-color:#EDE864;width: <?php echo $rogue_subtlety; ?>%;">Subtlety <?php echo round($rogue_subtlety, 0); ?>%</div>
</div>
Shaman
<div class="progress progress-striped active">
	<div class="bar bar-info" style="background-color:#0070DE;width: <?php echo $shaman_ele; ?>%;">Elemental <?php echo round($shaman_ele, 0); ?>%</div>
	<div class="bar bar-info" style="background-color:#2D8BE9;width: <?php echo $shaman_enhance; ?>%;">Enhancement <?php echo round($shaman_enhance, 0); ?>%</div>
	<div class="bar bar-info" style="background-color:#5DA8F3;width: <?php echo $shaman_resto; ?>%;">Restoration <?php echo round($shaman_resto, 0); ?>%</div>
</div>
Warlock
<div class="progress progress-striped active">
	<div class="bar bar-info" style="background-color:#9482C9;width: <?php echo $warlock_affliction; ?>%;">Affliction <?php echo round($warlock_affliction, 0); ?>%</div>
	<div class="bar bar-info" style="background-color:#AE9FDB;width: <?php echo $warlock_demo; ?>%;">Demonology <?php echo round($warlock_demo, 0); ?>%</div>
	<div class="bar bar-info" style="background-color:#C6BAEA;width: <?php echo $warlock_destro; ?>%;">Destruction <?php echo round($warlock_destro, 0); ?>%</div>
</div>
Warrior
<div class="progress progress-striped active">
	<div class="bar bar-info" style="background-color:#C79C6E;width: <?php echo $warrior_arms; ?>%;">Arms <?php echo round($warrior_arms, 0); ?>%</div>
	<div class="bar bar-info" style="background-color:#D8B288;width: <?php echo $warrior_fury; ?>%;">Fury <?php echo round($warrior_fury, 0); ?>%</div>
	<div class="bar bar-info" style="background-color:#E6C7A6;width: <?php echo $warrior_prot; ?>%;">Protection <?php echo round($warrior_prot, 0); ?>%</div>
</div><br><br><br><br>
<!-- END Stacked -->

            </div>
        </div>
    </div>
</div>
<!-- END Left Aligned Tabs Content -->

<!-- Left Aligned Tabs Title -->
<div class="block-title">
    <h4>Numerical Analytics</h4>
</div>
<!-- END Left Aligned Tabs Title -->

<!-- Left Aligned Tabs Content -->
<div class="block-content">
    <div class="tabs-left clearfix">
        <ul class="nav nav-tabs" data-toggle="tabs">
            <li class="active"><a href="#npackages">Packages</a></li>
            <li><a href="#ngeofact">Geo-Faction</a></li>
            <li><a href="#nacq">Acquisition</a></li>
            <li><a href="#nclass">Class</a></li>
            <li><a href="#ntalents">Talents</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="npackages">

            	<h4 class="sub-header">Packages <small>Pilot versus Self</small></h4>
            	<b>Pilot</b>: <?php echo $total_pilot; ?><br>
            	<b>Self</b>: <?php echo $total_self; ?>

            </div>
            <div class="tab-pane" id="ngeofact">

            	<h4 class="sub-header">Clients <small>Region / Faction</small></h4>
            	<b>US - Horde</b>: <?php echo $ush_complete; ?><br>
            	<b>US - Alliance</b>: <?php echo $usa_complete; ?><br>
            	<b>EU - Horde</b>: <?php echo $euh_complete; ?><br>
            	<b>EU - Alliance</b>: <?php echo $eua_complete; ?><br>

            </div>
            <div class="tab-pane" id="nacq">

            	<h4 class="sub-header">Acquisition <small>Organic versus Referred</small></h4>
            	<b>Organic</b>: <?php echo $total_organic; ?><br>
            	<b>Referred</b>: <?php echo $total_referred; ?><br>

            </div>
            <div class="tab-pane" id="nclass">

            	<h4 class="sub-header">Clients <small>Class</small></h4>
            	<b><font color="#C41F3B">Death Knight</font></b>: <?php echo $get_dk_total; ?><br>
				<b><font color="#FF7D0A">Druid</font></b>: <?php echo $get_druid_total; ?><br>
				<b><font color="#ABD473">Hunter</font></b>: <?php echo $get_hunter_total; ?><br>
				<b><font color="#69CCF0">Mage</font></b>: <?php echo $get_mage_total; ?><br>
				<b><font color="#67EBA7">Monk</font></b>: <?php echo $get_monk_total; ?><br>
				<b><font color="#F58CBA">Paladin</font></b>: <?php echo $get_paladin_total; ?><br>
				<b><font color="#000000">Priest</font></b>: <?php echo $get_priest_total; ?><br>
				<b><font color="#CBC51B">Rogue</font></b>: <?php echo $get_rogue_total; ?><br>
				<b><font color="#0070DE">Shaman</font></b>: <?php echo $get_shaman_total; ?><br>
				<b><font color="#9482C9">Warlock</font></b>: <?php echo $get_warlock_total; ?><br>
				<b><font color="#C79C6E">Warrior</font></b>: <?php echo $get_warrior_total; ?><br><br><br><br>

            </div>
            <div class="tab-pane" id="ntalents">

            	<h4 class="sub-header">Classes <small>Talent Breakdown</small></h4>
            	<b><font color="#C41F3B">Death Knight</font></b>: <br>
            	» Blood: <?php echo $dk_spec_blood; ?><br>
            	» Frost: <?php echo $dk_spec_frost; ?><br>
            	» Unholy: <?php echo $dk_spec_unholy; ?><br>
				<b><font color="#FF7D0A">Druid</font></b>: <br>
				» Balance: <?php echo $druid_spec_balance; ?><br>
				» Feral: <?php echo $druid_spec_feral; ?><br>
				» Guardian: <?php echo $druid_spec_guardian; ?><br>
				» Restoration: <?php echo $druid_spec_resto; ?><br>
				<b><font color="#ABD473">Hunter</font></b>: <br>
				» Beast Mastery: <?php echo $hunter_spec_bm; ?><br>
				» Marksmanship: <?php echo $hunter_spec_marks; ?><br>
				» Survival: <?php echo $hunter_spec_survival; ?><br>
				<b><font color="#69CCF0">Mage</font></b>: <br>
				» Arcane: <?php echo $mage_spec_arcane; ?><br>
				» Fire: <?php echo $mage_spec_fire; ?><br>
				» Frost: <?php echo $mage_spec_frost; ?><br>
				<b><font color="#67EBA7">Monk</font></b>: <br>
				» Brewmaster: <?php echo $monk_spec_brewmaster; ?><br>
				» Mistweaver: <?php echo $monk_spec_mistweaver; ?><br>
				» Windwalker: <?php echo $monk_spec_windwalker; ?><br>
				<b><font color="#F58CBA">Paladin</font></b>: <br>
				» Holy: <?php echo $paladin_spec_holy; ?><br>
				» Protection: <?php echo $paladin_spec_prot; ?><br>
				» Retribution: <?php echo $paladin_spec_ret; ?><br>
				<b><font color="#000000">Priest</font></b>: <br>
				» Discipline: <?php echo $priest_spec_disc; ?><br>
				» Holy: <?php echo $priest_spec_holy; ?><br>
				» Shadow: <?php echo $priest_spec_shadow; ?><br>
				<b><font color="#CBC51B">Rogue</font></b>: <br>
				» Assassination: <?php echo $rogue_spec_assassination; ?><br>
				» Combat: <?php echo $rogue_spec_combat; ?><br>
				» Subtlety: <?php echo $rogue_spec_subtlety; ?><br>
				<b><font color="#0070DE">Shaman</font></b>: <br>
				» Elemental: <?php echo $shaman_spec_ele; ?><br>
				» Enhancement: <?php echo $shaman_spec_enhance; ?><br>
				» Restoration: <?php echo $shaman_spec_resto; ?><br>
				<b><font color="#9482C9">Warlock</font></b>: <br>
				» Affliction: <?php echo $warlock_spec_affliction; ?><br>
				» Demonology: <?php echo $warlock_spec_demo; ?><br>
				» Destruction: <?php echo $warlock_spec_destro; ?><br>
				<b><font color="#C79C6E">Warrior</font></b>: <br>
				» Arms: <?php echo $warrior_spec_arms; ?><br>
				» Fury: <?php echo $warrior_spec_fury; ?><br>
				» Protection: <?php echo $warrior_spec_prot; ?><br><br><br><br>

            </div>
          </div>
    </div> 
</div>  