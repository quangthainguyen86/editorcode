<?php include 'inc/header.php';?>
<?php 
$htmlCode = Session::get('htmlCode');
$cssCode = Session::get('cssCode');
$jsCode = Session::get('jsCode');
?>
<?php 
$project = new project();
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_complete'])){
	$insert_project = $project->insert_project($_POST,$user_id);
}
?>
<section>
	<div class="container">
		<div><br></div>
		<?php 
		if (isset($insert_project)){
			echo $insert_project;
		}
		?>
		<div><br></div>
		<div class="row">
			<div class="code-area">
				<form action="" method="POST">
					<div class="form-group" >
						<label for="exampleInputEmail1">Project Name</label>
						<input type="text" name="projectName" class="form-control">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">HTML Code</label>
						<textarea id="htmlCode" name="htmlCode" placeholder="HTML Code" 
						oninput="showPreview()"><?php echo $htmlCode ?></textarea>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">CSS Code</label>
						<textarea id="cssCode" name="cssCode" placeholder="CSS Code" 
						oninput="showPreview()"><?php echo $cssCode ?></textarea>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">JS Code</label>
						<textarea id="jsCode" name="jsCode" placeholder="JavaScript Code" 
						oninput="showPreview()"><?php echo $jsCode ?></textarea>
					</div>
					<button type="submit" name="submit_complete" class="btn btn-success">Complete</button>
				</form>
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