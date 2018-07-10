<?php 
$realpath = realpath(dirname(__FILE__));
include_once($realpath."/../config/Database.php");
include_once($realpath."/../helpers/Format.php");

class Customer{
	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	
	public function customerReg($data){
		$name = $this->fm->validation($data['name']);
		$address = $this->fm->validation($data['address']);
		$city = $this->fm->validation($data['city']);
		$country = $this->fm->validation($data['country']);
		$zipcode = $this->fm->validation($data['zip-code']);
		$phone = $this->fm->validation($data['phone']);
		$email = $this->fm->validation($data['e-mail']);
		$pass = $this->fm->validation($data['pass']);
		
		$name = mysqli_real_escape_string($this->db->link, $data['name']);
		$address = mysqli_real_escape_string($this->db->link, $data['address']);
		$city = mysqli_real_escape_string($this->db->link, $data['city']);
		$country = mysqli_real_escape_string($this->db->link, $data['country']);
		$zipcode = mysqli_real_escape_string($this->db->link, $data['zip-code']);
		$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
		$email = mysqli_real_escape_string($this->db->link, $data['e-mail']);
		$pass = mysqli_real_escape_string($this->db->link, md5($data['pass']));
		
		if($name == "" || $address == "" || $city == "" || $zipcode == "" || $phone == "" || $email == "" || $pass == ""){
			$msg = "<span class='error'>Fields can't be empty !</span>";
			return $msg;
		}
		
		$mailCheck = "SELECT * FROM customer WHERE email='$email' LIMIT 1";
		$result = $this->db->select($mailCheck);
		if($result){
			$msg = "<span class='error'>Email already exists !</span>";
			return $msg;
		}else{
			$query = "INSERT INTO customer(name, address, city, country, zipcode, phone, email, password) VALUES('$name', '$address', '$city', '$country', '$zipcode', '$phone', '$email', '$pass')";
			$result = $this->db->insert($query);
			if($result){
				$msg = "<span class='success'>Data inserted successfully.</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Data insertion failed !</span>";
				return $msg;
			}
		}
	}
	
	public function customerLogin($data){
		$email = $this->fm->validation($data['username']);		
		$password = $this->fm->validation($data['password']);
		
		$email = mysqli_real_escape_string($this->db->link, $data['username']);
		$password = mysqli_real_escape_string($this->db->link, md5($data['password']));
		
		if($email == "" || $password == ""){
			$msg = "<span class='error'>Fields can't be empty !</span>";
			return $msg;
		}
		
		$query = "SELECT * FROM customer WHERE email='$email' AND password='$password'";
		$result = $this->db->select($query);
		if($result){
			$value = $result->fetch_assoc();
			Session::setSession("custLogin", true);
			Session::setSession("Id", $value['id']);
			Session::setSession("name", $value['name']);
			header("Location:order.php");
		}else{
			$msg = "<span class='error'>Email and/or password wrong !</span>";
			return $msg;
		}
	}
	
	public function getCmrData($id){
		$query = "SELECT * FROM customer WHERE id='$id'";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function customerUpdate($data, $id){
		$id = $this->fm->validation($id);
		$name = $this->fm->validation($data['name']);
		$address = $this->fm->validation($data['address']);
		$city = $this->fm->validation($data['city']);
		$country = $this->fm->validation($data['country']);
		$zipcode = $this->fm->validation($data['zipcode']);
		$phone = $this->fm->validation($data['phone']);
		$email = $this->fm->validation($data['email']);
		
		$id = mysqli_real_escape_string($this->db->link, $id);
		$name = mysqli_real_escape_string($this->db->link, $data['name']);
		$address = mysqli_real_escape_string($this->db->link, $data['address']);
		$city = mysqli_real_escape_string($this->db->link, $data['city']);
		$country = mysqli_real_escape_string($this->db->link, $data['country']);
		$zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
		$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
		$email = mysqli_real_escape_string($this->db->link, $data['email']);
		
		if($name == "" || $address == "" || $city == "" || $zipcode == "" || $phone == "" || $email == ""){
			$msg = "<span class='error'>Fields can't be empty !</span>";
			return $msg;
		}else{
			$query = "UPDATE customer SET name='$name', address='$address', city='$city', country='$country', zipcode='$zipcode', phone='$phone', email='$email' WHERE id='$id'";
			$result = $this->db->update($query);
			if($result){
				$msg = "<span class='success'>Customer data updated    successfully.</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Customer not updated !</span>";
				return $msg;
			}
		}
	}
}
?>