<?php
include_once('php_includes/db_conx.php');

if(isset($_GET['order_id'])){
  $status = $_GET['status'];
  $order_id = $_GET['order_id'];



  if($status == "pickup"){
  $sql = "UPDATE `orders` SET `delivery_mode`= 0 WHERE id = $order_id";
  $query = mysqli_query($connection, $sql);
  if($query)
    echo "updated";
  }

  if($status == "delivery"){
  $sql = "UPDATE `orders` SET `delivery_mode`= 1 WHERE id = $order_id";
  $query = mysqli_query($connection, $sql);
  if($query)
    echo "updated";
 }

 if($status == "cancel"){
 $sql = "UPDATE `orders` SET `delivery_mode`= 0 WHERE id = $order_id";
 $query = mysqli_query($connection, $sql);
 }



}

?>
