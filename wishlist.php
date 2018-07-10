<?php 
	include("inc/header.php");
	
	$login = Session::getSession("custLogin");
	if(!$login){
		header("Location:login.php");
	}
	
	if(isset($_GET['proid'])){
		$proid = $_GET['proid'];
		$delWlist = $product->delWlist($cmrid, $proid);
	}
?>	

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Wishlist</h2>
					<?php 
					$getwlistProduct = $product->getwlistProduct($cmrid);
					if($getwlistProduct){
						$i = 0;
					?>
						<table class="tblone">
							<tr>
								<th>SL</th>
								<th>Product Name</th>
								<th>Price</th>
								<th>Image</th>
								<th>Action</th>
							</tr>
							<?php 							
								while($result = $getwlistProduct->fetch_assoc()){
									$i++;
							?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $result['productname'];?></td>								
								<td>$ <?php echo $result['price'];?></td>
								<td><img src="admin/<?php echo $result['image'];?>" alt=""/></td>
								<td><a href="preview.php?id=<?php echo $result['productid'];?>">Buy now</a> || 
								<a onclick="return confirm('Are you sure want to delete this data?')" href="?proid=<?php echo $result['productid'];?>">Remove</a></td> 
							</tr>
					<?php }}else{?>
							<h1 style="text-align:center; margin-bottom:20px; color:red; font-size:30px; line-height:40px; padding:5px 10px">You have no data in your wish list right now. <br>Please add product to  wish list to purchase them later.<br><a href='http://localhost/shop/index.php'>Click here</a> to add product to wish list. <br>Thank You.</h1>
						<?php }?>
						</table>
							
			</div>
					<div class="shopping">
						<div class="shopleft" style="width:100%; text-align:center">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php include("inc/footer.php");?>

