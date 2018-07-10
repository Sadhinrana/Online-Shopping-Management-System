<?php include("inc/header.php");?>	

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Searched products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	        <div class="section group">
				<?php
				$keyword = $_GET['keyword'];
				$getSearchedProduct = $product->getSearchedProduct($keyword);
				if($getSearchedProduct){
					while($result = $getSearchedProduct->fetch_assoc()){
				?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview.php?id=<?php echo $result['id'];?>"><img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					 <h2><?php echo $result['productname'];?></h2>
					 <p><?php echo $fm->textShorten($result['body'], 60);?></p>
					 <p><span class="price">$<?php echo $result['price'];?></span></p>
				     <div class="button"><span><a href="preview.php?id=<?php echo $result['id'];?>" class="details">Details</a></span></div>
				</div>
			<?php }}else{
				echo '<h1 style="text-align:center; margin-bottom:20px; color:red; font-size:30px; line-height:40px; padding:5px 10px">No results found. Please try again with some different keyword.</h1>';
			}?>
			</div>
    </div>
 </div>
 
<?php include("inc/footer.php");?>	

