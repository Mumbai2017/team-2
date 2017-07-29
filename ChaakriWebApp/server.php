<?php
session_start();

$name="";
$kgs="";
$price="";
$id=0;
$edit_state=false;


//making connection to the database
$db=mysqli_connect('localhost','root','','crud');

//If save button is clicked
if (isset($_POST['save'])) {
		$name=$_POST['name'];
	 	$kgs=$_POST['kgs'];
	 	$price=$_POST['price'];

		$query="INSERT INTO info(name,kgs,price) VALUES('$name','$kgs','$price')";
		mysqli_query($db,$query);
		$_SESSION['msg']="Kgs Saved";
		header('location:index.php');
		//redirects to the index page after inserting the data in the database
		
}

//update records
if (isset($_POST['update'])) {
	$name=$_POST['name'];
	$kgs=$_POST['kgs'];
	$price=$_POST['price'];
	$id=$_POST['id'];
	echo $name;

	mysqli_query($db,"UPDATE info SET name='$name', kgs='$kgs',price='$price' WHERE id=$id ");
	$_SESSION['msg']="kgs Updated";
	header('location:index.php');

}

//delete records
if (isset($_GET['del'])) {
	$id=$_GET['del'];
	mysqli_query($db,"DELETE FROM info WHERE id=$id");
	$_SESSION['msg']="Kgs Deleted";
	header('location:index.php');
}


//retrieve records from the database
$results=mysqli_query($db,"SELECT * FROM info");
?>