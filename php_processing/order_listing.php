<?php
include_once('php_includes/db_conx.php');
$sql = "SELECT *  FROM orders WHERE status = 0";
$query = mysqli_query($connection, $sql);
echo $sql;
//$check = mysqli_fetch_assoc($query);

?>
