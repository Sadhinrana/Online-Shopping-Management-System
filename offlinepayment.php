<?php 
	include("inc/header.php");
	
	$login = Session::getSession("custLogin");
	if(!$login){
		header("Location:login.php");
	}
	
	if(isset($_GET['orderid'])  && $_GET['orderid'] == 'order'){
		$id = Session::getSession("Id");
		$insertOrder = $cart->insertOrder($id);
		$delCt = $cart->delCt();
		header("Location:success.php");
	}
?>	
<style>
.division{width:50%; float:left}
.tblone{width:550px; margin:0 auto; border:2px dashed #ddd}
.tblone tr td{text-align:justify}
.tbltwo{float:right; text-align:left; width:50%; border:2px dashed #ddd; margin-right:14px; margin-top:12px}
.tbltwo tr th,td{text-align:justify; padding:5px 10px}
.ordernow{padding-bottom:30px}
.ordernow a{width:200px; margin:20px auto 0; text-align:center; padding:5px; font-size:30px; display:block; background:#ff0000; color:#fff; border-radious:3px}
</style>
<div class="main">
    <div class="content">
		<div class="section group">
			<div class="division">
				<table class="tblone">
					<tr>
						<th>SL</th>
						<th>Product Name</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Total Price</th>
					</tr>
					<?php 
						$getCartProduct = $cart->getCartProduct();
						if($getCartProduct){
							$i = 0;
							$sum = 0;
							$totalQuantity =0;
							while($result = $getCartProduct->fetch_assoc()){
								$i++;
					?>
					<tr>
						<td><?php echo $i;?></td>
						<td><?php echo $result['productname'];?></td>
						<td>$ <?php echo $result['price'];?></td>
						<td><?php echo $quantity = $result['quantity'];?></td>
						<td>$ 
						<?php 
							$total = $result['price']*$result['quantity'];
							echo $total;
						?>
						</td>
					</tr>	
						<?php 
							$sum = $sum + $total;
							$totalQuantity = $totalQuantity + $quantity;
								}
							}
						?>
				</table>
				<table class="tbltwo">
					<tr>
						<th>Sub Total</th>
						<td>:</td>
						<td>$ <?php echo $sum;?></td>
					</tr>
					<tr>
						<th>VAT</th>
						<td>:</td>
						<td>$ <?php echo $vat = $sum*0.1;?></td>
					</tr>
					<tr>
						<th>Grand Total</th>
						<td>:</td>
						<td>$ <?php echo $gtotal = $sum+$vat;?> </td>
					</tr>
					<tr>
						<th>Quantity</th>
						<td>:</td>
						<td><?php echo $totalQuantity;?> </td>
					</tr>
				</table>
			</div>
			<div class="division">
				<?php
					$id = Session::getSession("Id");
					$getCmrData= $customer->getCmrData($id);
						if($getCmrData){
							while($result = $getCmrData->fetch_assoc()){
				?>
				<table class="tblone">
					<tr>
						<td colspan="3"><h2>Your profile details</h2></td>
					</tr>
					<tr>
						<td width="20%">Name</td>
						<td width="5%">:</td>
						<td><?php echo $result['name'];?></td>
					</tr>
					<tr>
						<td>Phone</td>
						<td>:</td>
						<td><?php echo $result['phone'];?></td>
					</tr>
					<tr>
						<td>E-mail</td>
						<td>:</td>
						<td><?php echo $result['email'];?></td>
					</tr>
					<tr>
						<td>Address</td>
						<td>:</td>
						<td><?php echo $result['address'];?></td>
					</tr>
					<tr>
						<td>City</td>
						<td>:</td>
						<td><?php echo $result['city'];?></td>
					</tr>
					<tr>
						<td>Zip-code</td>
						<td>:</td>
						<td><?php echo $result['zipcode'];?></td>
					</tr>
					<tr>
						<td>Country</td>
						<td>:</td>
						<td><?php echo $result['country'];?></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td><a href="updateprofile.php">Update Details</a></td>
					</tr>
				</table>
				<?php }}?>
			</div>
		</div>
	</div>
	<div class="ordernow"><a href="?orderid=order">Order</a></div>
</div>

<?php include("inc/footer.php");?>