<?php 
	include 'inc/header.php';
	include 'inc/sidebar.php';
	include("../classes/Product.php");
	include_once("../helpers/Format.php");
	
	$product = new Product();
	$format = new Format();
	
	if(isset($_GET['deleteProduct'])){
		if($_GET['deleteProduct'] == NULL){
			echo "<script>window.location = 'Productlist.php';</script>";
		}else{
			$id = $_GET['deleteProduct'];
			$msg = $product->deleteProduct($id);
		}
	}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Product List</h2>
		<?php 
			if(isset($msg)){
			echo $msg;
			}
		?>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>SL No</th>
					<th>Product Name</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Description</th>
					<th>Price</th>
					<th>Image</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>			
			<?php 
				$getProduct = $product->getAllProduct();
				if($getProduct){
					$i = 0;
					while($result = $getProduct->fetch_assoc()){
					$i++;
			?>			
				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><?php echo $result['productname'];?></td>
					<td><?php echo $result['catname'];?></td>
					<td><?php echo $result['brandname'];?></td>
					<td><?php echo $format->textShorten($result['body'], 50);?></td>
					<td>$<?php echo $result['price'];?></td>
					<td><img src="<?php echo $result['image'];?>" height="60px" width="40px"></td>
					<td>
						<?php 
							if($result['type'] == 0){
								echo "Featured";
							}else{
								echo "Non-featured";
							}
						?>
					</td>
					<td><a href="productedit.php?id=<?php echo $result['id'];?>">Edit</a> || <a onclick="return confirm('Are you sure want to delete this data?')"href="?deleteProduct=<?php echo $result['id'];?>">Delete</a></td>
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
