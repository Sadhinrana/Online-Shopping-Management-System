	<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<?php 
					$getLatestIphone = $product->getLatestIphone();
					if($getLatestIphone){
						while($result = $getLatestIphone->fetch_assoc()){
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php?id=<?php echo $result['id'];?>"> <img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Iphone</h2>
						<p><?php echo $result['productname'];?>.</p>
						<div class="button"><span><a href="preview.php?id=<?php echo $result['id'];?>">Add to cart</a></span></div>
				   </div>
			    </div>
				<?php 
						}
					}
					$getLatestSamsung = $product->getLatestSamsung();
					if($getLatestSamsung){
						while($result = $getLatestSamsung->fetch_assoc()){
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php?id=<?php echo $result['id'];?>"> <img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Samsung</h2>
						<p><?php echo $result['productname'];?>.</p>
						<div class="button"><span><a href="preview.php?id=<?php echo $result['id'];?>">Add to cart</a></span></div>
				   </div>
				</div>
					<?php }}?>
			</div>
			<div class="section group">
				<?php 
					$getLatestAcer = $product->getLatestAcer();
					if($getLatestAcer){
						while($result = $getLatestAcer->fetch_assoc()){
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php?id=<?php echo $result['id'];?>"> <img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Acer</h2>
						<p><?php echo $result['productname'];?>.</p>
						<div class="button"><span><a href="preview.php?id=<?php echo $result['id'];?>">Add to cart</a></span></div>
				   </div>
			    </div>
				<?php 
						}
					}
					$getLatestCanon = $product->getLatestCanon();
					if($getLatestCanon){
						while($result = $getLatestCanon->fetch_assoc()){
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php?id=<?php echo $result['id'];?>"> <img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Canon</h2>
						<p><?php echo $result['productname'];?>.</p>
						<div class="button"><span><a href="preview.php?id=<?php echo $result['id'];?>">Add to cart</a></span></div>
				   </div>
				</div>
					<?php }}?>
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<li><img src="images/1.jpg" alt=""/></li>
						<li><img src="images/2.jpg" alt=""/></li>
						<li><img src="images/3.jpg" alt=""/></li>
						<li><img src="images/4.jpg" alt=""/></li>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>