<?php 	include_once("php_includes/db_conx.php");

if(isset($_GET["cust_phone"])){
	$m = $_GET["cust_phone"]
	$sql = "SELECT id  FROM users WHERE mobile_no=$m LIMIT 1";
  $query = mysqli_query($connection, $sql);
  $row = mysqli_fetch_row($query);
	$cust_id = $row[0];
	$quantity = preg_replace('#[^0-9]#', '', $_GET['quantity']);
	$inv_id = preg_replace('#[^0-9]#i', '', $_GET['inv_id']);
	$price = preg_replace('#[^0-9]#', '', $_GET['price']);
	$address = mysqli_escape_string($_GET['address']);

	if($quantity == "" || $cust_id == "" || $price == "" || $inv_id == ""){
		echo "missing_values";
    exit();
	}
	else {
    $sql = "INSERT INTO orders (cust_id, quantity, inv_id, orderTS, sakhi_id,  address, price);
		        VALUES($cust_id, $quantity, $inv_id, now(), $sakhi_id, $address, $price)";
    echo $sql;
    $query = mysqli_query($connection, $sql);
		if($query)
			echo "inserted";

	exit();
	}
}
?>
