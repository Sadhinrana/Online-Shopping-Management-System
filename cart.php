<?php 
	include("inc/header.php");
	
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$id = $_POST['id'];	
		$quantity = $_POST['quantity'];		
		$updateCart = $cart->updateCart($quantity, $id);
	}
	
	if(isset($_GET['delCart'])){
		if($_GET['delCart'] == NULL){
			echo "<script>window.location = 'cart.php';</script>";
		}else{
			$id = $_GET['delCart'];
			$delCart = $cart->delCart($id);
		}
	}
	
	if(isset($_GET['id'])){
		echo "<meta http-equip='refresh' content=0; URL=?id=live'/>";
	}
?>	

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
					<?php 
						if(isset($updateCart)){
							echo $updateCart;
						}
						
						if(isset($delCart)){
							echo $delCart;
						}
					?>
						<table class="tblone">
							<tr>
								<th width="5%">SL</th>
								<th width="30%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="15%">Quantity</th>
								<th width="15%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
							<?php 
							$getCartProduct = $cart->getCartProduct();
							if($getCartProduct){
								$i = 0;
								$sum = 0;
								while($result = $getCartProduct->fetch_assoc()){
									$i++;
							?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $result['productname'];?></td>
								<td><img src="admin/<?php echo $result['image'];?>" alt=""/></td>
								<td>$ <?php echo $result['price'];?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="id" value="<?php echo $result['id'];?>"/>
										<input type="number" name="quantity" value="<?php echo $result['quantity'];?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td>$ 
								<?php 
									$total = $result['price']*$result['quantity'];
									echo $total;
								?></td>
								<td><a onclick="return confirm('Are you sure want to delete this data?')" href="?delCart=<?php echo $result['id'];?>">X</a></td>
							</tr>	
							<?php 
									$sum = $sum+$total;
									Session::setSession("sum", $sum);
								}
							}
							?>
						</table>
						<?php	
							$getdata = $cart->checkCart();
							if($getdata){
						?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td>$ <?php echo $sum;?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>$ <?php echo $vat = $sum*0.1;?></td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td>$ <?php echo $gtotal = $sum+$vat;?> </td>
							</tr>
					   </table>
						<?php 
							}else{
								header("Location:index.php");
							}
						?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php include("inc/footer.php");?>

