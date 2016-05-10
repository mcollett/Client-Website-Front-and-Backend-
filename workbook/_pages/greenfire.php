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
setlocale(LC_MONETARY, 'en_US');
?>
                <!-- Default Tabs Block -->
                <div class="block block-themed">
                    <!-- Default Tabs Title -->
                    <div class="block-title">
                        <h4>Paid Clients <small>Tab for filtered results.</small></h4>
                    </div>
                    <!-- END Default Tabs Title -->

                    <!-- Default Tabs Content -->
                    <div class="block-content full">
                        <ul class="nav nav-tabs" data-toggle="tabs">
                            <li class="active"><a href="#all">All</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="all">

                                <!-- Dynamic Tables Section -->
<?php $num_buyers = mysql_num_rows(mysql_query("SELECT id FROM gf_buyerlist WHERE run_status='incomplete' AND payment_status='paid' AND payment_method='USD' ORDER BY id DESC")); ?>
<?php $get_total_earned = mysql_query("SELECT SUM(payment_amount) FROM gf_buyerlist WHERE run_status='incomplete' AND payment_status='paid' AND payment_method='USD'"); 
while ($get_earned = mysql_fetch_array($get_total_earned)) {
    $earned = $get_earned['SUM(payment_amount)'];
}
?>

 <h4 class="page-header">Total <small><?php echo $num_buyers; ?></small> | Revenue <small>$<?php echo number_format($earned, 2); ?> USD</small></h4>


                <div class="block-section">                 
                    <table id="example-datatables" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>From</th>
                                <th>Name</th>
                                <th>Wait</th>
                                <th>Character Name</th>
                                <th>Primary Talents</th>
                                <th>Realm</th>
                                <th>Payment (Type)</th>
                                <th>Contact</th>
                                <th class="span1 text-center"><i class="icon-bolt"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($num_buyers == 0) { echo "<tr><td colspan='10'>No buyers found.</td></td>"; } ?>
                            <?php 
                                $get_past_buyers = mysql_query("SELECT * FROM gf_buyerlist WHERE run_status='incomplete' AND payment_status='paid' AND payment_method='USD' ORDER BY id DESC");
                                while ($past_buyers = mysql_fetch_array($get_past_buyers)) {
                            ?>
                            <tr>
                                <td><?php echo $past_buyers['id']; ?></td>
                                <td><?php echo $past_buyers['geography']; ?>-<?php echo substr($past_buyers['faction'], 0, 1); ?></td>
                                <td><?php echo $past_buyers['buyer_name']; ?></td>
                                <td><?php echo time_elapsed_string($past_buyers['date_added']); ?></td>
                                <td><a href="http://<?php echo strtolower($past_buyers['geography']); ?>.battle.net/wow/en/character/<?php echo strtolower($past_buyers['character_realm']); ?>/<?php echo strtolower($past_buyers['character_name']); ?>/advanced" target="_blank"><img width="16px" height="16px" src="img/wow.png"></a> <font color="<?php classColor($past_buyers['character_class']); ?>"><?php echo htmlspecialchars_decode($past_buyers['character_name']); ?></font></td>
                                <td><?php echo $past_buyers['character_spec']; ?></td>
                                <td><?php echo $past_buyers['character_realm']; ?></td>
                                <td>$<?php echo $past_buyers['payment_amount']; ?> (<?php echo $past_buyers['payment_method']; ?>)</td>
                                <td><a href="skype:<?php echo $past_buyers['skype_username']; ?>?chat" data-toggle="tooltip" data-placement="left" title="<?php echo $past_buyers['skype_display_name']; ?> (<?php echo $past_buyers['skype_username']; ?>)"><i class="icon-skype"></i></a>
                                     <?php if ($past_buyers['email'] !== "") { ?><a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="<?php echo $past_buyers['email']; ?>"><i class="halfling-envelope"></i></a><?php } ?>
                                     <?php if ($past_buyers['phone'] !== "") { ?><a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="<?php echo $past_buyers['phone']; ?>"><i class="glyphicon-iphone"></i></a><?php } ?>
                                     <?php if ($past_buyers['here_how'] !== "") { ?> <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="<?php echo $past_buyers['here_how']; ?>"><i class="halfling-question-sign"></i></a><?php } ?>
                                 <?php if ($past_buyers['rafcode'] !== "") { ?> <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="<?php echo $past_buyers['rafcode']; ?>"><i class="glyphicon-disk_import"></i></a><?php } ?></td>
                                <td class="span1 text-center">
                                    <div class="btn-group">
                                        <a onclick="return confirm('Are you sure you want to mark this user as complete?');" href="_greenfire/gfcomplete.php?id=<?php echo $past_buyers['id']; ?>" data-toggle="tooltip" title="Mark Complete" class="btn btn-mini btn-success"><i class="glyphicon-ok_2"></i></a>
                                        <a onclick="return confirm('Are you sure you want to remove this user permanently?');" data-toggle="tooltip" title="Delete" class="btn btn-mini btn-danger" href="_greenfire/delete_client.php?id=<?php echo $past_buyers['id']; ?>"><i class="glyphicon-remove_2"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- END Dynamic Tables Section -->

                            </div>

                        </div>
                    </div>
                    <!-- END Default Tabs Content -->
                </div>
                <!-- END Default Tabs Block -->