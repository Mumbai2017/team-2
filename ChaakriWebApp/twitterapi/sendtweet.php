<?php
	include_once("../../php_processing/php_includes/db_conx.php");
	
	$consumer_key='uH0V118EYgxhY7tM78rfhlMBf';
	$consumer_secret='O9O3bq5qBCVNAgXuK6ekf08Zqt9Q4BHdVykf1uedJLJGdi0iU5';
	$access_token='887190134747156480-eWcpBjYp9sZYNUa6Z3xbA6SNr8MrrsN';
	$access_token_secret='vgF7O2C7AOPvlN89t8Ct3IZV31SqjFRyRiTlBiOABCWc5';

	//Include Library
	require "autoload.php";
	use Abraham\TwitterOAuth\TwitterOauth;

	//Connect to API
	$connection1= new TwitterOauth($consumer_key,$consumer_secret,$access_token,$access_token_secret);
	$content=$connection1->get("account/verify_credentials");

if (isset($_POST['tweet'])) {
	$message=$_POST['message'];
	$new_status=$connection1->post("statuses/update",["status"=>$message]);
}


if (isset($_POST['appreciate'])) {

	$new_status=$connection1->post("statuses/update",["status"=>'appreciation']);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>


    <header>
        <!--Navbar-->
        <nav class="navbar navbar-toggleable-md navbar-light">
            <div class="container">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="#" style="color: white;">
                    <strong>Navbar</strong>
                </a>
                <div class="collapse navbar-collapse" id="navbarNav1">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" style="color: white;">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: white;">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: white;">Pricing</a>
                        </li>
                        <li class="nav-item dropdown btn-group">
                            <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">Dropdown</a>
                            <div class="dropdown-menu dropdown" aria-labelledby="dropdownMenu1">
                                <a class="dropdown-item">Action</a>
                                <a class="dropdown-item">Another action</a>
                                <a class="dropdown-item">Something else here</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--/.Navbar-->
    </header>

<!-- Main -->
<main class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Send a Tweet!</h1>
                <hr>
            </div>        
        </div>


        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
            <form action="sendtweet.php" method="post">
                <!--Naked Form-->
                        <div class="card-block">

                            <!--Header-->
                            <div class="text-xs-center">
                                <h3>Go Ahead Tweet:</h3>
                                <hr class="mt-2 mb-2">
                            </div>

                            <form action="sendtweet.php" method="">
							<div class="md-form">
                                <i class="fa fa-pencil-square-o prefix"></i>
				                <textarea type="text" id="form76" class="md-textarea" name="message"></textarea>
				                <label for="form76">
								<?php
									
								?>
								</label>
				            </div>

                            <div class="md-form">
                                <button class="btn btn-primary" type="submit" name="tweet">Tweet</button>
                                <!--<button class="btn btn-default" type="submit" name="appreciate">Appreciate
                                </button>-->
                            </div>

                        </form>
                        </div>
            </form>
            </div>
        </div>

<!-- This div tag creates vertical space <div style="height:2000px;"></div> -->

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/tether.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>
</body>

</html>