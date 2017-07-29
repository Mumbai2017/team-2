<?php
include_once("php_includes/db_conx.php");

if(isset($_GET["sakhi_phone"])){
	// CONNECT TO THE DATABASE
	// GATHER THE GETED DATA INTO LOCAL VARIABLES
	$sql = "SELECT id  FROM users WHERE mobile_no=$m LIMIT 1";
  $query = mysqli_query($connection, $sql);
        $row = mysqli_fetch_row($query);
		$sakhi_id = $row[0];

	$quantity = preg_replace('#[^0-9]#', '', $_GET['quantity']);
	$sakhi_id = $_GET['sakhi_id'];
	$inv_id = preg_replace('#[^0-9]#i', '', $_GET['inv_id']);
	$price = preg_replace('#[^0-9]#', '', $_GET['price']);
	$address = mysqli_escape_string($_GET['address']);

	if($quantity == "" || $sakhi_id == "" || $price == "" || $inv_id == ""){
		echo "missing_values";
    exit();
	}
	else {

    $sql = "INSERT INTO ngo_orders (sakhi_id, quantity, inventory_id, time_date, address, price);
		        VALUES($sakhi_id,$quantity, $inv_id, now(), $address, $price)";
    echo $sql;
    $query = mysqli_query($connection, $sql);


	exit();
}
}
?>
