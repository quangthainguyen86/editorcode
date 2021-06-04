<?php include 'inc/header.php'; ?>
<?php 
$project = new project();
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_signup'])){
	$sign_up = $project->sign_up($_POST);
}	 
?>
<section>
	<div class="container">
		<div><br></div>
		<?php 
		if (isset($sign_up)) {
			echo $sign_up;
		}
		?>
		<div><br></div>
		<div class="row">
			<div class="col-sm-6">
				<div class="position-center">
					<form action="" method="POST">
						<div class="form-group">
							<label for="exampleInputEmail1">Email</label>
							<input type="text" name="userEmail" class="form-control"  placeholder="email">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Password</label>
							<input type="password" name="userPassword" class="form-control" placeholder="password">
						</div>
						<button type="submit" name="submit_signup" class="btn btn-info">Sign up</button>
					</form>

				</div>
			</div>
		</div>
	</div>
</section>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/price-range.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>
<script src="js/editor.js"></script>
</body>
</html>
