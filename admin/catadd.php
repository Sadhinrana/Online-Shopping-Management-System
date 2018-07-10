<?php 
	include 'inc/header.php';
	include 'inc/sidebar.php';
	include("../classes/Category.php");
	
	$cat = new Category();
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$category = $_POST['category'];		
		$addcategory = $cat->addcategory($category);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
			   <?php
					if(isset($addcategory)){
						echo $addcategory;
					}
				?>
                 <form action="catadd.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" placeholder="Enter Category Name..." class="medium" name="category"/>
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