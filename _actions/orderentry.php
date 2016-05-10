<?php 
include('../_sql/sqlcon.php');

$s_package = $_POST['sproduct'];
$s_price = $_POST['sprice'];
$s_dcode = $_POST['sdcode'];

$name = mysql_real_escape_string(htmlspecialchars((($_POST['name']))));
$email = mysql_real_escape_string(htmlspecialchars((($_POST['email']))));
$skypeu = mysql_real_escape_string(htmlspecialchars((($_POST['skypeu']))));
$skyped = mysql_real_escape_string(htmlspecialchars((($_POST['skyped']))));
$ccphone = mysql_real_escape_string(htmlspecialchars((($_POST['ccphone']))));
$phone = mysql_real_escape_string(htmlspecialchars((($_POST['phone']))));
$ppemail = mysql_real_escape_string(htmlspecialchars((($_POST['ppemail']))));
$amount = $_POST['amount'];

$charname = mysql_real_escape_string(htmlspecialchars(($_POST['charname'])));
$charname = str_replace(' ', '', $charname);
$class = $_POST['class'];
$spec = $_POST['spec'];
$spec2 = $_POST['spec2'];
$spec3 = $_POST['spec3'];
$region = $_POST['region'];
$faction = $_POST['faction'];
$realm = $_POST['realm'];

$timenow = strtotime("now");
$connect_key = strtoupper(substr(md5(rand()), 0, 15));

$rafcode = mysql_real_escape_string(htmlspecialchars((($_POST['rafcode']))));
$here_how = mysql_real_escape_string(htmlspecialchars((($_POST['here_how']))));

if (($s_package == "pilot")||($s_package == "selfplay")||($s_package == "realmfirst")) {

mysql_query("INSERT INTO buyerlist (
buyer_name,
character_name,
character_spec,
alternative_spec,
second_alternative_spec,
character_class,
character_realm,
geography,
faction,
phone,
skype_username,
skype_display_name,
email,
playtype,
payment_amount,
payment_method,
payment_status,
schedule_status,
run_status,
added_by,
date_added,
connectkey,
rafcode,
here_how
) VALUES (
'$name',
'$charname',
'$spec',
'$spec2',
'$spec3',
'$class',
'$realm',
'$region',
'$faction',
'$ccphone $phone',
'$skypeu',
'$skyped',
'$email',
'$s_package',
'$s_price',
'USD',
'paid',
'',
'incomplete',
'',
'$timenow',
'$connect_key',
'$s_dcode',
'$here_how')");

header("Location: ../thanks?tID=$connect_key");

}

if ($s_package == "greenfire") {

mysql_query("INSERT INTO gf_buyerlist (
buyer_name,
character_name,
character_spec,
alternative_spec,
second_alternative_spec,
character_class,
character_realm,
geography,
faction,
phone,
skype_username,
skype_display_name,
email,
playtype,
payment_amount,
payment_method,
payment_status,
schedule_status,
run_status,
added_by,
date_added,
connectkey,
rafcode,
here_how
) VALUES (
'$name',
'$charname',
'$spec',
'$spec2',
'$spec3',
'$class',
'$realm',
'$region',
'$faction',
'$ccphone $phone',
'$skypeu',
'$skyped',
'$email',
'$s_package',
'$s_price',
'USD',
'paid',
'',
'incomplete',
'',
'$timenow',
'$connect_key',
'$s_dcode',
'$here_how')");

header("Location: ../thankyou");

}

?>