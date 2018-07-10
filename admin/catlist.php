<?php 
	include 'inc/header.php';
	include 'inc/sidebar.php';
	include("../classes/Category.php");
	
	$cat = new Category();
	
	if(isset($_GET['delcat'])){
		if($_GET['delcat'] == NULL){
			echo "<script>window.location = 'catlist.php';</script>";
		}else{
			$id = $_GET['delcat'];
			$deleteCategory = $cat->deleteCategory($id);
		}
	}	
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block"> 
				<?php
				if(isset($deleteCategory)){
					echo $deleteCategory;
				}
				?>
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$getAllCat = $cat->getAllCat();
						if($getAllCat){
							$i =0;
							while($result = $getAllCat->fetch_assoc()){
								$i++;
					?>
						<tr class="odd gradeX">
							<td><?php echo $i?></td>
							<td><?php echo $result['catname'];?></td>
							<td><a href="catedit.php?id=<?php echo $result['id'];?>">Edit</a> || <a onclick="return confirm('Are you sure want to delete this data')" href="?delcat=<?php echo $result['id'];?>">Delete</a></td>
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

