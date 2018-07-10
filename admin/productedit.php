<?php 
	include 'inc/header.php';
	include 'inc/sidebar.php';
	include("../classes/Product.php");
	include("../classes/Category.php");
	include("../classes/Brand.php");
	
	if(!isset($_GET['id']) || $_GET['id'] == NULL){
		echo "<script>window.location = 'productlist.php';</script>";
	}else{
		$id = $_GET['id'];
	}
	
	$product = new Product();
	if($_SERVER['REQUEST_METHOD'] == "POST"){		
		$updateProduct = $product->updateProduct($_POST, $_FILES, $id);
	}
	
	$cat = new Category();
	$brand = new Brand();
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block"> 
		<?php 
		if(isset($updateProduct)){
			echo $updateProduct;
		}
		?>
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               <?php 
					$getProductById = $product->getProductById($id);
					if($getProductById){
						$i = 0;
						while($value = $getProductById->fetch_assoc()){
						$i++;
				?>
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="productname" value="<?php echo $value['productname'];?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="catid">
                            <option>Select Category</option>
						<?php 
						$getAllCat = $cat->getAllCat();
						if($getAllCat){
							$i =0;
							while($result = $getAllCat->fetch_assoc()){
								$i++;
						?>
                            <option 
								<?php 
									if($value['catid'] == $result['id']){?>
										selected="selected"
								<?php }?>
								value="<?php echo $result['id'];?>"><?php echo $result['catname'];?>
							</option>
						<?php }}?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brandid">
                            <option>Select Brand</option>
						<?php 
						$getAllBrand = $brand->getAllBrand();
						if($getAllBrand){
							$i =0;
							while($result = $getAllBrand->fetch_assoc()){
								$i++;
						?>
                            <option 
								<?php 
									if($value['brandid'] == $result['id']){
								?>
										selected="selected"
								<?php }?>
								value="<?php echo $result['id'];?>"><?php echo $result['brandname'];?>
							</option>
						<?php }}?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body">
							<?php echo $value['body'];?>
						</textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="price" value="<?php echo $value['price'];?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="<?php echo $value['image'];?>" height="60px" width="40px">
						<input type="file" name="image"/>
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
							<?php 
							if($value['type'] == 0){ ?>
								<option selected="selected" value="0">Featured</option>
								<option value="1">Non-Featured</option>
							<?php }else{ ?>
								<option selected="selected" value="1">Non-Featured</option>
								<option value="0">Featured</option>
							<?php }?>                       
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
					<?php }}?>
            </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


