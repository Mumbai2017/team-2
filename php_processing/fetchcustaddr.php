<?php
if(isset($_GET["mobile_no"])){
	// CONNECT TO THE DATABASE
	include_once("php_includes/db_conx.php");
	// GATHER THE POSTED DATA INTO LOCAL VARIABLES AND SANITIZE
  $id = $_GET['id'];
	$m = $_GET["mobile_no"];
	if($m == ""){
		echo "login_failed";
    exit();
	}
  else {
	// END FORM DATA ERROR HANDLING
	$sql = "SELECT address FROM customers WHERE id=$id;
  $query = mysqli_query($connection, $sql);
        $row = mysqli_fetch_row($query);
			echo $row;
		
	}
?>