<?php 
$realpath = realpath(dirname(__FILE__));
include_once($realpath."/../config/Database.php");
include_once($realpath."/../helpers/Format.php");

class Product{
	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	
	public function addProduct($data, $file){
		$productName = $this->fm->validation($data['productname']);
		$productCat = $this->fm->validation($data['catid']);
		$productBrand = $this->fm->validation($data['brandid']);
		$productBody = $this->fm->validation($data['body']);
		$productPrice = $this->fm->validation($data['price']);
		$productType = $this->fm->validation($data['type']);
		
		$productName = mysqli_real_escape_string($this->db->link, $data['productname']);
		$productCat = mysqli_real_escape_string($this->db->link, $data['catid']);
		$productBrand = mysqli_real_escape_string($this->db->link, $data['brandid']);
		$productBody = mysqli_real_escape_string($this->db->link, $data['body']);
		$productPrice = mysqli_real_escape_string($this->db->link, $data['price']);
		$productType = mysqli_real_escape_string($this->db->link, $data['type']);
		
		$permitted = array('jpg', 'jpeg', 'png', 'gif');
		$file_name = $file['image']['name'];
		$file_size = $file['image']['size'];
		$file_temp = $file['image']['tmp_name'];
		
		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		$uploaded_image = "uploads/".$unique_image;
		
		if($productName == "" || $productCat == "" || $productBrand == "" || $productBody == "" || $productPrice == "" || $file_name == "" || $productType == ""){
			$msg = "<span class='error'>Fields can't be empty !</span>";
			return $msg;
		}
		
		else if($file_size>1048567){
			$msg = "<span class='error'>Image size should be less than 1 MB !</span>";
			return $msg; 
		}
		
		else if(in_array($file_ext, $permitted) === false){
			$msg = "<span class='error'>You can only upload:-".implode(', ', $permitted)."</span>";
			return $msg; 
		}
		
		else{
			move_uploaded_file($file_temp, $uploaded_image);
			$query = "INSERT INTO product(productname, catid, brandid, body, price, image, type) VALUES('$productName', '$productCat', '$productBrand', '$productBody', '$productPrice', '$uploaded_image', '$productType')";
			$result = $this->db->insert($query);
			if($result){
				$msg = "<span class='success'>Product inserted successfully.</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Product insertion failed !</span>";
				return $msg;
			}
		}
	}
	
