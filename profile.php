<?php 
	include("inc/header.php");
	
	$login = Session::getSession("custLogin");
	if(!$login){
		header("Location:login.php");
	}
?>	
<style>
.tblone{width:550px; margin:0 auto; border:2px dashed #ddd}
.tblone tr td{text-align:justify}
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

<?php include("inc/footer.php");?>