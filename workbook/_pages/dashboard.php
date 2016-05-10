<?php include('../_sql/connect.php'); ?>
<?php
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
    function geoFact($var1, $var2) {
        if (($var1=="US")&&($var2)=="Horde") {
            echo "ush.png";
        }
        if (($var1=="US")&&($var2)=="Alliance") {
            echo "usa.png";
        }
        if (($var1=="EU")&&($var2)=="Horde") {
            echo "euh.png";
        }
        if (($var1=="EU")&&($var2)=="Alliance") {
            echo "eua.png";
        }
    }
?>

                <?php include('dashboard_runs.php'); ?>


                <!-- Live Updates Block -->
                <div class="block block-themed">
                    <!-- Live Updates Title -->
                    <div class="block-title">
                        
                        <h4>Recent Client Purchases</h4>
                    </div>
                    <!-- END Live Updates Title -->

                    <!-- Live Updates Content -->
                    <div class="block-content">
                        <!-- Timeline Container -->
                        <div class="timeline-container">
                            <!-- Timeline -->
                            <ul class="timeline">
                                <?php $get_recent_buyers = mysql_query("SELECT * FROM buyerlist WHERE run_status='incomplete' AND payment_status='paid' AND payment_method='USD' ORDER BY id DESC");
                                    while ($recent_buyers = mysql_fetch_array($get_recent_buyers)) { ?>
                                <li class="clearfix">
                                    <i class="timeline-meta-cat glyphicon-circle_plus" style="background-color:<?php echo classColor($recent_buyers['character_class']); ?>"></i>
                                    <span class="timeline-meta-time"><?php echo time_elapsed_string($recent_buyers['date_added']); ?></span>
                                    <img style="border:1px gray solid" src="img/<?php geoFact($recent_buyers['geography'], $recent_buyers['faction']); ?>" width="32px" height="32px" alt="Avatar" class="timeline-avatar">
                                    <span class="timeline-title"><?php if ($recent_buyers['buyer_name'] == "") { echo "<i>Unknown</i>"; } else { echo $recent_buyers['buyer_name']; } ?> just completed a purchased for $<?php echo $recent_buyers['payment_amount']; ?>.</span>
                                    <span class="timeline-text"><font color="<?php echo classColor($recent_buyers['character_class']); ?>"><?php echo $recent_buyers['character_name']; ?></font> - <?php echo $recent_buyers['geography']; ?>-<?php echo $recent_buyers['faction']; ?> <?php echo $recent_buyers['character_spec']; ?> <?php echo $recent_buyers['character_class']; ?></span>
                                </li>
                                    <?php } ?>
                            </ul>
                            <!-- END Timeline -->
                        </div>
                        <!-- END Timeline Container -->
                    </div>
                    <!-- END Live Updates Content -->
                </div>
                <!-- END Live Updates Block -->