	public function getAllProduct(){
		$query = "SELECT product.*, category.catname, brand.brandname FROM product INNER JOIN category ON product.catid=category.id INNER JOIN brand ON product.brandid=brand.id ORDER BY product.id DESC";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function getProductById($id){
		$query = "SELECT * FROM product WHERE id=$id";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function updateProduct($data, $file, $id){
		$productName = $this->fm->validation($data['productname']);
		$productCat = $this->fm->validation($data['catid']);
		$productBrand = $this->fm->validation($data['brandid']);
		$productBody = $this->fm->validation($data['body']);
		$productPrice = $this->fm->validation($data['price']);
		$productType = $this->fm->validation($data['type']);
		
		$productName = mysqli_real_escape_string($this->db->link, $data['productname']);
		$productCat = mysqli_real_escape_string($this->db->link, $data['catid']);
		$productBrand = mysqli_real_escape_string($this->db->link, $data['brandid']);
		$productBody = mysqli_real_escape_string($this->db->link, $data['body']);
		$productPrice = mysqli_real_escape_string($this->db->link, $data['price']);
		$productType = mysqli_real_escape_string($this->db->link, $data['type']);
		
		$permitted = array('jpg', 'jpeg', 'png', 'gif');
		$file_name = $file['image']['name'];
		$file_size = $file['image']['size'];
		$file_temp = $file['image']['tmp_name'];
		
		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		$uploaded_image = "uploads/".$unique_image;
		
		if($productName == "" || $productCat == "" || $productBrand == "" || $productBody == "" || $productPrice == "" || $productType == ""){
			$msg = "<span class='error'>Fields can't be empty !</span>";
			return $msg;
		}else{
			if(!empty($file_name)){
				if($file_size>1048567){
					$msg = "<span class='error'>Image size should be less than 1 MB !</span>";
					return $msg; 
				}
				
				else if(in_array($file_ext, $permitted) === false){
					$msg = "<span class='error'>You can only upload:-".implode(', ', $permitted)."</span>";
					return $msg; 
				}
				
				else{
					move_uploaded_file($file_temp, $uploaded_image);
					$query = "UPDATE product SET productname = '$productName', catid = '$productCat', brandid = '$productBrand', body = '$productBody', price = '$productPrice', image = '$uploaded_image', type = '$productType' WHERE id='$id'";
					$result = $this->db->update($query);
					if($result){
						$msg = "<span class='success'>Product updated successfully.</span>";
						return $msg;
					}else{
						$msg = "<span class='error'>Product update failed !</span>";
						return $msg;
					}
				}
			}else{
				$query = "UPDATE product SET productname = '$productName', catid = '$productCat', brandid = '$productBrand', body = '$productBody', price = '$productPrice', type = '$productType' WHERE id='$id'";
				$result = $this->db->update($query);
				if($result){
					$msg = "<span class='success'>Product updated successfully.</span>";
					return $msg;
				}else{
					$msg = "<span class='error'>Product update failed !</span>";
					return $msg;
				}
			}
		}
	}
	
	public function deleteProduct($id){
		$query = "SELECT * FROM product WHERE id=$id";
		$value = $this->db->select($query);
		if($value){
			while($image = $value->fetch_assoc()){
				$delImage = $image['image'];
				unlink($delImage);
			}
		}
		
		$delQuery = "DELETE FROM product WHERE id=$id";
		$result = $this->db->delete($delQuery);
		if($result){
			$msg = "<span class='success'>Product deleted      successfully.</span>";
			return $msg;
		}else{
			$msg = "<span class='error'>Product not deleted !</span>";
			return $msg;
		}
	}
	
	public function getFeaturedProduct(){
		$query = "SELECT * FROM product WHERE type='0' ORDER BY id DESC LIMIT 4";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function getNewProduct(){
		$query = "SELECT * FROM product ORDER BY id DESC LIMIT 4";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function getSingleProduct($id){
		$query = "SELECT product.*, category.catname, brand.brandname FROM product INNER JOIN category ON product.catid=category.id INNER JOIN brand ON product.brandid=brand.id WHERE product.id=$id";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function getLatestIphone(){
		$query = "SELECT * FROM product WHERE brandid='1' ORDER BY id DESC LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function getLatestSamsung(){
		$query = "SELECT * FROM product WHERE brandid='2' ORDER BY id DESC LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function getAllLatestSamsung(){
		$query = "SELECT * FROM product WHERE brandid='2' ORDER BY id DESC LIMIT 4";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function getLatestAcer(){
		$query = "SELECT * FROM product WHERE brandid='3' ORDER BY id DESC LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function getAllLatestAcer(){
		$query = "SELECT * FROM product WHERE brandid='3' ORDER BY id DESC LIMIT 4";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function getLatestCanon(){
		$query = "SELECT * FROM product WHERE brandid='4' ORDER BY id DESC LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function getAllLatestCanon(){
		$query = "SELECT * FROM product WHERE brandid='4' ORDER BY id DESC LIMIT 4";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function getProductByCat($id){
		$query = "SELECT * FROM product WHERE catid='$id' ORDER BY id DESC";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function insertCompare($productid, $cmrid){
		$productid = $this->fm->validation($productid);
		$cmrid = $this->fm->validation($cmrid);
		$cmrid = mysqli_real_escape_string($this->db->link, $cmrid);
		$productid = mysqli_real_escape_string($this->db->link, $productid);
		
		$cquery = "SELECT * FROM `compare` WHERE `cmrid`='$cmrid' AND `productid`='$productid'";
		$check = $this->db->select($cquery);
		if($check){
			$msg = "<span class='error'>Already added.</span>";
			return $msg;
		}
		
		$query = "SELECT * FROM `product` WHERE `id`='$productid'";
		$result = $this->db->select($query)->fetch_assoc();
		if($result){
			$productName = $result['productname'];
			$price = $result['price'];
			$image = $result['image'];
			$newquery = "INSERT INTO `compare`(`cmrid`, `productid`, `productname`, `price`, `image`) VALUES('$cmrid', '$productid', '$productName', '$price', '$image')";
			$affected_rows = $this->db->insert($newquery);
			if($affected_rows){
				header("Location:http://localhost/shop/compare.php");
			}else{
				$msg = "<span class='error'>Product addition failed !</span>";
				return $msg;
			}
		}
	}
	
	public function getCmprProduct($cmrid){
		$query = "SELECT * FROM `compare` WHERE `cmrid`='$cmrid' ORDER BY `id` DESC";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function getwlistProduct($cmrid){
		$query = "SELECT * FROM `wishlist` WHERE `cmrid`='$cmrid' ORDER BY `id` DESC";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function delCmpr($cmrid){
		$query = "DELETE FROM compare WHERE cmrid=$cmrid";
		$result = $this->db->delete($query);
	}
	
	public function delWlist($cmrid, $proid){
		$query = "DELETE FROM `wishlist` WHERE `cmrid`=$cmrid AND `productid`='$proid'";
		$result = $this->db->delete($query);
	}
	
	public function insertWishlist($productid, $cmrid){
		$productid = $this->fm->validation($productid);
		$cmrid = $this->fm->validation($cmrid);
		$cmrid = mysqli_real_escape_string($this->db->link, $cmrid);
		$productid = mysqli_real_escape_string($this->db->link, $productid);
		
		$cquery = "SELECT * FROM `wishlist` WHERE `cmrid`='$cmrid' AND `productid`='$productid'";
		$check = $this->db->select($cquery);
		if($check){
			$msg = "<span class='error'>Already added.</span>";
			return $msg;
		}
		
		$query = "SELECT * FROM `product` WHERE `id`='$productid'";
		$result = $this->db->select($query)->fetch_assoc();
		if($result){
			$productName = $result['productname'];
			$price = $result['price'];
			$image = $result['image'];
			$newquery = "INSERT INTO `wishlist`(`cmrid`, `productid`, `productname`, `price`, `image`) VALUES('$cmrid', '$productid', '$productName', '$price', '$image')";
			$affected_rows = $this->db->insert($newquery);
			if($affected_rows){
				header("Location:http://localhost/shop/wishlist.php");
			}else{
				$msg = "<span class='error'>Product addition failed !</span>";
				return $msg;
			}
		}
	}
	
	public function getSearchedProduct($keyword){
		$query = "SELECT product.*, category.catname, brand.brandname FROM product INNER JOIN category ON product.catid=category.id INNER JOIN brand ON product.brandid=brand.id WHERE `productname` LIKE '%$keyword%' OR `body` LIKE '%$keyword%' OR category.catname LIKE '%$keyword%' OR brand.brandname LIKE '%$keyword%'";
		$result = $this->db->select($query);
		return $result;
	}
}
?>