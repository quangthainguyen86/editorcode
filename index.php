<?php include 'inc/header.php';?>
<?php 
	$project = new project();
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
		$set_code = $project->set_code($_POST);
	}	 
?>
<?php 
	$project = new project();
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_to_login'])){
		$set_code_login = $project->set_code_login($_POST);
	}	 
?>
<section>
	<div class="container">
		<div><br></div>
		<?php 
		if (isset($set_code)) {
			echo $set_code;
		}
		?>
		<?php 
		if (isset($set_code_login)) {
			echo $set_code_login;
		}
		?>
		<div><br></div>
		<div class="row">
			<div class="col-sm-6">
				<div class="code-area">
					<form action="" method="POST">
						<textarea id="htmlCode" name="htmlCode" placeholder="HTML Code" 
						oninput="showPreview()"></textarea>
						<textarea id="cssCode" name="cssCode" placeholder="CSS Code" 
						oninput="showPreview()"></textarea>
						<textarea id="jsCode" name="jsCode" placeholder="JavaScript Code" 
						oninput="showPreview()"></textarea>
						<div><br></div>
						<?php 
						if($user_id){
							?>
							<button type="submit" name="submit" class="btn btn-warning">Save Project</button>
							<?php 
						}else {
							?>
							<button type="submit" name="submit_to_login" class="btn btn-warning">Login to save project</button>
							<?php 
						}
						?>
					</form>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="preview-area">
					<iframe id="preview-window"></iframe>
				</div>
			</div>
		</div>
	</div>
</section>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/price-range.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>
<script src="js/editor.js"></script>
</body>
</html>