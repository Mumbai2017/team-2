<?php 
header('Access-Control-Allow-Origin: *');
require_once('php_includes/db_conx.php');

$inventory_name = $_GET['inventory_name'];
$inventory_quantity = $_GET['inventory_quantity'];

if ($con->query($sql) === TRUE)
{
	$sql1 = "INSERT INTO inventory(product,quantity) values('".$inventory_name."',".$quantity.")";
}

$url="return.php?data=success";
Header("Location: $url");
?>	