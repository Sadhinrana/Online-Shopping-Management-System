<?php 
	include("inc/header.php");
	
	if(!isset($_GET['id']) || $_GET['id'] == NULL){
		echo "<script>window.location = '404.php';</script>";
	}else{
		$id = $_GET['id'];
	}
?>	

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Latest from Category</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
			<?php 
				$getProductByCat = $product->getProductByCat($id);
					if($getProductByCat){
						while($result = $getProductByCat->fetch_assoc()){
			?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview.php?id=<?php echo $result['id'];?>"><img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					 <h2><?php echo $result['productname'];?></h2>
					 <p><?php echo $fm->textShorten($result['body'], 60);?></p>
					 <p><span class="price">$<?php echo $result['price'];?></span></p>
				     <div class="button"><span><a href="preview.php?id=<?php echo $result['id'];?>" class="details">Details</a></span></div>
				</div>
			<?php }}else{
				echo 
				"<h2 style='color:red; text-align:center; line-height: 130px; font-size:70px'>No item available for this category !</h2>";
			}?>
			</div>	
    </div>
 </div>

 <?php include("inc/footer.php");?>	

