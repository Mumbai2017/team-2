<?php 	include_once("php_includes/db_conx.php");

if(isset($_GET["cust_id"])){
	// CONNECT TO THE DATABASE
	// GATHER THE GETED DATA INTO LOCAL VARIABLES
	$quantity = preg_replace('#[^0-9]#', '', $_GET['quantity']);
	$cust_id = $_GET['cust_id'];
	$inv_id = preg_replace('#[^0-9]#i', '', $_GET['inv_id']);
	$price = preg_replace('#[^0-9]#', '', $_GET['price']);
	$address = mysqli_escape_string($_GET['address']);

	if($quantity == "" || $cust_id == "" || $price == "" || $inv_id == ""){
		echo "missing_values";
    exit();
	}
	else {

		$name= $_GET['name'];
    $sql = "INSERT INTO orders (mobile_no, password, user_type, registration_date)
		        VALUES($mobile_no,'$p_hash',$user_type,now())";
    echo $sql;
    $query = mysqli_query($connection, $sql);
		$uid = mysqli_insert_id($connection);

    if($user_type == 1 ){
      $availablity = 1;
  		$sql = "INSERT INTO sakhis (id, name, availablity) VALUES ($uid,'$name',$availablity)";
      echo $sql;
      $query = mysqli_query($connection, $sql);
  	}
    if($user_type == 2 ){

      $lat = $_GET['lat'];
      $lng = $_GET['lng'];
  		$sql = "INSERT INTO customers (id, name, lat, lng) VALUES ($uid,'$name',$lat, $lng)";
      echo $sql;
      $query = mysqli_query($connection, $sql);
  	}
	exit();
}
}
?>
