<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/session.php');
include_once($filepath.'/../lib/database.php');
include_once($filepath.'/../helpers/format.php');
?>
<?php 
class project
{
	private $db;
	private $fm;
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function set_code($data)
	{    
		$html_code= $this->fm->validation($data['htmlCode']);
		$css_code= $this->fm->validation($data['cssCode']);
		$js_code= $this->fm->validation($data['jsCode']);

		$html_code = mysqli_real_escape_string($this->db->link, $data['htmlCode']);
		$css_code = mysqli_real_escape_string($this->db->link, $data['cssCode']);
		$js_code = mysqli_real_escape_string($this->db->link, $data['jsCode']);
		
		if(empty($html_code) && empty($css_code && empty($js_code))){
			$alert = "<span class='alert alert-danger'>Your project doent has data!</span>";
			return $alert;
		}else{
			Session::set('htmlCode',$html_code);
			Session::set('cssCode',$css_code);
			Session::set('jsCode',$js_code);
			header("Location:saveProject.php");
		}
	}
	public function set_code_login($data)
	{
		$html_code= $this->fm->validation($data['htmlCode']);
		$css_code= $this->fm->validation($data['cssCode']);
		$js_code= $this->fm->validation($data['jsCode']);

		$html_code = mysqli_real_escape_string($this->db->link, $data['htmlCode']);
		$css_code = mysqli_real_escape_string($this->db->link, $data['cssCode']);
		$js_code = mysqli_real_escape_string($this->db->link, $data['jsCode']);
		
		if(empty($html_code) && empty($css_code && empty($js_code))){
			$alert = "<span class='alert alert-danger'>Your project doent has data!</span>";
			return $alert;
		}else{
			Session::set('htmlCode',$html_code);
			Session::set('cssCode',$css_code);
			Session::set('jsCode',$js_code);
			header("Location:login.php");
		}
	}
	public function insert_project($data,$user_id)
	{    
		$project_name = $this->fm->validation($data['projectName']);
		$html_code = $this->fm->validation($data['htmlCode']);
		$css_code = $this->fm->validation($data['cssCode']);
		$js_code = $this->fm->validation($data['jsCode']);

		$project_name = mysqli_real_escape_string($this->db->link, $data['projectName']);
		$html_code = mysqli_real_escape_string($this->db->link, $data['htmlCode']);
		$css_code = mysqli_real_escape_string($this->db->link, $data['cssCode']);
		$js_code = mysqli_real_escape_string($this->db->link, $data['jsCode']);
		$userid = mysqli_real_escape_string($this->db->link, $user_id);
		
		if(empty($project_name) || empty($html_code) && empty($css_code) && empty($js_code)){
			$alert ="<span class='alert alert-danger'>Project name cannot be empty!</span>";
			return $alert;
		}else{
			$query = "INSERT INTO tbl_project(project_name,html_code,css_code,js_code,user_id) VALUES('$project_name','$html_code','$css_code','$js_code','$userid')";
			$result = $this->db->insert($query);
			Session::set('htmlCode',null);
			Session::set('cssCode',null);
			Session::set('jsCode',null);
			if($result){
				$alert ="<span class='alert alert-success'>Your Project has been saved Successfully!</span>";
				return $alert;
			}else {
				$alert = "Eror!!!";
				return $alert;
			}
		}

	}
	public function show_project($user_id)
	{
		$query = "SELECT * FROM tbl_project WHERE user_id = '$user_id' ORDER BY project_id DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function get_project_by_id($project_id)
	{
		$query = "SELECT * FROM tbl_project where project_id = '$project_id' LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
	public function update_project($data,$project_id){
		$html_code = $this->fm->validation($data['htmlCode']); 
		$css_code = $this->fm->validation($data['cssCode']); 
		$js_code = $this->fm->validation($data['jsCode']); 

		$html_code = mysqli_real_escape_string($this->db->link, $data['htmlCode']);
		$css_code = mysqli_real_escape_string($this->db->link, $data['cssCode']);
		$js_code = mysqli_real_escape_string($this->db->link, $data['jsCode']);
		$project_id = mysqli_real_escape_string($this->db->link, $project_id);

		
		if( empty($html_code) && empty($css_code) && empty($js_code)){
			$alert ="<span class='alert alert-danger'>Project name cannot be empty!</span>";
			return $alert;
		}else{
			$query = "UPDATE tbl_project SET
			html_code = '$html_code',
			css_code = '$css_code',
			js_code = '$js_code'
			WHERE project_id = '$project_id'";
		}		  
		$result = $this->db->update($query); 
		if($result){
			$alert ="<span class='alert alert-success'>Your Project has been updated Successfully!</span>";
			return $alert;
		}else {
			$alert = "Eror!!!";
			return $alert;
		}
	}
	public function del_project($id_pro){
		$query = "DELETE FROM tbl_project where project_id = '$id_pro' ";
		$result = $this->db->delete($query);
		if($result){
			$alert = "<span class='alert alert-success'>Project Deleted Successfully!</span>";
			return $alert;
		}else {
			$alert = "<span class='alert alert-danger'>Project Deleted Not Succes!</span>";
			return $alert;
		}
	}
	public function sign_up($data){
		$user_email = $this->fm->validation($data['userEmail']); 
		$user_password = $this->fm->validation(md5($data['userPassword'])); 

		$html_code = mysqli_real_escape_string($this->db->link, $data['userEmail']);
		$css_code = md5(mysqli_real_escape_string($this->db->link, $data['userPassword']));
		
		if( empty($user_email) || empty($user_password)){
			$alert ="<span class='alert alert-danger'>Email or password cannot be left blank!</span>";
			return $alert;
		}else{
			$checkemail = "SELECT * FROM tbl_user WHERE user_email = '$user_email' ";
			$result_checkemail = $this->db->select($checkemail);
			if ($result_checkemail) {
				$alert ="<span class='alert alert-danger'>Email user already exists!</span>";
				return $alert;
			}else {
				$query = "INSERT INTO tbl_user(user_email,user_password) VALUES('$user_email','$user_password')";
				$result = $this->db->insert($query); 
				if($result){
					$alert ="<span class='alert alert-success'>Registration is completed. you can login now!</span>";
					return $alert;
				}else {
					$alert = "Eror";
					return $alert;
				}

			}
		}
	}
}
?>