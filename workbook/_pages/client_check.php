<?php include('../_sql/connect.php'); 

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
<!DOCTYPE html>
<html>
<head>
    <style>
    td {
        border: 1px solid black;
    }
    </style>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/json2/20121008/json2.min.js"></script>
</head>
<body>
    <table class="table table-striped">
        <thead>
            <tr>
                <th width="10%">GeoFac</th>
                <th width="10px" align="center"><i class="icon-asterisk"></i></th>
                <th width="10px" align="center"><i class="icon-asterisk"></i></th>
                <th>Name</th>
                <th>Status</th>
                <th>Missing</th>
            </tr>
        </thead>
        <tbody>
            <?php $get_past_buyers = mysql_query("SELECT * FROM buyerlist WHERE run_status='incomplete' AND payment_status='paid' AND payment_method='USD' ORDER BY date_added DESC");
            while ($clients = mysql_fetch_array($get_past_buyers)) { 

                $client_region = strtolower($clients['geography']);
                $client_realm = strtolower($clients['character_realm']);
                $client_name = strtolower($clients['character_name']);

                ?> 

            <tr>
                <td><?php echo $clients['geography']; ?>-<?php echo $clients['faction']; ?> <font size="-3">(<?php echo $clients['character_realm']; ?>)</font></td>  
                <td align="center"><a href="http://<?php echo strtolower($clients['geography']); ?>.battle.net/wow/en/character/<?php echo strtolower($clients['character_realm']); ?>/<?php echo strtolower($clients['character_name']); ?>/advanced" target="_blank"><img width="16px" height="16px" src="img/wow.png"></a></td>
                <td align="center"><a href="skype:<?php echo $clients['skype_username']; ?>?chat" data-toggle="tooltip" data-placement="top" title="<?php echo $clients['skype_display_name']; ?> (<?php echo $clients['skype_username']; ?>)"><i class="icon-skype"></i></a></td>
                <td class="character-name" data-region="<?php echo $client_region; ?>" data-server="<?php echo $client_realm; ?>" data-name="<?php echo $client_name; ?>"><font color="<?php classColor($clients['character_class']); ?>"><?php echo ucfirst($clients['character_name']); ?></font> <font size="-3">(<?php echo ucfirst($clients['character_spec']); ?> <?php echo ucfirst($clients['character_class']); ?>)</font></td>
                <td class="character-is-done"><span class="loader-08"></td>
                <td class="character-missing-instances" style="color:red;"><span class="loader-08"></td>
            </tr>

            <?php } ?>
        </tbody>
    </table>
 
    <script type="text/javascript">
    $(function() {
 
        $('.character-name').each(function() {
            var $customer = $(this);
            var $isDone = $(this).siblings('.character-is-done');
            var $missingDetails = $(this).siblings('.character-missing-instances');
 
            var region = $customer.data('region');
            var server = $customer.data('server');
            var character = $customer.data('name');
 
            var $missing_instances = $.get('_pages/client_json.php', {region: region, server: server, character: character});
            $missing_instances.success(function(result) {
                var missing = JSON.parse(result);
                if($.isEmptyObject(missing)) {
                    $isDone.html('<i style="color:green;" class="glyphicon-ok_2"></i>');
                    $missingDetails.html('<font color="green">All Completed</font>');
                } else {
                    $isDone.html('<i style="color:red;" class="glyphicon-circle_exclamation_mark"></i>');
                    $missingDetails.html(missing.join('<br />'));
                }
            });
        });
    });
    </script>
</body>
</html>