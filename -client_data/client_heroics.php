							<div class="row">
								<div class="col-md-12">
									<h2>Heroic Check</h2>
								</div>
							</div>
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

$hcheck = $_SESSION['transID'];

?>
<!DOCTYPE html>
<html>
<head>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/json2/20121008/json2.min.js"></script>
</head>
<body>
<div class="alert alert-warning">
	<strong>Note:</strong> If you did not provide us with an accurate character name and realm name. This report will return innacurate data.
</div><!-- // .alert -->

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Status</th>
                <th>Missing</th>
            </tr>
        </thead>
        <tbody>
            <?php $get_past_buyers = mysql_query("SELECT * FROM buyerlist WHERE connectkey='$hcheck' AND payment_status='paid' AND payment_method='USD' ORDER BY date_added DESC");
            while ($clients = mysql_fetch_array($get_past_buyers)) { 

                $client_region = strtolower($clients['geography']);
                $client_realm = strtolower($clients['character_realm']);
                $client_name = strtolower($clients['character_name']);

                ?> 

            <tr>
                <td class="character-name" data-region="<?php echo $client_region; ?>" data-server="<?php echo $client_realm; ?>" data-name="<?php echo $client_name; ?>"><font color="<?php classColor($clients['character_class']); ?>"><?php echo ucfirst($clients['character_name']); ?></font> <font size="-3">(<?php echo ucfirst($clients['character_spec']); ?> <?php echo ucfirst($clients['character_class']); ?>)</font></td>
                <td class="character-is-done"><img src="-client_data/loading08.gif"></td>
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
 
            var $missing_instances = $.get('-client_data/client_json.php', {region: region, server: server, character: character});
            $missing_instances.success(function(result) {
                var missing = JSON.parse(result);
                if($.isEmptyObject(missing)) {
                    $isDone.html('<i style="color:green;" class="icon icon-thumbs-o-up"></i>');
                    $missingDetails.html('<font color="green">All Completed</font>');
                } else {
                    $isDone.html('<i style="color:red;" class="icon icon-thumbs-o-down"></i>');
                    $missingDetails.html(missing.join('<br />'));
                }
            });
        });
    });
    </script>
</body>
</html>