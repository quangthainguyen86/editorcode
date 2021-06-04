<?php include 'inc/header.php' ?>
<?php 
  $proz = new project();
  if(!isset($_GET['projectId']) || $_GET['projectId'] == NULL){
    // echo "<script> window.location = 'project.php' </script>";
  }else {
    $id_pro = $_GET['projectId']; 
    $del_project = $proz ->del_project($id_pro); 
  }
?>
<section>
  <div class="container">
    <div><br></div>
    <?php 
      if (isset($del_project)) {
        echo $del_project;
      }
       ?>
    <div><br></div>
    <div class="row">
     <div class="table-responsive">

      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Id</th>
            <th>Name Project</th>
            <th style="width:30px;">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $proj= new project();
          $show_project = $proj->show_project($user_id);
          if ($show_project) {
           while ($result = $show_project->fetch_assoc()) {
            ?>
            <tr>
              <td><?php echo $result['project_id']?></td>
              <td><?php echo $result ['project_name'] ?></td>
              <td>
                <a href="editProject.php?projectId=<?php echo $result['project_id']?>" class="active styling-edit"><i class="fa fa-pencil-square-o text-success text-active"></i></a>
                <a href="?projectId=<?php echo $result['project_id']?>" onclick="return confirm('Are you sure delete this project?')"  class="active styling-edit">
                  <i class="fa fa-times text-danger text"></i></a>
                </td>
              </tr>
              <?php 
            }
          }
          ?>
        </tbody>
      </table>
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
