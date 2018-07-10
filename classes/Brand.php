<?php 
$realpath = realpath(dirname(__FILE__));
include_once($realpath."/../config/Database.php");
include_once($realpath."/../helpers/Format.php");

class Brand{
	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	
	public function addBrand($brand){
		$brand = $this->fm->validation($brand);
		$brand = mysqli_real_escape_string($this->db->link, $brand);
		
		if(empty($brand)){
			$msg = "<span class='error'>Brand can't be empty !</span>";
			return $msg;
		}else{
			$query = "INSERT INTO brand(brandname) VALUES('$brand')";
			$result = $this->db->insert($query);
			if($result){
				$msg = "<span class='success'>Brand inserted successfully.</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Brand insertion failed !</span>";
				return $msg;
			}
		}
	}
	
	public function getAllBrand(){
		$query = "SELECT * FROM brand";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function getBrandById($id){
		$query = "SELECT * FROM brand WHERE id=$id";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function updatebrand($brand, $id){
		$brand = $this->fm->validation($brand);
		$brand = mysqli_real_escape_string($this->db->link, $brand);
		$id = mysqli_real_escape_string($this->db->link, $id);
		
		if(empty($brand)){
			$msg = "<span class='error'>Brand can't be empty !</span>";
			return $msg;
		}else{
			$query = "UPDATE brand SET brandname='$brand' WHERE id='$id'";
			$result = $this->db->update($query);
			if($result){
				$msg = "<span class='success'>Brand updated        successfully.</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Brand not updated !</span>";
				return $msg;
			}
		}
	}
	
	public function deleteBrand($id){
		$query = "DELETE FROM brand WHERE id=$id";
		$result = $this->db->delete($query);
		if($result){
			$msg = "<span class='success'>Brand deleted      successfully.</span>";
			return $msg;
		}else{
			$msg = "<span class='error'>Brand not deleted !</span>";
			return $msg;
		}
	}
}
?>