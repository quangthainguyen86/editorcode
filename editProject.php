<?php include 'inc/header.php'; ?>
<?php 
	$pro = new project();
	if(!isset($_GET['projectId']) || $_GET['projectId'] == NULL){
		echo "<script> window.location = 'project.php' </script>";
	}else {
		$project_id = $_GET['projectId']; 
	} 
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$update_project = $pro-> update_project($_POST,$project_id); 
	}
?>
<section>
	<div class="container">
		<div><br></div>
		<?php 
		if(isset($update_project)){
			echo $update_project;
		}
		?>
		<div><br></div>
		<div class="row">
			<div class="col-sm-6">
				<?php 
				$get_project_by_id = $pro->get_project_by_id($project_id);
				if ($get_project_by_id) {
					while ($result_project = $get_project_by_id->fetch_assoc()) {
						?>
						<div class="code-area">
							<form action="" method="POST">
								<textarea id="htmlCode" name="htmlCode" placeholder="HTML Code" 
								oninput="showPreview()"><?php echo $result_project['html_code']?></textarea>
								<textarea id="cssCode" name="cssCode" placeholder="CSS Code" 
								oninput="showPreview()"><?php echo $result_project['css_code']?></textarea>
								<textarea id="jsCode" name="jsCode" placeholder="JavaScript Code" 
								oninput="showPreview()"><?php echo $result_project['js_code']?></textarea>
								<div><br></div>
								<button type="submit" name="submit" class="btn btn-warning">Update code</button>
							</form>
						</div>
						<?php 
					}
				}
				?>
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
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/price-range.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>
<script src="js/editor.js"></script>
</body>
</html>
