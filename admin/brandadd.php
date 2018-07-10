<?php 
	include 'inc/header.php';
	include 'inc/sidebar.php';
	include("../classes/Brand.php");
	
	$brand = new Brand();
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$Brand = $_POST['brand'];		
		$addBrand = $brand->addBrand($Brand);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Brand</h2>
               <div class="block copyblock"> 
			   <?php
					if(isset($addBrand)){
						echo $addBrand;
					}
				?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" placeholder="Enter Brand Name..." class="medium" name="brand"/>
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>