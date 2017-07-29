<?php
$connection=mysqli_connect("localhost","root","","social_network");
// check for connection
if (mysqli_connect_errno())
    {
	echo mysqli_connect_error();
    exit();
	}

?>