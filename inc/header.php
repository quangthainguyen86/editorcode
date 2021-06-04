<?php 
include 'lib/session.php';
Session::init();
include 'lib/database.php';
include 'helpers/format.php';
spl_autoload_register(function($class){
	include_once "classes/".$class.".php";
});
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Code Editor Live</title>
	<link href="css/main.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/price-range.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link rel="shortcut icon" href="images/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<header id="header">
	<div class="header-middle">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="logo pull-left">
						<a href="index.php" class="navbar-brand"><i class="fa fa-pencil"></i>code<b>Editor</b></a>
					</div>
				</div>
				<div class="col-sm-8">
					<div class="shop-menu pull-right">
						<ul class="nav navbar-nav">
							<?php 
							$user_id = Session::get('userId');
							$user_email = Session::get('userEmail');
							if(isset($_GET['user_id_logout'])){
								Session::destroy();
								header("Location:index.php");
							}
							?> 
							<?php 
							if ($user_id == NULL) {
								?>
								<li><a href="signup.php"><i class="fa fa-user"></i>Sign up</a></li>
								<li><a href="login.php"><i class="fa fa-lock"></i>Login</a></li>
								<?php
							}
							else {
								?> 
								<li><a href="project.php">Manage Projects</a></li>
								<li>
									<a href="#"><i class="fa fa-user"></i><?php echo $user_email?> &#9662;</a>
									<ul class="dropdown">
										<li><a href="project.php">Projects</a></li>
										<!-- <li><a href="profile.php">Profile</a></li> -->
										<li><a href="?user_id_logout=<?php echo $user_id ?>">Logout</a></li>
									</ul>
								</li>
								<?php 
							}
							?>
						</div>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
</header>