<?php 
$realpath = realpath(dirname(__FILE__));
include_once($realpath."/../config/Database.php");
include_once($realpath."/../helpers/Format.php");

class Category{
	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	
	public function addcategory($category){
		$category = $this->fm->validation($category);
		$category = mysqli_real_escape_string($this->db->link, $category);
		
		if(empty($category)){
			$msg = "<span class='error'>Category can't be empty !</span>";
			return $msg;
		}else{
			$query = "INSERT INTO category(catname) VALUES('$category')";
			$result = $this->db->insert($query);
			if($result){
				$msg = "<span class='success'>Category inserted successfully.</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Category insertion failed !</span>";
				return $msg;
			}
		}
	}
	
	public function getAllCat(){
		$query = "SELECT * FROM category";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function getCatById($id){
		$query = "SELECT * FROM category WHERE id=$id";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function updateCategory($category, $id){
		$category = $this->fm->validation($category);
		$category = mysqli_real_escape_string($this->db->link, $category);
		$id = mysqli_real_escape_string($this->db->link, $id);
		
		if(empty($category)){
			$msg = "<span class='error'>Category can't be empty !</span>";
			return $msg;
		}else{
			$query = "UPDATE category SET catname='$category' WHERE id='$id'";
			$result = $this->db->update($query);
			if($result){
				$msg = "<span class='success'>Category updated        successfully.</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Category not updated !</span>";
				return $msg;
			}
		}
	}
	
	public function deleteCategory($id){
		$query = "DELETE FROM category WHERE id=$id";
		$result = $this->db->delete($query);
		if($result){
			$msg = "<span class='success'>Category deleted      successfully.</span>";
			return $msg;
		}else{
			$msg = "<span class='error'>Category not deleted !</span>";
			return $msg;
		}
	}
}
?>