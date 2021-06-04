<?php
$filepath = realpath(dirname(__FILE__));
include ($filepath.'/../lib/session.php');
Session::checkLogin();
include_once($filepath.'/../lib/database.php');
include_once($filepath.'/../helpers/format.php');
?>
<?php 
class user
{
	private $db;
	// private $fm;
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function login_user($userEmail,$userPassword)
	{
		$userEmail = $this->fm->validation($userEmail);
		$userPassword = $this->fm->validation($userPassword);

		$userEmail = mysqli_real_escape_string($this->db->link, $userEmail);
		$userPassword = mysqli_real_escape_string($this->db->link, $userPassword);

		if(empty($userEmail) || empty($userPassword)){
			$alert = "User and Password are not empty!";
			return $alert;
		}else{
			$query = "SELECT * FROM tbl_user WHERE user_email = '$userEmail' AND user_password = '$userPassword' LIMIT 1 ";
			$result = $this->db->select($query);
			if($result == true && ((Session::get('htmlCode'))!= null) || ((Session::get('cssCode'))!= null) || ((Session::get('jsCode'))!= null)) {
				$value = $result->fetch_assoc();
				Session::set('userlogin', true); 
				Session::set('userId', $value['user_id']);
				Session::set('userEmail', $value['user_email']);
				header("Location:saveProject.php");
			}
			else if($result == true && ((Session::get('htmlCode')) == null) && ((Session::get('cssCode'))== null) && ((Session::get('jsCode'))== null)){

				$value = $result->fetch_assoc();
				Session::set('userlogin', true); 
				Session::set('userId', $value['user_id']);
				Session::set('userEmail', $value['user_email']);
				header("Location:index.php");
			}
			else {
				$alert = "User not match!";
				return $alert;
			}
		}
	}
}
?>