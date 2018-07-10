<?php 
	include("inc/header.php");
	
	$login = Session::getSession("custLogin");
	if(!$login){
		header("Location:login.php");
	}
?>	
<style>
.payment{width:500px; min-height:200px; text-align:center; margin:0 auto; padding:50px; border:1px solid #ddd}
.payment h2{border-bottom:1px dashed #ddd; margin-bottom:40px; padding-bottom:10px}
.payment a{background:#ff0000 none repeat scroll 0 0;border-radious:3px; color:#fff; font-size:25px; padding:5px 30px}
.back a{width:160px; margin:5px auto 0; padding:7px 0; text-align:center; display:block; background:#555; border:1px solid #333; color:#fff; border-radious:3px; font-size:25px}
</style>
<div class="main">
    <div class="content">
		<div class="section group">
			<div class="payment">
				<h2>Choose payment option</h2>
				<a href="onlinepayment.php">Online Payment</a>
				<a href="offlinepayment.php">Offline Payment</a>
			</div>
			<div class="back">
				<a href="cart.php">Previous</a>
			</div>
		</div>
	</div>
</div>

<?php include("inc/footer.php");?>