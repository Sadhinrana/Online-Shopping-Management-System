<?php 
	include("inc/header.php");
	
	$login = Session::getSession("custLogin");
	if(!$login){
		header("Location:login.php");
	}
	
	if(isset($_GET['cnfrmtid'])){
		$cmrid = $_GET['cnfrmtid'];
		$price = $_GET['price'];
		$time = $_GET['time'];
		$confirm = $cart->confirm($cmrid, $time, $price);
	}
	
	if(isset($_GET['delprotid'])){
		$cmrid = $_GET['delprotid'];
		$price = $_GET['price'];
		$time = $_GET['time'];
		$delprotid = $cart->delprotid($cmrid, $time, $price);
	}
?>	

<style>
.Order h2{text-align:center; margin-bottom:20px; color:red; font-size:30px}
</style>
<div class="main">
    <div class="content">
		<div class="section group">
			<div class="Order">
			<?php 
					$id = Session::getSession("Id");
					$getOrderedProduct = $cart->getOrderedProduct($id);
					if($getOrderedProduct){
						$i = 0;
						$sum = 0;						
			?>
				<h2>Your order details</h2>
				<table class="tblone">
					<tr>
						<th>SL</th>
						<th>Product Name</th>
						<th>Image</th>
						<th>Quantity</th>
						<th>Total Price</th>
						<th>Date</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
					<?php 
					while($result = $getOrderedProduct->fetch_assoc()){
							$i++;
					?>
					<tr>
						<td><?php echo $i;?></td>
						<td><?php echo $result['productname'];?></td>
						<td><img src="admin/<?php echo $result['image'];?>" alt=""/></td>
						<td><?php echo $result['quantity'];?></td>
						<td>$ 
						<?php 
							echo $result['price'];
						?>
						</td>
						<td><?php echo $fm->formatDate($result['date']);?></td>
						<td>
							<?php  
								if($result['status'] == 0){
									echo "Pending";
								}else if($result['status'] == 1){
									echo "Shifted";
								}else{
									echo "Confirmed";
								}
							?>
						</td>
						<td>
						<?php  
							if($result['status'] == 0){
								echo "N/A";				   
							}else if($result['status'] == 1){
						?>
								<a href="?cnfrmtid=<?php echo $id;?>&price=<?php echo $result['price'];?>&time=<?php echo $result['date'];?>">Confirm</a>
						<?php 
							}else{
						?>	
							<a onclick="return confirm('Are you sure want to delete this data?')" href="?delprotid=<?php echo $id;?>&price=<?php echo $result['price'];?>&time=<?php echo $result['date'];?>">X</a>
						<?php }?>
						</td>
					</tr>	
					<?php 
							}
						}else{
							echo "<h2>You have no order right now. <br>Please purchase product to see order details.<br><a href='http://localhost/shop/index.php'>Click here</a> to purchase product. <br>Thank You.</h2>";
						}
					?>
				</table>
			</div>
		</div>
	</div>
</div>

<?php include("inc/footer.php");?>