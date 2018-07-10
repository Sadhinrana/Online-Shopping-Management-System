<?php 
	include("inc/header.php");
	
	$login = Session::getSession("custLogin");
	if(!$login){
		header("Location:login.php");
	}
	
	if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["update"])){	
		$id = Session::getSession("Id");
		$customerUpdate = $customer->customerUpdate($_POST, $id);
	}
?>	
<style>
.tblone{width:550px; margin:0 auto; border:2px dashed #ddd}
.tblone tr td{text-align:justify}
.tblone input[type="text"]{width:400px; padding:5px; font-size:15px}
</style>
<div class="main">
    <div class="content">
		<div class="section group">
		<?php
			$id = Session::getSession("Id");
			$getCmrData= $customer->getCmrData($id);
				if($getCmrData){
					while($result = $getCmrData->fetch_assoc()){
		?>
			<form action="" method="post">
				<table class="tblone">
					<?php 
						if(isset($customerUpdate)){
							echo "<tr><td colspan='2'>".$customerUpdate."</td></tr>";
					}
					?>
					<tr>
						<td colspan="2"><h2>Update profile details</h2></td>
					</tr>
					<tr>
						<td width="20%">Name</td>
						<td><input type="text" name="name" value="<?php echo $result['name'];?>"></td>
					</tr>
					<tr>
						<td>Phone</td>
						<td><input type="text" name="phone" value="<?php echo $result['phone'];?>"></td>
					</tr>
					<tr>
						<td>E-mail</td>
						<td><input type="text" name="email" value="<?php echo $result['email'];?>"></td>
					</tr>
					<tr>
						<td>Address</td>
						<td><input type="text" name="address" value="<?php echo $result['address'];?>"></td>
					</tr>
					<tr>
						<td>City</td>
						<td><input type="text" name="city" value="<?php echo $result['city'];?>"></td>
					</tr>
					<tr>
						<td>Zip-code</td>
						<td><input type="text" name="zipcode" value="<?php echo $result['zipcode'];?>"></td>
					</tr>
					<tr>
						<td>Country</td>
						<td><input type="text" name="country" value="<?php echo $result['country'];?>"></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="update"></td>
					</tr>
				</table>
			</form>
			<?php }}?>
		</div>
	</div>
</div>

<?php include("inc/footer.php");?>