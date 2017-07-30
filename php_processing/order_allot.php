<?php
include_once('php_includes/db_conx.php');
include_once('../ChaakriWebApp/way2sms/way2sms-api.php');

if(isset($_GET['order_id'])){
  $status = $_GET['status'];
  $order_id = $_GET['order_id'];


  $sql = "SELECT customer_id  FROM orders WHERE id = $order_id  LIMIT 1";
  $query = mysqli_query($connection, $sql);
  $row = mysqli_fetch_row($query);
  $customer_id = $row[0];
  $sql = "SELECT mobile_no  FROM users WHERE id = $customer_id  LIMIT 1";
  echo $sql;
  $query = mysqli_query($connection, $sql);
  $row = mysqli_fetch_row($query);
  $phone_no = $row[0];
  echo $phone_no;


  if($status == "pickup"){
  $sql = "UPDATE `orders` SET `delivery_mode`= 1 WHERE id = $order_id";
  $query = mysqli_query($connection, $sql);
  $msg = "Your will have to pickup your order from this destination : ";
  if($query)
    sendWay2SMS('8097002807', 'P9243Q', $phone_no, $msg);
  }

  if($status == "delivery"){
  $sql = "UPDATE `orders` SET `delivery_mode`= 0 WHERE id = $order_id";
  $query = mysqli_query($connection, $sql);
  $msg = "Your order will soon be delivered on to your registered address.";
  if($query)
    sendWay2SMS('8097002807', 'P9243Q', $phone_no, $msg);
 }

 if($status == "cancel"){

   include_once("sakhiOrderAllotment.php");


   $sql = "UPDATE `orders` SET `sakhi_id`= 0 WHERE id = $order_id";
   $query = mysqli_query($connection, $sql);
 }



}

?>
