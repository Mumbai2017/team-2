<?php
if(isset($_POST["mobile_no"])){
	// CONNECT TO THE DATABASE
	include_once("php_includes/db_conx.php");
	// GATHER THE POSTED DATA INTO LOCAL VARIABLES AND SANITIZE
  $password = $_GET['password'];
	$p = md5($_POST['password']);
	if($e == "" || $p == ""){
		echo "login_failed";
    exit();
	}
  else {
	// END FORM DATA ERROR HANDLING
	$sql = "SELECT id, password FROM users WHERE phone_no='$phone_no' LIMIT 1";
  $query = mysqli_query($connection, $sql);
        $row = mysqli_fetch_row($query);
		$db_id = $row[0];
    $db_pass_str = $row[1];
		if($p != $db_pass_str){
			echo "login_failed";
            exit();
		} else {
			// CREATE THEIR SESSIONS AND COOKIES
			$_SESSION['userid'] = $db_id;
			$_SESSION['password'] = $db_pass_str;
			//$sql = "UPDATE users SET ip='$ip', lastlogin=now() WHERE username='$db_username' LIMIT 1";
        //    $query = mysqli_query($connection, $sql);
			echo "success";
		  exit();
		}
	}
	exit();
}
?>
php
