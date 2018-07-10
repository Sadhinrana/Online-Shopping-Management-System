<?php 
$realpath = realpath(dirname(__FILE__));
include_once($realpath."/../config/Database.php");
include_once($realpath."/../helpers/Format.php");
include($realpath."/../libs/Session.php");
Session::checkLogin();

class Adminlogin{
	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	
	public function adminLogin($adminUser, $adminPass){
		$adminUser = $this->fm->validation($adminUser);
		$adminPass = $this->fm->validation($adminPass);
		
		$adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
		$adminPass = mysqli_real_escape_string($this->db->link, $adminPass);
		
		if(empty($adminUser) || empty($adminPass)){
			$errorMsg = "Username and/or Password can't be empty !";
			return $errorMsg;
		}
		
		else{
			$query = "SELECT * FROM admin WHERE username = '$adminUser' AND password = '$adminPass'";
			$result = $this->db->select($query);
			if($result){
				$value = $result->fetch_assoc();
				Session::setSession("login", true);
				Session::setSession("id", $value['id']);
				Session::setSession("username", $value['username']);
				Session::setSession("name", $value['name']);
				header("Location:index.php");
			}else{
				$errorMsg = "Username and/or Password wrong !";
				return $errorMsg;
			}
		}
	}
}
?>