<?php include("inc/header.php");?>	

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Acer</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
				<?php 
				$getProduct = $product->getAllLatestAcer();
				if($getProduct){
					while($result = $getProduct->fetch_assoc()){
				?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview.php?id=<?php echo $result['id'];?>"><img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					 <h2><?php echo $result['productname'];?></h2>
					 <p><?php echo $fm->textShorten($result['body'], 60);?></p>
					 <p><span class="price">$<?php echo $result['price'];?></span></p>
				     <div class="button"><span><a href="preview.php?id=<?php echo $result['id'];?>" class="details">Details</a></span></div>
				</div>
			<?php }}?>
			</div>
		<div class="content_bottom">
    		<div class="heading">
    		<h3>Samsung</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<?php 
				$getProduct = $product->getAllLatestSamsung();
				if($getProduct){
					while($result = $getProduct->fetch_assoc()){
				?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview.php?id=<?php echo $result['id'];?>"><img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					 <h2><?php echo $result['productname'];?></h2>
					 <p><?php echo $fm->textShorten($result['body'], 60);?></p>
					 <p><span class="price">$<?php echo $result['price'];?></span></p>
				     <div class="button"><span><a href="preview.php?id=<?php echo $result['id'];?>" class="details">Details</a></span></div>
				</div>
			<?php }}?>
			</div>
	<div class="content_bottom">
    		<div class="heading">
    		<h3>Canon</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<?php 
				$getProduct = $product->getAllLatestCanon();
				if($getProduct){
					while($result = $getProduct->fetch_assoc()){
				?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview.php?id=<?php echo $result['id'];?>"><img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					 <h2><?php echo $result['productname'];?></h2>
					 <p><?php echo $fm->textShorten($result['body'], 60);?></p>
					 <p><span class="price">$<?php echo $result['price'];?></span></p>
				     <div class="button"><span><a href="preview.php?id=<?php echo $result['id'];?>" class="details">Details</a></span></div>
				</div>
			<?php }}?>
			</div>
    </div>
 </div>
 
<?php include("inc/footer.php");?>	

