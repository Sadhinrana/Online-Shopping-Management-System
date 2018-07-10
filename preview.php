<?php 
	include("inc/header.php");
	
	if(!isset($_GET['id']) || $_GET['id'] == NULL){
		echo "<script>window.location = '404.php';</script>";
	}else{
		$id = $_GET['id'];
	}
	
	if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){
		$quantity = $_POST['quantity'];		
		$addCart = $cart->addCart($quantity, $id);
	}
	
	if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['compare'])){
		$insetCompare = $product->insertCompare($id, $cmrid);
	}
	
	if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['wishlist'])){
		$insetWishlist = $product->insertWishlist($id, $cmrid);
	}
?>	

 <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="cont-desc span_1_of_2">
				<?php 
					$getProduct = $product->getSingleProduct($id);
					if($getProduct){
						while($result = $getProduct->fetch_assoc()){
				?>
					<div class="grid images_3_of_2">
						<img src="admin/<?php echo $result['image'];?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
				<h2><?php echo $result['productname'];?></h2>
					<div class="price">
						<p>Price: <span>$<?php echo $result['price'];?></span></p>
						<p>Category: <span><?php echo $result['catname'];?></span></p>
						<p>Brand:<span><?php echo $result['brandname'];?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>				
				</div>
				<?php 
					if(isset($insetCompare)){
						echo $insetCompare;
					}
					
					if(isset($insetWishlist)){
						echo $insetWishlist;
					}
				?>
				<?php 
				$login = Session::getSession("custLogin");
					if($login){
				?>
				<div class="add-cart">
					<form action="" method="post">
						<input type="submit" class="buysubmit" name="compare" value="Add to Compare"/>
						<input type="submit" class="buysubmit" name="wishlist" value="Save to Wishlist"/>
					</form>				
				</div>
				<?php }?>	
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<p><?php echo $result['body'];?></p>
			</div>
		<?php }}?>		
	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
					<?php 
						$getAllCat = $cat->getAllCat();
						if($getAllCat){
							while($result = $getAllCat->fetch_assoc()){
					?>
				      <li><a href="productbycat.php?id=<?php echo $result['id'];?>"><?php echo $result['catname'];?></a></li>
				      <?php }}?>
    				</ul>
    	
 				</div>
 		</div>
 	</div>
	</div>
   <?php include("inc/footer.php");?>	

