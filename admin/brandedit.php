<?php 
	include 'inc/header.php';
	include 'inc/sidebar.php';
	include("../classes/Brand.php");
	
	if(!isset($_GET['id']) || $_GET['id'] == NULL){
		echo "<script>window.location = 'brandlist.php';</script>";
	}else{
		$id = $_GET['id'];
	}
	
	$brand = new Brand();
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$brandName = $_POST['brand'];		
		$updateBrand = $brand->updateBrand($brandName, $id);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Brand</h2>
               <div class="block copyblock"> 
			   <?php
					if(isset($updateBrand)){
						echo $updateBrand;
					}
					
					$getBrand = $brand->getBrandById($id);
					if($getBrand){
						while($result = $getBrand->fetch_assoc()){
				?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['brandname'];?>" class="medium" name="brand"/>
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
					<?php }}?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>