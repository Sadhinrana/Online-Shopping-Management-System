<?php 
	include("inc/header.php");
	
	$login = Session::getSession("custLogin");
	if(!$login){
		header("Location:login.php");
	}
?>	
<style>
.psuccess{width:500px; min-height:200px; text-align:center; margin:0 auto; padding:50px; border:1px solid #ddd}
.psuccess h2{border-bottom:1px dashed #ddd; margin-bottom:40px; padding-bottom:10px; color:green}
.psuccess p{text-align:left; font-size:18px; line-height:30px}
</style>
<div class="main">
    <div class="content">
		<div class="section group">
			<div class="psuccess">
				<h2>Payment Successful</h2>
				<?php 
					$id = Session::getSession("Id");
					$amount = $cart->payableAmount($id);
					if($amount){
						$price = 0;
						while($result = $amount->fetch_assoc()){
							$price = $price + $result['price'];	
						}
					}
				?>
				<p>
					Toatal payable amount (Including VAT) : $
					<?php
						$vat = 0.1 * $price;
						$total = $price + $vat;
						echo $total;
					?>
				</p>
				<p>Thanks for purchasing from us. We will contact you soon with delivery details. <a href="orderdetails.php">Click Here</a> to see your order details.</p>
			</div>
		</div>
	</div>
</div>

<?php include("inc/footer.php");?>