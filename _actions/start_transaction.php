<?php 
include('../_sql/sqlcon.php');

$ident = $_POST['ident'];
$price = $_POST['price'];
$product = $_POST['product'];
$discount_code = $_POST['discountcode'];

mysql_query("INSERT INTO transactions (ident, price, product, discount_code) VALUES ('$ident', '$price', '$product', '$discount_code')");

header("Location: ../orderconfirm?t=$ident");

?>