<?php 
	include 'inc/header.php';
	include 'inc/sidebar.php';
	$realpath = realpath(dirname(__FILE__));
	include_once($realpath."/../classes/Cart.php");
	
	$cart = new Cart();
	$fm = new Format();
	
	if(isset($_GET['shiftid'])){
		$id = $_GET['shiftid'];
		$price = $_GET['price'];
		$time = $_GET['time'];
		$shift = $cart->productShift($id, $time, $price);
	}
	
	if(isset($_GET['delprotid'])){
		$id = $_GET['delprotid'];
		$price = $_GET['price'];
		$time = $_GET['time'];
		$delprotid = $cart->delprotid($id, $time, $price);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">   
				<?php
					if(isset($shift)){
						echo $shift;
					}
					
					if(isset($delprotid)){
						echo $delprotid;
					}
				?>
                    <table class="data display datatable" id="example">
						<thead>
							<tr>
								<th>Customer ID</th>
								<th>Date</th>
								<th>Pro ID</th>
								<th>Product Name</th>
								<th>Quantity</th>
								<th>Price</th>
								<th>Address</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$getOrderedProduct = $cart->getAllOrderedProduct();
							if($getOrderedProduct){
								while($result = $getOrderedProduct->fetch_assoc()){							
						?>
							<tr class="odd gradeX">
								<td><?php echo $result['cmrid'];?></td>
								<td><?php echo $fm->formatDate($result['date']);?></td>
								<td><?php echo $result['productid'];?></td>
								<td><?php echo $result['productname'];?></td>
								<td><?php echo $result['quantity'];?></td>
								<td>$<?php echo $result['price'];?></td>
								<td><a href="customer.php?id=<?php echo $result['cmrid'];?>">View details</a></td>
								<?php  
									if($result['status'] == 0){
								?>
									<td><a href="?shiftid=<?php echo $result['cmrid'];?>&price=<?php echo $result['price'];?>&time=<?php echo $result['date'];?>">Shift</a></td>
								<?php
								}else if($result['status'] == 1){
								?>
									<td>Pending</td>
								<?php }else{?>
								<td>Confirmed||<a href="?delprotid=<?php echo $result['cmrid'];?>&price=<?php echo $result['price'];?>&time=<?php echo $result['date'];?>">Remove</a></td>
								<?php }?>
							</tr>
							<?php }}?>
						</tbody>
					</table>
                </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
