<?php 
	include 'inc/header.php';
	include 'inc/sidebar.php';
	$realpath = realpath(dirname(__FILE__));
	include_once($realpath."/../classes/Customer.php");
	
	if(!isset($_GET['id']) || $_GET['id'] == NULL){
		echo "<script>window.location = 'inbox.php';</script>";
	}else{
		$id = $_GET['id'];
	}
	
	$customer = new Customer();
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		echo "<script>window.location = 'inbox.php';</script>";
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Customer Details</h2>
               <div class="block copyblock"> 
			   <?php
					$getCustomer = $customer->getCmrData($id);
					if($getCustomer){
						while($result = $getCustomer->fetch_assoc()){
				?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
							<td>Name</td>
							<td>:</td>
                            <td>
                                <?php echo $result['name'];?>
                            </td>
						</tr>
						<tr>
							<td>Address</td>
							<td>:</td>
							<td>
                                <?php echo $result['address'];?>
                            </td>
						</tr>
						<tr>
							<td>City</td>
							<td>:</td>
							<td>
                                <?php echo $result['city'];?>
                            </td>
						</tr>
						<tr>
							<td>Country</td>
							<td>:</td>
							<td>
                                <?php echo $result['country'];?>
                            </td>
						</tr>
						<tr>
							<td>Zip-code</td>
							<td>:</td>
							<td>
                                <?php echo $result['zipcode'];?>
                            </td>
						</tr>
						<tr>
							<td>Phone</td>
							<td>:</td>
							<td>
                                <?php echo $result['phone'];?>
                            </td>
						</tr>
						<tr>
							<td>E-mail</td>
							<td>:</td>
							<td>
                                <?php echo $result['email'];?>
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="OK" />
                            </td>
                        </tr>
                    </table>
                    </form>
					<?php }}?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>