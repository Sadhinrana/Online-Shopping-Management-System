<?php 
$realpath = realpath(dirname(__FILE__));
include_once($realpath."/../config/Database.php");
include_once($realpath."/../helpers/Format.php");

class Cart{
	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	
	public function addCart($quantity, $id){
		$quantity = $this->fm->validation($quantity);
		$quantity = mysqli_real_escape_string($this->db->link, $quantity);
		$productId = mysqli_real_escape_string($this->db->link, $id);
		$sId = session_id();
		
		$query = "SELECT * FROM product WHERE id='$productId'";
		$result = $this->db->select($query)->fetch_assoc();
		$productName = $result['productname']; 
		$price = $result['price']; 
		$image = $result['image']; 
		
		$chQuery = "SELECT * FROM cart WHERE productid='$productId' AND sid='$sId'";
		$chResult = $this->db->select($chQuery);
		
		if($chResult){
			$chResult = $chResult->fetch_assoc();
			$id = $chResult['id'];
			$uQuantity = $quantity + $chResult['quantity'];
			$nquery = "UPDATE cart SET quantity='$uQuantity' WHERE id='$id'";
			$value = $this->db->update($nquery);
			if($value){
				header("Location:cart.php");
			}else{
				header("Location:404.php");
			}
		}
		
		else{
			$query = "INSERT INTO cart(sid, productid, productname, price, quantity, image) VALUES('$sId', '$productId', '$productName', '$price', '$quantity', '$image')";
			$result = $this->db->insert($query);
			if($result){
				header("Location:cart.php");
			}else{
				header("Location:404.php");
			}
		}
	}
	
	public function getCartProduct(){
		$sid = session_id();
		$query = "SELECT * FROM cart WHERE sid='$sid' ORDER BY id DESC";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function updateCart($quantity, $id){
		$quantity = $this->fm->validation($quantity);
		$quantity = mysqli_real_escape_string($this->db->link, $quantity);
		$id = mysqli_real_escape_string($this->db->link, $id);
		
		$query = "UPDATE cart SET quantity='$quantity' WHERE id='$id'";
		$result = $this->db->update($query);
		if($result){
			header("Location:cart.php");
		}else{
			$msg = "<span class='error'>Quantity not updated !</span>";
			return $msg;
		}		
	}
	
	public function delCart($id){
		$query = "DELETE FROM cart WHERE id=$id";
		$result = $this->db->delete($query);
		if($result){
			$msg = "<span class='success'>Cart deleted      successfully.</span>";
			return $msg;
		}else{
			$msg = "<span class='error'>Cart not deleted !</span>";
			return $msg;
		}
	}
	
	public function checkCart(){
		$sid = session_id();
		$query = "SELECT * FROM cart WHERE sid='$sid'";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function delCt(){
		$sid = session_id();
		$query = "DELETE FROM cart WHERE sid='$sid'";
		$result = $this->db->delete($query);
	}
	
	public function insertOrder($id){
		$sid = session_id();
		$id = $this->fm->validation($id);
		$id = mysqli_real_escape_string($this->db->link, $id);
		$query = "SELECT * FROM cart WHERE sid='$sid'";
		$getProduct = $this->db->select($query);
		if($getProduct){
			while($result = $getProduct->fetch_assoc()){
				$productId = $result['productid'];
				$productName = $result['productname'];
				$quantity = $result['quantity'];
				$price = $result['price'] * $quantity;
				$image = $result['image'];
				$query = "INSERT INTO `order`(`cmrid`, `productid`, `productname`, `quantity`, `price`, `image`) VALUES('$id', '$productId', '$productName', '$quantity', '$price', '$image')";
				$affected_rows = $this->db->insert($query);
			}
		}
	}
	
	public function payableAmount($id){
		$query = "SELECT `price` FROM `order` WHERE `cmrid`='$id' AND `date`=now()";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function getOrderedProduct($id){
		$query = "SELECT * FROM `order` WHERE `cmrid`='$id' ORDER BY `date` DESC";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function checkOrder($id){
		$query = "SELECT * FROM `order` WHERE `cmrid`='$id'";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function getAllOrderedProduct(){
		$query = "SELECT * FROM `order` ORDER BY `date` DESC";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function productShift($id, $time, $price){
		$id = $this->fm->validation($id);
		$time = $this->fm->validation($time);
		$price = $this->fm->validation($price);
	
		$id = mysqli_real_escape_string($this->db->link, $id);
		$time = mysqli_real_escape_string($this->db->link, $time);
		$price = mysqli_real_escape_string($this->db->link, $price);
		
		$query = "UPDATE `order` SET `status`='1' WHERE `cmrid`='$id' AND `date`='$time' AND `price`='$price'";
		$result = $this->db->update($query);
		if($result){
			$msg = "<span class='success'>Data updated      successfully.</span>";
			return $msg;
		}else{
			$msg = "<span class='error'>Could not update data !</span>";
			return $msg;
		}
	}
	
	public function delprotid($id, $time, $price){
		$id = $this->fm->validation($id);
		$time = $this->fm->validation($time);
		$price = $this->fm->validation($price);
	
		$id = mysqli_real_escape_string($this->db->link, $id);
		$time = mysqli_real_escape_string($this->db->link, $time);
		$price = mysqli_real_escape_string($this->db->link, $price);
		
		$query = "DELETE FROM `order` WHERE `cmrid`='$id' AND `date`='$time' AND `price`='$price'";
		$result = $this->db->delete($query);
		if($result){
			$msg = "<span class='success'>Order deleted      successfully.</span>";
			return $msg;
		}else{
			$msg = "<span class='error'>Order not deleted !</span>";
			return $msg;
		}
	}
	
	public function confirm($id, $time, $price){
		$id = $this->fm->validation($id);
		$time = $this->fm->validation($time);
		$price = $this->fm->validation($price);
	
		$id = mysqli_real_escape_string($this->db->link, $id);
		$time = mysqli_real_escape_string($this->db->link, $time);
		$price = mysqli_real_escape_string($this->db->link, $price);
		
		$query = "UPDATE `order` SET `status`='2' WHERE `cmrid`='$id' AND `date`='$time' AND `price`='$price'";
		$result = $this->db->update($query);
	}
}
?>