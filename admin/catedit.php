<?php 
	include 'inc/header.php';
	include 'inc/sidebar.php';
	include("../classes/Category.php");
	
	if(!isset($_GET['id']) || $_GET['id'] == NULL){
		echo "<script>window.location = 'catlist.php';</script>";
	}else{
		$id = $_GET['id'];
	}
	
	$cat = new Category();
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$category = $_POST['category'];		
		$updateCategory = $cat->updateCategory($category, $id);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Category</h2>
               <div class="block copyblock"> 
			   <?php
					if(isset($updateCategory)){
						echo $updateCategory;
					}
					
					$getCat = $cat->getCatById($id);
					if($getCat){
						while($result = $getCat->fetch_assoc()){
				?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['catname'];?>" class="medium" name="category"/>
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