<?php 
include 'classes/user.php';
?>
<?php 
	$user = new user(); 
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$userEmail = $_POST['userEmail'];
		$userPassword = md5($_POST['userPassword']);
		$login_check = $user -> login_user($userEmail,$userPassword); 
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	<div class="login">
		<h2>Login</h2>
		<?php 
		if (isset($login_check)) {
			echo $login_check;
		}
		?>
		<form action="login.php" method="POST">
			<input type="text" name="userEmail" placeholder="user name"/>
			<input type="password" name="userPassword" placeholder="password"/>
			<button><a href=""></a>Login</button>
		</form>
	</div>
</body>
</html>